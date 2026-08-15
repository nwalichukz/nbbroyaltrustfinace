<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Email\Mailer;
use App\Http\Controllers\Email\SendOtpController;
use App\Models\User;
use App\Http\Controllers\Wallet\UserTransactionHistoryController;
use App\Http\Controllers\Wallet\OrganizationTransactionHistoryController;
use App\Http\Controllers\Notification\NewNotificationController;
use App\Models\UserWallet;
use App\Models\UserTransactionHistory;
use App\Models\OrganizationTransactionHistory;
use Carbon\Carbon;
use DB, Validator, Auth;

class UserWalletController extends Controller
{
    public static $minimum_balance = 0;
    /**
     * saves the data to  the db
     * this is the initialization process
     * of a user
     * @param $data
     */
    public static function save($user_id){
        //$user = User::where('id', $user_id)->first();
        DB::transaction(function() use ($user_id){
            $value = 0;
               $save = new UserWallet;
                $save->user_id = $user_id;
               $save->wallet_no = self::getWalletNo();
                $save->balance = $value;
                $save->save();

        });
    }

    /**
     * generates a unique wallet no
     * for every user
     *
     */
    public static function getWalletNo(){
        $walletno = mt_rand(1000000000, 9999999999);

        $query = UserWallet::where('wallet_no', '!=', $walletno)->first();
        while($query = true){

            return $walletno;

        }

    }

    /**
     * credit a user
     *
     * @param $request
     */

    public static function credit($request){
        $data = [
            'user_id' => $request['user_id'],
            'amount' => $request['amount'],
            'transaction_type' => 'credit',
            'purpose' => $request['purpose'],
            
        ];

        $result = DB::transaction(function() use ($request, $data){
            $credit = UserWallet::where('user_id', $request['user_id'])->with(['user'])->lockForUpdate()->first();
            $credit->balance = $credit->balance + $request['amount'];
            $credit->save();
            // NewNotificationController::save($data);
           return UserTransactionHistoryController::save($data);
           // Mailer::creditMail($credit->user->email, $request['amount'], $credit->balance, $request['purpose']);
            //return $credit;

               });
          return $result;

    }

    /**
     *  credits a user
     * @param $request
     *
     */
    public static function makeCredit(Request $request){
       $credit = self::credit($request);
        if($credit){
           // return $credit;
            // Mailer::creditMail($credit->user->email, $request['amount'], $credit->balance);

            return response()->json([
                'status' => 'success',
                'message' => $request['amount'].' credited to your wallet successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'Something went wrong, your wallet could not be credited. Please try again',
            ]);
        }
    }

    /**
     * debit a user
     *
     * @param $request
     */
    public static function debit($request){
        $data = [
            'user_id' => $request['user_id'],
            'amount' => $request['amount'],
            'transaction_type' => 'debit',
            'purpose' => $request['purpose'],
            'comment' => 'Your wallet has been debited '.$request['amount'].' for '.$request['purpose'],
            'action_id' => $request['user_id'],
            'action' => 'Wallet',
        ];

           $result = DB::transaction(function() use ($request, $data){
                $debit = UserWallet::where('user_id', $request['user_id'])->with(['user'])->lockForUpdate()->first();
                if($debit->balance >= $request['amount']) {
                    $debit->balance = $debit->balance - $request['amount'];
                    $debit->save();
                    // NewNotificationController::save($data);
                    return UserTransactionHistoryController::save($data);
                    //  Mailer::debitMail($debit->user->email, $request['amount'], $debit->balance, $request['purpose']);
                }else{
                    return false;
                }

            });

           return $result;


    }

      /**
     * debit a user
     *
     * @param $request
     */
    public static function debitTwo($request){
        $data = [
            'user_id' => $request['user_id'],
            'amount' => $request['amount'],
            'transaction_type' => 'debit',
            'purpose' => $request['purpose'],
            'comment' => 'Your wallet has been debited '.$request['amount'].' for '.$request['purpose'],
            'action_id' => $request['user_id'],
            'action' => 'Wallet',
        ];

           $result = DB::transaction(function() use ($request, $data){
                $debit = UserWallet::where('user_id', $request['user_id'])->with(['user'])->lockForUpdate()->first();
                if($debit->balance_two >= $request['amount']) {
                    $debit->balance_two = $debit->balance_two - $request['amount'];
                    $debit->save();
                    // NewNotificationController::save($data);
                    return UserTransactionHistoryController::save($data);
                    //  Mailer::debitMail($debit->user->email, $request['amount'], $debit->balance, $request['purpose']);
                }else{
                    return false;
                }

            });

           return $result;


    }

    /**
     *
     * debits a user
     * @param $user_id, $amount
     *
     */
    public static function makeDebit(Request $request){
        $check = self::checkAmt($request['user_id'], $request['amount']);
        if($check){
            $debit = self::debit($request);
            if($debit){
               //return $debit;
                return response()->json([
                    'status' => 'success',
                    'message' => $request['amount'].' debited from your wallet',
                ]);
            }else{

                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong your wallet could not be debited. Please try again',
                ]);

            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'You don not have sufficient balance in your wallet.'
            ]);

        }

    }

    /**
     *
     * checks if amount is
     * greater than balance
     * @param $user_id, $amount
     *
     */
    public static function checkAmt($user_id, $amount){

            //$new_amout = 300;
            $wallet = UserWallet::where('user_id', $user_id)->lockForUpdate()->first();
            if ($wallet->balance >= $amount) {
                return true;
            } else {
                return false;
            }

    }

      /**
     *
     * checks if amount is
     * greater than balance
     * @param $user_id, $amount
     *
     */
    public static function checkAmtTwo($user_id, $amount){

        //$new_amout = 300;
        $wallet = UserWallet::where('user_id', $user_id)->lockForUpdate()->first();
        if ($wallet->balance_two >= $amount) {
            return true;
        } else {
            return false;
        }

}

    /**
     *
     * debits a user
     * @param $user_id, $amount
     *
     */
    public static function get($id = null){
        if(!empty($id)){
            return $data = UserWallet::where('id', $id)->with(['user'])->first();
        }elseif(empty($id)){
            return $data = UserWallet::where('user_id', '!=', null)->with(['user'])->paginate(20);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong, data could not be retrieved'
            ]);
        }
    }

    /**
     *
     * get balance
     * @param $user_id
     *
     */
    public static function balance($user_id){
        if(!empty($user_id)){
            $balance = UserWallet::where('user_id', $user_id)->lockForUpdate()->first();
            return $balance->balance;
        }elseif(empty($user_id)){

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong, balance could not be retrieved. Please try again'
            ]);
        }
    }

       /**
     *
     * get balance
     * @param $user_id
     *
     */
    public static function balanceTwo($user_id){
        if(!empty($user_id)){
            $balance = UserWallet::where('user_id', $user_id)->lockForUpdate()->first();
            return $balance->balance_two;
        }elseif(empty($user_id)){

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong, balance could not be retrieved. Please try again'
            ]);
        }
    }

    /**
     *
     * returns a user details for transfer
     * confirmation
     * @param $sender_user_id, $receiver_wallet_no
     *
     */
    public static function confirmUserWalletNo(Request $request){
        $validator = Validator::make($request->all(),
        [
        'amount' => 'required|numeric',
        'wallet_no' => 'required|min:10',
      
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } 
        
        $receiver_wallet_details = UserWallet::where('wallet_no', (int)$request['wallet_no'])->with('user')->first();
        if(!empty($receiver_wallet_details->id)){
            return view('dashboard/src/html/components/forms/confirm-internal-transfer-details')->with(['data'=>  $receiver_wallet_details, 'user', 'amount'=>$request['amount']]);
        }else{
            return redirect()->back()->with('error', 'Invalid User Details or Insufficient balance');
        }

    }


    /**
     *
     * transfers money to another user in the paltform
     *
     * @param $sender_user_id, $receiver_wallet_no, $amount
     * @return $response
     */
    public static function transferToAnotherUserWalletId(Request $request){
        $validation = Validator::make($request->all(),
            [
                "sender_wallet_no" => "required",
                "receiver_wallet_no" =>"required",
                "amount"=>"required"
            ]);
         // return 345;
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
      // return $request->all();
        if($request['receiver_wallet_no'] !== $request['sender_wallet_no']){
        if(self::checkAmt($request['sender_user_id'], $request['amount'])){
            try{
                $credit = UserWallet::where('wallet_no', $request['receiver_wallet_no'])->with(['user'])->lockForUpdate()->first();
                $debit = UserWallet::where('user_id', $request['sender_user_id'])->with(['user'])->lockForUpdate()->first();
               
                DB::transaction(function() use ($request, $credit, $debit){
                    if($debit->balance >= $request['amount']){
                        $debit->balance = $debit->balance - $request['amount'];
                        $debit->save();
                     $debit_transaction_record = [
                            'user_id' => $request['sender_user_id'],
                            'amount' => $request['amount'],
                            'transaction_type' => 'debit',
                            'purpose' => 'transfer to '.$credit->user->name,
                        ];
                        UserTransactionHistoryController::save($debit_transaction_record);
                 
                    
                    // $credit = Wallet::where('wallet_no', $request['receiver_wallet_no'])->with(['user'])->first();
                    $credit->balance = $credit->balance + $request['amount'];
                    $credit->save();
                    $credit_transaction_record = [
                        'user_id' => $credit->user_id,
                        'amount' => $request['amount'],
                        'transaction_type' => 'credit',
                        'purpose' => 'transfer from '.$debit->user->name,
                    ];
                    UserTransactionHistoryController::save($credit_transaction_record);
                       
                   }
                });

                $email = Auth::user()->email;
                $title = 'Transfer made successfully';
                $msg = '$'.$request['amount'].' transfered successfully to '.$credit->user->name;
                Mailer::genericMail($email, $title, $msg);
         
                return redirect()->back()->with('success', '$'.$request['amount'].' transfered successfully to '.$credit->user->name);
               
            }catch(Exception $e){
                return redirect()->back()->with('error', 'Something went wrong transfer could not be completed successfully. Please try again');

            }
        }else{
            return redirect()->back()->with('error', 'You do not have sufficient balance in your wallet to carry out this transaction'); 

        }
    }else{
        return redirect()->back()->with('error', 'You can not make a transfer to yourself'); 
    }

    }


     /**
     *
     * transfers money to another user in the paltform
     *
     * @param $sender_user_id, $receiver_wallet_no, $amount
     * @return $response
     */
    public static function fundSecondWallet(Request $request){
        $validation = Validator::make($request->all(),
            [
                "amount"=>"required",
                "user_id"=>"required"
            ]);
         // return 345;
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
      // return $request->all();
    
        if(self::checkAmt($request['user_id'], $request['amount'])){
            try{
               
                $debit = UserWallet::where('user_id', $request['user_id'])->with(['user'])->lockForUpdate()->first();
               
                DB::transaction(function() use ($request, $debit){
                    if($debit->balance >= $request['amount']){
                        $debit->balance = $debit->balance - $request['amount'];
                        $debit->balance_two = $debit->balance_two + $request['amount'];
                        $debit->save();
                     $debit_transaction_record = [
                            'user_id' => $request['user_id'],
                            'amount' => $request['amount'],
                            'transaction_type' => 'credit',
                            'purpose' => $request['amount'].' deposited to your joint acc',
                        ];
                        UserTransactionHistoryController::save($debit_transaction_record);
                 
                  
                   }
                });
         
                return redirect()->back()->with('success', '$'.$request['amount'].' transfered to your Joint account');
               
            }catch(Exception $e){
                return redirect()->back()->with('error', 'Something went wrong transfer could not be completed successfully. Please try again');

            }
        }else{
            return redirect()->back()->with('error', 'You do not have sufficient balance in your wallet to carry out this transaction'); 

        }
  

    }

     /**
     *
     * transfers money to another user in the paltform
     *
     * @param $sender_user_id, $receiver_wallet_no, $amount
     * @return $response
     */
    public static function transferToWallet(Request $request){
        $validation = Validator::make($request->all(),
            [
                "amount"=>"required",
                "user_id"=>"required"
            ]);
         // return 345;
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
      // return $request->all();
    
        if(self::checkAmtTwo($request['user_id'], $request['amount'])){
            try{
               
                $debit = UserWallet::where('user_id', $request['user_id'])->with(['user'])->lockForUpdate()->first();
               
                DB::transaction(function() use ($request, $debit){
                    if($debit->balance >= $request['amount']){
                        $debit->balance_two = $debit->balance_two - $request['amount'];
                        $debit->balance = $debit->balance + $request['amount'];
                        $debit->save();
                     $debit_transaction_record = [
                            'user_id' => $request['user_id'],
                            'amount' => $request['amount'],
                            'transaction_type' => 'credit',
                            'purpose' => $request['amount'].' transferred back to your main wallet',
                        ];
                        UserTransactionHistoryController::save($debit_transaction_record);
                 
                  
                   }
                });
         
                return redirect()->back()->with('success', '$'.$request['amount'].' transfered to your main account');
               
            }catch(Exception $e){
                return redirect()->back()->with('error', 'Something went wrong transfer could not be completed successfully. Please try again');

            }
        }else{
            return redirect()->back()->with('error', 'You do not have sufficient balance in your wallet to carry out this transaction'); 

        }
  

    }


    /**
     *
     * transfers money to another user in the paltform
     *
     * @param $sender_user_id, $receiver_wallet_no, $amount
     * @return $response
     */
    public static function transferFromUserToOrganizationWalletId(Request $request){
        if(self::checkAmt($request['sender_user_id'], $request['amount'])){
            try{
                $credit = OrganizationWallet::where('wallet_no', $request['receiver_wallet_no'])->with(['user'])->lockForUpdate()->first();
                $debit = UserWallet::where('user_id', $request['sender_user_id'])->with(['user'])->lockForUpdate()->first();
                DB::transaction(function() use ($request, $credit, $debit){

                    if($debit->balance >= $request['amount'] && is_int($request['amount'])){
                        $debit->balance = $debit->balance - $request['amount'];
                        $debit->save();
                        $debit_transaction_record = [
                            'user_id' => $request['sender_user_id'],
                            'amount' => $request['amount'],
                            'transaction_type' => 'debit',
                            'purpose' => 'transfer',
                            'receiver_id' => $credit->user_id,
                        ];
                        UserTransactionHistoryController::save($debit_transaction_record);
                    }
                    // $credit = Wallet::where('wallet_no', $request['receiver_wallet_no'])->with(['user'])->first();
                    $credit->balance = $credit->balance + $request['amount'];
                    $credit->save();
                    $credit_transaction_record = [
                        'user_id' => $credit->user_id,
                        'amount' => $request['amount'],
                        'transaction_type' => 'credit',
                        'purpose' => 'transfer',
                    ];
                    OrganizationTransactionHistoryController::save($credit_transaction_record);
                });

                return response()->json([
                    'status' => 'success',
                    'message' => $request['amount'].' transfered successfully to '.$credit->user->name,
                ]);
            }catch(Exception $e){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong transfer could not be completed successfully.
                 Please try again',
                ]);

            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'You do not have sufficient balance in your wallet to carry out this transaction',
            ]);

        }



    }

    /**
     *
     * returns a total wallet balance
     *
     *
     *
     */
    public static function getTotalCurrentBalnce(){
        return UserWallet::where('id', '!=', NULL)->lockForUpdate()->sum('balance');
    }

    /**
     *
     * returns 
     *
     *
     *
     */
    public static function externalTransfer(Request $request){
        $validation = Validator::make($request->all(),
        [
            "sender_user_id" => "required",
            "amount"=>"required"
        ]);
     // return 345;
    if($validation->fails()){
        return redirect()->back()->withErrors($validation);
    }
  // return $request->all();
   
    if(self::checkAmt($request['sender_user_id'], $request['amount'])){

        if(SendOtpController::verifyCodeOnly($request['sender_user_id'], $request['otp']) == true){

        if(Auth::user()->pin == $request['pin']){
            if(Auth::user()->external_transfer_status == 'active'){
        try{
          //  $credit = UserWallet::where('wallet_no', $request['receiver_wallet_no'])->with(['user'])->lockForUpdate()->first();
            $debit = UserWallet::where('user_id', $request['sender_user_id'])->with(['user'])->lockForUpdate()->first();
           
            DB::transaction(function() use ($request, $debit){
                if($debit->balance >= $request['amount']){
                    $debit->balance = $debit->balance - $request['amount'];
                    $debit->save();
                    $date_created = $debit->created_at;
                 $debit_transaction_record = [
                        'user_id' => $request['sender_user_id'],
                        'amount' => $request['amount'],
                        'transaction_type' => 'debit',
                        'purpose' => 'external transfer '.$request['bank_name'],
                    ];
                    UserTransactionHistoryController::save($debit_transaction_record);
             
                   
               }
            });
            $email = Auth::user()->email;
            $title = 'Transfer made successfully';
            $msg = 'Your Payment of '.' $'.$request['amount'].'  to '.$request['account_name'].' has been successfully Made';
            Mailer::genericMail($email, $title, $msg);
            return view('dashboard/src/html/crm/successful-transaction')->with(['msg'=> 'Your Payment of '.' $'.$request['amount'].'  to '.$request['account_name'].' has been successfully Made',
                                                                                'bank_name'=>$request['bank_name'],
                                                                                'amount'=>$request['amount'],
                                                                                'account_name'=>$request['account_name'],
                                                                                'account_number'=>$request['account_number'],
                                                                                'id'=>$request['sender_user_id'],
                                                                                'date_created'=>Carbon::now()]);
           
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Something went wrong transfer could not be completed successfully. Please try again');

        }
      }else{
        return redirect('dashboard/get-external-transfer')->with('error', 'Please contact your account officer');
      }
    }else{
        return redirect('dashboard/get-external-transfer')->with('error', 'Your PIN is incorrect');
    }
}else{
     return redirect('dashboard/get-external-transfer')->with('error', 'You OTP is incorrect');
}

    }else{
        return redirect()->back()->with('error', 'You do not have sufficient balance in your wallet to carry out this transaction'); 

    }



    }

    /**
     *
     * checks if you can
     *
     * cash out
     *
     */
    public static function checkIfCanCashOut($user_id){
        $balance = Wallet::where('user_id', $user_id)->first();
        if($balance->balance >= self::$minimum_balance){
            return true;
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Sorry you can not withdraw until you have up to '.self::$minimum_balance.' in your wallet',
            ]);
        }

    }
  

     /**
     *
     * returns fund page
     *
     * cash out
     *
     */
    public static function getFundAccount(){
       if(Auth::check()){
        return view('dashboard/src/html/components/forms/add-fund');

       }else{
        Auth::logout();
        return redirect('/logout');
       }

    }

     /**
     *
     * returns  page
     *
     * cash out
     *
     */
    public static function getWithdrawalPage(){
        if(Auth::check()){
         return view('dashboard/src/html/components/forms/withdrawal-fund');
 
        }else{
         Auth::logout();
         return redirect('/logout');
        }
 
     }

         /**
     *
     * returns internal transfer
     *
     *
     */
    public static function confirmExternalTransfer(Request $request){
        if(Auth::check()){
         
         return view('dashboard/src/html/components/forms/confirm-external-transfer')
                                ->with(['bank_name'=>$request['bank_name'],
                                        'account_number'=>$request['account_number'],
                                        'amount'=>$request['amount'],
                                        'account_name'=>$request['account_name'],
                                              ]);
       
        }else{
         Auth::logout();
         return redirect('/logout');
        }
 
     }

    /**
     *
     * returns fund page
     *
     * cash out
     *
     */
    public static function getAddWalletPage(){
        if(Auth::check()){
            return view('dashboard/src/html/components/forms/add-wallet-address');
 
        }else{
         Auth::logout();
         return redirect('/logout');
        }
 
     }


  
     /**
     *
     * returns internal transfer
     *
     *
     */
    public static function getInternalTransfer(){
        if(Auth::check()){
            if(!empty(Auth::user()->pin)){
         return view('dashboard/src/html/components/forms/internal-transfer');
            }else{
                return view('dashboard/src/html/components/forms/add-pin');       
            }
 
        }else{
         Auth::logout();
         return redirect('/logout');
        }
 
     }


        /**
     *
     * returns internal transfer
     *
     *
     */
    public static function getExternalTransfer(){
        if(Auth::check()){
            if(!empty(Auth::user()->pin)){
         return view('dashboard/src/html/components/forms/external-transfer');
        }else{
            return view('dashboard/src/html/components/forms/add-pin');       
        }
 
        }else{
         Auth::logout();
         return redirect('/logout');
        }
 
     }

     

         /**
     *
     * returns internal transfer
     *
     *
     */
    public static function myWalletDetails(){
        if(Auth::check()){
         return view('dashboard/src/html/my-wallet-details');
 
        }else{
         Auth::logout();
         return redirect('/logout');
        }
 
     }
    

      /**
     *
     * confrirm PIN
     *
     * cash out
     *
     */
    public static function confirmPin(Request $request){
        if(Auth::check()){
            $user = User::where('id', Auth::user()->id)->first();
            if($user->pin == $request['pin']){
         return view('dashboard/src/html/components/forms/withdrawal-fund');
            }else{
               return redirect()->back()->with('error', 'PIN is incorrect. Please try again');  
            }
        }else{
         Auth::logout();
         return redirect('/logout');
        }
 
     }


     
         /**
     *
     * returns transaction receits
     *
     *
     */
    public static function generateReceipt($banK_name, $account_name, $account_number, $amount, $date_created ){
        if(Auth::check()){
         return view(' dashboard/src/html/crm/receipt')->with(['bank_name'=>$banK_name,
                                                                'account_name'=>$account_name,
                                                                'account_number'=>$account_number,
                                                                'amount'=>$amount,
                                                                'date_created'=>$date_created]);
 
        }else{
         Auth::logout();
         return redirect('/logout');
        }
 
     }
    
    

}

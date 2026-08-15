<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Wallet\UserWalletController;
use Illuminate\Http\Request;
use App\Models\WithdrawalRequest;
use App\Http\Controllers\Email\Mailer;
use App\Models\User;
use Carbon\Carbon;
use Validator, Auth;

class WithdrawalRequestController extends Controller
{
      /**
     * saves user data to db
     * @param $reqest
     * @return response
     * 
     */

     public static function save($request){
      $user = new  WithdrawalRequest;
           $user->amount = $request['amount'];
           $user->wallet_address = $request['wallet_address'];
           $user->user_id = Auth::user()->id;
           $user->save();
       
       return $user->id;
    }

    /**
    * page
    * 
    * 
    * @return response
    * 
    */
   public function myDepositRequest(){
     return view('dashboard.wallet.my-deposit-request');
   }


    /**
    * deletes deposit request
    * 
    * 
    * @param id
    * 
    * @return response
    * 
    */
   public static function delete($id){
     $delete = WithdrawalRequest::where('id', $id)->delete();
     if($delete){
        return redirect()->back()->with('success', 'Withdrawal request deleted successfully');
     }else{
        return redirect()->back()->with('error', 'Something went wrong, withdrawal request not deleted successfully');
     }
   }

   
     /**
      * creates a user request
      *
      * @param Request
      *
      *@return respoonse
      */
      public static function create(Request $request){
        $validator = Validator::make($request->all(),
        [
        'amount' => 'required|numeric',
      
        ]);
        $create = self::save($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } 

        if($create){
          return redirect()->back()->with('success', 'Withdrawal request successful');
      }else{
          return redirect()->back()->with('error', 'Something went wrong withdrawal request not created successfully');
                  }
     

      }


   
   /**
    * get settle deposit request
    * 
    * 
    * @return response
    * 
    * @param $id
    */
   public static function settlePage($id){
     $deposit = WithdrawalRequest::where('id', $id)->first();
     return view('dashboard/src/html/components/forms/settle-withdrawal-request')->with(['deposit'=>$deposit]);
   }

   /**
    * get get all deposit request
    * 
    * 
    * @return response
    * 
    * @param $id
    */
    public static function getPendingRequest(){
      $deposit = WithdrawalRequest::where('status', 'pending')->orderBy('created_at', 'DESC')->paginate(20);
      return view('dashboard/src/html/view-withdrawal-request')->with(['deposit'=>$deposit, 'user']);
    }


    /**
    * settles a deposit request
    * 
    * 
    * @return response
    * 
    * @param $id
    */
   public function settleWithdrawalRequest(Request $request){
   // return $request->all();
     if(Auth::check()){
       if(Auth::user()->access_level== 'admin'){
      $settle = WithdrawalRequest::find($request['id']);
      $settle->status = 'settled';
      $settle->updated_at = Carbon::now();
      $settle->save();
     
       try{
           $data = [
               'user_id'=>$settle->user_id,
               'amount'=>$request['amount'],
               'purpose'=>'Withrawal Request settlement',
           ];
       UserWalletController::debit($data);
   
       }catch(Exception $e){
   
         return redirect()->back()->with('error', $e->message);
   
         }
         $email = $settle->user->email;
         $title = 'Withdrawal Request Settled Successfully';
         $msg = '$'.$request['amount'].' has been successfully debited from your wallet balance';
         Mailer::genericMail($email, $title, $msg);
       return redirect('/admin/withdrawal-request/get-all')->with('success', 'Withdrawal request settled successfully.');
            }else{
         Auth::logout();
         return redirect('get-login');
          }
       }else{
       Auth::logout();
       return redirect('get-login');
      }
  

 }


  /**
    * cancel a deposit request
    * 
    * 
    * @return response
    * 
    * @param $id
    */
   public function cancelWithdrawalRequest($id){
     $settle = WithdrawalRequest::find($id);
     $settle->status = 'cancel';
     $settle->updated_at = Carbon::now();
     $settle->save();
     return redirect()->back()->with('success', 'Withdrawal request canceled successfully. Thanks');


  }

    

}

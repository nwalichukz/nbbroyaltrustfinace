<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Wallet\UserWalletController;
use Illuminate\Http\Request;
use App\Models\DepositRequest;
use App\Http\Controllers\Email\Mailer;
use App\Models\User;
use Validator, Auth;
use Carbon\Carbon;

class DepositRequestController extends Controller
{

      /**
     * saves user data to db
     * @param $reqest
     * @return response
     * 
     */

     public static function save($request){
      $user = new  DepositRequest;
           $user->amount = $request['amount'];
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
     $delete = DepositRequest::where('id', $id)->delete();
     if($delete){
        return redirect()->back()->with('success', 'Deposit request deleted successfully');
     }else{
        return redirect()->back()->with('error', 'Something went wrong, deposit request not deleted successfully');
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
          return redirect('admin/get-all-wallet-address')->with('success', 'Successful');
      }else{
          return redirect()->back()->with('error', 'Something went wrong deposit request not created successfully');
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
     $deposit = DepositRequest::where('id', $id)->first();
     return view('dashboard/src/html/components/forms/settle-deposit-request')->with(['deposit'=>$deposit]);
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
      $deposit = DepositRequest::where('status', 'pending')->orderBy('created_at', 'DESC')->paginate(20);
      return view('dashboard/src/html/view-deposit-request')->with(['deposit'=>$deposit, 'user']);
    }


    /**
    * settles a deposit request
    * 
    * 
    * @return response
    * 
    * @param $id
    */
   public function settleDepositRequest(Request $request){
   // return $request->all();
     if(Auth::check()){
       if(Auth::user()->access_level== 'admin'){
      $settle = DepositRequest::find($request['id']);
      $settle->status = 'settled';
      $settle->updated_at = Carbon::now();
      $settle->save();
     
       try{
           $data = [
               'user_id'=>$settle->user_id,
               'amount'=>$request['amount'],
               'purpose'=>'Funding',
           ];
       UserWalletController::credit($data);
   
       }catch(Exception $e){
   
         return redirect()->back()->with('error', $e->message);
   
         }
         $email = $settle->user->email;
         $title = 'Deposit Request Settled Successfully';
         $msg = '$'.$request['amount'].' has been successfully deposited to your wallet';
         Mailer::genericMail($email, $title, $msg);
       return redirect('/admin/deposit-request/get-all')->with('success', 'Deposit request settled successfully.');
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
   public function cancelDepositRequest($id){
     $settle = DepositRequest::find($id);
     $settle->status = 'cancel';
     $settle->updated_at = Carbon::now();
     $settle->save();
     return redirect()->back()->with('success', 'Deposit request canceled successfully. Thanks');
 

  }



}

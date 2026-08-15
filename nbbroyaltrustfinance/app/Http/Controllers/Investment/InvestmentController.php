<?php

namespace App\Http\Controllers\Investment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Wallet\UserWalletController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Email\Mailer;
use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\User;
use App\Models\InvestmentType;
use Carbon\Carbon;
use Validator, Auth;


class InvestmentController extends Controller
{
     /**
     * this method hepls save
     * investment
     * 
     * @param $request
     * 
     * @return response
     */
    public static function save($request){
        $save = new Investment;
        $save->user_id = $request['user_id'];
        $save->amount = $request['amount'];
        $save->investment_type_id = $request['investment_type_id'];
        $save->end_date = $request['end_date'];
        $save->possible_total_earning = $request['possible_earning'];
        $save->status = 'active';
        $save->save(); 
        return $save->id; 
    }

     /**
     * this method creates save
     * investment
     * 
     * @param $request
     * 
     * @return response
     */

 public function create(Request $request){
     AuthController::checkAuth(Auth::check());
    $validator = Validator::make($request->all(),
    [
    'amount' => 'required|integer',
    'investment_type_id' => 'required',
    'user_id' => 'required'

    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator);
    }

    if(UserWalletController::checkAmt($request['user_id'], $request['amount'])) {
        
    try{
        $data = [
            'user_id'=> $request['user_id'],
            'amount'=> $request['amount'],
            'purpose'=>'Debit for investment',
        ];
    $user = User::find($request['user_id']);
    UserWalletController::debit($data);
    $now = Carbon::now();
    $inv_type = InvestmentType::find($request['investment_type_id']);
    $percentage = $inv_type->earning_percentage/100;
    $int_interval = $inv_type->duration/$inv_type->int_interval;
    $create = new Investment;
    $create->amount = $request['amount'];
    $create->user_id = Auth::user()->id;
    $create->investment_type_id = $request['investment_type_id'];
    $create->end_date = $now->addDays($inv_type->duration);
    $create->possible_total_earning =  round($request['amount'] + ($request['amount'] * $percentage * $int_interval));
    $create->status = 'active';
    $create->save();
    // ReferralController::fulfill($user->referral_code, $request['amount']);
    }catch(Exception $e){

        return redirect()->back()->with('error', $e->message);

    }
    //return redirect()->back()->with('success', 'Ok good');
    $email = Auth::user()->email;
    $title = 'Successful';
    $msg = 'Your '.$inv_type->name.' '.$inv_type->parent_name.' investment of $'.$request['amount'].' was successful';
    Mailer::genericMail($email, $title, $msg);
    return redirect('/user/get-my-investments/'.$create->user_id)->with('success', 'Investment successful. Thanks');
}else{
    return redirect()->back()->with('error', 'You do not have enough wallet balance to carry out this transaction');
         }
   }

   /**
     * this method creates save
     * investment
     * 
     * @param $request
     * 
     * @return response
     */

 public function createTwo(Request $request){
  AuthController::checkAuth(Auth::check());
 $validator = Validator::make($request->all(),
 [
 'amount' => 'required|integer',
 'investment_type_id' => 'required',
 'user_id' => 'required'

 ]);

 if($validator->fails()){
     return redirect()->back()->withErrors($validator);
 }

 if(UserWalletController::checkAmtTwo($request['user_id'], $request['amount'])) {
     
 try{
     $data = [
         'user_id'=> $request['user_id'],
         'amount'=> $request['amount'],
         'purpose'=>'Debit for investment',
     ];
 $user = User::find($request['user_id']);
 UserWalletController::debitTwo($data);
 $now = Carbon::now();
 $inv_type = InvestmentType::find($request['investment_type_id']);
 $percentage = $inv_type->earning_percentage/100;
 $int_interval = $inv_type->duration/$inv_type->int_interval;
 $create = new Investment;
 $create->amount = $request['amount'];
 $create->user_id = Auth::user()->id;
 $create->investment_type_id = $request['investment_type_id'];
 $create->end_date = $now->addDays($inv_type->duration);
 $create->possible_total_earning =  round($request['amount'] + ($request['amount'] * $percentage * $int_interval));
 $create->status = 'active';
 $create->save();
 // ReferralController::fulfill($user->referral_code, $request['amount']);
 }catch(Exception $e){

     return redirect()->back()->with('error', $e->message);

 }
 //return redirect()->back()->with('success', 'Ok good');
 $email = Auth::user()->email;
 $title = 'Successful';
 $msg = 'Your '.$inv_type->name.' '.$inv_type->parent_name.' investment of $'.$request['amount'].' was successful';
 Mailer::genericMail($email, $title, $msg);
 return redirect('/user/get-my-investments/'.$create->user_id)->with('success', 'Investment successful. Thanks');
}elseif(UserWalletController::checkAmt($request['user_id'], $request['amount'])){
       
 try{
  $data = [
      'user_id'=> $request['user_id'],
      'amount'=> $request['amount'],
      'purpose'=>'Debit for investment',
  ];
$user = User::find($request['user_id']);
UserWalletController::debit($data);
$now = Carbon::now();
$inv_type = InvestmentType::find($request['investment_type_id']);
$percentage = $inv_type->earning_percentage/100;
$create = new Investment;
$create->amount = $request['amount'];
$create->user_id = Auth::user()->id;
$create->investment_type_id = $request['investment_type_id'];
$create->end_date = $now->addDays($inv_type->duration);
$create->possible_total_earning =  ($request['amount'] + ($inv_type->duration * $request['amount'] * $percentage));
$create->status = 'active';
$create->save();
// ReferralController::fulfill($user->referral_code, $request['amount']);
}catch(Exception $e){

  return redirect()->back()->with('error', $e->message);

}
//return redirect()->back()->with('success', 'Ok good');
$email = Auth::user()->email;
$title = 'Successful';
$msg = 'Your '.$inv_type->name.' '.$inv_type->parent_name.' investment of $'.$request['amount'].' was successful';
Mailer::genericMail($email, $title, $msg);
return redirect('/user/get-my-investments/'.$create->user_id)->with('success', 'Investment successful. Thanks');

}else{
 return redirect()->back()->with('error', 'You do not have sufficient wallet balance to carry out this transaction');
      }
}


   /**
     * getssingle investment 
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */
    public function get($id){
        AuthController::checkAuth(Auth::check());
        $invType = Investment::find($id);
        return view('dashboard.investment.edit-inv')->with(['inv-type'=>$invType]);
      }

         /**
     * getssingle investment 
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */
    public function getJointAccount(){
      if(UserWalletController::checkAmt(Auth::user()->id, 1000)){
   
        return view('dashboard/src/html/components/forms/create-joint-account');

      }else{
        return redirect()->back()->with('error', 'You must have atleast USD 1000 before you can create a joint account');
      }
      
    }
  
      /**
       * get many investment 
       * 
       * 
       * 
       * @return response
       * 
       */
      public function getAll(){
        if(Auth::check()){
          if(Auth::user()->access_level == 'admin'){
        $invAll = Investment::where('status', 'active')->orderBy('created_at', 'DESC')->paginate(15);
        //$total = Investment::where('status', 'active')->sum();
        return view('dashboard/src/html/view-all-investments')->with(['invall'=>$invAll, 'invType'=>'invType', 'user'=>'user']);
          }else{
            return redirect('/get-login');
          }
        }else{
          return redirect('/get-login');
        }

      }
  
  
      /**
       * creates investment 
       * page
       * 
       * 
       * @return response
       * 
       */
      public function getInvPage(){
        AuthController::checkAuth(Auth::check());
        return view('dashboard.investment.inv-page');
      }

      
      /**
       * creates investment 
       * page
       * 
       * 
       * @return response
       * 
       */
      public function getInvestmentPage(){
        AuthController::checkAuth(Auth::check());
        $inv_type = InvestmentType::all();
        $end_date =   Carbon::now()->addDays(10);
        return view('dashboard.investment-plans')->with(['inv_type'=>$inv_type, 'end_date' =>$end_date]);
      }

      
      /**
       * creates my investment 
       * page
       * 
       * 
       * @return response
       * 
       */
      public function myInvestments($user_id){
        if(Auth::check()){
          
         $invAll = Investment::where('status', 'active')->where('user_id', $user_id)/*->with(['invType', 'user'])*/->orderBy('created_at', 'DESC')->paginate(15);
        //$total = Investment::where('status', 'active')->sum();
        return view('dashboard/src/html/view-my-investments')->with(['invall'=>$invAll, 'invType'=>'inv_type', 'user'=>'user']);
        
        }else{
          return redirect('/get-login');
        }
      }

      /**
       * creates my investment 
       * page
       * 
       * 
       * @return response
       * 
       */
      public function allInvestment($user_id){
        //  AuthController::checkAuth(Auth::check());
          $invAll = Investment::where('user_id', $user_id)->get();
         // $end_date =   Carbon::now()->addDays(10);
          return view('dashboard/src/html/view-all-investments')->with(['invall'=>$invAll, 'invType'=>'inv_type', 'user'=>'user']);
  
         // return view('dashboard.my-investment')->with(['inv_type'=>$inv_type, 'end_date' =>$end_date, 'investmentType']);
        }

       /**
       * creates investment 
       * page
       * 
       * 
       * @return response
       * 
       */
      public function returnInvestmentPage($id){
        AuthController::checkAuth(Auth::check());
        $inv_type = InvestmentType::find($id);
        $end_date =   Carbon::now()->addDays(10);
        return view('dashboard.create-investment')->with(['inv_type'=>$inv_type, 'end_date' =>$end_date]);
      }

      
     /**
     * deletes investment
     * 
     * 
     * @param id
     * 
     * @return response
     * 
     */
    public function delete($id){
        AuthController::checkAuth(Auth::check());
        $delete = Investment::where('id', $id)->delete();
        if($delete){
           return redirect()->back()->with('success', 'Investment deleted successfully');
        }else{
           return redirect()->back()->with('error', 'Something went wrong, Investment not deleted successfully');
        }
      }


      /**
      * ends investment
      *
      * manually
      *
      *@return response
      *
      */
      public static function endInv($id){
        if(Auth::user()->access_level == 'admin'){
         $inv =  Investment::where('id', $id)
                           ->where('status', 'active')
                           ->with(['user', 'invType'])->get();
        foreach($inv as $settle){
         $settle->status = 'ended';
         $settle->updated_at = carbon::now();
         $save = $settle->save();
         $title = 'Your Investment has ended';
         $msg = 'Thank you for trusting us with your investments. Your '.$settle->invType->name.' investment has ended and we encourage you to reinvest or upgrade to more lucrative plan.';
         $data = [
            'user_id'=>$settle->user_id,
            'amount' => $settle->possible_total_earning,
            'purpose' => 'Return for Investment',
              ];
          UserWalletController::credit($data);
         // Mailer::genericMail($settle->user->email, $title, $msg);
        }

        if($save){
          return redirect()->back()->with('success', 'Investment ended successfully');
       }else{
          return redirect()->back()->with('error', 'Something went wrong, Investment not ended successfully');
       }
      }else{
        return redirect('/get-login');
      }

      }
}

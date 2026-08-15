<?php

namespace App\Http\Controllers\Investment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Wallet\UserWalletController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Email\Mailer;
use App\Models\Investment;
use App\Models\JointAccount;
use App\Models\User;
use App\Models\InvestmentType;
use Carbon\Carbon;
use Validator, Auth;

class JointAccountController extends Controller
{   
     /**
     * saves investment type
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */

     public static function save($request){
        $save = new JointAccount;
        $save->user_id = Auth::user()->id;
        $save->full_name = $request['partner_full_name'];
        $save->email = $request['email'];
        $save->gender = $request['gender'];
        $save->next_of_kin_name = $request['next_of_kin_name'];
        $save->next_of_kin_phone = $request['next_of_kin_phone'];
        $save->relationship = $request['relationship_to_next_of_kin'];
        $save->occupation = $request['occupation'];
        $save->save();
        return $save->id;


     }

     /**
     * creates investment type
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */
    public function create(Request $request){
      $validator = Validator::make($request->all(),
      [
      'partner_full_name' => 'required',
      'email' => 'required|unique:joint_accounts',
      'gender' => 'required',
      'next_of_kin_name' => 'required',
      'next_of_kin_phone' => 'required',
      'relationship_to_next_of_kin' => 'required',
      'occupation'=> 'required'
      ]);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator);
      } 
      $create = self::save($request);
      if($create){
         return redirect()->back()->with('success', 'Joint account created successfully');

      }else{
         return redirect()->back()->with('error', 'Something went wrong, Joint account not created. Please try again');

      }

    }

    /**
     * returns page for creating
     * 
     * joint account
     */
    public static function getPage(){
        $jointacc = JointAccount::where('user_id', Auth::user()->id)->first();
        if(empty($jointacc->id)){
        if(UserWalletController::checkAmt(Auth::user()->id, 100)){
            return view('dashboard/src/html/components/forms/joint-account-create');
        }else{
            return redirect()->back()->with('error', 'You at least $100 in you wallet before you can create Joint account');
        }
    }else{
        return view('dashboard/src/html/components/forms/fund-joint-account');
    }
    }

  

        /**
     * returns page for creating
     * 
     * joint account
     */
    public static function   getTransferTowalletPage(){
       
    
            return view('dashboard/src/html/components/forms/transfer-funds-to-balance');
     
    }
}

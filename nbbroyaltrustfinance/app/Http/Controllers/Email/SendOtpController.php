<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Email\Mailer;
use Illuminate\Http\Request;
use App\Models\SendOtp;
use App\Models\User;
use Carbon\Carbon;
use DB;

class SendOtpController extends Controller
{
    
    /**
     *  stores a email verifaication
     *  details to the database
     *  @param $user_id, $code
     */
    public static function save($user_id, $code){
        $save = new SendOtp;
         $save->user_id = $user_id;
         $save->verify_code = $code;
        $save->status = "active";
         $save->save();

    }

     /**
     *  stores a email verifaication
     *  details to the database
     *  @param $user_id
     */
    public static function create($user_id){
        $code = mt_rand(1000, 9999);
        $user = User::find($user_id);
        $save = new SendOtp;
         $save->user_id = $user_id;
         $save->verify_code = $code;
         $save->status = "active";
         $save->save();

        // send verification email to the user
        Mailer::verifyEmail($user->email, $code);
        if($save){
            return response()->json([
                'status' => 'success',
                'message' => 'Email verification code sent successfully. Please login to the email used to sign up to get code.',
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Email verification code not sent successfully. Please try again.',
            ]);
        }
    }

     /**
     *  stores a email verifaication in DB
     * send an email to the user
     *
     *  @param $user_id, $code
     */
    public static function storeCodeSendMail($user_id){
        $code = mt_rand(1000, 9999);
        $user = User::find($user_id);

         $save = new SendOtp;
         $save->user_id = $user_id;
         $save->verify_code = $code;
         $save->save();

        // send verification email to the user
        Mailer::verifyEmail($user->email, $code);
        return true;
    }


    /**
     *  verifies a user
     *
     *  details to the database
     *  @param $user_id, $code
     */
    public static function verify(Request $request){

        $user_id = $request['user_id'];
        $code = $request['code'];
        $verify = SendOtp::where(['user_id' => $request['user_id'], 'verify_code'=> $request['code'], 'status'=>'active'])->first();
        $user = User::find($user_id);
        if(!empty($verify->user_id)){

            try{
     DB::transaction(function() use ($user_id, $code, $verify, $user){

     $verify->status = 'verified';
     $verify->save();
     $user->email_verified_at = carbon::now();
     $user->save();
     //ReferralController::fulfill($user->referral_code);
      });

      return response()->json([
          'status' => 'success',
          'message' => 'User email verified successfully',
          'user_data' => $user
      ]);
    }catch(Exception $e){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong user email could not be verified successfully.
                     Please try sending another a new code to verify.',
                ]);

            }  }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong the code entered maybe invalid. Please try sending another a new code to verify.',
                ]);

            }

    }

     /**
     *  verifies a user
     *
     *  details to the database
     *  @param $user_id, $code
     */
    public static function setEmail($user_id){
        $user = User::find($user_id);
        $user->email_verified_at = carbon::now();
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'User email verified at set to null verified successfully',
        ]);
    }

     /**
     *  verifies a users code
     *
     *  details to the database
     *  @param $user_id, $code
     */
    public static function verifyCodeOnly($user_id, $code){
       
     $verify = SendOtp::where('user_id', $user_id)->where('verify_code', $code)
                            ->where('status', 'active')->first();
     if( !empty($verify->id)){
     $verify->status = 'verified';
     return $verify->save();

       // return true;
     }else{
    return false;
     }

  

    }

     /**
     *  retuns a email verifaication
     *  details to the database
     *  @param $id
     */
    public static function get($id = null){
        if(!empty($id)){
    		return $data = SendOtp::where('id', $id)->first();
    	}elseif(empty($id)){
    		  return $data = SendOtp::where('id', '!=', null)->orderBy('created_at', 'DESC')->paginate(20);
	    	}else{
          return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong, data could not be retrieved'
            ]);
        }
    }

     /**
     *  retuns a email verifaication
     *  details to the database
     *  @param $id
     */
    public static function delete($id){
       $delete = SendOtp::destroy($id);
       if($delete){
        return response()->json([
            'status' => 'success',
            'message' => 'Deleted successfully',
            ]);
       }else{
        return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong, verification data not deleted',
            ]);
       }
    }



}

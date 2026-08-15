<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserTransactionHistory;
use App\Models\User;

use Auth, Validator;


class AuthController extends Controller
{
    /**
     * logins in a user
     * 
     * @param $request
     * 
     * @return response/collectio
     * 
     */
    public function login(Request $request){

        $validator = Validator::make($request->all(),
        [
        'email' => 'required|email',
        'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } 

        $credentials = ['email' => $request['email'], 'status'=>'active', 'password'=>$request['password'], 'kyc_status'=>'verified'];
        $credentials_not_verified = ['email' => $request['email'], 'status'=>'active',  'password'=>$request['password'], 'kyc_status'=>'not-verified'];
        $credentials_declined = ['email' => $request['email'], 'status'=>'active', 'password'=>$request['password'], 'kyc_status'=>'declined'];

         if($user = Auth::attempt($credentials)){
            $user = Auth::user();
            if(Auth::user()->access_level == 'admin'){
               return redirect('/user-signin/'.$user->id)->with(['myTransactions'=>'transactionHistory']);
            }elseif(Auth::user()->access_level=='user'){
                return redirect('/user-signin/'.$user->id )->with(['myTransactions'=>'transactionHistory']);
              }
            }elseif($user = Auth::attempt($credentials_not_verified)){
                $user = Auth::attempt(['email' => $request['email'], 'password'=>$request['password']]);
                return redirect('get-login-no-kyc');
            }elseif($user = Auth::attempt($credentials_declined)){
                $user = Auth::attempt(['email' => $request['email'], 'password'=>$request['password']]);
                return redirect('get-login-no-kyc');
         }else{
            return redirect()->back()->with('error', 'Invalid user details');
         }

    }

    /**
     * return to the dashboard
     * 
     * @param $request
     * 
     * @return response/collectio
     * 
     */
    public static function dashboard($id){
        if (Auth::check()){
        return view('dashboard/src/html/crm/dashboard-1');
        }else{
            return redirect('/logout');
        }
    }

    


    /**
     * logout a user
     * 
     * @param $request
     * 
     * @return response/collection
     * 
     */
    
     public function logout(){
        Auth::logout();
        return redirect('get-login');
     }

     /**
     * checks if authenticated
     * 
     * @param $request
     * 
     * @return response/collection
     * 
     */
    public static function checkAuth($aut){
        if(!$aut){
            Auth::logout();
            return redirect('new-template.pages.about-us.contact.login');
        }else{
            return true;
        }
    } 

    
}

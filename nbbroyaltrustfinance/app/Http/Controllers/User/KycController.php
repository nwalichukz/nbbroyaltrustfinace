<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image\ImageController;
use Illuminate\Http\Request;
use App\Http\Controllers\Email\Mailer;
use App\Models\Kyc;
use App\Models\User;
use Validator, Auth;

class KycController extends Controller
{   

    /**
     * saves kyc upload documents
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */

     public static function save($request){
        $save = new Kyc;
        $save->user_id = Auth::user()->id;
        $save->name = $request['name'];
        $save->status = 'pending';
        $save->file_name = ImageController::uploadKyc($request);
        $save->save();
        return $save->id;
     }



        /**
      * creates a user
      *
      * @param Request
      *
      *@return respoonse
      */
      public static function create(Request $request){
        $validator = Validator::make($request->all(),
        [
        'name' => 'required',
        'image' => 'required|image',
      
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } 
        // return $request['doc_image'];
       // return  $request['doc_image'];
         $find = Kyc::where('user_id', Auth::user()->id)->first();
          if(empty($find->id)){
           $create = self::save($request);      

        // referrals    

        if($create){
            return redirect()->back()->with('success', 'Kyc Document submited successfully. It takes about 24 hours to be verified or declined. Thanks');
        }else{
            return redirect()->back()->with('error', 'Something went wrong kyc document not submited successfully. Please try again');
                    }
          
      }else{
        return redirect()->back()->with('error', 'You have submited Kyc document before. Please wait for the admin to attend. If more than 24 hours submited contact admin');
           }

      }


         /**
     * saves kyc upload documents
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */

     public static function viewUnverifiedKyc(){
        if(Auth::user()->access_level == 'admin'){

        }else{
        return redirect()->back()->with('error', 'Something went wrong you can not perform this operation');
           }
      
     }

        /**
     * saves kyc upload documents
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */

     public static function approve($id){
        if(Auth::user()->access_level == 'admin'){
         $kyc = Kyc::where('id', $id)->with('user')->first();
         
         if(!empty($kyc->id)){
            $kyc->status = 'verified';
            $kyc->save();
            $user = User::find($kyc->user->id);
            $user->kyc_status = 'verified';
            $user->save();
            $email = $user->email;
            $title = 'KYC Approved Successfully';
            $msg = 'Your KYC has been successfully approved. You can now login';
            Mailer::genericMail($email, $title, $msg);
            return redirect()->back()->with('success', 'User KYC approved');
         }else{
            return redirect()->back()->with('error', 'Something went wrong you could not approve this KYC. Try again');
         }
        

        }else{
        return redirect()->back()->with('error', 'Something went wrong you can not perform this operation');
           }
      
     }


     
      /**
     * returns upload document page
     * 
     * @return true
     * 
     * @param $settings page
     * 
     */
    public static function uploadDocPage(){
      
        return view('dashboard/src/html/components/forms/upload-kyc-documents');
  
      }

       /**
     * approve KYC
     * 
     * @return true
     * 
     * @param $settings page
     * 
     */
    public static function decline($id){
      
      if(Auth::user()->access_level == 'admin'){
         $kyc = Kyc::where('id', $id)->with('user')->first();
         if(!empty($kyc->id)){
            $kyc->status = 'declined';
            $kyc->save();
            $suer = User::find($kyc->user->id);
            $user->kyc_status = 'declined';
            $user->save();
            $email = $user->email;
            $title = 'KYC Not Approved Successfully';
            $msg = 'Your KYC document has a problem and was not approved for that. Please correct and try again';
            Mailer::genericMail($email, $title, $msg);
            return redirect()->back()->with('success', 'User KYC declined');
         }else{
            return redirect()->back()->with('error', 'Something went wrong you could not decline this KYC. Try again');
         }
        
        }else{
        return redirect()->back()->with('error', 'Something went wrong you can not perform this operation');
           }

    }


      
      /**
     * returns pending kyc submited
     * 
     * @return true
     * 
     * @param $settings page
     * 
     */
    public static function pendingKyc(){
      $kyc = Kyc::where('status', 'pending')->get();
      return view('dashboard/src/html/components/elements/kyc-display')->with(['kyc'=>$kyc, 'user']);

    }


}

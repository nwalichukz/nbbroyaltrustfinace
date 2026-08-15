<?php

namespace App\Http\Controllers\Investment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Image\ImageController;
use Illuminate\Http\Request;
use App\Models\ResidencyByRealEstateModel;
use App\Models\InvestmentImage;
use Validator, Auth;

class ResidencyByRealEstate extends Controller
{    
       /**
     * saves citizeship by investment
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */

     public static function save($request){
      $save = new ResidencyByRealEstateModel;
      $save->country_name = $request['country_name'];
      $save->description = $request['description'];
      $save->save();
      return $save->id;
   }

   
     /**
     * creates citizenship by investment
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
      'country_name' => 'required|min:2',
      'description' => 'required|min:20',
     
      ]);
     // return $request->all();
      if($validator->fails()){
          return redirect()->back()->withErrors($validator);
      } 
      $create = self::save($request);
      if(!empty($request->file('image'))){
        foreach($request->file('image') as $property_img){
        $img = new InvestmentImage;
        $img->rcr_id = $create;
        $img->name = ImageController::uploadPropertyImage($property_img);
        $img->inv_type = 'rbr'; 
        $img->save();
        }
      }
      if($create){
         return redirect()->back()->with('success', 'Residency by Real Estate created successfully');

      }else{
         return redirect()->back()->with('error', 'Something went wrong, residency by real estate not created. Please try again');

      }

    }

      
     /**
     *gets citizen investment page
     * 
     * @return true
     * 
     * @param $settings page
     * 
     */
    public static function get($id){
     $citi_inv = ResidencyByRealEstateModel::where('id', $id)->find($id);
      return view('dashboard/src/html/components/forms/edit-residency-by-real-estate')->with(['data'=>$citi_inv]);
    

    }

     /**
     *gets citizen investment page
     * 
     * @return true
     * 
     * @param $settings page
     * 
     */
    public static function getRealEstateInvPage($id){
      $citi_inv = ResidencyByRealEstateModel::where('id', $id)->first();
      $image = InvestmentImage::where(['rcr_id'=>$citi_inv->id, 'inv_type'=>'rbr'])->get();
       return view('landing/real-estate-investment-page')->with(['data'=>$citi_inv, 'image'=>$image]);
     
 
     }

   /**gets all citizen investment page
     * 
     * @return true
     * 
     * @param $settings page
     * 
     */
    public static function getAll(){
      If(Auth::user()->access_level == 'admin'){
      $all_inv = ResidencyByRealEstateModel::where('id', '!=', null)->get();
      return view('dashboard/src/html/view-residency-real-estate')->with(['citizen_inv'=>$all_inv]);
      }else{
        return redirect('get-login');
      }
      

    }

      /**
     *deletes citizen investment page
     * 
     * @return true
     * 
     * @param $settings page
     * 
     */
    public static function delete($id){

      $delete = ResidencyByRealEstateModel::where('id', $id)->delete();
      if($delete){
        return redirect()->back()->with('success', 'Citizenship by real estate delete successfully');

     }else{
        return redirect()->back()->with('error', 'Something went wrong, citizenship by real estate not deleted. Please try again');

     }

    }

   /**
    * update a user
    * 
    * @param $request
    * 
    */
   public static function update(Request $request){
     if(Auth::check() && Auth::user()->access_level == 'admin'){
     $update = ResidencyByRealEstateModel::find($request['id']);
     if(!empty($request['country_name'])){
     $update->country_name = $request['country_name'];
     }
     if(!empty($request['description'])){
     $update->description = $request['description'];
     }
     $ok = $update->save();
     if($ok){
         return redirect('admin/get-all-residency-by-real-estate')->with('success', 'Residency real estate updated successfully');
     }else{
         return redirect()->back()->with('error', 'Something went wrong citizenship real estate not updated successfully. Please try again');
     }
   }else{
     return rediect('/get-login');
         }
   }


      /**
     * returns user settings page
     * 
     * @return true
     * 
     * @param $settings page
     * 
     */
    public static function addResidencyByRealEstatePage(){
      
        return view('dashboard/src/html/components/forms/add-residency-real-estate');
  
      }
}

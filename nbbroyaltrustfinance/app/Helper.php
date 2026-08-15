<?php

namespace App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvestmentType;
use App\Models\CitizenshipByInvestment;
use App\Models\ResidencyByInvestment;
use App\Models\ResidencyByRealEstate;
use Auth, Validator;


class Helper extends Controller
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
        $save = new InvestmentType;
        $save->parent_name = $request['label_name'];
        $save->name = $request['account_name'];
        $save->min_amt = $request['min_amount'];
        $save->max_amt = $request['max_amount'];
        $save->earning_percentage = $request['earning_percentage'];
        $save->duration = $request['duratn_in_mnth'];
        $save->save();
        return $save->id;
     }

    /**
     * gets countries for citizenship by investments
     * 
     * @param
     * 
     */
    public static function getCitizenByInvCountry(){
       return CitizenshipByInvestment::where('id', '!=', null)->get();
    }

     /**
     * gets countries for residency by investments
     * 
     * @param
     * 
     */
    public static function getResidencyByInvCountry(){
      return ResidencyByInvestment::where('id', '!=', null)->get();
      
    }

      /**
     * gets countries for residency by real estates
     * 
     * @param
     * 
     */
    public static function getResidencyByRealEstateCountry(){
     // return ResidencyByRealEstate::where('id', '!=', null)->get();
    }

     /**
     * getssingle investment type
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */
    public function get($id){
      $invType = InvestmentType::find($id);
      return view('dashboard.investment.edit-inv-type')->with(['inv-type'=>$invType]);
    }

    /**
     * get many investment type
     * 
     * 
     * 
     * @return response
     * 
     */
    public function getAll(){
      $invAll = InvestmentType::where('id', '!=', NULL)->orderBy('created_at', 'DESC')->paginate(15);
     // $allInv = $invAll->paginate(15);
      //$total = $invAll->count();
      return view('dashboard/src/html/view-plans')->with(['invall'=>$invAll]);
    }

   

    /**
     * creates investment type
     * page
     * 
     * 
     * @return response
     * 
     */
    public function getInvPage(){
      return view('dashboard.investment.inv-type-page');
    }


     /**
     * deletes inv-type
     * 
     * 
     * @param id
     * 
     * @return response
     * 
     */
    public function delete($id){
      $delete = InvestmentType::delete($id);
      if($delete){
         return redirect()->back()->with('status', 'Investment type deleted successfully');
      }else{
         return redirect()->back()->with('status', 'Something went wrong, Investment type not deleted successfully');
      }
    }

     /**
     * updates inv-type
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */
    public function update(Request $request){
      try{
      $update = InvestmentType::find($id);
      if(!empty($request['name'])){
         $update->name = $request['name'];
      }

      if(!empty($request['min_amt'])){
         $update->min_amt = $request['min_amt'];
      }

      if(!empty($request['max_amt'])){
         $update->max_amt = $request['max_amt'];
      }

      if(!empty($request['earning_percentage'])){
         $update->earning_percentage = $request['earning_percentage'];
      }

      if(!empty($request['possible_earning'])){
         $update->possible_earning = $request['possible_earning'];
      }

      return redirect()->back()->with('status', 'Investment type deleted successfully');
   }catch(exception $e){
      return redirect()->back()->with('status', $e->message);
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
    public static function addAccountTyePage(){
      
      return view('dashboard/src/html/components/forms/add-account-type');

    }



}

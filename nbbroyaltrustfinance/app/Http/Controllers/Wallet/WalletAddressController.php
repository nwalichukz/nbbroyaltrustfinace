<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WalletAddress;
use DB, Validator, Auth;

class WalletAddressController extends Controller
{
     /**
     * wallet address
     * 
     * @param request
     * 
     * @return response
     * 
     */

     public static function save($request){
        $save = new WalletAddress;
        $save->crypto_type = $request['crypto_type'];
        $save->wallet_address = $request['wallet_address'];  
        $save->save();
        return $save->id;
     }


     /**
     * creates wallet address
     * 
     * 
     * @param request
     * 
     * @return response
     * 
     */
    public function create(Request $request){
       // return $request->all();
        $validator = Validator::make($request->all(),
        [
        'crypto_type' => 'required',
        'wallet_address' => 'required|unique:wallet_addresses',
        ]);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } 
        $create = self::save($request);
        if($create){
           return redirect()->back()->with('success', 'Wallet address created successfully');
  
        }else{
           return redirect()->back()->with('error', 'Something went wrong, wallet not created. Please try again');
  
        }
  
      }


    /**
     * get wallet address
     * 
     * @param request
     * 
     * @return response
     * 
     */
    public function get($id){
        $invType = WalletAddress::find($id);
        return view('dashboard.investment.edit-inv-type')->with(['inv-type'=>$invType]);
      }


       /**
     * get all wallet address
     * 
     * 
     * 
     * @return response
     * 
     */
    public function getAll(){
        $invAll = WalletAddress::where('id', '!=', NULL)->orderBy('created_at', 'DESC')->paginate(15);
        return view('dashboard/src/html/view-wallet-address')->with(['invall'=>$invAll]);
     
      }


    /**
     * deletes wallet address
     * 
     * 
     * @param id
     * 
     * @return response
     * 
     */
    public function delete($id){
      if(Auth::user()->access_level == 'admin'){
        $delete = WalletAddress::where('id', $id)->delete();
        if($delete){
           return redirect()->back()->with('success', 'Wallet address deleted successfully');
        }else{
           return redirect()->back()->with('error', 'Something went wrong, wallet address not deleted successfully');
        }
      }else{
         return redirect('get-login');
      }
      
      }
  
  
  

}

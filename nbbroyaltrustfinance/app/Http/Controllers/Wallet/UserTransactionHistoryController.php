<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserTransactionHistory;
use App\Models\User;
use Carbon\Carbon;
use Auth, Validator;

class UserTransactionHistoryController extends Controller
{
    
    /**
     * saves a transaction
     * 
     * @param
     * 
     */
    public static function save($data){
         $save = new UserTransactionHistory;
         $save->user_id = $data['user_id'];
          $save->amount = $data['amount'];
          $save->transaction_type = $data['transaction_type'];
          $save->purpose = $data['purpose'];
        $save->save();
        return $save->id;
    }

    
   
     /**
      * creates a user transaction
      *
      * @param Request
      *
      *@return respoonse
      */
      public static function create(Request $request){
        $validator = Validator::make($request->all(),
        [
        'amount' => 'required|numeric',
        'purpose' => 'required',
        'transaction_type'=> 'required'
      
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } 
        $create = self::save($request);
        if($create){
          return redirect()->back()->with('success', 'User transaction created successful');
      }else{
          return redirect()->back()->with('error', 'Something went wrong withdrawal rUser transaction not created successfully');
                  }
     

      }


     /***
     * returns transaction history
     * 
     * @param $user_id
     * 
     */
    public static function getUserHistory($user_id){
       $transactions = UserTransactionHistory::where('user_id', $user_id)->with(['user'])->orderBy('created_at', 'DESC')->paginate(20);
       return view('dashboard/src/html/my-transactions')->with(['myTransactions'=>$transactions]);
    }


       /***
     * returns transaction history
     * by ID
     * @param id
     * 
     */
    public static function getAll(){
       if(Auth::check()){
        if(Auth::user()->access_level == 'admin'){
     $data = UserTransactionHistory::where('id', '!=', null)->with(['user'])->orderBy('created_at', 'DESC')->paginate(20);
     return view('admin/all-transactions')->with(['transactions'=>$data, 'title'=>'All Transactions']);
        }else{
          return redirect('/login');
        }
       }else{
        return redirect('/login');
      }
     }

    /***
     * returns transaction history
     * for today
     * 
     * 
     */
    public static function getHistoryToday(){
      $today = Carbon::today();
       return UserTransactionHistory::whereDate('created_at', $today)->where('purpose', 'post view bonus');
          }
                                

      /***
     * returns transaction history
     * for this week
     */
    public static function getHistoryThisWeek(){
      $now = Carbon::today();
      $weekstart = $now->startOfWeek();
       return UserTransactionHistory::whereDate('created_at', '>=', $weekstart)->where('purpose', 'post view bonus')->where('transaction_type', 'credit')->sum('amount');
      

    }

      /***
     * returns transaction history
     * for this month
     */
    public static function getHistoryThisMonth(){
      $now = Carbon::today();
      $monthstart = $now->startOfMonth();
       return UserTransactionHistory::whereDate('created_at', '>=', $monthstart)->where('purpose', 'post view bonus')->where('transaction_type', 'credit')->sum('amount');
      
    }


     /***
     * returns transaction history
     * sum for this year
     */
    public static function getHistoryThisYear (){
      $now = Carbon::today();
      $yearstart = $now->startOfYear();
       return UserTransactionHistory::whereDate('created_at', '>=', $yearstart)->where('purpose', 'post view bonus')->where('transaction_type', 'credit')->sum('amount');
      
    }



     /***
     * deletes a transaction history
     * sum for this year
     */
    public static function delete($id){
     $delete = UserTransactionHistory::where('id', $id)->first();
     if($delete){
      return redirect()->back()->with('success', 'Transaction successfully deleted'); 
     }else{
      return redirect()->back()->with('error', 'You could not delete the transaction'); 
     }
      

    }


    
     /***
     * deletes a transaction history
     * sum for this year
     */
    public static function getEdit($id){
      $edit = UserTransactionHistory::where('id', $id)->first();
      return view('dashboard/src/html/components/forms/edit-transaction')->with(['edit'=>$edit]);
       
 
     }


      /***
     * deletes a transaction history
     * sum for this year
     */
    public static function getAddTransaction($id){
    
      return view('dashboard/src/html/components/forms/add-user-transaction')->with(['user_id'=>$id]);
       
 
     }



/**
 * Update a transaction
 * 
 * @param Request $request
 * @return RedirectResponse
 */
public static function update(Request $request){
// Check if the user is authenticated and is an admin
if (!Auth::check() || Auth::user()->access_level !== 'admin') {
    return redirect('/logout');
}

// Validate the incoming request data
$validated = $request->validate([
        'transaction_id'=> 'required|exists:user_transaction_histories,id',
    'amount'  => 'nullable|numeric|min:0',
    'purpose' => 'nullable|string|max:255',
        'created_at'    => 'nullable|date', 
    // Ensures it's a valid date format
]);

// Find the transaction record
$transaction = UserTransactionHistory::findOrFail($validated['transaction_id']);

// Dynamically update fields if they are present in the request
if ($request->filled('amount')) {
    $transaction->amount = $validated['amount'];
}

if ($request->filled('purpose')) {
    $transaction->purpose = $validated['purpose'];
   }

// Cast and update the created_at timestamp using Carbon
if ($request->filled('created_at')) {
    $transaction->created_at = Carbon::parse($validated['created_at']);
}

// Save changes and return the appropriate redirect response
if ($transaction->save()) {
    return redirect()->back()->with('status', 'Transaction updated successfully.');
}


return redirect()->back()->with('status', 'Something went wrong. Transaction could not be updated.');
         }
        
        
/**
 * generate account statement
 * 
 * @param Request $request
 * @return View
 */
  public function generateStatement(Request $request)
     {
    // 1. Validate the revised request inputs
    $request->validate([
        'email_address' => 'required|email',
        'start_date'    => 'required|date',
        'end_date'      => 'required|date|after_or_equal:start_date',
    ]);

    // 2. Locate the user identity record
    $user = User::where('email', $request->email_address)->first();

    if (!$user) {
        return back()->withErrors(['email_address' => 'No account records found for this email address.']);
    }

    // 3. Normalize the dates to capture full days (00:00:00 to 23:59:59)
    $startDate = Carbon::parse($request->start_date)->startOfDay();
    $endDate = Carbon::parse($request->end_date)->endOfDay();

    // 4. Extract transactional history within the specific time interval
    $transactions = UserTransactionHistory::where('user_id', $user->id)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->orderBy('created_at', 'desc')
        ->get();

    // 5. Send payload properties down to the visualization dashboard
    return view('client.account-statement-display', compact('user', 'transactions', 'request'));
   }


}

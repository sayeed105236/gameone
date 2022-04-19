<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\AddMoney;
class AddMoneyController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index($id)
  {
    $user= User::where('id',Auth::id())->first();
    $deposit= AddMoney::where('method','Deposit')->get();

      return view('user.pages.add_money',compact('user','deposit');
  }
  public function Store(Request $request)
  {
    //  dd($request);
      // $request->validate([
      //     'amount' => 'required',
      //     'method' => 'required',
      //
      // ]);
      $user_id = $request->user_id;
      $amount = $request->amount;
      //$method=$request->method;
      $txn_id = $request->txn_id;
      $deposit = new AddMoney();
      $deposit->user_id = $user_id;
      $deposit->amount = $amount;
      //$deposit->method=$method;
      $deposit->wallet_id= $request->payment_wallet_id;
      $deposit->method = 'Deposit';
      $deposit->type = 'Credit';
      $deposit->txn_id = $txn_id;
      $deposit->save();

      return back()->with('Money_added', 'Your request is Accepted. Wait for Confirmation!!');
  }
}

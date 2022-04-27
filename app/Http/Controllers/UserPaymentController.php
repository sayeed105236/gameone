<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentWay;
use App\Models\UserPayment;
use Auth;

class UserPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
      $payment_methods= UserPayment::where('user_id',Auth::id())->get();
      $users= User::where('id',Auth::id())->first();
      return view('user.pages.user_payments',compact('users','payment_methods'));
    }
    public function store(Request $request)
    {

      $payment_methods = new UserPayment();
      $payment_methods->user_id= $request->user_id;
      $payment_methods->payment_way_id= $request->payment_way_id;
      $payment_methods->wallet_no= $request->wallet_no;
      $payment_methods->save();

        return back()->with('payment_added', 'Payment Method Added Successfully !!');

    }
    public function update(Request $request)
    {

      $payment_methods = UserPayment::find($request->id);
      $payment_methods->user_id= $request->user_id;
      $payment_methods->payment_way_id= $request->payment_way_id;
      $payment_methods->wallet_no= $request->wallet_no;
      $payment_methods->save();

        return back()->with('payment_updated', 'Payment Method Updated Successfully !!');

    }

}

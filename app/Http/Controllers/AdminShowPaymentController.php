<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use App\Models\Withdraw;
use Auth;

class AdminShowPaymentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function Manage()
  {
    $deposit= AddMoney::where('method','Deposit')->get();

    return view('admin.pages.deposit_request_manage',compact('deposit'));

  }
  public function approve($id)
  {

      AddMoney::findOrFail($id)->update([
          'status'=>'approve'
      ]);

      return back()->with('Money_approved', 'Deposit request is Approved. !!');
  }
  public function ManageWithdraw()
  {
    $withdraw= Withdraw::all();

    return view('admin.pages.withdraw_request_manage',compact('withdraw'));

  }
  public function withdrawapprove($id)
  {

      Withdraw::findOrFail($id)->update([
          'status'=>'approve'
      ]);

      return back()->with('Money_approved', 'Withdraw request is Approved. !!');
  }
  public function withdrawrejected($id,$user_id,$amount)
  {


      Withdraw::findOrFail($id)->update([
          'status'=>'rejected'
      ]);
      $withdraw_reject = new AddMoney;
      $withdraw_reject->user_id = $user_id;
      $withdraw_reject->amount = $amount;
      $withdraw_reject->method = 'Withdraw Refund';
      $withdraw_reject->type = 'Credit';
      $withdraw_reject->description = '$' . ($amount) . ' Withdraw Refund to Cash Wallet';

      $withdraw_reject->status = 'approve';
      $withdraw_reject->save();

      return back()->with('Money_rejected', 'Withdraw request is Rejected !!');
  }

}

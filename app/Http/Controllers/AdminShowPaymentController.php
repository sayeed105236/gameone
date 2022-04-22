<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
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

}

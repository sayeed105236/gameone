<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentType;
use App\Models\PaymentWay;
use App\Models\AccountInfo;
use Alert;

class AdminPaymentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function payment_type()
  {
    $payment_types= PaymentType::all();
      return view('admin.pages.payment_type',compact('payment_types'));
  }
  public function payment_type_store(Request $request)
  {
    $payment_type= new PaymentType();
    $payment_type->payment_type= $request->payment_type;
    $payment_type->save();

    return back()->with('payment_type_added', 'Payment Type Successfully Added!!');

  }
  public function payment_type_update(Request $request)
  {
    $payment_type= PaymentType::find($request->id);
    $payment_type->payment_type= $request->payment_type;
    $payment_type->save();
    // $notification = array(
    //         'message' => 'Payment Type Successfully Updated !!!',
    //         'alert-type' => 'success'
    //     );
    // Alert::success('Success', 'Payment Type Successfully Updated !!!');
    // return Redirect()->back()->with($notification);
      return back()->with('payment_type_updated', 'Payment Type Successfully Updated!!');

  }
  public function  payment_type_delete($id)
  {
      //dd($id);
      $payment_type = PaymentType::find($id);
      //dd($employee);
      $payment_type->delete();

        return back()->with('payment_type_deleted', 'Payment Type Successfully Deleted!!');
  }
  public function payment_way()
  {
    $payment_ways= PaymentWay::all();
      return view('admin.pages.payment_way',compact('payment_ways'));
  }
  public function payment_way_store(Request $request)
  {
    $payment_way= new PaymentWay();
    $payment_way->payment_way= $request->payment_way;
    $payment_way->payment_type_id= $request->payment_type_id;
    $payment_way->save();

    return back()->with('payment_way_added', 'Payment Way Successfully Added!!');

  }
  public function payment_way_update(Request $request)
  {
    $payment_way= PaymentWay::find($request->id);
    $payment_way->payment_way= $request->payment_way;
    $payment_way->payment_type_id= $request->payment_type_id;
    $payment_way->save();

    return back()->with('payment_way_updated', 'Payment Way Successfully Updated!!');

  }
  public function  payment_way_delete($id)
  {
      //dd($id);
      $payment_way = PaymentWay::find($id);
      //dd($employee);
      $payment_way->delete();

        return back()->with('payment_way_deleted', 'Payment Way Successfully Deleted!!');
  }
  public function account_info()
  {
    $account_infos= AccountInfo::all();
      return view('admin.pages.account_info',compact('account_infos'));
  }
}

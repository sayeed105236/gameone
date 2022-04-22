<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokenRate;
use App\Models\Ambassador;
use App\Models\TransferInfo;
use App\Models\WithdrawCommission;

class SettingsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    $token_rate=TokenRate::first();
    $ambassaor= Ambassador::first();
    $transfer_info= TransferInfo::first();
    $withdraw_info= WithdrawCommission::first();

    return view('admin.pages.general_settings',compact('token_rate','ambassaor','transfer_info','withdraw_info'));
  }
  public function token_rate_update(Request $request)
  {
    $token =TokenRate::find($request->id);
    $token->token_convert_rate=$request->token_convert_rate;
    $token->buying_commission= $request->buying_commission;
    $token->selling_commission= $request->selling_commission;
    $token->buy_limit_max= $request->buy_limit_max;
    $token->buy_limit_min= $request->buy_limit_min;
    $token->sell_limit_max= $request->sell_limit_max;
    $token->sell_limit_min=$request->sell_limit_min;
    $token->save();
      return back()->with('token_rate_updated', 'Token Rate Successfully Updated!!');
  }
  public function ambassador_update(Request $request)
  {
    $ambassador =Ambassador::find($request->id);
    $ambassador->auser_qty=$request->auser_qty;
    $ambassador->refer_token_value= $request->refer_token_value;
    $ambassador->owner_token_value= $request->owner_token_value;
    $ambassador->token_bonus= $request->token_bonus;
    $ambassador->cash_bonus= $request->cash_bonus;
    $ambassador->duration= $request->duration;
    $ambassador->status=$request->status;
    $ambassador->save();
      return back()->with('ambassador_updated', 'Ambassador Successfully Updated!!');
  }
  public function transfer_info_update(Request $request)
  {
    $transfer_info =TransferInfo::find($request->id);
    $transfer_info->transfer_commission=$request->transfer_commission;
    $transfer_info->transfer_limit_max= $request->transfer_limit_max;
    $transfer_info->transfer_limit_min= $request->transfer_limit_min;

    $transfer_info->save();
      return back()->with('transfer_updated', 'Transfer Info Successfully Updated!!');
  }
  public function withdraw_info_update(Request $request)
  {
    $withdraw_info =WithdrawCommission::find($request->id);
    $withdraw_info->withdraw_commission=$request->withdraw_commission;
    $withdraw_info->withdraw_limit_max= $request->withdraw_limit_max;
    $withdraw_info->withdraw_limit_min= $request->withdraw_limit_min;

    $withdraw_info->save();
      return back()->with('withdraw_updated', 'Withdraw Info Successfully Updated!!');
  }

}

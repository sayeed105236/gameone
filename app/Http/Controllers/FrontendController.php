<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use App\Models\BonusWallet;
use App\Models\TokenWallet;
use Auth;
use App\Models\PackageSettings;
use App\Models\TokenRate;
use App\Models\Purchase;
use Carbon\Carbon;
use App\Models\SellToken;

class FrontendController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    $data['user']=User::where('id',Auth::id())->first();;
    $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      $data['sum_deposit_bonus']=BonusWallet::where('user_id',Auth::id())->sum('amount');
        $data['sum_deposit_token']=TokenWallet::where('user_id',Auth::id())->sum('amount');
        $data['settings']= TokenRate::first();
      return view('user.pages.index',compact('data'));
  }
  public function buy_package($id)
  {
    $data['user']=User::where('id',Auth::id())->first();;
    $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');

    $data['packages']=PackageSettings::all();

    return view('user.pages.buy_package',compact('data'));
  }
  public function store_package(Request $request)
  {

      $package_id= PackageSettings::where('id',$request->package_id)->first();
      $sponsor=User::where('id',$request->user_id)->first();
      //dd($sponsor->sponsor);
      //dd($package_id->package_price);
      $purchase= new Purchase();
      $purchase->user_id= $request->user_id;
      $purchase->package_id= $request->package_id;
      $purchase->date= Carbon::now();
      $purchase->save();

      $deduct= new AddMoney();
      $deduct->user_id = $request->user_id;
      $deduct->amount = -($package_id->package_price);
      //$deduct->method=$method;

      $deduct->method = 'Purchased Package ' . $package_id->package_name;
      $deduct->type = 'Debit';
      $deduct->status = 'approve';
      $deduct->save();
      $token_bonus = new TokenWallet();
      $token_bonus->user_id= $request->user_id;

      $token_bonus->amount= $package_id->amount;
      $token_bonus->method= 'Purchased Package';
      $token_bonus->type= 'Credit';
      $token_bonus->description= 'For Purchasing'. ' '. $package_id->package_name;
      $token_bonus->save();

      $bonus = new BonusWallet();
      $bonus->user_id= $sponsor->sponsor;
      $bonus->received_from= $request->user_id;
      $bonus->amount= ($package_id->amount)*(($package_id->affilate_token)/100);
      $bonus->method= 'Affiliate Bonus';
      $bonus->type= 'Credit';
      $bonus->description= ($package_id->amount)*(($package_id->affilate_token)/100). ' G1 Token ' . 'Affiliate Bonus from'. ' ' . Auth::user()->user_name;
      $bonus->save();
      return back()->with('package_purchase', 'Package Successfully Purchased!!');
  }
  public function my_asset($id)
  {
    $purchase= Purchase::where('user_id',Auth::id())->get();
    //dd($purchase);
    return view('user.pages.my_asset',compact('purchase'));
  }
  public function fund_transfer($id)
  {
    $user= User::where('id',Auth::id())->get();
    $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
    $transfer= AddMoney::where('user_id',Auth::id())->where('method','Transfer Money')->where('type','Debit')->get();

    return view('user.pages.fund_transfer',compact('data','transfer'));
  }
  public function fund_transfer_store(Request $request)
  {
    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->sum('amount');

    if($data['sum_deposit'] < $request->amount)
    {
        return back()->with('transfer_error', 'Insufficent Balance');
    }else{

            $receiver_id= User::where('user_name',$request->receiver_id)->pluck('id')->first();
            $receiver_name= User::where('id',$receiver_id)->first();


            $transfer_deduct= new AddMoney();
            $transfer_deduct->user_id= $request->user_id;
            $transfer_deduct->receiver_id= $receiver_id;
            $transfer_deduct->amount= -($request->amount);
            $transfer_deduct->method= 'Transfer Money';
            $transfer_deduct->type= 'Debit';
            $transfer_deduct->description= '$'.$request->amount .' Transfer to '. $receiver_name->user_name;
            $transfer_deduct->status= 'approve';
            $transfer_deduct->save();

            $sender_name= User::where('id',$request->user_id)->first();
            $transfer= new AddMoney();
            $transfer->user_id= $receiver_id;
            $transfer->received_from= $request->user_id;
            $transfer->amount= $request->amount;
            $transfer->method= 'Transfer Money';
            $transfer->type= 'Credit';
            $transfer->description= $request->amount .' Transfer amount from '. $sender_name->user_name;
            $transfer->status= 'approve';
            $transfer->save();

            return back()->with('transfer_fund', 'Fund Transfer Successfully');

    }




  }
  public function store_buy_token(Request $request)
  {
    dd($request);
  }
  public function store_sell_token(Request $request)
  {
      $data['sum_deposit_bonus']=BonusWallet::where('user_id',Auth::id())->sum('amount');

    if($data['sum_deposit_bonus'] < $request->payable)
    {
        return back()->with('token_sell_error', 'Insufficent Balance');

    }else {
      $sell_token= new SellToken;
      $sell_token->user_id=$request->user_id;
      $sell_token->quantity=$request->quantity;
      $sell_token->total_value=$request->total_value;
      $sell_token->payable=$request->payable;
      $sell_token->save();

      $sell_deduct = new BonusWallet();
      $sell_deduct->user_id= $request->user_id;
    //  $sell_deduct->received_from= $request->user_id;
      $sell_deduct->amount= -($request->quantity);
      $sell_deduct->method= 'Token Sell';
      $sell_deduct->type= 'Debit';
      $sell_deduct->description= 'Received Cash Amount '. $request->payable . ' for selling '. $request->qauntity;
      $sell_deduct->save();


      $sell= new AddMoney();
      $sell->user_id= $request->user_id;

      $sell->amount= $request->payable;
      $sell->method= 'Sell Token';
      $sell->type= 'Credit';
      $sell->description= $request->payable .' By selling Token ';
      $sell->status= 'approve';
      $sell->save();

        return back()->with('token_sell', 'Token Sell Successfully');
    }

  }

}

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
use App\Models\BuyToken;


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
      $deduct->description = 'Purchased Package ' . $package_id->package_name . ' for $' . $package_id->package_price;
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
    $refer= User::where('id',Auth::id())->first();
    $token= TokenRate::first();
    //dd($token->refer_purchase_commission);
    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->sum('amount');

    if($data['sum_deposit'] < $request->amount)
    {
        return back()->with('balance_error', 'Insufficent Balance');
    }else {
      $buy_token= new BuyToken;
      $buy_token->user_id=$request->user_id;
      $buy_token->quantity=$request->quantity;
      $buy_token->total_value=$request->total_value;
      $buy_token->payable=$request->payable;
      $buy_token->save();

      $buy = new TokenWallet();
      $buy->user_id= $request->user_id;
    //  $buy->received_from= $request->user_id;
      $buy->amount= $request->quantity;
      $buy->method= 'Token Buy';
      $buy->type= 'Credit';
      $buy->description= 'Purchase '. $request->qauntity . ' at $'. $request->payable;
      $buy->save();

      $buy_refer = new BonusWallet();
      $buy_refer->user_id= $refer->sponsor;
    //  $buy_refer->received_from= $request->user_id;
      $buy_refer->amount= ($request->quantity)*(($token->refer_purchase_commission)/100);
      $buy_refer->method= 'Referrer Bonus';
      $buy_refer->type= 'Credit';
      $buy_refer->description= ($request->quantity)*(($token->refer_purchase_commission)/100) .' Refer Bonus from '. $request->user_id . ' for purchasing Token';
      $buy_refer->save();

      $buy_deduct= new AddMoney();
      $buy_deduct->user_id= $request->user_id;

      $buy_deduct->amount= -($request->payable);
      $buy_deduct->method= 'Buy Token';
      $buy_deduct->type= 'Debit';
      $buy_deduct->description= '$'.$request->payable .' is deducted For purchasing '. $request->quantity. ' Token';
      $buy_deduct->status= 'approve';
      $buy_deduct->save();

        return back()->with('token_buy', 'Token Buy Successfully');
    }

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
  public function manage_transaction($id)
  {
    $users= User::where('id',Auth::id())->first();
    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->sum('amount');
    $data['sum_deposit_token']=TokenWallet::where('user_id',Auth::id())->sum('amount');
    $data['sum_deposit_bonus']=BonusWallet::where('user_id',Auth::id())->sum('amount');
    $cashwallet_history= AddMoney::where('user_id',Auth::id())->get();
    $tokenwallet_history= TokenWallet::where('user_id',Auth::id())->get();
    $bonuswallet_history= BonusWallet::where('user_id',Auth::id())->get();
    return view('user.pages.transactions',compact('users','data','cashwallet_history','tokenwallet_history','bonuswallet_history'));
  }

}

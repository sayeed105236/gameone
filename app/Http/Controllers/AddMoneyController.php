<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\AddMoney;
use App\Models\WithdrawCommission;
use App\Models\Withdraw;
class AddMoneyController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index($id)
  {
    $user= User::where('id',Auth::id())->first();
    $deposit= AddMoney::where('method','Deposit')->where('user_id',Auth::id())->get();
    $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');

      return view('user.pages.add_money',compact('user','deposit','data'));
  }
  public function Store(Request $request)
  {
    //  dd($request);
      // $request->validate([
      //     'amount' => 'required',
      //     'method' => 'required',
      //
      // ]);
      $client = new \GuzzleHttp\Client();
      $token= '9S3WW3P-JRB43DN-PBCJ23E-P9W96H3';
      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $description = substr(str_shuffle($chars), 0, 10);
      $headers = [
          // 'Authorization' => 'Bearer ' . $api_key,
          'x-api-key'        => '9S3WW3P-JRB43DN-PBCJ23E-P9W96H3',
          'Content-Type' => 'application/json',



      ];



      //Duplicate these three lines for calling other api

      $payment = $client->request('POST','https://api.nowpayments.io/v1/invoice', [
              'headers' => $headers,
              'json' => [

                "price_amount"=> $request['amount']+  $request['amount']*(10/100),
                "price_currency"=> "usd",
                //"pay_currency"=> "usdtbsc",
                  "pay_currency"=> $request['pay_currency'],
                "ipn_callback_url"=> "https://nowpayments.io",
                "order_id"=> $description,
                "order_description"=> "Deposit",

            ]

         ]);


    $payment=$payment->getBody()->getContents();




    $data = json_decode($payment, true);
    return redirect($data['invoice_url']);



      $user_id = $request->user_id;
      $amount = $request->amount;
      //$method=$request->method;
      // $txn_id = $request->txn_id;
      $deposit = new AddMoney();
      $deposit->user_id = $user_id;
      $deposit->amount = $amount;
      //$deposit->method=$method;
      // $deposit->wallet_id= $request->payment_wallet_id;
      $deposit->method = 'Deposit';
      $deposit->type = 'Credit';
      $deposit->description= 'Deposit by Now Payments';
      $deposit->txn_id = $description;
      $deposit->save();

      return back()->with('Money_added', 'Successfully Added Funds!!');
  }
  public function withdraw_manage($id)
  {
    $user= User::where('id',Auth::id())->first();
    $deposit= AddMoney::where('method','Deposit')->where('user_id',Auth::id())->get();
    $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
    $data['withdraws']= Withdraw::where('user_id',Auth::id())->get();

      return view('user.pages.withdraw_money',compact('user','deposit','data'));
  }
  public function withdraw_store(Request $request)
  {
    $withdraw_settings=WithdrawCommission::first();
    //dd($settings->withdraw_charge);
    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');

    //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

    if($data['sum_deposit'] < $request->amount)
    {
        return back()->with('withdraw_error', 'Insufficent Balance');
    }else{

      $withdraw = new Withdraw();
      $withdraw->user_id = $request->user_id;
      $withdraw->amount = $request->amount;

      $withdraw->payment_method_id = $request->payment_method_id;
      $withdraw->wallet_id=$request->wallet_id;
      $withdraw->payable= ($request->amount)- (($request->amount)*(($withdraw_settings->withdraw_commission) / 100));
      $withdraw->status = 'pending';


      $withdraw->save();

      $deduct = new AddMoney;
      $deduct->user_id = Auth::id();
      $deduct->amount = -($request->amount);
      $deduct->method = 'Withdraw';
      $deduct->type = 'Debit';
      $deduct->description = '$' . ($request->amount) . ' Withdraw from Cash Wallet';

      $deduct->status = 'approve';
      $deduct->save();

      return back()->with('withdraw_added', 'Your request is Accepted. Wait for Confirmation!!');
    }


  }
}

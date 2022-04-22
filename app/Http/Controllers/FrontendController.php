<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use Auth;
use App\Models\PackageSettings;

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

}

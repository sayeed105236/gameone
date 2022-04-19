<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\USer;
use App\Models\AddMoney;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $data['user']=User::all();
      $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
        return view('user.pages.index',compact('data'));
    }
    public function adminHome()
    {
        return view('admin.pages.index');
    }
}

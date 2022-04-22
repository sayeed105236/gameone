<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
    
    public function adminHome()
    {
        return view('admin.pages.index');
    }
    public function user_lists()
    {
      $users= User::all();
      return view('admin.pages.user_lists',compact('users'));
    }
}

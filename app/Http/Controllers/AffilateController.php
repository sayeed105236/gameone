<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AffilateController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index($id)
  {
    $users= User::where('sponsor',Auth::id())->get();

    return view('user.pages.affilates',compact('users'));
  }
}

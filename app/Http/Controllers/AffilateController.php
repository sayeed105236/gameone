<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Alert;


class AffilateController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255'],
          'user_name' => ['required', 'string', 'string', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function userAdd(Request $request)
  {

    //$sponsor =  User::where('id',Auth::id())->first();
  //  dd($sponsor->id);

      $data= User::create([
          'name' => $request['name'],
          'user_name' => $request['user_name'],
          'email' => $request['email'],
          'sponsor' => Auth::id(),

          'country' => $request['country'],
          'address' => $request['address'],
          'city' => $request['city'],



          'package_id' => $request['postal_code'],


          'password' => Hash::make($request['password']),

      ]);
      $notification = array(
            'message' => 'Affilate has been Successfully Registered!!!! !!!',
            'alert-type' => 'success'
        );
        Alert::success('Success', 'Affilate has been Successfully Registered!!!! !!!');
        return Redirect()->back()->with($notification);

      //return back()->with('add_affilate', 'Affilate has been Successfully Registered!!!!');
  }
  public function index($id)
  {
    $users= User::where('sponsor',Auth::id())->get();

    return view('user.pages.affilates',compact('users'));
  }
  public function add_affilate($id)
  {

    $users= User::where('sponsor',Auth::id())->get();

    return view('user.pages.add_affilates',compact('users'));
  }
}

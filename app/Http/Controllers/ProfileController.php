<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\GeneralException;

class ProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function profile($id)
  {
    return view('user.pages.user_profile');
  }
  public function UpdateProfile(Request $request)
  {
    //dd($request);
    $address = $request->address;
    $name=$request->name;
    $contact=$request->contact;

    $date_of_birth=$request->date_of_birth;
    $gender=$request->gender;
    $city= $request->city;
    $country=$request->country;
    $postal_code= $request->postal_code;


    $image=$request->file('file');
    $filename=null;
    if ($image) {
        $filename = time() . $image->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            '/User',
            $image,
            $filename
        );
    }

    $user = User::find(Auth::user()->id);
    $user->address = $address;
    $user->name =$name;
    $user->contact =$contact;
    $user->date_of_birth =$date_of_birth;
    $user->gender =$gender;
    $user->city= $city;
    $user->country= $country;
    $user->postal_code= $postal_code;
    $user->image=$filename;

    $user->save();

      return back()->with('profile_updated','Profile has been updated successfully!');
  }
  public function changePassStore(Request $request){
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:5',
        'password_confirmation' => 'required|min:5',
    ]);
    $db_pass = Auth::user()->password;
    $current_password = $request->old_password;
    $newpass = $request->new_password;
    $confirmpass = $request->password_confirmation;

   if (Hash::check($current_password,$db_pass)) {
    if ($newpass === $confirmpass) {
        User::findOrFail(Auth::id())->update([
          'password' => Hash::make($newpass)
        ]);

        Auth::logout();

      return Redirect()->route('login')->with('password_updated','Password has been updated successfully!');

    }else {

      $notification=array(
          'message'=>'New Password And Confirm Password Not Same',
          'alert-type'=>'error'
      );
      return Redirect()->back()->with($notification);
    }
 }else {
  $notification=array(
      'message'=>'Old Password Not Match',
      'alert-type'=>'error'
  );
  return Redirect()->back()->with($notification);
 }
}
}

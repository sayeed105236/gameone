<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageSettings;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\GeneralException;

class PackageController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    $packages= PackageSettings::all();
    return view('admin.pages.package_list',compact('packages'));
  }
  public function store(Request $request)
  {
    $image = $request->file('file');
    $filename = null;
    if ($image) {
        $filename = time() . $image->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            'packages/',
            $image,
            $filename
        );
    }
    $package= new PackageSettings();
    $package->image= $filename;
    $package->package_name= $request->package_name;
    $package->package_qty= $request->package_qty;
    $package->amount= $request->amount;
    $package->package_price= $request->package_price;
    $package->affilate_token= $request->affilate_token;
    $package->daily_seller_token= $request->daily_seller_token;
    $package->daily_buyer_token= $request->daily_buyer_token;
    $package->duration= $request->duration;
    $package->save();
    return back()->with('package_added', 'Package Successfully Added!!');

  }
  public function update(Request $request)
  {
    $image =$request->file('file');
    $filename=null;
    $uploadedFile = $request->file('uimage');
    $oldfilename = $package['image'] ?? 'demo.jpg';

    $oldfileexists = Storage::disk('public')->exists('packages/' . $oldfilename);

    if ($uploadedFile !== null) {

        if ($oldfileexists && $oldfilename != $uploadedFile) {
            //Delete old file
            Storage::disk('public')->delete('packages/' . $oldfilename);
        }
        $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
        $filename = time() . '_' . $filename_modified;

        Storage::disk('public')->putFileAs(
            'packages/',
            $uploadedFile,
            $filename
        );

        $data['uimage'] = $filename;
     } elseif (empty($oldfileexists)) {
        // throw new \Exception('Client image not found!');
        $uploadedFile = null;
        $notification=array(
            'message'=>'Client Image Not Found !!!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);

        //file check in storage
      }
      $package= PackageSettings::find($request->id);
      $package->image= $filename;
      $package->package_name= $request->package_name;
      $package->package_qty= $request->package_qty;
      $package->amount= $request->amount;
      $package->package_price= $request->package_price;
      $package->affilate_token= $request->affilate_token;
      $package->daily_seller_token= $request->daily_seller_token;
      $package->daily_buyer_token= $request->daily_buyer_token;
      $package->duration= $request->duration;
      $package->save();
      return back()->with('package_updated', 'Package Successfully Updated!!');
  }
  public function delete($id)
  {
    //dd($id);
    $package = PackageSettings::find($id);

    $package->delete();

    return back()->with('package_deleted', 'Package Successfully Deleted!!');

  }

}

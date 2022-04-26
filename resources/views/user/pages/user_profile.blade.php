@extends('user.layouts.master')


@section('user_content')



   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">

                <div class="col">
                    <div class="card">
                        @if(Session::has('profile_updated'))
                      <div class="alert alert-success d-flex align-items-center" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24">
               <use xlink:href="#check-circle-fill" />
           </svg>
           <div>
               {{Session::get('profile_updated')}}
           </div>
       </div>
       @elseif(Session::has('ambassador_updated'))
       <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
        {{Session::get('ambassador_updated')}}
        </div>
        </div>


       @endif

                    <div class="card-body">
                        <h2 class="card-title">User Profile Setting</h2>


                        <hr>
                        <div class="bd-example">
          <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile1" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile Information</button>
              </li>

          </ul>

          <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-profile1" role="tabpanel"
                  aria-labelledby="pills-profile-tab1">
                  <p>
                    <div class="table-responsive">
                             <table border="0" width="100%" class="table table-active">
                                 <div class="form-group">
                                   @if(Auth::user()->image == null)
                                     <img id="image_upload_preview" src="https://gameum.one/user/assets/images/demo.jpg" style="border-radius: 10%;" width="150" height="150">
                                     @else

                                     <img id="image_upload_preview" src="{{asset('storage/User/'.Auth::user()->image)}}" style="border-radius: 10%;" width="150" height="150">
                                     @endif
                                     <br>


                                 </div>
                                 <tr>
                                     <td colspan="3"><h4>Basic Information</h4></td>
                                 <tr>
                                     <td width="30%" class="text-primary">My Referral Id</td><td width="5%" class="text-primary"> : </td> <td width="65%" class="text-primary">{{Auth::user()->user_name}}</td>
                                 <tr>
                                     <td width="30%" class="text-primary">My Referral Link</td><td width="5%" class="text-primary"> : </td> <td width="65%" class="text-primary" ><a href="{{ Auth::user()->referral_link }}<"></a>{{ Auth::user()->referral_link }}</td>
                                 <tr>
                                     <td width="30%">Name</td><td width="5%"> : </td> <td width="65%">{{Auth::user()->name}}</td>
                                 <tr>
                                     <td>Gender</td><td> : </td> <td>{{Auth::user()->gender}}</td>
                                 <tr>
                                     <td>Date of Birth</td><td> : </td> <td>{{Auth::user()->date_of_birth}}</td>
                                 <tr>
                                     <td>Address</td><td> : </td> <td>{{Auth::user()->address}}</td>
                                 <tr>
                                     <td>City</td><td> : </td> <td>{{Auth::user()->city}}</td>
                                 <tr>
                                     <td>Country</td><td> : </td> <td>{{Auth::user()->country}}</td>
                                 <tr>
                                     <td>Postal code</td><td> : </td> <td>{{Auth::user()->postal_code}}</td>
                                 <tr>
                                     <td>Contact No</td><td> : </td> <td>{{Auth::user()->contact}}</td>
                                 <tr>
                                     <td>Email</td><td> : </td> <td>{{Auth::user()->email}}</td>
                                 <tr>
                                     <td style="vertical-align: middle;" colspan="2" >
                                         <a href="#"  data-bs-toggle="modal" data-bs-target="#profile_edit" class="btn btn-primary" title="Edit"><i style="font-size: 20px" class=""></i> Edit Profile Info</a>
                                     </td>
                                     <td style="vertical-align: middle;" colspan="" >
                                         <a href="#" data-bs-toggle="modal" data-bs-target="#userpassword" class="btn btn-primary" title="Change password"><i style="font-size: 20px" class=""></i> Change password</a>
                                     </td>
                                     @include('user.modals.profile_editmodal')
                                     @include('user.modals.user_password')
                                 </tr>
                             </table>

                  </p>

              </div>


          </div>
      </div>


                    </div>

                    </div>
                </div>


            </div>
        </div>




@endsection

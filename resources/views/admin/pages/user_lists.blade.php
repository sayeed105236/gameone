@extends('admin.layouts.master')


@section('admin_content')
   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">User Lists</h2>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#accountinfoadd">Add New User</a>
                        <hr>
                        <div class="bd-example table-responsive">
                               <table class="table table-bordered table-border">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">IMAGE</th>
                                           <th scope="col">USERNAME</th>
                                           <th scope="col">FULLNAME</th>
                                           <th scope="col">REFERRAL ID</th>
                                           <th scope="col">EMAIL</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($users as $row)
                                       <tr>
                                          <td >{{$loop->index+1}}</td>
                                          <td><img src="{{asset('/images/demo (1).jpg')}}" class="img-fluid avatar avatar-50 avatar-rounded"></td>
                                          <td>{{$row->user_name}}</td>
                                          <td>{{$row->name}}</td>
                                           <td>{{$row->sponsors->user_name}}</td>
                                            <td>{{$row->email}}</td>
                                       </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                    </div>

                    </div>
                </div>


            </div>
        </div>




@endsection

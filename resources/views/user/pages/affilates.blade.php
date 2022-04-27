@extends('user.layouts.master')


@section('user_content')
   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card">
                    @include('sweetalert::alert')
                    <div class="card-body">
                        <h2 class="card-title">My Affilates</h2>
                      
                        <hr>
                        <div class="bd-example table-responsive">
                               <table class="table table-bordered table-border">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                          <th scope="col">FULLNAME</th>
                                           <th scope="col">USERNAME</th>


                                           <th scope="col">EMAIL</th>
                                           <th scope="col">JOINDATE</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($users as $row)
                                       <tr>
                                          <td >{{$loop->index+1}}</td>
                                          <td>{{$row->name}}</td>

                                          <td>{{$row->user_name}}</td>


                                            <td>{{$row->email}}</td>
                                            <td>{{$row->created_at}}</td>
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

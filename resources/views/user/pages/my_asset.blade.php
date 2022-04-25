@extends('user.layouts.master')


@section('user_content')
   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">My Assets</h2>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#accountinfoadd">Add New User</a>
                        <hr>
                        <div class="bd-example table-responsive">
                               <table class="table table-bordered table-border">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                          <th scope="col">PACKAGE</th>
                                           <th scope="col">PURCHASE
                                                DATE</th>


                                           <th scope="col">TOKEN
                                             AMOUNT</th>
                                           <th scope="col">DAILY
                                            BUYER
                                            TOKEN</th>
                                            <th scope="col">DAILY
                                            SELLER
                                            TOKEN</th>
                                              <th scope="col">PACKAGE
                                              VALUE</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($purchase as $row)
                                       <tr>
                                          <td >{{$loop->index+1}}</td>
                                          <td>{{$row->packages->package_name}}</td>

                                          <td>{{$row->created_at}}</td>


                                            <td>{{$row->packages->amount}}</td>
                                            <td>{{($row->packages->amount)*(($row->packages->daily_buyer_token)/100)}}</td>
                                            <td>{{$row->packages->daily_seller_token}}</td>
                                            <td>{{$row->packages->package_price}}$</td>
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

@extends('user.layouts.master')


@section('user_content')
<style>
       .text-right{
           text-align: right;
       }
   </style>

                  <div class="container">
              <h6>Available Amount: {{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</h6>
              <hr>
              <h4 class="btn btn-primary">Package List</h4>
            </div>
            <br>
            @if(Session::has('package_purchase'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
            <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
            {{Session::get('package_purchase')}}
            </div>
            </div>
            @endif
            <br>
            <br>
            <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-2 g-4">
              @foreach($data['packages'] as $row)
                <div class="col-md-4">
                    <div class="card">
                      <br>
                      <div class="text-center">
                          <img src="{{asset('storage/packages/'.$row->image)}}" style="height:100px;width:100px;" class="bd-placeholder-img card-img-top" width="20%" height="20%" ></img>
                      </div>
                      <hr>

                      <div class="card-body">
                        <div class="input-group mb-3">
                        <!-- <span class="input-group-text" id="basic-addon1"></span> -->
                        <input disabled type="text" class="form-control" style="color:#D98019; font-weight:100%;" value="{{$row->package_name}}" >
                          </div>
                            <div class="input-group mb-3">
                            <span class="input-group-text text-right"  id="basic-addon1" style="color:#D98019;width: 70%; font-weight:100%;">Price ($)</span>
                            <input disabled type="text" class="form-control" value="{{$row->package_price}}" >
                              </div>
                              <div class="input-group mb-3">
                              <span class="input-group-text text-right" style="color:#D98019; width: 70%; font-weight:100%;" id="basic-addon1">Token
                                                                  Amount</span>
                              <input disabled type="text" class="form-control" value="{{$row->amount}}" >
                                </div>
                                <div class="input-group mb-3">
                                <span class="input-group-text text-right" style="color:#D98019; width: 70%; font-weight:100%;" id="basic-addon1">Duration
                                                                              (days)</span>
                                <input disabled type="text" class="form-control" value="{{$row->duration}}" >
                                  </div>
                                  <div class="input-group mb-3">
                                  <span class="input-group-text text-right" style="color:#D98019; width: 70%; font-weight:100%;" id="basic-addon1">Buyer Tok
                                                                                      Bonus (%)</span>
                                  <input disabled type="text" class="form-control" value="{{$row->daily_buyer_token}}" >
                                    </div>
                                    <div class="text-center">
                                      <form id="jquery-val-form" action="{{route('buy-package')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="package_id" value="{{$row->id}}">


                                          <button type="submit" class="btn btn-primary">Buy Package</button>
                                        </form>
                                    </div>

                      </div>
                    </div>
                </div>
                @endforeach



              </div>




@endsection

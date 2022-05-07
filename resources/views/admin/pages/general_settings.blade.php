@extends('admin.layouts.master')


@section('admin_content')



   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">

                <div class="col">
                    <div class="card">
                        @if(Session::has('token_rate_updated'))
                      <div class="alert alert-success d-flex align-items-center" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24">
               <use xlink:href="#check-circle-fill" />
           </svg>
           <div>
               {{Session::get('token_rate_updated')}}
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
        @elseif(Session::has('company_updated'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
         <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
         {{Session::get('company_updated')}}
         </div>
         </div>
        @elseif(Session::has('transfer_updated'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
         <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
         {{Session::get('transfer_updated')}}
         </div>
         </div>
         @elseif(Session::has('withdraw_updated'))
         <div class="alert alert-success d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24">
          <use xlink:href="#check-circle-fill" />
          </svg>
          <div>
          {{Session::get('withdraw_updated')}}
          </div>
          </div>
          @elseif(Session::has('tokens_updated'))
          <div class="alert alert-success d-flex align-items-center" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24">
           <use xlink:href="#check-circle-fill" />
           </svg>
           <div>
           {{Session::get('tokens_updated')}}
           </div>
           </div>


       @endif

                    <div class="card-body">
                        <h2 class="card-title">General Info Setting</h2>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#paymenttypeadd">Add Settings</a>

                        <hr>
                        <div class="bd-example">
          <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="logo-tab" data-bs-toggle="tab" data-bs-target="#pills-logo1" type="button" role="tab" aria-controls="logo" aria-selected="true">Company Details</button>
              </li>
              <!-- <li class="nav-item" role="presentation">
                  <button class="nav-link" id="icon-tab" data-bs-toggle="tab" data-bs-target="#pills-icon1" type="button" role="tab" aria-controls="icon" aria-selected="false">Icon</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#pills-info1" type="button" role="tab" aria-controls="info" aria-selected="false">Info</button>
              </li> -->
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#pills-withdraw-info1" type="button" role="tab" aria-controls="withdraw-info" aria-selected="false">Withdraw Info</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#pills-transfer-info1" type="button" role="tab" aria-controls="transfer-info" aria-selected="false">Transfer Info</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#pills-token-rate1" type="button" role="tab" aria-controls="token-rate" aria-selected="false">Token Rate</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#pills-ambassador1" type="button" role="tab" aria-controls="ambassador" aria-selected="false">Ambassador</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#pills-tokens1" type="button" role="tab" aria-controls="tokens" aria-selected="false">Token Settings</button>
              </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-logo1" role="tabpanel"
                  aria-labelledby="pills-logo-tab1">
                  <p>
                    <form action="{{route('company-update')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{$company->id}}">
                  <section id="multiple-column-form">

                      <div class="row">
                          <div class="col-12">
                              <div class="card">

                                  <div class="card-body">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Company Name	:</label>
                                <input type="text" class="form-control" value="{{$company->company_name}}" name="company_name"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Company Logo (PNG):
                                  <img
                                    src="{{asset("storage/Company/$company->company_image")}}"
                                    alt="image"
                                    height="50"
                                    width="50"

                                  />
                                </label>
                                <input type="file" value="{{asset("storage/Company/$company->company_image")}}" class="form-control"  name="image1"  id="company_image" aria-describedby="emailHelp" >

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Company Icon (SVG) :
                                  <img
                                    src="{{asset("storage/Company/$company->company_icon")}}"
                                    alt="image"
                                    height="50"
                                    width="50"

                                  />
                                </label>
                                <input type="file" value="{{asset("storage/Company/$company->company_icon")}}" class="form-control" name="image2"  id="company_icon" aria-describedby="emailHelp" >

                            </div>



                                  </div>
                              </div>
                          </div>
                          <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Update</button>

                      </div>
                        </div>

                  </section>
                    </form>

                  </p>

              </div>
              <!-- <div class="tab-pane fade" id="pills-icon1" role="tabpanel"
                  aria-labelledby="pills-icon-tab1">
                  <p>
                  Icon

                  </p>

              </div>
              <div class="tab-pane fade" id="pills-info1" role="tabpanel"
                  aria-labelledby="pills-info-tab1">
                  <p>

                    Info
                  </p>


              </div> -->
              <div class="tab-pane fade" id="pills-withdraw-info1" role="tabpanel"
                  aria-labelledby="pills-info-tab1">
                  <p>
                      <form action="{{route('withdraw-info-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$withdraw_info->id}}">
                    <section id="multiple-column-form">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">

                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Fund withdraw commission (%)	:</label>
                                  <input type="text" class="form-control" value="{{$withdraw_info->withdraw_commission}}" name="withdraw_commission"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Fund withdraw limit (Maximum) $ :</label>
                                  <input type="text" class="form-control" value="{{$withdraw_info->withdraw_limit_max}}" name="withdraw_limit_max"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Fund withdraw limit (Minimum) $ :</label>
                                  <input type="text" class="form-control" value="{{$withdraw_info->withdraw_limit_min}}" name="withdraw_limit_min"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>



                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                          </div>

                    </section>
                      </form>


              </div>
              <div class="tab-pane fade" id="pills-transfer-info1" role="tabpanel"
                  aria-labelledby="pills-info-tab1">
                  <p>
                      <form action="{{route('transfer-info-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$transfer_info->id}}">
                    <section id="multiple-column-form">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">

                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Fund transfer commission (%)	:</label>
                                  <input type="text" class="form-control" value="{{$transfer_info->transfer_commission}}" name="transfer_commission"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Fund transfer limit (Maximum) $ :</label>
                                  <input type="text" class="form-control" value="{{$transfer_info->transfer_limit_max}}" name="transfer_limit_max"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Fund transfer limit (Minimum) $ :</label>
                                  <input type="text" class="form-control" value="{{$transfer_info->transfer_limit_min}}" name="transfer_limit_min"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>



                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                          </div>

                    </section>
                      </form>


              </div>
              <div class="tab-pane fade" id="pills-token-rate1" role="tabpanel"
                  aria-labelledby="pills-info-tab1">
                  <p>
                      <form action="{{route('token-rate-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$token_rate->id}}">
                    <section id="multiple-column-form">



                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">



                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Token convert rate ($)	:</label>
                                  <input type="text" class="form-control" value="{{$token_rate->token_convert_rate}}" name="token_convert_rate"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Buying commission (%) :</label>
                                  <input type="text" class="form-control" value="{{$token_rate->buying_commission}}" name="buying_commission"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Selling commission (%) :</label>
                                  <input type="text" class="form-control" value="{{$token_rate->selling_commission}}" name="selling_commission"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Refer Token Purchase commission (%) :</label>
                                  <input type="text" class="form-control" value="{{$token_rate->refer_purchase_commission}}" name="refer_purchase_commission"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Buy limit (Max) :</label>
                                  <input type="text" class="form-control" value="{{$token_rate->buy_limit_max}}" name="buy_limit_max"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>

                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Buy limit (Min) :</label>
                                  <input type="text" class="form-control" value="{{$token_rate->buy_limit_min}}" name="buy_limit_min"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>

                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Sell limit (Max) :</label>
                                  <input type="text" class="form-control" value="{{$token_rate->sell_limit_max}}" name="sell_limit_max"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Sell limit (Min) :</label>
                                  <input type="text" class="form-control" value="{{$token_rate->sell_limit_min}}" name="sell_limit_min"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                          </div>

                    </section>
                      </form>


              </div>
              <div class="tab-pane fade" id="pills-ambassador1" role="tabpanel"
                  aria-labelledby="pills-info-tab1">
                  <p>
                      <form action="{{route('ambassador-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$ambassaor->id}}">
                    <section id="multiple-column-form">



                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">



                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Active User Qnty	:</label>
                                  <input type="text" class="form-control" value="{{$ambassaor->auser_qty}}" name="auser_qty"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Refer Token Value (MIND) :</label>
                                  <input type="text" class="form-control" value="{{$ambassaor->refer_token_value}}" name="refer_token_value"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Owner Token Value (MIND) :</label>
                                  <input type="text" class="form-control" value="{{$ambassaor->owner_token_value}}" name="owner_token_value"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Token Bonus (MIND) :</label>
                                  <input type="text" class="form-control" value="{{$ambassaor->token_bonus}}" name="token_bonus"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>

                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Cash Bonus ($):</label>
                                  <input type="text" class="form-control" value="{{$ambassaor->cash_bonus}}" name="cash_bonus"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>

                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Duration (days) :</label>
                                  <input type="text" class="form-control" value="{{$ambassaor->duration}}" name="duration"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>

                              <div class="mb-3">


                                 <label for="email-id-column">On/Off<span
                                         class="text-danger">*</span></label>
                              <select name="status" class="form-select" aria-label="Default select example" required>


                              <option value="1">On</option>
                                <option value="0">Off</option>

                            </select>
                              </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                          </div>

                    </section>
                      </form>

              </div>
              <div class="tab-pane fade" id="pills-tokens1" role="tabpanel"
                  aria-labelledby="pills-info-tab1">
                  <p>
                      <form action="{{route('tokens-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$tokens->id}}">
                    <section id="multiple-column-form">



                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">



                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Token Name:</label>
                                  <input type="text" class="form-control" value="{{$tokens->token_name}}" name="token_name"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Token Symbol :</label>
                                  <input type="text" class="form-control" value="{{$tokens->token_symbol}}" name="token_symbol"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Total Supply :</label>
                                  <input type="text" class="form-control" value="{{$tokens->total_supply}}" name="total_supply"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">BlockChain :</label>
                                  <input type="text" class="form-control" value="{{$tokens->blockchain}}" name="blockchain"  id="exampleInputEmail1" aria-describedby="emailHelp" >

                              </div>



                            
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                          </div>

                    </section>
                      </form>

              </div>
          </div>
      </div>


                    </div>

                    </div>
                </div>


            </div>
        </div>




@endsection

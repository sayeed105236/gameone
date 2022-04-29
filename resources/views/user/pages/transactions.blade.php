@extends('user.layouts.master')


@section('user_content')



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


       @endif

                    <div class="card-body">
                        <h2 class="card-title">Transactions Report</h2>




                          <hr>
                        <div class="bd-example">
          <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="logo-tab" data-bs-toggle="tab" data-bs-target="#pills-logo1" type="button" role="tab" aria-controls="logo" aria-selected="true">CashWallet</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="icon-tab" data-bs-toggle="tab" data-bs-target="#pills-icon1" type="button" role="tab" aria-controls="icon" aria-selected="false">TokenWallet</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#pills-info1" type="button" role="tab" aria-controls="info" aria-selected="false">BonusWallet</button>
              </li>

          </ul>
          <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-logo1" role="tabpanel"
                  aria-labelledby="pills-logo-tab1">
                  <p>
                    <h6 class="text-left">CashWallet Balance:  {{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</h6>
                  <hr>
                  <div class="bd-example table-responsive">
                         <table class="table table-bordered table-border">
                             <thead>
                                 <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">DATE</th>
                                        <th scope="col"> CATEGORY</th>
                                           <th scope="col">RCVD FRM/PAY TO</th>
                                              <th scope="col">DESCRIPTION</th>
                                                 <th scope="col">AMOUNT/th>

                                     <th scope="col">TYPE</th>

                                 </tr>
                             </thead>


                             @foreach($cashwallet_history as $cash)
                                 <tr>
                                    <td >{{$loop->index+1}}</td>
                                     <td>{{$cash->created_at}}
                                     </td>
                                     <td>{{$cash->method}}</td>
                                     <td>
                                       @if($cash->received_from != null)
                                       {{$cash->sender->user_name}}
                                       @elseif($cash->receiver_id != null)
                                       {{$cash->receiver->user_name}}
                                       @else
                                       System Transactions
                                       @endif


                                     </td>
                                     <td>{{$cash->description}}</td>
                                     <td>{{$cash->amount}}</td>
                                     <td>{{$cash->type}}</td>


                                 </tr>
                                 @endforeach




                             </tbody>
                         </table>
                     </div>

                  </p>

              </div>
              <div class="tab-pane fade" id="pills-icon1" role="tabpanel"
                  aria-labelledby="pills-icon-tab1">
                  <p>


                            <h6 class="text-left">Token Balance:  {{$data['sum_deposit_token'] ? number_format((float)$data['sum_deposit_token'], 2, '.', '') : '00.00'}}</h6>
                              <hr>
                              <div class="bd-example table-responsive">
                                     <table class="table table-bordered table-border">
                                         <thead>
                                             <tr>
                                               <th scope="col">#</th>
                                               <th scope="col">DATE</th>
                                                  <th scope="col"> CATEGORY</th>
                                                     <th scope="col">RCVD FRM/PAY TO</th>
                                                        <th scope="col">DESCRIPTION</th>
                                                           <th scope="col">AMOUNT/th>

                                               <th scope="col">TYPE</th>

                                             </tr>
                                         </thead>

                                         @foreach($tokenwallet_history as $token)
                                             <tr>
                                                <td >{{$loop->index+1}}</td>
                                                 <td>{{$token->created_at}}
                                                 </td>
                                                 <td>{{$token->method}}</td>
                                                 <td>
                                                   @if($token->received_from != null)
                                                   {{$token->sender->user_name}}
                                                   @elseif($token->receiver_id != null)
                                                   {{$token->receiver->user_name}}
                                                   @else
                                                   System Transactions
                                                   @endif


                                                 </td>
                                                 <td>{{$token->description}}</td>
                                                 <td>{{$token->amount}}</td>
                                                 <td>{{$token->type}}</td>


                                             </tr>
                                             @endforeach




                                         </tbody>
                                     </table>
                                 </div>
                  </p>

              </div>
              <div class="tab-pane fade" id="pills-info1" role="tabpanel"
                  aria-labelledby="pills-info-tab1">
                  <p>


                      <h6 class="text-left">Bonus Balance:  {{$data['sum_deposit_bonus'] ? number_format((float)$data['sum_deposit_bonus'], 2, '.', '') : '00.00'}}</h6>
                      <hr>
                      <div class="bd-example table-responsive">
                             <table class="table table-bordered table-border">
                                 <thead>
                                     <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">DATE</th>
                                          <th scope="col"> CATEGORY</th>
                                             <th scope="col">RCVD FRM/PAY TO</th>
                                                <th scope="col">DESCRIPTION</th>
                                                   <th scope="col">AMOUNT</th>

                                       <th scope="col">TYPE</th>

                                     </tr>
                                 </thead>


                                 @foreach($bonuswallet_history as $bonus)
                                     <tr>
                                        <td >{{$loop->index+1}}</td>
                                         <td>{{$bonus->created_at}}
                                         </td>
                                         <td>{{$bonus->method}}</td>
                                         <td>
                                           @if($bonus->received_from != null)
                                           {{$bonus->sender->user_name}}
                                           @elseif($bonus->receiver_id != null)
                                           {{$bonus->receiver->user_name}}
                                           @else
                                           System Transactions
                                           @endif


                                         </td>
                                         <td>{{$bonus->description}}</td>
                                         <td>{{$bonus->amount}}</td>
                                         <td>{{$bonus->type}}</td>


                                     </tr>
                                     @endforeach





                                 </tbody>
                             </table>
                         </div>
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

@extends('user.layouts.master')


@section('user_content')



   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">

                <div class="col">
                    <div class="card">
                      @if(Session::has('Money_added'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
             <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
             {{Session::get('Money_added')}}
         </div>
     </div>
     @endif



                    <div class="card-body">
                        <h4 class="card-title">Request Status for Add Fund</h4>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#addfund">Pay Automatically</a>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#addfund2">Pay Manually</a>
                        @include('user.modals.addfundmodal')
                          @include('user.modals.addfundmodal2')
                        <hr>
                        <h6>Available Balance: {{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</h6>

                        <hr>
                        <div class="bd-example table-responsive">
                               <table class="table table-bordered table-border">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">TRANX ID</th>
                                              <th scope="col"> MERCHANT NO</th>
                                                 <th scope="col">REQUEST DATE</th>
                                                    <th scope="col">AMOUNT</th>
                                                       <th scope="col">STATUS</th>

                                           <th scope="col">APPROVAL DATE</th>

                                       </tr>
                                   </thead>
                                   @foreach($deposit as $row)

                                       <tr>
                                          <td >{{$loop->index+1}}</td>
                                           <td>{{$row->txn_id}}</td>
                                           <td>
                                             @if($row->wallet_id != null)
                                             Manually(
                                            {{$row->merchant->wallet_no}})
                                            @else
                                            Now Payments
                                            @endif
                                           </td>
                                           <td>{{$row->created_at}}</td>
                                           <td>{{$row->amount}}</td>
                                           <td>{{$row->status}}</td>
                                           <td>{{$row->updated_at}}</td>


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
        <script type="text/javascript">

            //alert('success');
            //console.log(this.getAttribute('id'));
            //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
            //var wallet=  document.getElementById("wallet_id");
            //wallet.innerHTML= id.value;
            document.getElementById('DestinationOptions').addEventListener('change', function (e) {
                var wallet2 = e.target.options[e.target.selectedIndex].getAttribute('id');
                //console.log(wallet2);
                var wallet = document.getElementById("wallet_id").value = wallet2;
                //console.log(wallet);
                //wallet.innerHTML= wallet2;
            });

            //  document.getElementById('').value(id.value);


        </script>




@endsection

@extends('user.layouts.master')


@section('user_content')



   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">

                <div class="col">
                    <div class="card">
                      @if(Session::has('transfer_fund'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
             <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
             {{Session::get('transfer_fund')}}
         </div>
     </div>
     @elseif(Session::has('transfer_error'))
               <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
            <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
            {{Session::get('transfer_error')}}
            </div>
            </div>
     @endif



                    <div class="card-body">
                        <h4 class="card-title">History of Fund Transfer</h4>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#fundtransfer">Add Request</a>
                        @include('user.modals.fundtransfermodal')
                        <hr>
                        <h6>Available Balance: {{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</h6>

                        <hr>
                        <div class="bd-example table-responsive">
                               <table class="table table-bordered table-border">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">REQUEST DATE</th>
                                              <th scope="col"> FUND TRANSFER TO</th>
                                                 <th scope="col">DESCRIPTION</th>
                                                    <th scope="col">CATEGORY</th>
                                                       <th scope="col">AMOUNT</th>



                                       </tr>
                                   </thead>

                                    @foreach($transfer as $row)
                                       <tr>
                                          <td >{{$loop->index+1}}</td>
                                           <td>{{$row->created_at}}</td>
                                           <td>
                                              {{$row->receiver->user_name}}
                                           </td>
                                           <td>{{$row->description}}</td>
                                           <td>{{$row->method}}</td>
                                           <td>{{$row->amount}}</td>



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
        @push('scripts')
        <script>
        $("body").on("keyup", "#sponsor", function () {
        //alert('success');
            let searchData = $("#sponsor").val();
            if (searchData.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("get-users")}}',
                    data: {search: searchData},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        $('#suggestUser').html(result.success)
                        console.log(result.data)
                        // if (result.data) {
                        //     $("#position").val("");
                        //     $("#placement_id").val("");
                        //     $("#position").removeAttr('disabled');
                        // } else {
                        //     $("#position").val("");
                        //     $("#placement_id").val("");
                        //     $('#position').prop('disabled', true);
                        // }
                    }
                });
            }
            if (searchData.length < 1) $('#suggestUser').html("")
        })


        </script>
@endpush



@endsection

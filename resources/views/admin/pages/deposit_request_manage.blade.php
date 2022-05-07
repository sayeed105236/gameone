@extends('admin.layouts.master')


@section('admin_content')



   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">

                <div class="col">
                    <div class="card">
                        @if(Session::has('Money_approved'))
                      <div class="alert alert-success d-flex align-items-center" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24">
               <use xlink:href="#check-circle-fill" />
           </svg>
           <div>
               {{Session::get('Money_approved')}}
           </div>
       </div>
       @elseif(Session::has('Money_added'))
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
                        <h2 class="card-title">User's request for add fund</h2>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#directaddfund">Add Fund (CashWallet)</a>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#directaddfundt">Add Fund(TokenWallet)</a>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#directaddfundb">Add Fund(BonusWallet)</a>
                        @include('admin.modals.directfundaddmodal')
                          @include('admin.modals.directfundaddtmodal')
                            @include('admin.modals.directfundaddbmodal')

                        <hr>

                        <div class="bd-example table-responsive">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">USER</th>
                                           <th scope="col">TRNX ID</th>
                                           <th scope="col">MERCHANT NO</th>
                                           <th scope="col">AMOUNT</th>
                                           <th scope="col">REQUEST DATE</th>
                                           <th scope="col">STATUS</th>
                                           <th scope="col">APPROVAL/REJECT DATE</th>
                                           <th scope="col">ACTION</th>

                                       </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($deposit as $row)

                                       <tr>

                                         <td>{{$loop->index+1}}</td>
                                         <td>{{$row->user->user_name}}</td>
                                         <td>{{$row->txn_id}}</td>
                                         <td>
                                           @if($row->wallet_id != null)
                                           {{$row->merchant->wallet_no}}
                                           @else
                                           System
                                           @endif

                                         </td>
                                         <td>{{$row->amount}}</td>
                                         <td>{{$row->created_at}}</td>
                                         <td>

                                           {{$row->status}}

                                         </td>
                                         <td>{{$row->updated_at}}</td>
                                         <td>
                                           @if($row->status == 'pending')

                                           <a href="/admin/add-money-approve/{{$row->id}}">
                                                                          <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg></a>



                                              <a href="#">                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            </a>
                                              @endif



                                         </td>



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
        $("body").on("keyup", "#sponsor2", function () {
        //alert('success');
            let searchData2 = $("#sponsor2").val();
            if (searchData2.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("get-users")}}',
                    data: {search: searchData2},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        $('#suggestUser2').html(result.success)
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
            if (searchData2.length < 1) $('#suggestUser2').html("")
        })
        $("body").on("keyup", "#sponsor3", function () {
        //alert('success');
            let searchData3 = $("#sponsor3").val();
            if (searchData3.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("get-users")}}',
                    data: {search: searchData3},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        $('#suggestUser3').html(result.success)
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
            if (searchData3.length < 1) $('#suggestUser3').html("")
        })




        </script>
      @endpush



@endsection

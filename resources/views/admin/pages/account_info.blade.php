@extends('admin.layouts.master')


@section('admin_content')



   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">

                <div class="col">
                    <div class="card">
                        @if(Session::has('account_info_added'))
                      <div class="alert alert-success d-flex align-items-center" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24">
               <use xlink:href="#check-circle-fill" />
           </svg>
           <div>
               {{Session::get('account_info_added')}}
           </div>
       </div>

       @elseif(Session::has('account_info_updated'))
             <div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24">
              <use xlink:href="#check-circle-fill" />
              </svg>
              <div>
              {{Session::get('account_info_updated')}}
              </div>
              </div>
               @elseif(Session::has('account_info_deleted'))

              <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                {{Session::get('account_info_deleted')}}
            </div>
        </div>
       @endif

                    <div class="card-body">
                        <h2 class="card-title">Merchant Payment GateWay</h2>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#accountinfoadd">Add New</a>
                        @include('admin.modals.account_info_addmodal')
                        <hr>

                        <div class="bd-example table-responsive">
                               <table class="table table-bordered table-border">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">PAYMENT WAY</th>
                                           <th scope="col">ACCOUNT / CARD NO</th>

                                           <th scope="col">ACTION</th>

                                       </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($account_infos as $row)
                                       <tr>
                                          <td >{{$loop->index+1}}</td>
                                          <td>{{$row->payment_way->payment_way}}</td>
                                           <td>{{$row->wallet_no}}</td>


                                           <td><a href="#"data-bs-toggle="modal" data-bs-target="#accountinfoedit{{$row->id}}"> <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M13.7476 20.4428H21.0002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.78 3.79479C13.5557 2.86779 14.95 2.73186 15.8962 3.49173C15.9485 3.53296 17.6295 4.83879 17.6295 4.83879C18.669 5.46719 18.992 6.80311 18.3494 7.82259C18.3153 7.87718 8.81195 19.7645 8.81195 19.7645C8.49578 20.1589 8.01583 20.3918 7.50291 20.3973L3.86353 20.443L3.04353 16.9723C2.92866 16.4843 3.04353 15.9718 3.3597 15.5773L12.78 3.79479Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.021 6.00098L16.4732 10.1881" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg> </a>

                                              <a href="/admin/account-info/delete/{{$row->id}}">                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            </a>


                                           </td>
                                             @include('admin.modals.account_info_editmodal')


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

@extends('user.layouts.master')


@section('user_content')
   <div class="bd-example">
            <div class="row  row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card">
                      @if(Session::has('payment_added'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                     <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                         <use xlink:href="#check-circle-fill" />
                     </svg>
                     <div>
                         {{Session::get('payment_added')}}
                     </div>
                 </div>
                 @elseif(Session::has('payment_updated'))
               <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{Session::get('payment_updated')}}
                </div>
            </div>
                 @endif
                    <div class="card-body">
                        <h2 class="card-title">My Payment Method</h2>
                        <a class="btn btn-primary float-right" href="#" data-bs-toggle="modal" data-bs-target="#addnewmethod">Add New Method</a>
                        @include('user.modals.payment_method_addmodal')
                        <hr>
                        <div class="bd-example table-responsive">
                               <table class="table table-bordered table-border">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                          <th scope="col">PAYMENT WAY</th>
                                           <th scope="col">WALLET OR A/C NO.</th>


                                           <th scope="col">ACTION</th>

                                       </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($payment_methods as $row)
                                       <tr>
                                          <td >{{$loop->index+1}}</td>
                                          <td>{{$row->payment_way->payment_way}}</td>

                                          <td>{{$row->wallet_no}}</td>


                                            <td>
                                              <a href="#"data-bs-toggle="modal" data-bs-target="#editnewmethod{{$row->id}}"> <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M13.7476 20.4428H21.0002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.78 3.79479C13.5557 2.86779 14.95 2.73186 15.8962 3.49173C15.9485 3.53296 17.6295 4.83879 17.6295 4.83879C18.669 5.46719 18.992 6.80311 18.3494 7.82259C18.3153 7.87718 8.81195 19.7645 8.81195 19.7645C8.49578 20.1589 8.01583 20.3918 7.50291 20.3973L3.86353 20.443L3.04353 16.9723C2.92866 16.4843 3.04353 15.9718 3.3597 15.5773L12.78 3.79479Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.021 6.00098L16.4732 10.1881" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg> </a>
                                            </td>

                                       </tr>
                                         @include('user.modals.payment_method_editmodal')
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

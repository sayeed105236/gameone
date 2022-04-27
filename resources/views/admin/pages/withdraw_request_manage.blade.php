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
       @elseif(Session::has('Money_rejected'))
             <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
        {{Session::get('Money_rejected')}}
        </div>
        </div>

    @endif



                    <div class="card-body">
                        <h2 class="card-title">User's request for withdraw fund</h2>


                        <hr>

                        <div class="bd-example table-responsive">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">USERNAME</th>

                                           <th scope="col">WALLET NO</th>
                                           <th scope="col">AMOUNT</th>
                                            <th scope="col">AMOUNT GET</th>
                                           <th scope="col">REQUEST DATE</th>
                                           <th scope="col">STATUS</th>
                                           <th scope="col">APPROVAL/REJECT DATE</th>
                                           <th scope="col">ACTION</th>

                                       </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($withdraw as $row)

                                       <tr>

                                         <td>{{$loop->index+1}}</td>
                                         <td>{{$row->user->user_name}}</td>
                                         <td>{{$row->wallet_id}}</td>
                                          <td>{{$row->amount}}</td>
                                         <td>{{$row->payable}}</td>
                                         <td>{{$row->created_at}}</td>
                                         <td>
                                           {{$row->status}}
                                         </td>


                                         <td>{{$row->updated_at}}</td>
                                         <td>
                                           @if($row->status == 'pending')

                                           <a href="/admin/withdraw-approve/{{$row->id}}">
                                                                          <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg></a>



                                              <a href="/admin/withdraw-reject/{{$row->id}}/{{$row->user_id}}/{{$row->amount}}">                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            </a>
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




@endsection

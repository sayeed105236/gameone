<div class="modal fade text-left" id="tokenbuymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Buy Token</h4>
                <button type="button" class="btn-primary close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                  <div class="row">
                      <form class="col-lg-12" method="post" action="{{route('buy-token')}}" enctype="multipart/form-data">
                          @csrf
                      <div class="col-12">
                          <div class="card">


                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group mb-3">
                                     <div class="input-group pt-1">
                                        <span class="input-group-text" >Avl. Balance ($)</span>
                                        <input type="text" disabled class="form-control col-lg-8" value="{{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}" >
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group mb-3">
                                     <div class="input-group pt-2">
                                        <span class="input-group-text" >Price/Token ($)</span>
                                        <input type="text" disabled class="form-control col-lg-8" value="{{$data['settings']->token_convert_rate}}" >
                                     </div>

                                  </div>
                                </div>


                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group mb-3">
                                     <div class="input-group pt-1">
                                        <span class="input-group-text" >Quantity (G1)</span>
                                        <input type="number" onchange="calculate()" class="form-control col-lg-8" id="amount" name="quantity"  required>
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group mb-3">
                                     <div class="input-group pt-2">
                                        <span class="input-group-text" >Total Value ($)</span>
                                        <input type="text" id="total_value" readonly class="form-control col-lg-8" name="total_value"  required>
                                     </div>

                                  </div>
                                </div>


                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group mb-3">
                                     <div class="input-group pt-2">
                                        <span class="input-group-text" >Buying Fee (%)</span>
                                        <input type="text" readonly class="form-control col-lg-8" value="{{$data['settings']->buying_commission}}">
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group mb-3">
                                       <div class="input-group pt-2">
                                          <span class="input-group-text">Payable ($)</span>
                                          <input type="text" readonly id="payable" name="payable" class="form-control col-lg-8"  required>
                                       </div>
                                    </div>
                                  </div>


                              </div>


                  </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
                  </div>
                    </form>
                  </div>

            </div>



        </div>
    </div>
</div>

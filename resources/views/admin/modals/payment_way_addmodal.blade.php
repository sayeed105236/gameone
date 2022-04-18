<div class="modal fade text-left" id="paymentwayadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Add Merchant Payment Way</h4>
                <button type="button" class="btn-primary close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <section id="multiple-column-form">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">

                              <div class="card-body">

                              <form method="post" action="{{route('payment-way-store')}}">
                                @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Payment Way</label>
                            <input type="text" class="form-control" name="payment_way" placeholder="Enter Payment Way" id="exampleInputEmail1" aria-describedby="emailHelp" required>

                        </div>
                        <div class="mb-3">
                          
                          <?php
                          $payementtypes= App\Models\PaymentType::all();

                           ?>
                           <label for="email-id-column">Select Payement Type<span
                                   class="text-danger">*</span></label>
                        <select name="payment_type_id" class="form-select" aria-label="Default select example" required>
                          @foreach($payementtypes as $paymenttype)

                        <option value="{{$paymenttype->id}}">{{$paymenttype->payment_type}}</option>
                        @endforeach
                      </select>
                        </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
            </div>
              </form>
        </div>
    </div>
</div>

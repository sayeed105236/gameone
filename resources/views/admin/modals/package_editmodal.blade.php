<div class="modal fade text-left" id="packageedit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Add Payment Type</h4>
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

                              <form method="post" action="{{route('update-package')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$row->id}}">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Select Image</label>
                                    <input type="file" class="form-control" name="uimage" id="image" aria-describedby="emailHelp"  required>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Package Name</label>
                                    <input type="text" class="form-control" value="{{$row->package_name}}" name="package_name"  id="exampleInputEmail1" aria-describedby="emailHelp" required>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Package Quantity</label>
                                    <input type="number" class="form-control" value="{{$row->package_qty}}" name="package_qty"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="
                                      * digit only" required>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Amount (G1)</label>
                                    <input readonly type="round" class="form-control" value="{{$row->amount}}" name="amount"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="
                              * digit only" required>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Package Price ($)</label>
                                    <input readonly type="text" class="form-control" value="{{$row->package_price}}" name="package_price"  id="exampleInputEmail1" aria-describedby="emailHelp" required >

                                </div>




                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Affiliate Token (%)</label>
                                    <input type="round" class="form-control" value="{{$row->affilate_token}}" name="affilate_token"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="
                              * digit only" required >

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Daily Seller Token (%)</label>
                                    <input type="round" class="form-control" value="{{$row->daily_seller_token}}" name="daily_seller_token"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="
                              * digit only" required  >

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Daily Buyer Token (%)</label>
                                    <input type="round" class="form-control" value="{{$row->daily_buyer_token}}" name="daily_buyer_token"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="
                              * digit only" required  >

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Duration</label>
                                    <input type="number" class="form-control" value="{{$row->duration}}" name="duration"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="
                              * digit only" required  >

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

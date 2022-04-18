<div class="modal fade text-left" id="paymenttypeedit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Edit Payment Type</h4>
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

                              <form method="post" action="{{route('payment-type-update')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$row->id}}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Payment Type</label>
                            <input type="text" value="{{$row->payment_type}}" class="form-control" name="payment_type" placeholder="Enter Payment Type" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
            </div>
              </form>
        </div>
    </div>
</div>

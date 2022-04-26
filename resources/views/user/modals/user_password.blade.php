<div class="modal fade text-left" id="userpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Update Password</h4>


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

                              <form action="{{route('change-password-store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                        <div class="mb-3">
                            <label for="account-new-password">Old Password</label>
                          <input name="old_password" class="form-control" type="password" required>
                          @error('old_password')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror

                        </div>
                        <div class="mb-3">
                          <label for="account-new-password">New Password</label>
                          <div class="input-group form-password-toggle input-group-merge">
                                <input name="new_password" class="form-control" type="password" value="" required>
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                          </div>


                        </div>
                        <div class="mb-3">
                          <label for="account-retype-new-password">Retype New Password</label>
                          <div class="input-group form-password-toggle input-group-merge">
                            <input name="password_confirmation" class="form-control" type="password" value="" required>
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                          </div>


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

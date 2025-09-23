  <form action="{{ route('faq.update', $faq->id) }}" method="post" id="add-form">
              @csrf
              @method('PUT')
              <div class="modal-body">
                  <div class="form-group mb-2">
                      <label>Question <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="ques" value="{{ $faq->ques }}" required>
                  </div>

                              <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Answer</label>
                      <textarea class="form-control textarea" name="ans" id="summernote" rows="4" >{{ $faq->ans }}</textarea> 
                  </div>
              </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
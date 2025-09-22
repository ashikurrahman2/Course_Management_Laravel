 <form action="{{ route('instructor-details.update', $detail->id) }}" method="post" id="add-form">
              @csrf
              @method('PUT')
              <div class="modal-body">
                  <div class="form-group mb-2">
                      <label>Instructor<sup class="text-danger">*</sup></label>
                      <select class="form-control" name="instructor_id">
                          <option value="">-- Select Instructor --</option>
                          @foreach($instructors as $instructor)
                              <option value="{{ $instructor->id }}">{{ $instructor->instructor_name }}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group mb-2">
                      <label>About Instructor<sup class="text-danger">*</sup></label>
                      <textarea class="form-control" name="about_me" rows="3" required>{{ $detail->about_me }}</textarea>
                  </div>

                  <div class="form-group mb-2">
                      <label>Email <sup class="text-danger">*</sup></label>
                      <input type="email" class="form-control" name="email" value="{{ $detail->email }}" required>
                  </div>

                  <div class="form-group mb-2">
                      <label>Phone <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="phone" value="{{ $detail->phone }}" required>
                  </div>

                  <div class="form-group mb-2">
                      <label>Address <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="address" value="{{ $detail->address }}" required>
                  </div>

                  <div class="form-group mb-2">
                      <label>Facebook</label>
                      <input type="url" class="form-control" name="facebook" value="{{ $detail->facebook }}">
                  </div>

                  <div class="form-group mb-2">
                      <label>LinkedIn</label>
                      <input type="url" class="form-control" name="linkedin" value="{{ $detail->linkedin }}">
                  </div>

                  <div class="form-group mb-2">
                      <label>Twitter</label>
                      <input type="url" class="form-control" name="twitter" value="{{ $detail->twitter }}">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
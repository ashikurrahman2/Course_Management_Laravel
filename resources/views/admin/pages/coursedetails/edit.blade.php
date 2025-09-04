<form action="{{route('details.update', $courses_details->id)}}" method="post" id="add-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
       <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Course Overview</label>
                      <textarea class="form-control textarea" name="course_overview" id="summernote" rows="4" >{{ $courses_details->course_overview }}</textarea> 
                  </div>
              </div>

                   <div class="form-group">
                  <label for="course_content" class="col-form-label pt-0">Course Content<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_content" name="course_content" value="{{ $courses_details->course_content }}" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>

                    <div class="form-group">
                  <label for="course_subcontent" class="col-form-label pt-0">Course Subcontent<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_subcontent" name="course_subcontent" value="{{ $courses_details->course_subcontent }}" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>

                 <div class="form-group">
            <label for="course_teacherphoto" class="col-form-label pt-0">Current photo Logo</label>
            <br>
            @if($courses_details->course_teacherphoto)
            <img src="{{ asset($courses_details->course_teacherphoto) }}" alt="about Logo" class="img-fluid" style="max-width: 100px;">
            @else
            <p>No photo uploaded.</p>
            @endif
        </div>

                   <div class="col-md-12">
                    <label for="course_teacherphoto" class="col-form-label pt-0">Course Teacherphoto<sup class="text-size-20 top-1">*</sup></label>
                    <input type="file" class="dropify" data-height="200" name="course_teacherphoto" value="{{ $courses_details->course_teacherphoto }}" />
                    <small id="imageHelp" class="form-text text-muted">Maximum image size 2 MB</small>
                </div>
               <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Course Teacherintro</label>
                      <textarea class="form-control textarea" name="course_teacherintro" id="summernote1" rows="4" >{{ $courses_details->course_teacherintro  }}</textarea> 
                  </div>
              </div>

                <div class="form-group">
                  <label for="course_teacherdesignation" class="col-form-label pt-0">Course Teacherdesignation<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_teacherdesignation" name="course_teacherdesignation" value="{{ $courses_details->course_teacherdesignation }}" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>
        
                <div class="form-group">
                  <label for="pass_parcentage" class="col-form-label pt-0">Pass Parcentage<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="pass_parcentage" name="pass_parcentage" value="{{ $courses_details->pass_parcentage }}" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>

                 <div class="form-group">
                  <label for="course_level" class="col-form-label pt-0">Course Lavel<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_level" name="course_level" value="{{ $courses_details->course_level }}" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
  </form>

   {{-- For file upload script --}}
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>

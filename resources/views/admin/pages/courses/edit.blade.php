<form action="{{route('courses.update', $courses->id)}}" method="post" id="add-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        
        <div class="form-group">
            <label for="course_title" class="col-form-label pt-0">Course Title<sup class="text-size-20 top-1">*</sup></label>
              <input type="text" class="form-control" id="course_title" name="course_title" value="{{ $courses->course_title }}" required>
              <small id="emailHelp" class="form-text text-muted">This is your course name</small>
          </div>

          <div class="form-group">
            <label for="course_image" class="col-form-label pt-0">Current photo Logo</label>
            <br>
            @if($courses->course_image)
            <img src="{{ asset($courses->course_image) }}" alt="about Logo" class="img-fluid" style="max-width: 100px;">
            @else
            <p>No logo uploaded.</p>
            @endif
        </div>

          <div class="col-md-12">
            <label for="course_image" class="col-form-label pt-0">Course Image<sup class="text-size-20 top-1">*</sup></label>
            <input type="file" class="dropify" data-height="200" name="course_image" value="{{ $courses->course_image }}" />
            <small id="imageHelp" class="form-text text-muted">Maximum image size 2 MB</small>
        </div>
        
        <div class="form-group">
          <label for="course_price" class="col-form-label pt-0">Course Price<sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="course_price" name="course_price" value="{{ $courses->course_price }}" required>
            <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
        </div>

        <div class="form-group">
          <label for="course_teacher" class="col-form-label pt-0">Course Teacher<sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="course_teacher" name="course_teacher" value="{{ $courses->course_teacher }}" required>
            <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
        </div>
 
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
    </div>
  </form>

   {{-- For file upload script --}}
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>
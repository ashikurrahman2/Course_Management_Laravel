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
            <label for="category_image" class="col-form-label pt-0">Current photo Logo</label>
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
          <label for="course_category" class="col-form-label pt-0">Course Category<sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="course_category" name="course_category" value= "{{ $courses->course_category }}" required>
            <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
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

        <div class="form-group">
          <label for="course_lavel" class="col-form-label pt-0">Course Lavel<sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="course_lavel" name="course_lavel" value="{{ $courses->course_lavel }}" required>
            <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
        </div>

        <div class="form-group">
          <label for="course_duration" class="col-form-label pt-0">Course Duration<sup class="text-size-20 top-1">*</sup></label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="{{ $courses->course_duration }}" required>
            <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
        </div>

        <div class="col-md-12">
          <div class="mb-3">
              <label class="form-label">Course Learn</label>
              <textarea class="form-control textarea" name="course_learn" id="summernote" rows="4" >{{$courses->course_learn}}</textarea> 
          </div>
      </div>

      <div class="form-group">
        <label for="course_content_title" class="col-form-label pt-0">Course Content Question<sup class="text-size-20 top-1">*</sup></label>
          <input type="text" class="form-control" id="course_content_title" name="course_content_title" value="{{ $courses->course_content_title }}" required>
          <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
      </div>

      <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Course Content Answer</label>
            <textarea class="form-control textarea" name="course_content_answer" id="summernote1" rows="4" >{{$courses->course_content_answer}}</textarea> 
        </div>
    </div>

      <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Course Requirement</label>
            <textarea class="form-control textarea" name="course_content_requirement" id="summernote2" rows="4" >{{$courses->course_content_requirement}}</textarea> 
        </div>
    </div>

        <div class="col-md-12">
          <div class="mb-3">
              <label class="form-label">Course Audience</label>
              <textarea class="form-control textarea" name="course_audience" id="summernote3" rows="4" >{{$courses->course_audience}}</textarea> 
          </div>
      </div>
 
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
    </div>
  </form>

   {{-- For file upload script --}}
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>
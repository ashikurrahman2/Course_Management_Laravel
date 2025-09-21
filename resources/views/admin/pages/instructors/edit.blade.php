<form action="{{route('instructors.update', $instructor->id)}}" method="post" id="add-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        
     <div class="form-group">
                    <label for="instructor_name" class="col-form-label">Name <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="instructor_name" id="instructor_name" value="{{ $instructor->instructor_name }}" required>
                </div>

                     <div class="form-group">
                    <label for="instructor_designation" class="col-form-label">Designation<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="instructor_designation" id="instructor_designation" value="{{ $instructor->instructor_designation }}" required>
                </div>

          <div class="form-group">
            <label for="instructor_image" class="col-form-label pt-0">Current photo Logo</label>
            <br>
            @if($instructor->instructor_image)
            <img src="{{ asset($instructor->instructor_image) }}" alt="about Logo" class="img-fluid" style="max-width: 100px;">
            @else
            <p>No logo uploaded.</p>
            @endif
        </div>

          <div class="col-md-12">
            <label for="instructor_image" class="col-form-label pt-0">Image<sup class="text-size-20 top-1">*</sup></label>
            <input type="file" class="dropify" data-height="200" name="instructor_image" value="{{ $instructor->instructor_image }}" />
            <small id="imageHelp" class="form-text text-muted">Maximum image size 2 MB</small>
        </div>
        
      

 
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
    </div>
  </form>

   {{-- For file upload script --}}
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>
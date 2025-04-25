<form action="{{route('about.update', $$about->id)}}" method="post" id="add-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="title" class="col-form-label pt-0">Title<sup class="text-size-20 top-1">*</sup></label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $about->title }}" required>
          <small id="emailHelp" class="form-text text-muted">This is your About</small>
      </div>

      <div class="form-group">
        <label for="photo" class="col-form-label pt-0">Current photo Logo</label>
        <br>
        @if($about->photo)
        <img src="{{ asset($about->photo) }}" alt="about Logo" class="img-fluid" style="max-width: 100px;">
        @else
        <p>No logo uploaded.</p>
        @endif
    </div>

      <div class="col-md-12">
        <label for="photo" class="col-form-label pt-0">Image<sup class="text-size-20 top-1">*</sup></label>
        <input type="file" class="dropify" data-height="200" name="photo" value="{{ $about->photo }}" />
        <small id="imageHelp" class="form-text text-muted">This is your about image</small>
    </div>
   
    <div class="form-group">
                  <label for="our_mission" class="col-form-label pt-0">Our mission<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="our_mission" name="our_mission" value="{{ $about->our_mission }}" required>
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>

                     <div class="form-group">
                  <label for="our_vision" class="col-form-label pt-0">Our vision<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="our_vision" name="our_vision" value="{{ $about->our_vision }}" required>
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>

        
 
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
  </form>

    {{-- For file upload script --}}
    <script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
    <script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>
<form action="{{route('category.update', $category->id)}}" method="post" id="add-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        
          <div class="form-group">
            <label for="category_name" class="col-form-label pt-0">Category Name<sup class="text-size-20 top-1">*</sup></label>
              <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}" required>
              <small id="emailHelp" class="form-text text-muted">This is your category</small>
          </div>

          <div class="form-group">
            <label for="category_image" class="col-form-label pt-0">Current photo Logo</label>
            <br>
            @if($category->category_image)
            <img src="{{ asset($category->category_image) }}" alt="about Logo" class="img-fluid" style="max-width: 100px;">
            @else
            <p>No logo uploaded.</p>
            @endif
        </div>

        <div class="col-md-12">
          <label for="category_image" class="col-form-label pt-0">Category Image<sup class="text-size-20 top-1">*</sup></label>
          <input type="file" class="dropify" data-height="200" name="category_image" value="{{ $category->category_image }}" />
          <small id="imageHelp" class="form-text text-muted">This is your about image</small>
      </div>
 
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
    </div>
  </form>

   {{-- For file upload script --}}
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
   <script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>
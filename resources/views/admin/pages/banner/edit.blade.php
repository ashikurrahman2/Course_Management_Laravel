<form action="{{route('banner.update', $banner->id)}}" method="post" id="add-form">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="title" class="col-form-label pt-0">Title<sup class="text-size-20 top-1">*</sup></label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $banner->title }}" required>
          <small id="emailHelp" class="form-text text-muted">This is your Banner</small>
      </div>

        <div class="col-md-12">
           <div class="mb-3">
              <label class="form-label">Sub Title</label>
                <textarea class="form-control textarea" name="sub_title" id="summernote" rows="4" >{{ $banner->sub_title }}</textarea> 
            </div>
        </div>
   
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
  </form>

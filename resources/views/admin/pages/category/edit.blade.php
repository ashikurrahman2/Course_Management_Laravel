<form action="{{route('categories.update', $category->id)}}" method="post" id="add-form">
    @csrf
    @method('PUT')
    <div class="modal-body">
        
          <div class="form-group">
            <label for="category_name" class="col-form-label pt-0">Category Name<sup class="text-size-20 top-1">*</sup></label>
              <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}" required>
              <small id="emailHelp" class="form-text text-muted">This is your category</small>
          </div>
 
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
    </div>
  </form>
<form action="{{ route('admissionrequirement.update', $requirement->id) }}" method="post" id="edit-form">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="requirement_name" class="col-form-label pt-0">Requirement Name<sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" id="requirement_name" name="requirement_name" value="{{ $requirement->requirement_name }}" required>
        <small class="form-text text-muted">This is your admission requirement name.</small>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">
            <span class="d-none"> loading ......</span> Update
        </button>
    </div>
</form>

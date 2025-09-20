<form action="{{ route('notice.update', $notice->id) }}" method="post" id="edit-form">
    @csrf
    @method('PUT')

    <div class="modal-body">
        <div class="form-group">
            <label>Notice Heading <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" name="notice_heading" value="{{ old('notice_heading', $notice->notice_heading) }}" required>
        </div>

        <div class="form-group">
            <label>Notice Date <sup class="text-danger">*</sup></label>
            <input type="date" class="form-control" name="notice_date" value="{{ old('notice_date', $notice->notice_date) }}" required>
        </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Details</label>
                <textarea class="form-control textarea" name="notice_details" id="summernote" rows="4">{{ old('notice_details', $notice->notice_details) }}</textarea>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>

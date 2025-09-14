<form action="{{ route('admissionguides.update', $guide->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Guide Title -->
    <div class="form-group">
        <label for="guide_title">Guide Title <sup class="text-size-20 top-1">*</sup></label>
        <input type="text" class="form-control" id="guide_title" name="guide_title" 
               value="{{ $guide->guide_title }}" required>
    </div>

    <!-- Guide Content -->
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Guide Content</label>
            <textarea class="form-control textarea" name="guide_content" id="summernote_edit" rows="4">{{ $guide->guide_content }}</textarea>
        </div>
    </div>

<!-- Guide Image -->
      <div class="form-group">
        <label for="guide_image" class="col-form-label pt-0">Current photo Logo</label>
        <br>
        @if($guide->guide_image)
        <img src="{{ asset($guide->guide_image) }}" alt="about Logo" class="img-fluid" style="max-width: 100px;">
        @else
        <p>No logo uploaded.</p>
        @endif
    </div>

   <div class="form-group">
                      <label for="guide_image">Guide Image <sup class="text-size-20 top-1">*</sup></label>
                      <input type="file" class="dropify" data-height="200" name="guide_image" value="{{ $guide->guide_image }}" />
                      <small class="form-text text-muted">Maximum image size 2 MB</small>
                  </div>


    <!-- Close Admission -->
    <div class="form-group">
        <label for="close_admission">Close Admission</label>
        <input type="date" class="form-control" id="close_admission" name="close_admission" 
               value="{{ $guide->close_admission }}">
    </div>

    <!-- Session -->
    <div class="form-group">
        <label for="session">Session</label>
        <select class="form-control" id="session" name="session" required>
            @php
                $year = date('Y');
                $sessions = ["Fall", "Spring", "Summer"];
                $sessionIndex = 0;
                $totalYears = 5;
            @endphp

            @for($i=0; $i < $totalYears * 3; $i++)
                @php
                    $sessionText = $sessions[$sessionIndex] . " " . $year;
                    $isSelected = $guide->session == $sessionText ? 'selected' : '';
                @endphp
                <option value="{{ $sessionText }}" {{ $isSelected }}>{{ $sessionText }}</option>
                
                @if($sessionIndex === 0)
                    @php $sessionIndex = 1; @endphp
                @elseif($sessionIndex === 1)
                    @php $sessionIndex = 2; @endphp
                @else
                    @php $sessionIndex = 0; $year++; @endphp
                @endif
            @endfor
        </select>
    </div>

    <!-- Closing Content -->
    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Closing Content</label>
            <textarea class="form-control textarea" name="closing_content" id="summernote1_edit" rows="4">{{ $guide->closing_content }}</textarea>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#summernote_edit').summernote({ height: 200 });
        $('#summernote1_edit').summernote({ height: 200 });
    });
</script>
  {{-- For file upload script --}}
    <script src="{{ asset('/') }}admin/assets/fileuploads/js/fileupload.js"></script>
    <script src="{{ asset('/') }}admin/assets/fileuploads/js/file-upload.js"></script>

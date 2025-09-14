@extends('layouts.admin')

@section('title', 'Admission Guides')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Admission Guides</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul class="breadcrumb">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add New</button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header table-card-header">
              <h5>All Admission Guides list here</h5>
            </div>
            <div class="card-body">
              <div class="dt-responsive table-responsive">
                <table class="table table-striped table-bordered nowrap table-sm ytable">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Guide Title</th>
                        <th>Guide Content</th>
                        <th>Guide Image</th>
                        <th>Close Admission</th>
                        <th>Session</th>
                        <th>Closing Content</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Data populated by DataTables via AJAX -->
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Guide Title</th>
                        <th>Guide Content</th>
                        <th>Guide Image</th>
                        <th>Close Admission</th>
                        <th>Session</th>
                        <th>Closing Content</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Add New Admission Guide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admissionguides.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <div class="form-group">
                      <label for="guide_title">Guide Title <sup class="text-size-20 top-1">*</sup></label>
                      <input type="text" class="form-control" id="guide_title" name="guide_title" required>
                  </div>

                      <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Guide Content</label>
                      <textarea class="form-control textarea" name="guide_content" id="summernote" rows="4" >{{old('guide_content')}}</textarea> 
                  </div>
              </div>

                  <div class="form-group">
                      <label for="guide_image">Guide Image <sup class="text-size-20 top-1">*</sup></label>
                      <input type="file" class="dropify" data-height="200" name="guide_image" required>
                      <small class="form-text text-muted">Maximum image size 2 MB</small>
                  </div>

                    <div class="form-group">
                        <label for="close_admission">Close Admission</label>
                        <input type="date" class="form-control" id="close_admission" name="close_admission"
                            value="{{ old('close_admission', isset($guide) ? $guide->close_admission : '') }}">
                        <small class="form-text text-muted">Format: YYYY-MM-DD (e.g., 2025-10-04)</small>
                    </div>

             <div class="form-group">
    <label for="session">Session</label>
    <select class="form-control" id="session" name="session" required>
        <!-- Options JS load -->
    </select>
</div>

<script>
    // Current year
    let year = new Date().getFullYear();
    let sessions = ["Fall", "Spring", "Summer"];
    let select = document.getElementById("session");

    // কতটি session দেখতে চাও (উদাহরণস্বরূপ 5 বছর)
    let totalYears = 5;
    let sessionIndex = 0;

    for(let i = 0; i < totalYears * 2; i++) { // প্রতি বছর 2 session (Fall, Spring) + Summer
        let session = sessions[sessionIndex] + " " + year;
        let option = document.createElement("option");
        option.value = session;
        option.text = session;
        select.appendChild(option);

        // session পরিবর্তন logic
        if(sessionIndex === 0) sessionIndex = 1; // Fall → Spring
        else if(sessionIndex === 1) sessionIndex = 2; // Spring → Summer
        else { 
            sessionIndex = 0;  // Summer → Fall
            year++;            // বছর বাড়বে Summer পর
        }
    }
</script>

                  
                      <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Closing Content</label>
                      <textarea class="form-control textarea" name="closing_content" id="summernote1" rows="4" >{{old('closing_content')}}</textarea> 
                  </div>
              </div>

                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Edit Admission Guide</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- Edit form content loaded via AJAX -->
          </div>
      </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
  $(function admissionGuides() {
      var table = $('.ytable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admissionguides.index') }}",
          columns: [
              { data: 'DT_RowIndex', name: 'DT_RowIndex' },
              { data: 'guide_title', name: 'guide_title' },
              { data: 'guide_content', name: 'guide_content' },
              { data: 'guide_image', name: 'guide_image' },
              { data: 'close_admission', name: 'close_admission' },
              { data: 'session', name: 'session' },
              { data: 'closing_content', name: 'closing_content' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ]
      });
  });

  // Load edit form via AJAX
  $('body').on('click', '.edit', function() {
      let id = $(this).data('id');
      $.get("admissionguides/" + id + "/edit", function(data) {
          $('.modal-body').html(data);
      });
  });

  
      // Summernote script
  $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
            callbacks: {
                onChange: function(contents, $editable) {
                    // Strip HTML tags for plain text
                    let textOnly = $('<div>').html(contents).text();
                    $('#summernote').val(textOnly);
                }
            }
        });
    });

    
      // Summernote script
  $(document).ready(function() {
        $('#summernote1').summernote({
            height: 200,
            callbacks: {
                onChange: function(contents, $editable) {
                    // Strip HTML tags for plain text
                    let textOnly = $('<div>').html(contents).text();
                    $('#summernote').val(textOnly);
                }
            }
        });
    });
</script>
@endsection

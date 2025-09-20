@extends('layouts.admin')

@section('title', 'Notices')

@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Notices</h5>
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
                  <h5>All notices list here</h5>
                </div>
                <div class="card-body">
                  <div class="dt-responsive table-responsive">
                    <table class="table table-striped table-bordered nowrap table-sm ytable">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Heading</th>
                          <th>Date</th>
                          <th>Details</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Data populated by DataTables via AJAX -->
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>SL</th>
                          <th>Heading</th>
                          <th>Date</th>
                          <th>Details</th>
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

<!-- Insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('notice.store') }}" method="post" id="add-form">
              @csrf
              <div class="modal-body">
                  <div class="form-group">
                      <label>Notice Heading <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="notice_heading" required>
                  </div>

                  <div class="form-group">
                      <label>Notice Date <sup class="text-danger">*</sup></label>
                      <input type="date" class="form-control" name="notice_date" required>
                  </div>

                           <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Details</label>
                      <textarea class="form-control textarea" name="notice_details" id="summernote" rows="4" >{{old('notice_details')}}</textarea> 
                  </div>
              </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
              <h5 class="modal-title">Edit Notice</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <!-- Edit form content will be loaded here -->
          </div>
      </div>
  </div>
</div>

<!-- Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
  $(function notice(){
    var table=$('.ytable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('notice.index') }}",
      columns: [
          { data: 'DT_RowIndex', name: 'DT_RowIndex' },
          { data: 'notice_heading', name: 'notice_heading' },
          { data: 'notice_date', name: 'notice_date' },
          { data: 'notice_details', name: 'notice_details' },
          { data: 'action', name: 'action', orderable: false, searchable: false }
      ]
    });
  });

  // For Edit Notice
  $('body').on('click', '.edit', function() {
      let id = $(this).data('id');
      $.get("notice/" + id + "/edit", function(data) {
          $('#editModal .modal-body').html(data);
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
</script>
@endsection

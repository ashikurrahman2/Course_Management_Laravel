@extends('layouts.admin')

@section('title', 'Instructors')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Instructors</h5>
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
                  <h5>All Instructor List</h5>
                </div>
                <div class="card-body">
                  <div class="dt-responsive table-responsive">
                    <table class="table table-striped table-bordered nowrap table-sm ytable">
                      <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Data populated by DataTables via AJAX -->
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Image</th>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="addModalLabel">Add New Instructor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('instructors.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">

                <div class="form-group">
                    <label for="instructor_name" class="col-form-label">Name <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="instructor_name" id="instructor_name" required>
                </div>

                <div class="form-group">
                    <label for="instructor_designation" class="col-form-label">Designation <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="instructor_designation" id="instructor_designation" required>
                </div>

                <div class="form-group">
                    <label for="instructor_image" class="col-form-label">Image</label>
                    <input type="file" class="dropify" data-height="200" name="instructor_image">
                    <small class="form-text text-muted">Max size: 2 MB</small>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Instructor</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- Edit form will be loaded via AJAX -->
          </div>
      </div>
  </div>
</div>

<!-- Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- <script type="text/javascript">
  $(function () {
    var table = $('.ytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('instructors.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'instructor_name', name: 'instructor_name' },
            { data: 'instructor_designation', name: 'instructor_designation' },
            { data: 'instructor_image', name: 'instructor_image' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
  }); --}}

   <script type="text/javascript">
    $(function instructors(){
      var table=$('.ytable').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ route('instructors.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'instructor_name', name: 'instructor_name' },
                { data: 'instructor_designation', name: 'instructor_designation' },
                { data: 'instructor_image', name: 'instructor_image' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
      });
    });

  // For Edit Instructor
//   $('body').on('click', '.edit', function() {
//       let id = $(this).data('id');
//       $.get("instructors/" + id + "/edit", function(data) {
//           $('#editModal .modal-body').html(data);
//       });
//   });



    $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get("instructors/" + id + "/edit", function(data) {
            $('.modal-body').html(data);
        });
    });
</script>
@endsection

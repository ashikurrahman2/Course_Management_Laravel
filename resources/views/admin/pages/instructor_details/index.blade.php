@extends('layouts.admin')

@section('title', 'Instructor Details')

@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Instructor Details</h5>
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
                  <h5>All Instructor Details list here</h5>
                </div>
                <div class="card-body">
                  <div class="dt-responsive table-responsive">
                    <table class="table table-striped table-bordered nowrap table-sm ytable">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Instructor</th>
                          <th>About Instructor</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                         <th>Facebook</th>
                        <th>LinkedIn</th>
                        <th>Twitter</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Data populated by DataTables via AJAX -->
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>SL</th>
                          <th>Instructor</th>
                          <th>About Instructor</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Facebook</th>
                          <th>LinkedIn</th>
                          <th>Twitter</th>
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
                <h5 class="modal-title">Add New Instructor Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('instructor-details.store') }}" method="post" id="add-form">
              @csrf
              <div class="modal-body">
                  <div class="form-group mb-2">
                      <label>Instructor<sup class="text-danger">*</sup></label>
                      <select class="form-control" name="instructor_id" required>
                          <option value="">-- Select Instructor --</option>
                          @foreach($instructors as $instructor)
                              <option value="{{ $instructor->id }}">{{ $instructor->instructor_name }}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group mb-2">
                      <label>About Instructor<sup class="text-danger">*</sup></label>
                      <textarea class="form-control" name="about_me" rows="3" required></textarea>
                  </div>

                  <div class="form-group mb-2">
                      <label>Email <sup class="text-danger">*</sup></label>
                      <input type="email" class="form-control" name="email" required>
                  </div>

                  <div class="form-group mb-2">
                      <label>Phone <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="phone" required>
                  </div>

                  <div class="form-group mb-2">
                      <label>Address <sup class="text-danger">*</sup></label>
                      <input type="text" class="form-control" name="address" required>
                  </div>

                  <div class="form-group mb-2">
                      <label>Facebook</label>
                      <input type="url" class="form-control" name="facebook">
                  </div>

                  <div class="form-group mb-2">
                      <label>LinkedIn</label>
                      <input type="url" class="form-control" name="linkedin">
                  </div>

                  <div class="form-group mb-2">
                      <label>Twitter</label>
                      <input type="url" class="form-control" name="twitter">
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
              <h5 class="modal-title">Edit Instructor Detail</h5>
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
  $(function(){
    var table=$('.ytable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('instructor-details.index') }}",
      columns: [
          { data: 'DT_RowIndex', name: 'DT_RowIndex' },
             { data: 'instructor', name: 'instructor' },
        { data: 'about_me', name: 'about_me' },
        { data: 'email', name: 'email' },
        { data: 'phone', name: 'phone' },
        { data: 'address', name: 'address' },
        { data: 'facebook', name: 'facebook' },
        { data: 'linkedin', name: 'linkedin' },
        { data: 'twitter', name: 'twitter' },
          { data: 'action', name: 'action', orderable: false, searchable: false }
      ]
    });
  });

  // For Edit Instructor Detail
  $('body').on('click', '.edit', function() {
      let id = $(this).data('id');
      $.get("instructor-details/" + id + "/edit", function(data) {
          $('#editModal .modal-body').html(data);
      });
  });
</script>
@endsection

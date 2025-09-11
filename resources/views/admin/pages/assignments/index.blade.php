@extends('layouts.admin')

@section('title', 'Assignment')

@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Assignments</h5>
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
        <!-- HTML5 Export Buttons table start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header table-card-header">
              <h5>All assignments list here</h5>
            </div>
            <div class="card-body">
              <div class="dt-responsive table-responsive">
                <table id="" class="table table-striped table-bordered nowrap table-sm ytable">
                  <thead>
                    <tr>
                      <th>SL</th>
                       <th>Course Name</th>
                        <th>Experiment Name</th>
                        <th>Total Marks</th>
                        <th>Earned Marks</th>
                        <th>Deadline</th>
                        <th>Assigned Date</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Data populated by DataTables via AJAX -->
                  </tbody>
                  <tfoot>
                    <tr>
                       <th>SL</th>
                       <th>Course Name</th>
                        <th>Experiment Name</th>
                        <th>Total Marks</th>
                        <th>Earned Marks</th>
                        <th>Deadline</th>
                        <th>Assigned Date</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div><!-- HTML5 Export Buttons end -->

      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
  <!-- Insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Add New Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('assignment.store')}}" method="post" id="add-form">
              @csrf
              <div class="modal-body">
                      <div class="form-group">
                  <label for="exp_name" class="col-form-label pt-0">Course Name<sup class="text-size-20 top-1 text-danger">*</sup></label>
                    <input type="text" class="form-control" id="exp_name" name="exp_name" required>
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>     
                <div class="form-group">
                  <label for="course_name" class="col-form-label pt-0">Experiment Name<sup class="text-size-20 top-1 text-danger">*</sup></label>
                    <input type="text" class="form-control" id="course_name" name="course_name" required>
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>     
                  <div class="form-group">
                  <label for="total_marks" class="col-form-label pt-0">Total Marks<sup class="text-size-20 top-1 text-danger">*</sup></label>
                    <input type="number" class="form-control" id="total_marks" name="total_marks" required>
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>

                     <div class="form-group">
                  <label for="earned_marks" class="col-form-label pt-0">Earned Marks<sup class="text-size-20 top-1"></sup></label>
                    <input type="number" class="form-control" id="earned_marks" name="earned_marks">
                    <small id="emailHelp" class="form-text text-muted">Not Insert mark before assignment submission.</small>
                </div>
  
                     <div class="form-group">
            <label for="deadline" class="col-form-label pt-0">
                Deadline <sup class="text-size-20 top-1 text-danger">*</sup>
            </label>
            <input type="datetime-local" class="form-control" id="deadline" name="deadline">
            <small id="emailHelp" class="form-text text-muted">Select assigned date & time</small>
        </div>
               
            <div class="form-group">
            <label for="assigned_date" class="col-form-label pt-0">
                Assigned Date <sup class="text-size-20 top-1 text-danger">*</sup>
            </label>
            <input type="datetime-local" class="form-control" id="assigned_date" name="assigned_date">
            <small id="emailHelp" class="form-text text-muted">Select assigned date & time</small>
        </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Submit</button>
                </div>
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
              <h5 class="modal-title" id="editModalLabel">Edit Assignment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    $(function assignment(){
      var table=$('.ytable').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ route('assignment.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'exp_name', name: 'exp_name' },
                { data: 'course_name', name: 'course_name' },
                { data: 'total_marks', name: 'total_marks' },
                { data: 'earned_marks', name: 'earned_marks' },
                { data: 'deadline', name: 'deadline' },
                { data: 'assigned_date', name: 'assigned_date' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
      });
    });
    
  // For Edit Assignment 
    $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get("assignment/" + id + "/edit", function(data) {
            $('.modal-body').html(data);
        });
    });
  </script>
@endsection
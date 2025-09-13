@extends('layouts.admin')

@section('title', 'Course Details')

@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Course Details</h5>
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
                        <h5>All Course Details List</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-striped table-bordered nowrap table-sm ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Overview</th>
                                        <th>Content</th>
                                        <th>Subcontent</th>
                                        <th>Teacher Photo</th>
                                        <th>Teacher Intro</th>
                                        <th>Designation</th>
                                        <th>Pass %</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Overview</th>
                                        <th>Content</th>
                                        <th>Subcontent</th>
                                        <th>Teacher Photo</th>
                                        <th>Teacher Intro</th>
                                        <th>Designation</th>
                                        <th>Pass %</th>
                                        <th>Level</th>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('details.store') }}" method="post" enctype="multipart/form-data" id="add-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title h4">Add New Course Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Course Overview</label>
                      <textarea class="form-control textarea" name="course_overview" id="summernote" rows="4" >{{old('course_overview')}}</textarea> 
                  </div>
              </div>
                    <div class="form-group">
                        <label>Course Content</label>
                        <textarea class="form-control" name="course_content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Course Subcontent</label>
                        <input type="text" class="form-control" name="course_subcontent">
                    </div>
                        <div class="col-md-12">
                  <label for="photo" class="col-form-label pt-0">Teacher Photo<sup class="text-size-20 top-1"></sup></label>
                  <input type="file" class="dropify" data-height="200" name="course_teacherphoto" />
                  <small id="imageHelp" class="form-text text-muted">Maximum image size 5 MB</small>
              </div>

                             <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Teacher Intro</label>
                      <textarea class="form-control textarea" name="course_teacherintro" id="summernote1" rows="4" >{{old('course_teacherintro')}}</textarea> 
                  </div>
              </div>

                    <div class="form-group">
                        <label>Teacher Designation</label>
                        <input type="text" class="form-control" name="course_teacherdesignation">
                    </div>
                    <div class="form-group">
                        <label>Pass Percentage</label>
                        <input type="text" class="form-control" name="pass_parcentage">
                    </div>
                    <div class="form-group">
                        <label>Course Level</label>
                        <input type="text" class="form-control" name="course_level">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <span class="d-none">Loading ...</span> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Edit Course Detail</h5>
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
    var table = $('.ytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('details.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'course_overview', name: 'course_overview' },
            { data: 'course_content', name: 'course_content' },
            { data: 'course_subcontent', name: 'course_subcontent' },
            { data: 'course_teacherphoto', name: 'course_teacherphoto', orderable:false, searchable:false },
            { data: 'course_teacherintro', name: 'course_teacherintro' },
            { data: 'course_teacherdesignation', name: 'course_teacherdesignation' },
            { data: 'pass_parcentage', name: 'pass_parcentage' },
            { data: 'course_level', name: 'course_level' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});

// For Edit 
$('body').on('click', '.edit', function() {
    let id = $(this).data('id');
    $.get("details/" + id + "/edit", function(data) {
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

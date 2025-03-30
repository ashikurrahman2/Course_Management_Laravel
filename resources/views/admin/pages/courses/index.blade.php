@extends('layouts.admin')

@section('title', 'Courses')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Courses</h5>
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
              <h5>All Course list here</h5>
            </div>
            <div class="card-body">
              <div class="dt-responsive table-responsive">
                <table id="" class="table table-striped table-bordered nowrap table-sm ytable">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Course Title</th>
                        <th>Course Image</th>
                        <th>Course Category</th>
                        <th>Course Price</th>
                        <th>Course Teacher</th>
                        <th>Course Lavel</th>
                        <th>Course Duration</th>
                        <th>Course Learn</th>
                        <th>Course Content Question</th>
                        <th>Course Content Answer</th>
                        <th>Course Requirement</th>
                        <th>Course Audience</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Data populated by DataTables via AJAX -->
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Course Title</th>
                        <th>Course Image</th>
                        <th>Course Category</th>
                        <th>Course Price</th>
                        <th>Course Teacher</th>
                        <th>Course Lavel</th>
                        <th>Course Duration</th>
                        <th>Course Learn</th>
                        <th>Course Content Question</th>
                        <th>Course Content Answer</th>
                        <th>Course Requirement</th>
                        <th>Course Audience</th>
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
                <h5 class="modal-title h4" id="myLargeModalLabel">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('courses.store')}}" method="post" id="add-form" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
              
                <div class="form-group">
                    <label for="course_title" class="col-form-label pt-0">Course Title<sup class="text-size-20 top-1">*</sup></label>
                      <input type="text" class="form-control" id="course_title" name="course_title" required>
                      <small id="emailHelp" class="form-text text-muted">This is your course name</small>
                  </div>

                  <div class="col-md-12">
                    <label for="course_image" class="col-form-label pt-0">Course Image<sup class="text-size-20 top-1">*</sup></label>
                    <input type="file" class="dropify" data-height="200" name="course_image"  required />
                    <small id="imageHelp" class="form-text text-muted">Maximum image size 2 MB</small>
                </div>

                <div class="form-group">
                  <label for="course_category" class="col-form-label pt-0">Course Category<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_category" name="course_category" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>

                
                <div class="form-group">
                  <label for="course_price" class="col-form-label pt-0">Course Price<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_price" name="course_price" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>

                <div class="form-group">
                  <label for="course_teacher" class="col-form-label pt-0">Course Teacher<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_teacher" name="course_teacher" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>

                <div class="form-group">
                  <label for="course_lavel" class="col-form-label pt-0">Course Lavel<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_lavel" name="course_lavel" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>

                <div class="form-group">
                  <label for="course_duration" class="col-form-label pt-0">Course Duration<sup class="text-size-20 top-1">*</sup></label>
                    <input type="text" class="form-control" id="course_duration" name="course_duration" required>
                    <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
                </div>

                <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Course Learn</label>
                      <textarea class="form-control textarea" name="course_learn" id="summernote" rows="4" >{{old('course_learn')}}</textarea> 
                  </div>
              </div>

              <div class="form-group">
                <label for="course_content_title" class="col-form-label pt-0">Course Content Question<sup class="text-size-20 top-1">*</sup></label>
                  <input type="text" class="form-control" id="course_content_title" name="course_content_title" required>
                  <small id="emailHelp" class="form-text text-muted">This is your course catagory</small>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Course Content Answer</label>
                    <textarea class="form-control textarea" name="course_content_answer" id="summernote1" rows="4" >{{old('course_content_answer')}}</textarea> 
                </div>
            </div>

              <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Course Requirement</label>
                    <textarea class="form-control textarea" name="course_content_requirement" id="summernote2" rows="4" >{{old('course_content_requirement')}}</textarea> 
                </div>
            </div>

                <div class="col-md-12">
                  <div class="mb-3">
                      <label class="form-label">Course Audience</label>
                      <textarea class="form-control textarea" name="course_audience" id="summernote3" rows="4" >{{old('course_audience')}}</textarea> 
                  </div>
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
              <h5 class="modal-title" id="editModalLabel">Edit Course</h5>
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
    $(function courses(){
      var table=$('.ytable').DataTable({
        processing: true,
            serverSide: true,
            ajax: "{{ route('courses.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'course_title', name: 'course_title' },
                { data: 'course_image', name: 'course_image' },
                { data: 'course_category', name: 'course_category' },
                { data: 'course_price', name: 'course_price' },
                { data: 'course_teacher', name: 'course_teacher' },
                { data: 'course_lavel', name: 'course_lavel' },
                { data: 'course_duration', name: 'course_duration' },
                { data: 'course_learn', name: 'course_learn' },
                { data: 'course_content_title', name: 'course_content_title' },
                { data: 'course_content_answer', name: 'course_content_answer' },
                { data: 'course_content_requirement', name: 'course_content_requirement' },
                { data: 'course_audience', name: 'course_audience' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
      });
    });

    // For Edit courses 
    $('body').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get("courses/" + id + "/edit", function(data) {
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
                    $('#summernote1').val(textOnly);
                }
            }
        });
    });

           // Summernote script
  $(document).ready(function() {
        $('#summernote2').summernote({
            height: 200,
            callbacks: {
                onChange: function(contents, $editable) {
                    // Strip HTML tags for plain text
                    let textOnly = $('<div>').html(contents).text();
                    $('#summernote2').val(textOnly);
                }
            }
        });
    });

               // Summernote script
  $(document).ready(function() {
        $('#summernote3').summernote({
            height: 200,
            callbacks: {
                onChange: function(contents, $editable) {
                    // Strip HTML tags for plain text
                    let textOnly = $('<div>').html(contents).text();
                    $('#summernote3').val(textOnly);
                }
            }
        });
    });
  </script>
  @endsection
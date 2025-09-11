@extends('layouts.user')

@section('title', 'Assignment')

@section('user_content')
@include('user.layouts.script')
@include('user.layouts.style')
<div class="dashbaord-promo position-relative"></div>
   <!-- Dashboard Cover Start -->
   <div class="dashbaord-cover bg-shade sec-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 position-relative">
               <div class="dash-cover-bg rounded-3" style="background-image: url('{{ asset('/') }}frontend/images/student_bg.jpg');"></div>
               <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
                  <div class="ava-wrap d-flex align-items-center">
                     <div class="avatar me-3 rounded-circle"><img width="150" src="{{ asset('/') }}frontend/images/avatar.png"
                           class="rounded-circle" alt="Avatar"></div>
                     <div class="ava-info">
                        <h4 class="display-5 text-white mb-0">{{ Auth::user()->name }}</h4>
                        <div class="ava-meta text-white mt-1">
                           <span><img width="20" src="{{ asset('/') }}frontend/images/icons/star.png" alt="">4.8 </span>
                           <span><i class="feather-icon icon-users"></i>25k Students </span>
                        </div>
                     </div>
                  </div>
                  <a href="instructor-create-course.html" class="btn btn-sm btn-info rounded-5"><i
                     class="feather-icon icon-plus me-2"></i>Add New
                  Course</a>
               </div>
            </div>
         </div>
         <!-- Dashboard Inner Start -->
         <div class="row mt-5">
            <div class="col-lg-3">
               <aside class="dashboard-sidebar shadow-1 border rounded-3">
                  <div class="widget">
                     <p class="grettings">Welcome, Maria Carey</p>
                     <nav class="dashboard-nav">
                        <ul class="list-unstyled nav">
                           <li><a class="nav-link" href="{{ route('dashboard') }}"><i
                                    class="feather-icon icon-home"></i><span>Dashboard</span></a></li>
                           <li><a class="nav-link" href="{{ route('profile') }}"><i
                                    class="feather-icon icon-user"></i><span>My
                                    Profile</span></a></li>
                           <li><a class="nav-link" href="{{ route('enrolled') }}"><i
                                    class="feather-icon icon-book-open"></i><span>Enrolled
                                    Courses</span></a>
                           </li>
                           <li><a class="nav-link" href="{{ route('whishlists') }}"><i
                                    class="feather-icon icon-gift"></i><span>Wishlist</span></a></li>

                           <li><a class="nav-link" href="{{ route('streview') }}"><i
                                    class="feather-icon icon-star"></i><span>Reviews</span></a>
                           </li>

                           <li><a class="nav-link" href="{{ route('anounced') }}"><i
                                    class="feather-icon icon-box"></i><span>My
                                    Quiz Attempts</span></a>
                           </li>
                             <li><a class="nav-link active" href="{{ route('assigned') }}"><i
                                    class="feather-icon icon-briefcase"></i><span>Assignments</span></a></li>
                           <li><a class="nav-link" href="{{ route('orderlist') }}"><i
                                    class="feather-icon icon-shopping-bag"></i><span>Order
                                    History</span></a></li>
                        </ul>
                     </nav>
                  </div>
             
                  <div class="widget">
                     <p class="grettings">User</p>
                     <nav class="dashboard-nav">
                        <ul class="list-unstyled nav">
                           <li><a class="nav-link" href="{{ route('stusettings') }}"><i
                                    class="feather-icon icon-settings"></i><span>Settings</span></a></li>
                               <li>
                                       <form action="{{ route('logout') }}" method="POST">
                                           @csrf
                                           <button type="submit" class="nav-link" style="border: none; background: none; cursor: pointer;">
                                               <i class="feather-icon icon-log-out"></i><span>Logout</span>
                                           </button>
                                       </form>
                                   </li>
                        </ul>
                     </nav>
                  </div><!--  Widget End -->
               </aside>
            </div>
            <div class="col-lg-9 ps-lg-4">
               <section class="dashboard-sec">
                  <h2 class="display-5 border-bottom pb-3 mb-4">Assignments</h2>
                  <div class="row announce-filter bg-light rounded-2 px-3 py-4 mx-0 mb-5">
         
           <div class="col-lg-6">
                        <div class="text-uppercase small fw-bold">Courses</div>
                        <select name="course" id="select-course">
                           <option value="all">All</option>
                            @foreach($courses as $course)
                              <option value="{{ $course->exp_name }}">{{ $course->exp_name }}</option>
                        @endforeach
                        </select>
                     </div>
                     <div class="col-lg-3">
                        <div class="text-uppercase small fw-bold">Sort by</div>
                        <select name="course" id="product-select" class="form-select">
                           <option value="default">Default</option>
                           <option value="latest">Latest</option>
                           <option value="older">Older</option>
                        </select>
                     </div>

                  </div>
                  <div class="row">
                     <div class="col-12">
                        <table class="table table-responsive" id="assignment-table">
                           <thead>
                              <tr>
                                 <th>Date</th>
                                 <th>Assignment Name</th>
                                 <th> Total Marks</th>
                                 <th> Earn Marks</th>
                                 <th>Deadline</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="assignment-table">         
                         <!-- Table Row -->
                         @foreach($assignments as $assignment)
                        <tr data-course="{{ strtolower(trim($assignment->exp_name)) }}">
                      <td>
                        <span class="display-6">
                           {{ date('M d, Y', strtotime($assignment->assigned_date)) }}
                        </span>
                        <p class="mb-0 small">
                           {{ date('h:i A', strtotime($assignment->assigned_date)) }}
                        </p>
                     </td>
                           <td>
                              <span class="display-6">{{ $assignment->course_name }}</span>
                              <p class="mb-0 small">Course: {{ $assignment->exp_name }}</p>
                           </td>
                           <td>{{ $assignment->total_marks }}</td>
                           <td>{{ $assignment->earned_marks }}</td>
                          <td>
                                 <span class="deadline-timer text-success" 
                                       data-deadline="{{ $assignment->deadline }}" 
                                       id="deadline-{{ $assignment->id }}">        
                                 </span>
                              </td>
                           <td>
                              <!-- Submit Button -->
                              <div class="d-flex justify-content-between">
                              
                           <button type="button" 
   class="btn btn-primary shadow submit-btn" 
   data-bs-toggle="modal" 
   data-bs-target="#uploadModal" 
   data-expname="{{ $assignment->course_name }}"
   data-student="{{ Auth::user()->name }}">
   Submit
</button>

                              </div>
                           </td>
                        </tr>
                     @endforeach


                 

                   {{-- Modal data fetch script --}}

                    

               <!--Assignment submission Modal -->
                  <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 shadow-lg rounded-4">
                           
                           <!-- Modal Header -->
                           <div class="modal-header bg-primary text-white rounded-top-4">
                              <h5 class="modal-title fw-bold" id="uploadModalLabel">
                                 <i class="feather-icon icon-upload me-2"></i> Upload Assignment
                              </h5>
                              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           
                           <!-- Modal Body -->
                           <div class="modal-body p-4">
                              <form id="assignmentForm" action="{{ route('assignments.store') }}" method="POST" enctype="multipart/form-data">
                               @csrf

                        <div class="mb-3">
                           <label for="studentName" class="form-label fw-semibold">Student Name</label>
                           <input type="text" id="studentName" name="name" class="form-control form-control-lg" value="{{ Auth::user()->name }}" readonly>
                        </div>  

                        <div class="mb-3">
                           <label for="experimentName" class="form-label fw-semibold">Experiment Name</label>
                           <input type="text" id="experimentName" name="course_name" class="form-control form-control-lg" value="" readonly>
                        </div>                                                          

                        <div class="mb-3">
                           <label for="dateTime" class="form-label fw-semibold">Date & Time</label>
                           <input type="text" id="dateTime" name="submission_date" class="form-control form-control-lg" value="" readonly>
                        </div>

                        <div class="mb-3">
                           <label for="fileUpload" class="form-label fw-semibold">Choose File</label>
                           <input class="form-control form-control-lg" type="file" id="fileUpload" name="assignment_file" required>
                           <small class="text-muted">Accepted formats: PDF, JPG, PNG, WEBP</small>
                        </div>
                     </form>
                     </div>
                           
                      <!-- Modal Footer -->
<div class="modal-footer bg-light rounded-bottom-4">
   <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
   <button type="submit" form="assignmentForm" class="btn btn-success px-4 shadow">
      <i class="feather-icon icon-check-circle me-2"></i> Upload
   </button>
</div>
                        </div>
                     </div>
                  </div>
              </tbody>
          </table>
          {{-- Emty message --}}
<div id="empty-message" class="text-center fw-bold text-danger mt-3" style="display:none;">
    Assignment not given. You are lucky !
</div>
       </div>
   </section>
</div>
 </div>
      </div>
   </div>
   <!-- Dashboard Cover End -->
@endsection
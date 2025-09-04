@extends('layouts.user')

@section('title', 'Assignment')

@section('user_content')
<div class="dashbaord-promo position-relative"></div>
   <!-- Dashboard Cover Start -->
   <div class="dashbaord-cover bg-shade sec-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 position-relative">
               <div class="dash-cover-bg rounded-3" style="background-image: url('images/student_bg.jpg');"></div>
               <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
                  <div class="ava-wrap d-flex align-items-center">
                     <div class="avatar me-3 rounded-circle"><img width="150" src="images/avatar.png"
                           class="rounded-circle" alt="Avatar"></div>
                     <div class="ava-info">
                        <h4 class="display-5 text-white mb-0">Maria Carey Mc.</h4>
                        <div class="ava-meta text-white mt-1">
                           <span><img width="20" src="images/icons/star.png" alt="">4.8 </span>
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
                           <option value="1">All</option>
                           <option value="1">Web Development</option>
                           <option value="1">Graphic Design</option>
                           <option value="1">Ui/Ux Design</option>
                           <option value="1">App Development</option>
                           <option value="1">Enlish Learning</option>
                        </select>
                     </div>
                     <div class="col-lg-3">
                        <div class="text-uppercase small fw-bold">Sort by</div>
                        <select name="course" id="product-select">
                           <option value="1">Default</option>
                           <option value="1">Latest</option>
                           <option value="1">Popularity</option>
                           <option value="1">Trending</option>
                           <option value="1">Price (Low to High)</option>
                           <option value="1">Price (High to Low)</option>
                        </select>
                     </div>
                     <div class="col-lg-3">
                        <div class="text-uppercase small fw-bold">Price</div>
                        <select name="course" id="select-price">
                           <option value="1">Free</option>
                           <option value="1">Paid</option>
                           <option value="1">Subscription</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <table class="table table-responsive">
                           <thead>
                              <tr>
                                 <th>Date</th>
                                 <th>Assignment Name</th>
                                 <th> Total Marks</th>
                                 <th>Deadline</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>         
                         <!-- Table Row -->
                        <tr>
                           <td>
                              <span class="display-6">Sep 12, 2024</span>
                              <p class="mb-0 small">10.00am</p>
                           </td>
                           <td>
                              <span class="display-6">Python Programming</span>
                              <p class="mb-0 small">Course: Fundamentals 101</p>
                           </td>
                           <td>80</td>
                           <td>2</td>
                           <td>
                              <!-- Submit Button -->
                              <div class="d-flex justify-content-between">
                                 <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                    <i class="feather-icon icon-send"></i> Submit
                                 </button>
                              </div>
                           </td>
                        </tr>

               <!-- Modal -->
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
                              <form>
                                 <div class="mb-3">
                                    <label for="courseName" class="form-label fw-semibold">Course</label>
                                    <input type="text" id="courseName" class="form-control form-control-lg" value="Python Programming - Fundamentals 101" readonly>
                                 </div>
                                 <div class="mb-3">
                                    <label for="dateTime" class="form-label fw-semibold">Date & Time</label>
                                    <input type="text" id="dateTime" class="form-control form-control-lg" value="Sep 12, 2024 - 10.00am" readonly>
                                 </div>
                                 <div class="mb-3">
                                    <label for="fileUpload" class="form-label fw-semibold">Choose File</label>
                                    <input class="form-control form-control-lg" type="file" id="fileUpload">
                                    <small class="text-muted">Accepted formats: PDF, JPG, Png</small>
                                 </div>
                              </form>
                           </div>
                           
                           <!-- Modal Footer -->
                           <div class="modal-footer bg-light rounded-bottom-4">
                              <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-success px-4 shadow">
                                 <i class="feather-icon icon-check-circle me-2"></i> Upload
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
              </tbody>
          </table>
       </div>
   </section>
            </div>
         </div>
      </div>
   </div>
   <!-- Dashboard Cover End -->
@endsection
@extends('layouts.user')

@section('title', 'Course Enrollment')

@section('user_content')
<div class="dashbaord-promo position-relative"></div>
<!-- Dashboard Cover Start -->
<div class="dashbaord-cover bg-shade sec-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 position-relative">
            <div class="dash-cover-bg rounded-3" style="background-image: url('{{ asset('/') }}frontend/assets/images/student_bg.jpg');"></div>
            <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
               <div class="ava-wrap d-flex align-items-center">
                  <div class="avatar me-3 rounded-circle"><img width="150" src="images/avatar.png"
                        class="rounded-circle" alt="Avatar"></div>
                  <div class="ava-info">
                     <h4 class="display-5 text-white mb-0">Maria Carey Mc.</h4>
                     <div class="ava-meta text-white mt-1">
                        <span><i class="feather-icon icon-book"></i> 6 Courses Enrolled </span>
                        <span><i class="feather-icon icon-award"></i>3 cerficates</span>
                     </div>
                  </div>
               </div>
               <a href="courses.html" class="btn btn-sm btn-info rounded-5"><i
                     class="feather-icon icon-plus me-2"></i>Join New Course</a>
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
                        <li><a class="nav-link active" href="{{ route('enrolled') }}"><i
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
            <section class="dashboard-sec course-dash">
               <h2 class="display-5 border-bottom pb-3 mb-4">Enrolled Courses</h2>
               <div class="course-tab">
                  <ul class="nav" id="myTab" role="tablist">
                     <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                           role="tab" aria-controls="home" aria-selected="true">Enrolled
                           Courses</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                           role="tab" aria-controls="profile" aria-selected="false"> Active
                           Courses</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                           role="tab" aria-controls="contact" aria-selected="false">Complete
                           Courses</button>
                     </li>
                  </ul>
               </div>
               <div class="tab-content inner-sec" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel">
                     <div class="row g-4">
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course1.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">The Complete Python Bootcamp Canada</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">75% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course2.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Graphic design concepts Masterclass</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">75% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course3.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Unlocking Python and Machine Learning</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">25% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course4.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Proggramming Python and Machine Learning</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">25% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course5.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Digital Marketing Success - online visibility</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">25% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course6.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Graphic design concepts Masterclass</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">25% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-lg-12">
                           <div class="pager text-center my-3">
                              <a href="#" class="next-btn"> <i class="feather-icon icon-arrow-left"></i>
                              </a>
                              <span class="current">1</span>
                              <a href="#">2</a>
                              <a href="#">3</a>
                              <a href="#" class="prev-btn"> <i class="feather-icon icon-arrow-right"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div> <!-- Tab Pane End -->
                  <div class="tab-pane fade" id="profile" role="tabpanel">
                     <div class="row g-4">
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course1.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">The Complete Python Bootcamp Canada</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">75% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course2.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Graphic design concepts Masterclass</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">75% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course3.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Unlocking Python and Machine Learning</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">25% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                     </div>
                  </div> <!-- Tab Pane End -->
                  <div class="tab-pane fade" id="contact" role="tabpanel">
                     <div class="row g-4">
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course5.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">The Complete Python Bootcamp Canada</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">75% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course2.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Graphic design concepts Masterclass</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">75% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                        <div class="col-xl-4 col-sm-6">
                           <div class="course-entry-3 card rounded-2 border shadow-1">
                              <div class="card-media position-relative">
                                 <a href="single-course.html"><img class="card-img-top" src="images/course3.jpg" alt="Course"></a>
            
                              </div>
                              <div class="card-body p-3">
                                 <div class="d-flex justify-content-between align-items-center small">
                                    <div class="d-flex align-items-center small">
                                       <div class="ratings me-2">
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                          <a href="#"><img src="images/icons/star.png" alt=""></a>
                                       </div>
                                       <span class="rating-count">(15)</span>
                                    </div>
                                    <span><i class="feather-icon icon-users me-1"></i> 16 students</span>
                                 </div>
                                 <h3 class="sub-title my-3">
                                    <a href="single-course.html">Unlocking Python and Machine Learning</a>
                                 </h3>
                                 <div class="single-progress mb-4 position-relative">
                                    <h6>Complete</h6>
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                       <span class="progress-number">25% Done</span>
                                    </div>
                                 </div>
                                 <a href="#" class="btn btn-sm btn-outline-primary w-100">Download Certificate</a>
                              </div>
                           </div>
                        </div> <!-- Single Entry End -->
                     </div>
                  </div> <!-- Tab Pane End -->
               </div>
            </section>
         </div>
      </div>
   </div>
</div>
<!-- Dashboard Cover End -->
@endsection
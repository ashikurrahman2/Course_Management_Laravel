@extends('layouts.user')

@section('title', 'Whishlist')

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
                  <div class="avatar me-3 rounded-circle"><img width="150" src="{{ asset('/') }}frontend/assets/images/avatar.png"
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
                     class="feather-icon icon-plus me-2"></i>Join New
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
                        <li><a class="nav-link active" href="{{ route('whishlists') }}"><i
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
               <h2 class="display-5 border-bottom pb-3 mb-4">Wishlist</h2>
               <div class="row g-4">
                  <div class="col-xl-4 col-sm-6">
                     <div class="course-entry-3 card rounded-2 bg-info border shadow-1">
                        <div class="card-media position-relative">
                           <a href="single-course.html"><img class="card-img-top" src="images/course1.jpg"
                                 alt="Course"></a>

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
                              <a href="single-course.html">The Complete Python Bootcamp 2024</a>
                           </h3>
                           <div class="course-footer d-flex align-items-center justify-content-between pt-3">
                              <div class="price">$20.00<del>$35.00</del></div>
                              <a href="#">Enroll Now <i class="feather-icon icon-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div> <!-- Single Entry End -->
                  <div class="col-xl-4 col-sm-6">
                     <div class="course-entry-3 card rounded-2 bg-info border shadow-1">
                        <div class="card-media position-relative">
                           <a href="single-course.html"><img class="card-img-top" src="images/course2.jpg"
                                 alt="Course"></a>

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
                           <div class="course-footer d-flex align-items-center justify-content-between pt-3">
                              <div class="price">$20.00<del>$35.00</del></div>
                              <a href="#">Enroll Now <i class="feather-icon icon-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div> <!-- Single Entry End -->
                  <div class="col-xl-4 col-sm-6">
                     <div class="course-entry-3 card rounded-2 bg-info border shadow-1">
                        <div class="card-media position-relative">
                           <a href="single-course.html"><img class="card-img-top" src="images/course3.jpg"
                                 alt="Course"></a>

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
                           <div class="course-footer d-flex align-items-center justify-content-between pt-3">
                              <div class="price">$20.00<del>$35.00</del></div>
                              <a href="#">Enroll Now <i class="feather-icon icon-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div> <!-- Single Entry End -->
                  <div class="col-xl-4 col-sm-6">
                     <div class="course-entry-3 card rounded-2 bg-info border shadow-1">
                        <div class="card-media position-relative">
                           <a href="single-course.html"><img class="card-img-top" src="images/course4.jpg"
                                 alt="Course"></a>

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
                           <div class="course-footer d-flex align-items-center justify-content-between pt-3">
                              <div class="price">$20.00<del>$35.00</del></div>
                              <a href="#">Enroll Now <i class="feather-icon icon-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div> <!-- Single Entry End -->
                  <div class="col-xl-4 col-sm-6">
                     <div class="course-entry-3 card rounded-2 bg-info border shadow-1">
                        <div class="card-media position-relative">
                           <a href="single-course.html"><img class="card-img-top" src="images/course6.jpg"
                                 alt="Course"></a>

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
                           <div class="course-footer d-flex align-items-center justify-content-between pt-3">
                              <div class="price">$20.00<del>$35.00</del></div>
                              <a href="#">Enroll Now <i class="feather-icon icon-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div> <!-- Single Entry End -->
                  <div class="col-xl-4 col-sm-6">
                     <div class="course-entry-3 card rounded-2 bg-info border shadow-1">
                        <div class="card-media position-relative">
                           <a href="single-course.html"><img class="card-img-top" src="images/course5.jpg"
                                 alt="Course"></a>
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
                           <div class="course-footer d-flex align-items-center justify-content-between pt-3">
                              <div class="price">$20.00<del>$35.00</del></div>
                              <a href="#">Enroll Now <i class="feather-icon icon-arrow-right"></i></a>
                           </div>
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
            </section>
         </div>
      </div>
   </div>
</div>
<!-- Dashboard Cover End -->

@endsection
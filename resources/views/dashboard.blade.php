@extends('layouts.user')
@section('title', 'Dashboard')
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
                  <p class="grettings">Welcome, {{ auth()->user()->name }}</p>
                  <nav class="dashboard-nav">
                     <ul class="list-unstyled nav">
                        <li><a class="nav-link active" href="{{ route('dashboard') }}"><i
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

                        <li><a class="nav-link" href="{{ route('whishlists') }}"><i class="feather-icon icon-star"></i><span>Reviews</span></a>
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
            <section class="dashbaord-sec">
               <h3 class="widget-title mb-4">Dashboard</h3>
               <div class="row g-4">
                  <div class="col-lg-4">
                     <div class="stat-counter d-flex align-items-center shadow-1 rounded-3">
                        <div class="stat-info">
                           <h4 class="display-4 fw-bold mb-0"><span data-purecounter-start="0"
                                 data-purecounter-end="15" class="purecounter">15</span></h4>
                           <p>Enrolled Courses</p>
                        </div>
                        <span class="icon-lg shadow-sm ms-auto rounded-circle"><img src="images/icons/book-lg.svg"
                              alt=""></span>
                     </div>
                  </div>
                  {{-- <div class="col-lg-4">
                     <div class="stat-counter d-flex align-items-center shadow-1 rounded-3">
                        <div class="stat-info">
                           <h4 class="display-4 fw-bold mb-0"><span data-purecounter-start="0"
                                 data-purecounter-end="24" class="purecounter">24</span>K</h4>
                           <p>Enrolled Students</p>
                        </div>
                        <span class="icon-lg shadow-sm ms-auto rounded-circle"><img src="images/icons/art.svg"
                              alt=""></span>
                     </div>
                  </div> --}}
                  {{-- <div class="col-lg-4">
                     <div class="stat-counter d-flex align-items-center shadow-1 rounded-3">
                        <div class="stat-info">
                           <h4 class="display-4 fw-bold mb-0"><span data-purecounter-start="0"
                                 data-purecounter-end="2860" class="purecounter">2860</span>$</h4>
                           <p>Total Earnings</p>
                        </div>
                        <span class="icon-lg shadow-sm ms-auto rounded-circle"><img src="images/icons/calculator.svg"
                              alt=""></span>
                     </div>
                  </div> --}}
                  <div class="col-lg-4">
                     <div class="stat-counter d-flex align-items-center shadow-1 rounded-3">
                        <div class="stat-info">
                           <h4 class="display-4 fw-bold mb-0"><span data-purecounter-start="0"
                                 data-purecounter-end="9" class="purecounter">9</span></h4>
                           <p>Active Courses</p>
                        </div>
                        <span class="icon-lg shadow-sm ms-auto rounded-circle"><img src="images/icons/bulb-lg.svg"
                              alt=""></span>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="stat-counter d-flex align-items-center shadow-1 rounded-3">
                        <div class="stat-info">
                           <h4 class="display-4 fw-bold mb-0"><span data-purecounter-start="0"
                                 data-purecounter-end="27" class="purecounter">27</span>+</h4>
                           <p>Global Leader</p>
                        </div>
                        <span class="icon-lg shadow-sm ms-auto rounded-circle"><img src="images/icons/learning.png"
                              alt=""></span>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="stat-counter d-flex align-items-center shadow-1 rounded-3">
                        <div class="stat-info">
                           <h4 class="display-4 fw-bold mb-0"><span data-purecounter-start="0"
                                 data-purecounter-end="15" class="purecounter">15</span>+</h4>
                           <p>Assignments</p>
                        </div>
                        <span class="icon-lg shadow-sm ms-auto rounded-circle"><img
                              src="images/icons/graduate-lg.svg" alt=""></span>
                     </div>
                  </div>
               </div>
            </section> <!-- Dashboard Sec End -->
           
         </div>
      </div>
   </div>
</div>
<!-- Dashboard Cover End -->

@endsection
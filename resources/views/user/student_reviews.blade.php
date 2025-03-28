@extends('layouts.user')

@section('title', 'Reviews')

@section('user_content')
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


                           <li><a class="nav-link active" href="{{ route('streview') }}"><i
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
               <section class="dashboard-sec">
                  <h2 class="display-5 border-bottom pb-3 mb-4">Reviews</h2>
                  <div class="course-tab">
                     <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                           <button class="nav-link active" id="received-tab" data-bs-toggle="tab"
                              data-bs-target="#received" type="button" role="tab" aria-controls="received"
                              aria-selected="true">Received (11)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button class="nav-link" id="given-tab" data-bs-toggle="tab" data-bs-target="#given"
                              type="button" role="tab" aria-controls="given" aria-selected="false" tabindex="-1">Given
                              (3)</button>
                        </li>
                     </ul>
                  </div>

                  <div class="tab-content">
                     <div class="tab-pane fade active show" id="received" role="tabpanel"
                        aria-labelledby="received-tab">
                        <table class="table table-responsive">
                           <thead>
                              <tr>
                                 <th>Student</th>
                                 <th>Date</th>
                                 <th>Feedback</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td> <img class="me-2" width="40" src="images/avatar2.png" alt=""> Mark Hidden</td>
                                 <td>February 10, 2024</td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                    </div>
                                    <small>Excellent Course, very helpfull..</small>
                                    <div class="display-6">Course: <a href="single-course-2.html"
                                          class="text-reset fw-light">JavaScript for Begginer to
                                          Advance</a></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <img class="me-2 rounded-circle" width="40" src="images/avatar2.png" alt=""> Jinia Hidden</td>
                                 <td>February 10, 2024</td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                    </div>
                                    <small>Excellent Course, very helpfull..</small>
                                    <div class="display-6">Course: <a href="single-course-2.html"
                                          class="text-reset fw-light">JavaScript for Begginer to
                                          Advance</a></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <img class="me-2 rounded-circle" width="40" src="images/ava-sm2.jpg" alt=""> Maria Joe</td>
                                 <td>February 10, 2024</td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                    </div>
                                    <small>Excellent Course, very helpfull..</small>
                                    <div class="display-6">Course: <a href="single-course-2.html"
                                          class="text-reset fw-light">JavaScript for Begginer to
                                          Advance</a></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td><img class="me-2 rounded-circle" width="40" src="images/ava-sm2.jpg" alt=""> Maria Joe</td>
                                 <td>February 10, 2024</td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                    </div>
                                    <small>Excellent Course, very helpfull..</small>
                                    <div class="display-6">Course: <a href="single-course-2.html"
                                          class="text-reset fw-light">JavaScript for Begginer to
                                          Advance</a></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <img class="me-2 rounded-circle" width="40" src="images/ava-sm2.jpg" alt=""> Maria Joe</td>
                                 <td>February 10, 2024</td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                    </div>
                                    <small>Excellent Course, very helpfull..</small>
                                    <div class="display-6">Course: <a href="single-course-2.html"
                                          class="text-reset fw-light">JavaScript for Begginer to
                                          Advance</a></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <img class="me-2 rounded-circle" width="40" src="images/ava-sm2.jpg" alt=""> Maria Joe</td>
                                 <td>February 10, 2024</td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                    </div>
                                    <small>Excellent Course, very helpfull..</small>
                                    <div class="display-6">Course: <a href="single-course-2.html"
                                          class="text-reset fw-light">JavaScript for Begginer to
                                          Advance</a></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <img class="me-2 rounded-circle" width="40" src="images/ava-sm2.jpg" alt=""> Maria Joe</td>
                                 <td>February 10, 2024</td>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                    </div>
                                    <small>Excellent Course, very helpfull..</small>
                                    <div class="display-6">Course: <a href="single-course-2.html"
                                          class="text-reset fw-light">JavaScript for Begginer to
                                          Advance</a></div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="tab-pane fade" id="given" role="tabpanel" aria-labelledby="given-tab">
                        <table class="table table-responsive">
                           <thead>
                              <tr>
                                 <th>Course Title</th>
                                 <th>Review</th>
                                 <th>&nbsp;</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td> <span class="display-6 d-lg-block">Course:</span> <a href="single-course-2.html"
                                       class="text-reset">Speaking English for
                                       Beginners</a></td>

                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                       <span> (9 Reviews)</span>
                                    </div>

                                 </td>
                                 <td>
                                    <div class="course-action d-flex justify-content-center gap-3">
                                       <a href="#"><i class="feather-icon icon-edit"></i> Edit</a>
                                       <a href="#"><i class="feather-icon icon-trash-2"></i> Delete</a>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <span class="display-6 d-lg-block">Course:</span> <a href="single-course-2.html"
                                       class="text-reset">JavaScript for Begginer to Advance</a></td>

                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                       <span> (9 Reviews)</span>
                                    </div>

                                 </td>
                                 <td>
                                    <div class="course-action d-flex justify-content-center gap-3">
                                       <a href="#"><i class="feather-icon icon-edit"></i> Edit</a>
                                       <a href="#"><i class="feather-icon icon-trash-2"></i> Delete</a>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <span class="display-6 d-lg-block">Course:</span> <a href="single-course-2.html"
                                       class="text-reset">JavaScript for Begginer to Advance</a></td>

                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                       <span> (9 Reviews)</span>
                                    </div>

                                 </td>
                                 <td>
                                    <div class="course-action d-flex justify-content-center gap-3">
                                       <a href="#"><i class="feather-icon icon-edit"></i> Edit</a>
                                       <a href="#"><i class="feather-icon icon-trash-2"></i> Delete</a>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <span class="display-6 d-lg-block">Course:</span> <a href="single-course-2.html"
                                       class="text-reset">JavaScript for Begginer to Advance</a></td>

                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                       <span> (9 Reviews)</span>
                                    </div>

                                 </td>
                                 <td>
                                    <div class="course-action d-flex justify-content-center gap-3">
                                       <a href="#"><i class="feather-icon icon-edit"></i> Edit</a>
                                       <a href="#"><i class="feather-icon icon-trash-2"></i> Delete</a>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td> <span class="display-6 d-lg-block">Course:</span> <a href="single-course-2.html"
                                       class="text-reset">JavaScript for Begginer to Advance</a></td>

                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="ratings me-2">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                          <img src="images/icons/star.png" alt="">
                                       </div>
                                       <span> (9 Reviews)</span>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="course-action d-flex justify-content-center gap-3">
                                       <a href="#"><i class="feather-icon icon-edit"></i> Edit</a>
                                       <a href="#"><i class="feather-icon icon-trash-2"></i> Delete</a>
                                    </div>
                                 </td>
                              </tr>

                           </tbody>
                        </table>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </div>
   <!-- Dashboard Cover End -->
@endsection
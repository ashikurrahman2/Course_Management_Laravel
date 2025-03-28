@extends('layouts.user')

@section('title', 'Anouncements')

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
                           <span><i class="feather-icon icon-book"></i> 6 Courses Enrolled </span>
                           <span><i class="feather-icon icon-award"></i>3 cerficates</span>
                        </div>
                     </div>
                  </div>
                  <a href="courses.html" class="btn btn-sm btn-info rounded-5"><i class="feather-icon icon-plus me-2"></i>Join New
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

                           <li><a class="nav-link active" href="{{ route('anounced') }}"><i
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
                  <h2 class="display-5 border-bottom pb-3 mb-4">My Quiz Attempts</h2>
                  <table class="table table-responsive">
                     <thead>
                        <tr>
                           <th>Quiz</th>
                           <th>Qus</th>
                           <th>TM</th>
                           <th>CA</th>
                           <th>Result</th>
                           <th>&nbsp;</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <p>20 Sep, 2024</p>
                              <a href="single-course.html" class="text-reset display-6">The Ultimate Game Chnage Ai</a>
                              <p>Student: <span class="mute">Richard Eme</span></p>
                           </td>
                           <td>
                              4
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              <div class="badge bg-success">Pass</div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-between">
                                 <a href="#" title="Edit"><i class="feather-icon icon-edit"></i></a>
                                 <a href="#" title="Delete"><i class="feather-icon icon-trash-2"></i></a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <p>20 Sep, 2024</p>
                              <a href="single-course.html" class="text-reset display-6">The Ultimate Game Chnage Ai</a>
                              <p>Student: <span class="mute">Richard Eme</span></p>
                           </td>
                           <td>
                              4
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              <div class="badge bg-danger">Fail</div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-between">
                                 <a href="#" title="Edit"><i class="feather-icon icon-edit"></i></a>
                                 <a href="#" title="Delete"><i class="feather-icon icon-trash-2"></i></a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <p>20 Sep, 2024</p>
                              <a href="single-course.html" class="text-reset display-6">The Ultimate Game Chnage Ai</a>
                              <p>Student: <span class="mute">Richard Eme</span></p>
                           </td>
                           <td>
                              4
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              <div class="badge bg-success">Pass</div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-between">
                                 <a href="#" title="Edit"><i class="feather-icon icon-edit"></i></a>
                                 <a href="#" title="Delete"><i class="feather-icon icon-trash-2"></i></a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <p>20 Sep, 2024</p>
                              <a href="single-course.html" class="text-reset display-6">The Ultimate Game Chnage Ai</a>
                              <p>Student: <span class="mute">Richard Eme</span></p>
                           </td>
                           <td>
                              4
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              <div class="badge bg-danger">Fail</div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-between">
                                 <a href="#" title="Edit"><i class="feather-icon icon-edit"></i></a>
                                 <a href="#" title="Delete"><i class="feather-icon icon-trash-2"></i></a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <p>20 Sep, 2024</p>
                              <a href="single-course.html" class="text-reset display-6">The Ultimate Game Chnage Ai</a>
                              <p>Student: <span class="mute">Richard Eme</span></p>
                           </td>
                           <td>
                              4
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              <div class="badge bg-success">Pass</div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-between">
                                 <a href="#" title="Edit"><i class="feather-icon icon-edit"></i></a>
                                 <a href="#" title="Delete"><i class="feather-icon icon-trash-2"></i></a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <p>20 Sep, 2024</p>
                              <a href="single-course.html" class="text-reset display-6">The Ultimate Game Chnage Ai</a>
                              <p>Student: <span class="mute">Richard Eme</span></p>
                           </td>
                           <td>
                              4
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              7
                           </td>
                           <td>
                              <div class="badge bg-success">Fail</div>
                           </td>
                           <td>
                              <div class="d-flex justify-content-between">
                                 <a href="#" title="Edit"><i class="feather-icon icon-edit"></i></a>
                                 <a href="#" title="Delete"><i class="feather-icon icon-trash-2"></i></a>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </section>
            </div>
         </div>
      </div>
   </div>
   <!-- Dashboard Cover End -->
@endsection
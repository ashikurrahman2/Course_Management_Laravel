 <!-- Header Start -->
 <header class="header header-3">
    <div class="sticky-height"></div>

    <!-- Navigation Menu Start -->
    <div class="header-nav-wrapper header-sticky">
      <nav class="navbar navbar-expand-xl border-bottom">
        <div class="container-fluid px-lg-5 px-3">
          <a class="navbar-brand" href="index.html"><img src="{{ asset('/') }}frontend/assets/images/logo.png" alt="Logo" /></a>
          <div
            class="header-actions d-none d-sm-flex position-relative order-xl-3 d-flex align-items-center justify-content-between">
            <div class="category-search d-none d-md-block">
              <form action="#" class="d-flex">
                <div class="d-flex align-items-center">
                  <span class="ms-2"><img src="{{ asset('/') }}frontend/assets/images/icons/list.svg" alt="List" /></span>
                  <select name="category-search" id="select-category">
                    <option value="1">Lifestyle & Beauty</option>
                    <option value="2">Finance & Accounting</option>
                    <option value="3">Health & Fitness</option>
                    <option value="4">Digital Marketing</option>
                    <option value="5">Office Productivity</option>
                    <option value="6">Design</option>
                  </select>
                </div>
                <div class="search-group position-relative">
                  <input type="text" placeholder="Search For . . ." />
                  <button type="submit" class="position-absolute border-0 bg-transparent text-mute">
                    <i class="feather-icon icon-search"></i>
                  </button>
                </div>
              </form>
            </div>
            <a href="cart.html" class="text-reset position-relative icon">
              <i class="feather-icon icon-shopping-bag"></i>
              <div class="cart-num">3</div>
           </a>
            <!-- Category Search End -->
            @auth
            <a class="text-reset icon border rounded-2 admin-user" data-bs-toggle="collapse" href="#collapseAdminMenu"
              role="button" aria-expanded="false" aria-controls="collapseAdminMenu">
              <i class="feather-icon icon-user"></i>
            </a>

            <div class="admin-menu pt-3 bg-white collapse" id="collapseAdminMenu">
              <div class="d-flex avatar border-bottom pb-3">
                <img class="img-fluid border rounded-circle" src="{{ asset('/') }}frontend/assets/images/ava-sm1.jpg" width="50" alt="avatar" />
                <div class="grettings ps-3">
                  <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                  <small>Founder</small>
                </div>
              </div>

              <nav class="dashboard-nav mt-1">
                <ul class="list-unstyled nav">
                  <li>
                    <a class="nav-link" href="{{ route('dashboard') }}"><i
                        class="feather-icon icon-home"></i><span>Dashboard</span></a>
                  </li>
                  <li>
                    <a class="nav-link" href="instructor-profile.html"><i class="feather-icon icon-user"></i><span>My
                        Profile</span></a>
                  </li>
                  <li>
                    <a class="nav-link" href="instructor-enrolled-courses.html"><i
                        class="feather-icon icon-book-open"></i><span>Enrolled Courses</span></a>
                  </li>
                  <li>
                    <a class="nav-link" href="instructor-wishlist.html"><i
                        class="feather-icon icon-gift"></i><span>Wishlist</span></a>
                  </li>

                  <li>
                    <a class="nav-link" href="instructor-reviews.html"><i
                        class="feather-icon icon-star"></i><span>Reviews</span></a>
                  </li>

                  <li>
                    <a class="nav-link" href="instructor-my-quiz-attempts.html"><i
                        class="feather-icon icon-box"></i><span>My Quiz Attempts</span></a>
                  </li>
                  <li>
                    <a class="nav-link" href="instructor-order-history.html"><i
                        class="feather-icon icon-shopping-bag"></i><span>Order History</span></a>
                  </li>
                  <li class="border-bottom"></li>
                  <li>
                    <a class="nav-link active" href="instructor-courses.html"><i
                        class="feather-icon icon-book"></i><span>My Courses</span></a>
                  </li>
                  <li>
                    <a class="nav-link" href="instructor-assignments.html"><i
                        class="feather-icon icon-briefcase"></i><span>Assignments</span></a>
                  </li>
                  <li>
                    <a class="nav-link" href="instructor-quiz-attemps.html"><i
                        class="feather-icon icon-cpu"></i><span>Quiz Attempts</span></a>
                  </li>
                  <li>
                    <a class="nav-link" href="instructor-announcements.html"><i
                        class="feather-icon icon-bell"></i><span>Announcements</span></a>
                  </li>
                  <li class="border-bottom"></li>
                  <li>
                    <a class="nav-link" href="instructor-settings.html"><i
                        class="feather-icon icon-settings"></i><span>Settings</span></a>
                  </li>
                  <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent">
                            <i class="feather-icon icon-log-out"></i><span>Logout</span>
                        </button>
                    </form>
                </li>
                
                </ul>
              </nav>
            </div>
            @endauth
            {{-- <a href="{{ route('login') }}" class="btn d-none d-sm-block btn-primary shadow border-0 rounded-2">Enroll Now</a> --}}
            @guest
          <a href="{{ route('login') }}" class="btn d-none d-sm-block btn-primary shadow border-0 rounded-2">Enroll Now</a>
          @endguest
          </div>
          <button class="navbar-toggler offcanvas-nav-btn" type="button">
            <span class="feather-icon icon-menu"></span>
          </button>
          <div class="offcanvas bg-info offcanvas-start offcanvas-nav">
            <div class="offcanvas-header">
              <a href="index.html" class="text-inverse">
                <img src="{{ asset('/') }}frontend/assets/images/logo.png" alt="Logo" /></a>
              <button type="button" class="btn-close bg-primary" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0 align-items-center">
              {{-- Home page --}}
              <ul class="navbar-nav mx-auto align-items-lg-center">
                <li class="nav-item dropdown">
                  <a href="/" 
                    aria-expanded="false">Home</a>
              
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">Courses</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('course') }}">All Courses</a></li>
                    <li><a class="dropdown-item" href="{{ route('courselist') }}">Courses List</a></li>
                    <li><a class="dropdown-item" href="lesson.html">Course Lesson</a></li>
                  </ul>
                </li>
          
                <li class="nav-item dropdown dropdown-fullwidth">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">Pages</a>
                  <div class="dropdown-menu">
                    <div class="row row-cols-xl-4 row-cols-1">
                      <div class="col">
                        <div>
                          <div>
                            <div class="dropdown-header">Get Started</div>
                            <a class="dropdown-item" href="about.html">About Us</a>
                            <a class="dropdown-item" href="event-grid.html">Event Grid</a>
                            <a class="dropdown-item" href="event-list.html">Event List</a>
                            <a class="dropdown-item" href="event-sidebar.html">Event Sidebar</a>
                            <a class="dropdown-item" href="single-event.html">Event Details</a>
                            <a class="dropdown-item" href="pricing.html">Pricing Plan</a>
                            <a class="dropdown-item" href="admission-guide.html">Admision Guide</a>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div>
                          <div class="dropdown-header">Get Started</div>
                          <a class="dropdown-item" href="contact.html">Contact Us</a>
                          <a class="dropdown-item" href="instructors.html">Instructors</a>
                          <a class="dropdown-item" href="profile.html">Profile</a>
                          <a class="dropdown-item" href="become-instructor.html">Become a instructor</a>
                          <a class="dropdown-item" href="faq.html">FAQ</a>
                          <a class="dropdown-item" href="404.html">404 error</a>
                          <a class="dropdown-item" href="comming-soon.html">Maintenance</a>
                        </div>
                      </div>
                      <div class="col">
                        <div class="mt-3 mt-lg-0">
                          <div>
                            <div class="dropdown-header">Shop Pages</div>
                            <a class="dropdown-item" href="shop.html">Shop</a>
                            <a class="dropdown-item" href="single-product.html">Single Product</a>
                            <a class="dropdown-item" href="cart.html">Cart</a>
                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                            <a class="dropdown-item" href="my-account.html">My Account</a>
                            <a class="dropdown-item" href="login.html">Login</a>
                            <a class="dropdown-item" href="signup.html">Register</a>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="mt-3 mt-lg-0">
                          <a href="login.html" class="banner-ads d-flex justify-content-between">
                            <div class="b-content">
                              <h5>Online Learning Platform</h5>
                              <span class="badge-lg bg-primary text-small mt-2">All Courses</span>
                            </div>
                            <img src="images/banner-ads.png" alt="" class="img-fluid banner-img" />
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">Blog</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                    <li><a class="dropdown-item" href="blog-grid.html">Blog Grid</a></li>
                    <li><a class="dropdown-item" href="blog-list-sidebar.html">Blog List</a></li>
                    <li><a class="dropdown-item" href="blog-standard.html">Blog Standard</a></li>
                    <li><a class="dropdown-item" href="single-post.html">Single Post</a></li>
                    <li><a class="dropdown-item" href="single-post-fullwidth.html">Single Post FullWidth</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- Header End -->
@extends('layouts.app')

@section('title', 'Course List')

@section('content')

 <!-- Promo Section Start -->
   <section class="promo-sec" style="background: url('{{ asset('/') }}frontend/images/promo-bg.jpg')no-repeat center center / cover;">
      <img src="{{ asset('/') }}frontend/images/promo-left.png" alt="" class="anim-img">
      <img src="{{ asset('/') }}frontend/images/promo-right.png" alt="" class="anim-img anim-right">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
               <h1 class="display-2 text-white">Courses List</h1>
               <nav aria-label="breadcrumb mt-0">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Courses List</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <!-- Promo Section End -->

  <!-- Courses Section Start -->
   <section class="courses-sec sec-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 order-2 order-lg-1">
               <aside class="sidebar sidebar-spacing">
                  <div class="widget">
                     <h3 class="display-5">Categories</h3>
                     <div class="widget-inner border rounded-3 p-4 mt-4">
                        <ul>
                           <li>
                              <input id="art" class="checkbox-custom" name="checkbox-3" type="checkbox">
                              <label for="art" class="checkbox-custom-label">Art & Design</label>
                              <span class="count">(12)</span>
                           </li>
                           <li>
                              <input id="dev" class="checkbox-custom" name="checkbox-3" type="checkbox">
                              <label for="dev" class="checkbox-custom-label">Technology</label>
                              <span class="count">(10)</span>
                           </li>
                           <li>
                              <input id="info" class="checkbox-custom" name="checkbox-3" type="checkbox">
                              <label for="info" class="checkbox-custom-label">Development</label>
                              <span class="count">(09)</span>
                           </li>
                           <li>
                              <input id="checkbox-3" class="checkbox-custom" name="checkbox-3" type="checkbox">
                              <label for="checkbox-3" class="checkbox-custom-label">Development</label>
                              <span class="count">(12)</span>
                           </li>
                        </ul>
                     </div>
                  </div> <!-- Widget End -->
                  <div class="widget">
                     <h3 class="display-5">Instructor</h3>
                     <div class="widget-inner border rounded-3 p-4 mt-4">
                        <ul>
                           <li>
                              <input id="michle" class="checkbox-custom" name="michle" type="checkbox">
                              <label for="michle" class="checkbox-custom-label">Michle John</label>
                              <span class="count">(11)</span>
                           </li>
                           <li>
                              <input id="harnold" class="checkbox-custom" name="harnold" type="checkbox">
                              <label for="harnold" class="checkbox-custom-label">Harnnold</label>
                              <span class="count">(07)</span>
                           </li>
                           <li>
                              <input id="arnold" class="checkbox-custom" name="arnold" type="checkbox">
                              <label for="arnold" class="checkbox-custom-label">Mc. Arnold</label>
                              <span class="count">(19)</span>
                           </li>
                        </ul>
                     </div>
                  </div> <!-- Widget End -->
                  <div class="widget">
                     <h3 class="display-5"> Ratings </h3>
                     <div class="widget-inner border rounded-3 p-4 mt-4">
                        <div class="widget">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault"
                                 id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault1">
                                 <div class="ratings">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                 </div>
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault"
                                 id="flexRadioDefault2">
                              <label class="form-check-label" for="flexRadioDefault2">
                                 <div class="ratings">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                 </div>
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="rate4">
                              <label class="form-check-label" for="rate4">
                                 <div class="ratings">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                 </div>
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flex4">
                              <label class="form-check-label" for="flex4">
                                 <div class="ratings">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                 </div>
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flex5">
                              <label class="form-check-label" for="flex5">
                                 <div class="ratings">
                                    <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                    <img src="images/icons/star-nil.png" alt="Rating">
                                 </div>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div> <!-- Widget End -->
                  <div class="widget">
                     <h3 class="display-5">Price</h3>
                     <div class="widget-inner border rounded-3 p-4 mt-4">
                        <ul>
                           <li>
                              <input id="all" class="checkbox-custom" name="all" type="checkbox">
                              <label for="all" class="checkbox-custom-label">All</label>
                              <span class="count">(15)</span>
                           </li>
                           <li>
                              <input id="free" class="checkbox-custom" name="free" type="checkbox">
                              <label for="free" class="checkbox-custom-label">Free</label>
                              <span class="count">(02)</span>
                           </li>
                           <li>
                              <input id="paid" class="checkbox-custom" name="paid" type="checkbox">
                              <label for="paid" class="checkbox-custom-label">Paid</label>
                              <span class="count">(13)</span>
                           </li>
                        </ul>
                     </div>
                  </div> <!-- Widget End -->
                  <div class="widget">
                     <h3 class="display-5">Level</h3>
                     <div class="widget-inner border rounded-3 p-4 mt-4">
                        <ul>
                           <li>
                              <input id="all-1" class="checkbox-custom" name="all-1" type="checkbox">
                              <label for="all-1" class="checkbox-custom-label">All Level</label>
                              <span class="count">(15)</span>
                           </li>
                           <li>
                              <input id="begin" class="checkbox-custom" name="begin" type="checkbox">
                              <label for="begin" class="checkbox-custom-label">Beginner</label>
                              <span class="count">(02)</span>
                           </li>
                           <li>
                              <input id="inter" class="checkbox-custom" name="inter" type="checkbox">
                              <label for="inter" class="checkbox-custom-label">Intermediate</label>
                              <span class="count">(10)</span>
                           </li>
                           <li>
                              <input id="expert" class="checkbox-custom" name="expert" type="checkbox">
                              <label for="expert" class="checkbox-custom-label">Expert</label>
                              <span class="count">(08)</span>
                           </li>
                        </ul>
                     </div>
                  </div> <!-- Widget End -->
                  <div class="widget">
                     <h3 class="display-5">Video Duration</h3>
                     <div class="widget-inner border rounded-3 p-4 mt-4">
                        <ul>
                           <li>
                              <input id="hour-1" class="checkbox-custom" name="hour-1" type="checkbox">
                              <label for="hour-1" class="checkbox-custom-label">0-1 Hour</label>
                              <span class="count">(02)</span>
                           </li>
                           <li>
                              <input id="hour-5" class="checkbox-custom" name="hour-5" type="checkbox">
                              <label for="hour-5" class="checkbox-custom-label">1-5 Hours</label>
                              <span class="count">(02)</span>
                           </li>
                           <li>
                              <input id="hour-10" class="checkbox-custom" name="hour-10" type="checkbox">
                              <label for="hour-10" class="checkbox-custom-label">5-10 Hours</label>
                              <span class="count">(9)</span>
                           </li>
                           <li>
                              <input id="hour-15" class="checkbox-custom" name="hour-15" type="checkbox">
                              <label for="hour-15" class="checkbox-custom-label">15+ Hours</label>
                              <span class="count">(12)</span>
                           </li>
                        </ul>
                     </div>
                  </div> <!-- Widget End -->
               </aside>
            </div>
            <div class="col-lg-8 order-1 order-lg-1">
               <div class="course-filters d-flex justify-content-between align-items-center">
                  <div class="result d-sm-flex align-items-center">
                    <p class="m-0">Showing Result: {{ $courses->firstItem() }}-{{ $courses->lastItem() }} of {{ $courses->total() }} results</p>
                  </div>
                  <div class="filter d-flex align-items-center">
                     <select id="product-select" name="shop-result">
                        <option value="latest">Sort By: Latest</option>
                        <option value="popular">Sort By: Popular</option>
                        <option value="rated">Sort By: Rated</option>
                        <option value="low-price">High to Low</option>
                        <option value="high-price">Low to High</option>
                     </select>

                     <div class="d-none d-sm-flex ms-3">
                        <a href="{{ route('course') }}" class="icon border rounded-1 bg-primary me-3 text-white"><i
                              class="feather-icon icon-grid"></i></a>
                        <a href="{{ route('courselist') }}" class="icon border rounded-1 bg-secondary text-white"><i
                              class="feather-icon icon-list"></i></a>
                     </div>
                  </div>
               </div> <!-- Course Filter End -->
              <div class="course-lists row gy-4 mt-3">
                @foreach($courses as $course)
                <div class="col-lg-12" data-aos="fade" data-aos-delay="100">
                    <div class="course-entry-3 card-list rounded-2 bg-white border">
                        <div class="card-media position-relative">
                            <a href="single-course.html">
                            <img class="card-img-top" src="{{ asset($course->course_image) }}" alt="Course">
                            </a>
                            <a href="#" class="action-wishlist position-absolute text-white icon-xs rounded-circle">
                            <img src="{{ asset('/') }}frontend/images/icons/heart-fill.svg" alt="Wishlist">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="course-meta d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('/') }}frontend/images/icons/star.png" alt="">
                                <strong>4.5</strong>
                                <span class="rating-count">(1k reviews)</span>
                            </div>
                            <span><i class="feather-icon icon-video me-2"></i>25 hours 22m</span>
                            <span class="lead">
                                <a href="#" class="text-reset"><i class="feather-icon icon-bookmark"></i></a>
                            </span>
                            </div>
                            <h3 class="sub-title mb-0">
                            <a href="single-course.html">{{ $course->course_title }}</a>
                            </h3>
                            <div class="author-meta small d-flex pt-2 justify-content-between align-items-center mb-3">
                            <span>By: <a href="#" class="text-reset">{{ $course->course_teacher }}</a></span>
                            <span>12,580 Students</span>
                            </div>
                            <div class="course-footer d-flex align-items-center justify-content-between pt-3">
                            <div class="price">$20.00<del>$35.00</del></div>
                            <a href="#">Enroll Now <i class="feather-icon icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

                 <!-- Pagination -->
               <div class="col-lg-12" data-aos="fade-in" data-aos-delay="200">
                 <div class="pager text-center mt-5">
                   {{ $courses->links('pagination::bootstrap-5') }}
                 </div>
               </div>

            </div>
         </div>
      </div>
   </section>
   <!-- Courses Section End -->

   <!-- Newsletter Section Start -->
   <section class="newsletter bg-primary">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-8">
               <span class="badge-lg bg-white text-primary rounded-5">Get Every Single Updates</span>
               <h2 class="display-2 fw-bold text-info">Subscribe <span class="color-info">Newsletter</span></h2>
            </div>
            <div class="col-lg-4">
               <div class="newsletter-form">
                  <form action="#">
                     <input class="form-control rounded-5 bg-info" type="email" placeholder="Email Address">
                     <button class="btn btn-secondary w-100 rounded-5 mt-4">Subscribe Newsletter</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Newsletter Section End -->
@endsection
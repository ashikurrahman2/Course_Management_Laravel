@extends('layouts.app')

@section('title','Home')

    <!-- Preloader -->
    <div id="preloader">
      <div class="preloader">
        <span></span>
        <span></span>
      </div>
    </div>
@section('content')
 <!-- Banner Section Start -->
 <section class="banner-3 position-relative overflow-hidden">
    <div class="container">
      <div class="row align-items-center">
        @foreach ($banners as $banner)
        <div class="col-xl-6 col-md-7 order-2 order-md-1">
          <div class="banner-content">
            <div class="banner-meta rounded-2 overflow-hidden text-dark fw-bold">
              <span><img src="{{ asset('/') }}frontend/assets/images/icons/open-book.svg" alt="" /></span>Learn Today – Lead Tomorrow
            </div>
            <h1>{{ $banner->title }}</h1>
            <p class="lead-sm my-4">
              {{ $banner->sub_title }}
            </p>
            <div class="banner-cta d-lg-flex align-items-center pt-4">
              <a href="{{ route('course') }}" class="btn btn-primary shadow">Browse Our Courses</a>
              <div class="d-flex ms-lg-5 ms-0 mt-4 mt-lg-0 align-items-center">
                <span class="icon-sm bg-secondary text-info rounded-circle me-3 shadow-alt"><img
                    src="{{ asset('/') }}frontend/assets/images/icons/phone.svg" alt="" /></span>
                <a href="tel:9282872" class="text-reset">
                  <h5>Call us Anytime</h5>
                  +884 (009) 672 739
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-5 order-1 order-md-2">
          <figure class="banner-media position-relative">
            <img src="{{ asset('/') }}frontend/assets/images/icons/anim-dots.png" alt="" class="anim-img" />
            <img src="{{ asset('/') }}frontend/assets/images/icons/scale.png" alt="" class="anim-img anim-right" />
            <img src="{{ asset('/') }}frontend/assets/images/banner-3.png" alt="Banner" class="img-fluid" />
          </figure>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Banner Section End -->

  <!-- Feature Section Start -->
  <section class="feature-sec bg-blue sec-padding">
    <div class="container">
      <div class="row gy-3">
        <div class="col-xl-4 col-md-4" data-aos="fade" data-aos-delay="200">
          <div class="feature-card rounded-3 d-lg-flex">
            <span class="icon rounded-2">
              <i class="feather-icon icon-layers"></i>
            </span>
            <div class="feature-txt">
              <h3 class="display-5 text-white">Search Options</h3>
              <p>Good education no matter how rich or poor, that is what we’re striving for the nation</p>
            </div>
          </div>
        </div>
        <!-- Feature Card -->
        <div class="col-xl-4 col-md-4" data-aos="fade" data-aos-delay="400">
          <div class="feature-card rounded-3 d-lg-flex">
            <span class="icon rounded-2">
              <i class="feather-icon icon-cpu"></i>
            </span>
            <div class="feature-txt">
              <h3 class="display-5 text-white">Progress Tracking</h3>
              <p>Good education no matter how rich or poor, that is what we’re striving for the nation</p>
            </div>
          </div>
        </div>
        <!-- Feature Card -->
        <div class="col-xl-4 col-md-4" data-aos="fade" data-aos-delay="600">
          <div class="feature-card rounded-3 d-lg-flex">
            <span class="icon rounded-2">
              <i class="feather-icon icon-aperture"></i>
            </span>
            <div class="feature-txt">
              <h3 class="display-5 text-white">Technical Support</h3>
              <p>Good education no matter how rich or poor, that is what we’re striving for the nation</p>
            </div>
          </div>
        </div>
        <!-- Feature Card -->
      </div>
    </div>
  </section>
  <!-- Feature Section End -->

  <!-- Category Section Start -->
  <section class="category-sec sec-padding">
    <div class="container">
      <div class="text-center sec-intro" data-aos="fade-up" data-aos-delay="200">
        <span class="badge-lg bg-primary rounded-5">Popular Categories</span>
        <h2 class="sec-title">Find Your <span class="color">Category</span></h2>
      </div>
      <div class="row row-cols-sm-2 row-cols-md-3 row-cols-xl-6 g-4">
        <!-- Category End -->
        @foreach ($courses as $course) 
        <a href="{{ route('course', $course->id) }}" class="category-entry2 text-center" data-aos="fade" data-aos-delay="300">
          <span class="cat-icon shadow-sm rounded-3">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
              <path
                d="M80 45.0214C80 41.7796 77.8938 39.0221 74.9786 38.0405V28.5313L78.5265 27.1121C80.4788 26.3373 80.478 23.5335 78.5265 22.7594L40.8658 7.69506C40.307 7.47144 39.6836 7.47144 39.1246 7.69506L1.4639 22.7594C-0.488359 23.5341 -0.487578 26.3379 1.4639 27.1121L19.8644 34.4722L17.5846 52.2555C17.4571 53.25 17.9763 54.2156 18.8764 54.6577C19.7766 55.0996 20.8579 54.9202 21.5671 54.2111C25.7198 50.0587 27.7358 51.4362 31.3958 53.9368C37.5804 58.5408 42.4214 58.5317 48.5947 53.9367C52.2546 51.4361 54.2708 50.0585 58.4235 54.2111C59.1325 54.9201 60.214 55.0998 61.1141 54.6577C62.0143 54.2158 62.5335 53.2502 62.406 52.2555L60.1262 34.4722L70.2905 30.4064V38.0404C63.8921 40.1981 63.5627 49.1861 69.7767 51.8094L65.339 69.5599C65.164 70.2602 65.3214 71.0021 65.7655 71.5709C66.2097 72.1399 66.8912 72.4725 67.613 72.4725H77.656C78.3778 72.4725 79.0592 72.1399 79.5035 71.5709C79.9476 71.002 80.105 70.2602 79.93 69.5599L75.4924 51.8095C78.1384 50.6914 80 48.0697 80 45.0214V45.0214ZM45.95 50.066C41.0972 53.578 38.8895 53.5747 34.0404 50.066C31.1881 48.1171 27.5339 45.6207 22.9111 47.5731L24.3602 36.2705L39.1246 42.1762C39.6835 42.3998 40.3068 42.3998 40.8658 42.1762L55.6302 36.2705L57.0791 47.5728C52.4569 45.6204 48.8024 48.1171 45.95 50.066ZM39.9952 37.4753L8.64585 24.9357L39.9951 12.3959L71.3444 24.9357L39.9952 37.4753ZM70.6151 67.7844L72.6344 59.7073L74.6537 67.7844H70.6151ZM72.6344 47.6987C71.1581 47.6987 69.9571 46.4976 69.9571 45.0214C70.0916 41.4744 75.1778 41.4753 75.3119 45.0214C75.3119 46.4976 74.1108 47.6987 72.6344 47.6987Z" />
            </svg>
          </span>
          <h4 class="display-6 mt-3">{{ $course->course_category }}</h4>
        </a>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Category Section End -->

  <!-- About Section Start -->
  <section class="about-sec2">
    <div class="container">
      <div class="row">
        @foreach($abouts as $about)
        <div class="col-xl-6 col-md-10 order-2 order-md-1">
          <div class="about-media position-relative me-lg-2 text-center mt-5 mt-sm-0">
            <div class="d-sm-flex gap-3 align-items-center mb-3">
              <img src="{{ asset($about->photo) }}" alt="" class="img-fluid about-thumb-1" />
              {{-- <img src="{{ asset('/') }}frontend/assets/images/ab3.jpg" alt="" class="img-fluid about-thumb-2 mt-3 mt-md-0" /> --}}
            </div>
            {{-- <img src="{{ asset('/') }}frontend/assets/images/ab2.jpg" alt="" class="img-fluid text-center" /> --}}
          </div>
        </div>
        <div class="col-xl-6 col-md-10 order-1 order-md-2">
          <div class="about-txt">
            <span class="badge-lg bg-primary rounded-5">About Us</span>
            <h2 class="sec-title position-relative">{{ $about->title }} <span class="color">Bright Future</span></h2>
            <div class="about-info d-sm-flex align-items-center">
              <div class="d-flex about-item align-items-center">
                <span class="icon icon-sm bg-light rounded-circle">
                  <img src="{{ asset('/') }}frontend/assets/images/icons/telescope.png"
                    alt="telescope" /></span>
                <div class="ms-3">
                  <h3 class="display-5">Education is a Human Right</h3>
                </div>
              </div>
              <div class="d-flex about-item align-items-center ms-lg-4">
                <span class="icon icon-sm bg-light rounded-circle"><img src="{{ asset('/') }}frontend/assets/images/icons/medal.png"
                    alt="Medal" /></span>
                <div class="ms-3">
                  <h3 class="display-5">Equal Education for Everyone</h3>
                </div>
              </div>
            </div>
            <div class="d-sm-flex justify-content-between about-lists">
              <div class="about-mission">
                <h3 class="display-4 mb-3">Our Mission</h3>
                <ul>
                  <li>{{ $about->our_mission }}</li>
                  {{-- <li>Free education for all</li>
                  <li>No child should be left behind</li> --}}
                </ul>
              </div>
              <div class="about-mission">
                <h3 class="display-4 mb-3">Our Vision</h3>
                <ul>
                  <li>{{ $about->our_vision }}</li>
                  {{-- <li>Only the educated are free</li>
                  <li>Education is the light of life</li> --}}
                </ul>
              </div>
            </div>
            <div class="d-sm-flex align-items-center mt-5">
              <a href="#" class="btn btn-primary shadow">Learn more us</a>
              <div class="d-flex ms-sm-5 align-items-center mt-4 mt-sm-0">
                <span class="icon-sm bg-secondary text-info rounded-circle me-3 shadow-alt"><img
                    src="images/icons/phone.svg" alt="" /></span>
                <a href="tel:9282872" class="text-reset">
                  <h5>Call us Anytime</h5>
                  +884 (009) 672 739
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- About Section End -->
@endsection
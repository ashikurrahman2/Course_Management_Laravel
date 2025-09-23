@extends('layouts.app')

@section('title', 'Instractor Details')

@section('content')
     <!-- Preloader -->
   <div id="preloader">
      <div class="preloader">
         <span></span>
         <span></span>
      </div>
   </div>

     <!-- Promo Section Start -->
   <section class="promo-sec" style="background: url('{{ asset('/') }}frontend/assets/images/promo-bg.jpg')no-repeat center center / cover;">
      <img src="{{ asset('/') }}frontend/assets/images/promo-left.png" alt="" class="anim-img">
      <img src="{{ asset('/') }}frontend/assets/images/promo-right.png" alt="" class="anim-img anim-right">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
               <h1 class="display-2 text-white">Matthew Johnson</h1>
               <nav aria-label="breadcrumb mt-0">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Instructor Details</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <!-- Promo Section End -->

   <!-- Instructor details Start -->
    <section class="single-instructor sec-padding pb-0">
      <div class="container">
         <div class="row">
            <div class="col-lg-4">
                          <figure class="ins-image">
                      <img src="{{ asset($instructor->instructor_image ?? 'frontend/assets/images/instructor.jpg') }}" 
                           alt="{{ $instructor->instructor_name }}" 
                           class="img-fluid">
                  </figure>
            </div>
            <div class="col-lg-8">
               <div class="instructor-details ps-lg-4">
                  <div class="ins-intro d-sm-flex justify-content-between align-items-baseline mb-4">
                     <div class="ins-intro">
                        <h2 class="display-3">{{ $instructor->instructor_name }}</h2>
                        <p>{{ $instructor->instructor_designation }}</p>
                     </div>
                     <div class="d-flex align-items-center">
                        <div class="ratings me-2">
                           <a href="#"><img src="images/icons/star.png" alt=""></a>
                           <a href="#"><img src="images/icons/star.png" alt=""></a>
                           <a href="#"><img src="images/icons/star.png" alt=""></a>
                           <a href="#"><img src="images/icons/star.png" alt=""></a>
                           <a href="#"><img src="images/icons/star.png" alt=""></a>
                        </div>
                        <span>(82) Reviews</span>
                     </div>
                  </div>
                  <h3 class="display-5 mb-4">About Me</h3>
                    @foreach($instructor->details as $detail)
                    <p>{{ $detail->about_me }}</p>
                  @endforeach
                  {{-- Instructor info --}}
              <div class="author-footer d-sm-flex justify-content-between my-5">
          <div class="author-info">
        <h3 class="display-5 mb-4">Get In Touch</h3>
        <div class="contact-lists">
            <ul class="list-unstyled">
                @foreach($instructor->details as $detail)
                    <li>
                        <span><i class="feather-icon icon-mail"></i></span>
                        <a class="text-reset" href="mailto:{{ $detail->email }}">
                            {{ $detail->email }}
                        </a>
                    </li>

                    <li>
                        <span><i class="feather-icon icon-phone"></i></span>
                        <a class="text-reset" href="tel:{{ $detail->phone }}">
                            {{ $detail->phone }}
                        </a>
                    </li>

                    <li>
                        <span><i class="feather-icon icon-map-pin"></i></span>
                        {{ $detail->address }}
                    </li>
                @endforeach
            </ul>
        </div>
            {{-- Social profile --}}
            <div class="social-share white mt-3">
            @foreach($instructor->details as $detail)
               @if(!empty($detail->twitter))
                     <a href="{{ $detail->twitter }}" target="_blank"><i class="feather-icon icon-twitter"></i></a>
               @endif
               @if(!empty($detail->facebook))
                     <a href="{{ $detail->facebook }}" target="_blank"><i class="feather-icon icon-facebook"></i></a>
               @endif
               @if(!empty($detail->linkedin))
                     <a href="{{ $detail->linkedin }}" target="_blank"><i class="feather-icon icon-linkedin"></i></a>
               @endif
            @endforeach
         </div>

    </div>

</div>

               </div>

            </div>
           
         </div>
        
   </section> 
   <!-- Instructor Details End -->
@endsection
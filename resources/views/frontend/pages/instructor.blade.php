@extends('layouts.app')

@section('title', 'Instractor')

@section('content')
   <!-- Preloader -->
   <div id="preloader">
      <div class="preloader">
         <span></span>
         <span></span>
      </div>
   </div>
   {{-- End preloader --}}

    <!-- Promo Section Start -->
    <section class="promo-sec" style="background: url('{{ asset('/') }}frontend/assets/images/promo-bg.jpg')no-repeat center center / cover;">
      <img src="{{ asset('/') }}frontend/assets/images/promo-left.png" alt="" class="anim-img">
      <img src="{{ asset('/') }}frontend/assets/images/promo-right.png" alt="" class="anim-img anim-right">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
               <h1 class="display-2 text-white">Instructors</h1>
               <nav aria-label="breadcrumb mt-0">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Instructors</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
    </section>
   <!-- Promo Section End -->

   <!-- Team Section Start -->
   <section class="team-sec bg-shade sec-padding position-relative">
      <div class="container">
         <div class="row justify-content-center g-3 g-lg-4">
            <div class="row">
             @foreach($instractor as $instructor)
            <div class="col-lg-4 col-md-6" data-aos="fade" data-aos-delay="200">
                  <div class="teacher-entry position-relative active" style="background-image: url('{{ asset($instructor->instructor_image) }}');">
                  <div class="teacher-info position-absolute p-3">
                     <div class="teacher-intro p-4 text-center">
                        <h3 class="display-4 mb-1"><a class="text-reset" href="{{ route('i.tructor.details', $instructor->id) }}">{{ $instructor->instructor_name }}
                              </a></h3>
                        <span class="designation">{{ $instructor->instructor_designation }}</span>
                     </div>
                  </div>
               </div> <!-- Teacher Entry End -->
            </div>
         @endforeach
          </div>
         </div>
      </div>
   </section>
   <!-- Team Section End -->
@endsection
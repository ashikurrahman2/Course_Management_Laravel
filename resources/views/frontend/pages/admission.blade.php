@extends('layouts.app')

@section('title', 'Admission Info')

@section('content')
      <!-- Promo Section Start -->
   <section class="promo-sec" style="background: url('images/promo-bg.jpg')no-repeat center center / cover;">
      <img src="images/promo-left.png" alt="" class="anim-img">
      <img src="images/promo-right.png" alt="" class="anim-img anim-right">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
               <h1 class="display-2 text-white">Admission Guide</h1>
               <nav aria-label="breadcrumb mt-0">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Admission Guide</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <!-- Promo Section End -->

   <!-- Admission Guide Section Start -->
@php
    // Last Admission Guide
    $guide = \App\Models\Admissionguide::latest()->first();
@endphp

@if($guide)
<section class="admission-guide sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="admission-media position-relative">
                    <img src="{{ $guide->guide_image ? asset($guide->guide_image) : asset('frontend/assets/images/admission.jpg') }}" 
                         alt="{{ $guide->guide_title }}" class="img-fluid rounded-3">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="choose-txt ps-5">
                    <h3 class="display-3 fw-bold mb-3">{{ $guide->guide_title }}</h3>
                    <p>{!! $guide->guide_content !!}</p>
                    @if($guide->close_admission && $guide->session)
                        <h6 class="blockquote">
                            We are closing the admission on 
                            {{ date('jS M, Y', strtotime($guide->close_admission)) }} ({{ $guide->session }} Session)
                        </h6>
                    @endif
                    @if($guide->closing_content)
                        <p>{!! $guide->closing_content !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

   <!-- Admission Guide Section End -->

   {{-- Admission requirement section --}}
   <section class="apply-process bg-shade pt-4 pb-5">
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
               <div class="apply-stat">
                  <h3 class="display-4 fw-bold mb-5">The Application Requirements</h3>
                  <ul>
                     <li>SSC/Equivalent and HSC/Equivalent minimum GPA 4</li>
                     <li>Candidates applying for EEE, ECE, CSE, APE and Physics</li>
                     <li>Candidates for BSc in Computer Science and BSc in Mathematics</li>
                     <li>Candidates who have qualified in HSC/A levels or recognized equivalent examination in current
                        year
                     </li>
                     <li>Candidates for BSc in Electronic & Communication Engineering and Electrical & Electronic
                        Engineering who had Physics and
                        Mathematics but not Chemistry in HSC/A-level/Equivalent</li>
                  </ul>
                  <a href="#" class="btn btn-primary rounded-5 mt-5">Apply for Graduation</a>
               </div>
            </div>
            <div class="col-lg-6 ps-5">
               <div class="row">
                  <div class="col-6">
                     <div class="card text-center p-5">
                        <span class="icon-lg mx-auto bg-secondary text-info rounded-circle mb-4"><i
                              class="feather-icon icon-phone"></i></span>
                        <h5>Call Us</h5>
                        <p><a class="text-reset" href="#">{{ $setting->phone_one }}</a></p>
                        <p><a class="text-reset" href="#">{{ $setting->phone_two }}</a></p>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="card text-center p-5">
                        <span class="icon-lg mx-auto bg-secondary text-info rounded-circle mb-4"><i
                              class="feather-icon icon-map-pin"></i></span>
                        <h5>Visit us</h5>
                        <p>{{ $setting->address }}</p>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </section>
@endsection
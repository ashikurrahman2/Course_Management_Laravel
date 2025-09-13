@extends('layouts.app')
@section('content')
   <!-- Promo Section Start -->
   <section class="promo-sec" style="background: url('images/promo-bg.jpg')no-repeat center center / cover;">
      <img src="images/promo-left.png" alt="" class="anim-img">
      <img src="images/promo-right.png" alt="" class="anim-img anim-right">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
               <h1 class="display-2 text-white">About Us</h1>
               <nav aria-label="breadcrumb mt-0">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">About us</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <!-- Promo Section End -->

   <!-- About Section Start -->
   <section class="about-sec sec-padding position-relative overflow-hidden">
      <div class="anim-img anim-right"><img src="{{asset('/')}}frontend/assets/images/icons/shape-plate.png" alt=""></div>
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-md-8">
               <div class="about-media overly">
                  <div class="category-entry active d-flex p-3 p-xl-4 align-items-center">
                     <span class="icon-lg rounded-circle">
                        <img src="{{asset('/')}}frontend/assets/images/icons/graduate.png" alt="">
                     </span>
                     <div class="cat-info ms-4">
                        <h3 class="display-3"><span data-purecounter-start="0" data-purecounter-end="8871"
                              class="purecounter">0</span>+</h3>
                        <small>Enrolled Students</small>
                     </div>
                  </div>
                  <div class="d-flex align-items-baseline justify-content-between">
                     <img class="img-fluid me-3" src="{{asset('/')}}frontend/assets/images/about-lg.jpg" alt="About Image">
                     {{-- <img class="img-fluid d-none d-sm-block" src="{{asset('/')}}frontend/assets/images/about-sm.jpg" alt="About Image"> --}}
                  </div>
               </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-md-8">
               <div class="about-txt">
                  <span class="badge-lg bg-primary rounded-5">About Us</span>
                  <h2 class="sec-title">We Makes a Door to <span class="color">Bright Future</span></h2>
                  <div class="about-lists mt-5">
                     <div class="d-flex about-item">
                        <span class="icon icon-sm bg-light rounded-circle "><img src="{{asset('/')}}frontend/assets/images/icons/pencil.png"
                              alt="pencil"></span>
                        <div class="ms-3">
                           <h3 class="display-5">Education is Power</h3>
                           <p>The cost of ignorance exceed that of education teaches us how to achieve success</p>
                        </div>
                     </div>
                     <div class="d-flex about-item">
                        <span class="icon icon-sm bg-light rounded-circle "><img src="{{asset('/')}}frontend/assets/images/icons/bulb.png"
                              alt="pencil"></span>
                        <div class="ms-3">
                           <h3 class="display-5">Knowledge for Life</h3>
                           <p>Education is smart enough to change the human mind positively your Door to The Future</p>
                        </div>
                     </div>
                     {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic doloremque sapiente reiciendis
                        consequuntur.</p> --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- About Section End -->
@endsection
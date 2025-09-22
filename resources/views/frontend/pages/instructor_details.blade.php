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
                  <img src="{{ asset('/') }}frontend/assets/images/instructor.jpg" alt="Maria Bennet" class="img-fluid">
               </figure>
            </div>
            <div class="col-lg-8">
               <div class="instructor-details ps-lg-4">
                  <div class="ins-intro d-sm-flex justify-content-between align-items-baseline mb-4">
                     <div class="ins-intro">
                        <h2 class="display-3">Joanna Doe</h2>
                        <p>Project Manager</p>
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
                  <p>One notable trend is the incorporation of recycled and locally sourced materials, reducing the
                     carbon footprint of
                     construction projects. From repurposed steel to reclaimed wood, builders are finding creative ways
                     to balance
                     functionality with environmental responsibility. Energy-efficient designs are also gaining
                     momentum, with architects and
                     engineers integrating.</p>
                  <div class="author-footer d-sm-flex justify-content-between my-5">
                     <div class="author-info">
                        <h3 class="display-5 mb-4">Get In Touch</h3>
                        <div class="contact-lists">
                           <ul class="list-unstyled">
                              <li><span><i class="feather-icon icon-mail"></i></span><a class="text-reset" href="https://html.theme-village.com/cdn-cgi/l/email-protection#92fbfcf4fdd2ebfde7e0f6fdfff3fbfcbcf1fdff"><span class="__cf_email__" data-cfemail="026b6c646d427b6d7770666d6f636b6c2c616d6f">[email&#160;protected]</span></a></li>
                              <li><span><i class="feather-icon icon-phone"></i></span><a class="text-reset"
                                    href="tel:120034509">(+68)
                                    120034509</a></li>
                              <li><span><i class="feather-icon icon-map-pin"></i></span>123 Evergreen Street, Maplewood
                                 City,Greenland 56789
                              </li>
                           </ul>
                        </div>
                        <div class="social-share white mt-3">
                           <a href="#"><i class="feather-icon icon-twitter"></i></a>
                           <a href="#"><i class="feather-icon icon-facebook"></i></a>
                           <a href="#"><i class="feather-icon icon-linkedin"></i></a>
                        </div>
                     </div>
                     <div class="author-awards">
                        <div class="row row-cols-sm-4 justify-content-center">
                           <div class="award-stat text-center border p-4">
                              <div class="stat-info">
                                 <div class="display-3">
                                    <span data-purecounter-start="0" data-purecounter-end="5"
                                       class="purecounter">5</span>
                                 </div>
                                 <p>Instructor Rating</p>
                              </div>
                           </div>
                           <div class="award-stat text-center border p-4">
                              <div class="stat-info">
                                 <div class="display-3">
                                    <span data-purecounter-start="0" data-purecounter-end="15"
                                       class="purecounter">15</span>
                                 </div>
                                 <p>Enrolled Courses</p>
                              </div>
                           </div>
                           <div class="award-stat text-center border p-4">
                              <div class="stat-info">
                                 <div class="display-3">
                                    <span data-purecounter-start="0" data-purecounter-end="40"
                                       class="purecounter">40</span>K
                                 </div>
                                 <p>Total Students</p>
                              </div>
                           </div>

                           <div class="award-stat text-center border p-4">
                              <div class="stat-info">
                                 <div class="display-3"><span data-purecounter-start="0" data-purecounter-end="248"
                                       class="purecounter">248</span>+</div>
                                 <p>Total Reviews</p>
                              </div>
                           </div>
                        </div>
                     </div> <!-- Author Award -->
                  </div>
               </div>

            </div>
         </div>
   </section>
   <!-- Instructor Details End -->
@endsection
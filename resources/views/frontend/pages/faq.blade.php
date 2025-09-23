@extends('layouts.app')

@section('title', 'FAQ')

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
            <h1 class="display-2 text-white">Frequently Asked Questions</h1>
            <nav aria-label="breadcrumb mt-0">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">FAQ</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</section>
<!-- Promo Section End -->

<!-- FAQ Section Start -->
<section class="faq-sec bg-shade sec-padding position-relative">
   <img src="{{ asset('/') }}frontend/assets/images/icons/telescope-lg.png" alt="" class="anim-img">
   <img src="{{ asset('/') }}frontend/assets/images/icons/certificate.png" alt="" class="anim-img anim-right bottom-0">
   <div class="container">
      <div class="sec-intro text-center">
         <span class="badge-lg bg-primary rounded-5">General Questions</span>
         <h2 class="sec-title">FAQ's</h2>
      </div>
      <div class="row">
         <div class="col-lg-8 mx-auto">
            <div class="accordion-1" id="accordionExample">
               @forelse($faqs as $faq)
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="heading{{ $faq->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                           {{ $faq->ques }}
                        </button>
                     </h2>
                     <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           {!! $faq->ans !!}
                        </div>
                     </div>
                  </div>
               @empty
                  <p class="text-center">No FAQs available at the moment.</p>
               @endforelse
            </div>
         </div>
      </div>
   </div>
</section>
<!-- FAQ Section End -->
@endsection

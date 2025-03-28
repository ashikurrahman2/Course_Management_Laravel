@extends('layouts.app')

@section('content')

<section class="featured portfolio bg-white-1 rec-pro">
    <div class="container-fluid">
        <div class="sec-title">
            <h2><span>আমাদের সম্পত্তি </span>সমূহ</h2>
            <p>আমরা প্রতিটি পদক্ষেপে সম্পূর্ণ পরিষেবা প্রদান করি।</p>
        </div>
        <div class="portfolio col-xl-12">
            <div class="slick-lancers">
                <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                    <div class="landscapes">
                        <div class="project-single">
                            @foreach ($sells as $property)
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <!-- homes img -->
                                    <a href="{{ route('property') }}" class="homes-img">
                                        <div class="homes-tag button alt featured">Featured</div>
                                        <div class="homes-tag button alt sale">{{ $property->property_action }}</div>
                                        <img src="{{asset($property->image)}}" alt="home-1" class="img-responsive">
                                        {{-- <img src="{{asset('/')}}frontend/assets/images/blog/b-11.jpg" alt="home-1" class="img-responsive"> --}}
                                    </a>
                                </div>
                                <div class="button-effect">
                                    <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                    <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                    <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                                <h3><a href="{{ route('property') }}">{{ $property->title }}</a></h3>
                                <p class="homes-address mb-3">
                                    <a href="#">
                                        <i class="fa fa-map-marker"></i><span>{{ $property->address }}</span>
                                    </a>
                                </p>
                                <!-- homes List -->
                                <ul class="homes-list clearfix">
                                    <li>
                                        {{-- <i class="fa fa-land" aria-hidden="true"></i> --}}
                                        <i class="fa fa-map" aria-hidden="true"></i>
                                        <span>{{ $property->category }} ক্যাটাগরি</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-road" aria-hidden="true"></i>
                                        <span>{{ $property->road }} রোড</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
        
                                        <span>{{ $property->bds }} বিডিএস / আরএসসিএস</span>
                                    </li>
                                </ul>
                                <div class="price-properties footer pt-3 pb-0">
                                    <h3 class="title mt-3">
                                        <a href="#">৳ {{ $property->price }}</a>
                                    </h3>
                                    <div class="compare">
                                        {{-- <a href="#" title="Compare">
                                            <i class="fas fa-exchange-alt"></i>
                                        </a>
                                        <a href="#" title="Share">
                                            <i class="fas fa-share-alt"></i>
                                        </a>
                                        <a href="#" title="Favorites">
                                            <i class="fa fa-heart-o"></i>
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

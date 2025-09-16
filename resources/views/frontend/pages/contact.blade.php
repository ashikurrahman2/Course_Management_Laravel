@extends('layouts.app')

@section('title', 'Contact')

@section('content')
	<!-- Promo Section Start -->
	<section class="promo-sec" style="background: url('images/promo-bg.jpg')no-repeat center center / cover;">
		<img src="images/promo-left.png" alt="" class="anim-img">
		<img src="images/promo-right.png" alt="" class="anim-img anim-right">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1 class="display-2 text-white">Contact Us</h1>
					<nav aria-label="breadcrumb mt-0">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Contact us</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- Promo Section End -->

	<section class="contact-card-sec sec-padding">
		<div class="container">
			<div class="row gy-3 gy-md-0">
				<div class="col-md-4" data-aos="fade" data-aos-delay="200">
					<div class="card bg-shade text-center">
						<span class="icon-lg mx-auto bg-secondary text-info rounded-circle mb-4"><i
								class="feather-icon icon-phone"></i></span>
						<h5>Call Us</h5>
						<p><a class="text-reset" href="{{ $setting->phone_one }}">{{ $setting->phone_one }}</a></p>
						<p><a class="text-reset" href="{{ $setting->phone_two }}">{{ $setting->phone_two }}</a></p>
					</div>
				</div>
				<div class="col-md-4" data-aos="fade" data-aos-delay="400">
					<div class="card bg-shade text-center">
						<span class="icon-lg mx-auto bg-secondary text-info rounded-circle mb-4"><i
								class="feather-icon icon-mail"></i></span>
						<h5>Email Us</h5>
						<ul>
							<li><a class="text-reset" href="#"><span class="__cf_email__" data-cfemail="b6cfd9c3c4dbd7dfdaf6d1dbd7dfda98d5d9db">{{ $setting->main_email }}</span>
								</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4" data-aos="fade" data-aos-delay="600">
					<div class="card bg-shade text-center">
						<span class="icon-lg mx-auto bg-secondary text-info rounded-circle mb-4"><i
								class="feather-icon icon-map-pin"></i></span>
						<h5>Locations</h5>
						<p>{{ $setting->address }}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact Section End -->


	<!-- Contact Section Start -->
	<section class="contact2-sec sec-padding pt-0">
		<div class="offcanvas-overly"></div>
		<div class="container">
			<div class="text-center mb-5 pb-4" data-aos="fade-up" data-aos-delay="200">
				<h2 class="sec-title mb-1">Contact with Us</h2>
				<p>We are here to answer any question you may have any time.</p>
			</div>
			<div class="row">
				<div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="300">
					<div class="contact-form">
						<form id="contact-form" class="row" method="POST" action="https://html.theme-village.com/eduxo/demo/mail.php">
							<div class="col-lg-6 form-group">
								<i class="feather-icon icon-user"></i>
								<input class="form-control" name="name" type="text" placeholder="Name" required>
							</div>
							<div class="col-lg-6 form-group">
								<i class="feather-icon icon-mail"></i>
								<input class="form-control" name="email" type="email" placeholder="Email Address" required>
							</div>
							<div class="col-lg-6 form-group">
								<i class="feather-icon icon-pocket"></i>
								<input class="form-control" type="text" name="subject" placeholder="Your Subject" required>
							</div>
							<div class="col-lg-6 form-group">
								<i class="feather-icon icon-phone-call"></i>
								<input class="form-control" type="text" name="phone" placeholder="Phone Number" required>
							</div>
							<div class="col-lg-12 form-group">
								<textarea class="form-control" name="message" id="message" rows="6"
									placeholder="Enter your message" required></textarea>
							</div>
							<div class="col-lg-12 text-center">
								<button type="submit" class="btn btn-primary rounded-5 mt-4">Submit Now</button>
							</div>
						</form>
						<!-- Contact Form Start-->
						<div class="open-popup rounded-3">
							<div class="icon">
								<i class="feather-icon icon-check"></i>
							</div>
							<h2>Success</h2>
							<p>Thank You! Your message has been sent.</p>
							<div class="close_popup_btn">
								<button class="btn btn-primary rounded-5">Okey</button>
							</div>
						</div>
						<!-- Contact Form Message End -->
					</div><!-- Contact Form End -->
				</div>
			</div>
		</div>
	</section>
	<!-- Contact Section End -->


	<!-- Google Map Section End -->
@php
    // যদি setting table এ address থাকে, use it, otherwise default
    $address = urlencode($setting->address ?? 'Dhaka, Bangladesh');
@endphp

<iframe class="google-map"
    src="https://www.google.com/maps?q={{ $address }}&output=embed"
    style="width:100%; height:450px; border-radius:10px; border:0;"
    allowfullscreen
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
</iframe>
	<!-- Google Map Section End -->
@endsection
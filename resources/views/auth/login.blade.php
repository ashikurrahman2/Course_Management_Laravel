<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="apple-touch-icon" href="{{ asset('/') }}frontend/assets/images/favicon.png" />
    <link rel="shortcut icon" href="{{ asset('/') }}frontend/assets/images/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/feather.css" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/aos.css" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/nice-select2.css" />
    <link href="{{ asset('/') }}frontend/assets/css/glightbox.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/swiper-bundle.min.css" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css" />
  </head>
  <body>
  <!-- SignUp Section Start -->
	<section class="signup-sec full-screen">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-5 col-md-5">
					<div class="signup-thumb">
						<img class="img-fluid" src="{{ asset('/') }}frontend/assets/images/shape-bg.png" alt="Sign Up">
					</div>
				</div>
				<div class="col-xl-7 col-md-7">
					<div class="login-form">
						<h1 class="display-3 text-center mb-5">Let’s Sign In Eduxo</h1>
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="form-group position-relative">
								<span><i class="feather-icon icon-mail"></i></span>
								<input type="email" placeholder="Your Email" name="email" required value="{{ old('email') }}">
								@error('email')
								<small class="text-danger">{{ $message }}</small>
							@enderror					
							</div>
							<div class="form-group position-relative">
								<span><i class="feather-icon icon-lock"></i></span>
								<input type="password" placeholder="Password" name="password" required>
								@error('password')
								<small class="text-danger">{{ $message }}</small>
							@enderror
							</div>
							<button class="btn btn-primary w-100">Sign In</button>
							@if (session('status'))
							<div class="text-danger mt-2">{{ session('status') }}</div>
						@endif
							<div class="form-footer mt-4 text-center">
								<div class="d-flex justify-content-between">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="logged-in">
										<label class="form-check-label" for="logged-in">Stay Logged In</label>
									</div>
									<a href="#" class="text-reset">Forget Password?</a>
								</div>
								<div class="alter overly"><p>OR</p></div>
								<a href="#" class="btn border w-100"><img src="images/icons/facebook.png" alt=""> Continue with Facebook</a>
								<a href="#" class="btn border w-100"><img src="images/icons/google.png" alt="">Continue with Google</a>

								<p>Don't have account? <a href="{{ route('register') }}" class="text-primary fw-bold">Sign Up Now</a></p>

							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- SignUp Section End -->

   <!--Javascript
========================================================-->
<script src="{{ asset('/') }}frontend/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/swiper-bundle.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/nice-select2.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/glightbox.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/purecounter_vanilla.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/plyr.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/lenis.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/aos.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/custom.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"91e1aed55ac11d40","version":"2025.1.0","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"389fa74406c44f21b129709ce8a3ec16","b":1}' crossorigin="anonymous"></script>
  </body>
</html>

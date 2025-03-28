<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
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
						<img class="img-fluid" src="{{ asset('/') }}frontend/assets/images/signup-2.png" alt="Sign Up">
					</div>
				</div>
				<div class="col-xl-7 col-md-7">
					<div class="signup-form">
						<h1 class="display-3 text-center mb-5">Let’s Sign Up Eduxo</h1>
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="form-group position-relative">
								<span><i class="feather-icon icon-user"></i></span>
								<input type="text" placeholder="Your Name" name="name" required>
							</div>
							<div class="form-group position-relative">
								<span><i class="feather-icon icon-mail"></i></span>
								<input type="email" placeholder="Your Email" name="email" required>
							</div>
							<div class="form-group position-relative">
								<span><i class="feather-icon icon-lock"></i></span>
								<input type="password" placeholder="Password" name="password" required>
							</div>
{{-- 
              <div class="form-group position-relative">
								<span><i class="feather-icon icon-lock"></i></span>
								<input type="password" placeholder="Confarm Password" name="password_confirmation" required>
							</div> --}}

							<button class="btn btn-primary w-100">Sign Up</button>
							<div class="form-footer mt-4 text-center">
								<div class="alter overly">
									<p>OR</p>
								</div>

								<a href="#" class="btn border w-100"><img src="{{ asset('/') }}frontend/assets/images/icons/google.png" alt="">Signup with
									Google</a>

								<p>Already have account? <a href="{{ route('login') }}" class="text-primary fw-bold">Login Now</a></p>

							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- SignUp Section End -->
  </body>
</html>

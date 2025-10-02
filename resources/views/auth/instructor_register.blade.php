<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <section class="container py-5">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="card shadow rounded-4 p-4">
               <h3 class="text-center mb-4">Instructor Registration</h3>

               <!-- Validation Errors -->
               @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif

               <form action="{{ route('instructor.register.submit') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                     <label for="full_name" class="form-label">Full Name</label>
                     <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Email Address</label>
                     <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                  </div>
                  <div class="mb-3">
                     <label for="phone" class="form-label">Phone Number</label>
                     <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                  </div>
                  <div class="mb-3">
                     <label for="password" class="form-label">Password</label>
                     <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                  {{-- <div class="mb-3">
                     <label for="password_confirmation" class="form-label">Confirm Password</label>
                     <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                  </div> --}}
                  <div class="mb-3">
                     <label for="bio" class="form-label">Bio</label>
                     <textarea class="form-control" id="bio" name="bio" rows="4">{{ old('bio') }}</textarea>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary rounded-pill px-5">Register Now</button>
                  </div>
               </form>
               <p class="text-center mt-3">
                   Already have an account? <a href="{{ route('instructor.login') }}">Login Here</a>
               </p>
            </div>
         </div>
      </div>
   </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

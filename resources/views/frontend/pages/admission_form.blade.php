@extends('layouts.app')

@section('title', 'Online Admission')

@section('content')
  <div class="container my-5">
    <div class="card shadow-lg rounded-4">
      <div class="card-header text-center bg-success text-white">
        <h3 class="mb-0">🎓 Online Course Admission Form</h3>
        <small>Fill out the form below to apply for admission</small>
      </div>
      <div class="card-body p-4">
        <form action="#" method="post" enctype="multipart/form-data">

          <!-- Full Name -->
          <div class="mb-3">
            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
          </div>

          <!-- Phone -->
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="+8801XXXXXXXXX" required>
          </div>

          <!-- Gender -->
          <div class="mb-3">
            <label class="form-label">Gender <span class="text-danger">*</span></label>
            <select class="form-select" name="gender" required>
              <option value="" selected disabled>Choose...</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="others">Others</option>
            </select>
          </div>

          <!-- Course Selection -->
          <div class="mb-3">
            <label for="course" class="form-label">Select Course <span class="text-danger">*</span></label>
            <select class="form-select" id="course" name="course" required>
              <option value="" selected disabled>Choose a course...</option>
              <option value="web">Web Development</option>
              <option value="uiux">UI/UX Design</option>
              <option value="ds">Data Science</option>
              <option value="ml">Machine Learning</option>
            </select>
          </div>

          <!-- Address -->
          <div class="mb-3">
            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
          </div>

<div class="mb-3">
  <label for="district" class="form-label">District <span class="text-danger">*</span></label>
<select class="form-select" id="district" name="district" required>
    <option value="" selected disabled>Loading districts...</option>
</select>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch("{{ url('/districts') }}")
    .then(res => res.json())
    .then(data => {
        let select = document.getElementById("district");
        select.innerHTML = '<option value="" disabled selected>Select your district</option>';
        data.districts.forEach(d => {
            let opt = document.createElement("option");
            opt.value = d.toLowerCase();
            opt.textContent = d;
            select.appendChild(opt);
        });
    })
    .catch(err => {
        console.error("Failed to load districts:", err);
        let select = document.getElementById("district");
        select.innerHTML = '<option value="" disabled selected>Failed to load districts</option>';
    });
});
</script>


          <!-- File Upload -->
          <div class="mb-3">
            <label for="photo" class="form-label">Upload Photo <span class="text-danger">*</span></label>
            <input class="form-control" type="file" id="photo" name="photo" accept="image/*" required>
          </div>

          <!-- Submit -->
          <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection
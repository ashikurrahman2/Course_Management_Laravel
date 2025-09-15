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

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <form action="{{ route('submit.form') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Full Name -->
        <div class="mb-3">
          <label class="form-label">Full Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="stu_name" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label">Email Address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="stu_email" required>
        </div>

        <!-- Phone -->
        <div class="mb-3">
          <label class="form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="tel" class="form-control" name="stu_phone" required>
        </div>

        <!-- Gender -->
        <div class="mb-3">
          <label class="form-label">Gender <span class="text-danger">*</span></label>
          <select class="form-select" name="stu_gender" required>
            <option value="" disabled selected>Choose...</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="others">Others</option>
          </select>
        </div>

        <!-- Course -->
        <div class="mb-3">
          <label class="form-label">Select Course <span class="text-danger">*</span></label>
          <select class="form-select" name="stu_course" required>
          <option disabled selected>Choose a course...</option>
                     @foreach($categories as $category)
              <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
            @endforeach
          </select>
        </div>

        <!-- Address -->
        <div class="mb-3">
          <label class="form-label">Address <span class="text-danger">*</span></label>
          <textarea class="form-control" name="stu_address" rows="3" required></textarea>
        </div>

        <!-- Division -->
        <div class="mb-3">
          <label class="form-label">Division <span class="text-danger">*</span></label>
          <select id="division" class="form-select" name="stu_division" required>
            <option selected disabled>Select Division</option>
          </select>
        </div>

        <!-- District -->
        <div class="mb-3">
          <label class="form-label">District <span class="text-danger">*</span></label>
          <select id="district" class="form-select" name="stu_distict" required>
            <option selected disabled>Select District</option>
          </select>
        </div>

        <script>
          document.addEventListener("DOMContentLoaded", function () {
              fetch("/divisions")
                  .then(res => res.json())
                  .then(data => {
                      const divSelect = document.getElementById("division");
                      data.divisions.forEach(d => {
                          let opt = document.createElement("option");
                          opt.value = d;
                          opt.textContent = d;
                          divSelect.appendChild(opt);
                      });
                  });

              document.getElementById("division").addEventListener("change", function () {
                  let division = this.value;
                  fetch(`/districts/${division}`)
                      .then(res => res.json())
                      .then(data => {
                          const districtSelect = document.getElementById("district");
                          districtSelect.innerHTML = '<option disabled selected>Select District</option>';
                          data.districts.forEach(d => {
                              let opt = document.createElement("option");
                              opt.value = d;
                              opt.textContent = d;
                              districtSelect.appendChild(opt);
                          });
                      });
              });
          });
        </script>

        <!-- Photo -->
        <div class="mb-3">
          <label class="form-label">Upload Photo <span class="text-danger">*</span></label>
          <input class="form-control" type="file" name="stu_photo" accept="image/*" required>
        </div>
<!-- Payment Method (Optional) -->
<div class="mb-3">
  <label class="form-label">Payment Method <span class="text-muted">(Optional)</span></label>
  <select class="form-select" id="payment_method" name="payment_method">
    <option value="" selected>-- Select Payment Method --</option>
    <option value="bkash">bKash</option>
    <option value="nagad">Nagad</option>
    <option value="rocket">Rocket</option>
  </select>
</div>

<!-- Payment Number (Hidden initially) -->
<div class="mb-3" id="payment_number_div" style="display: none;">
  <label class="form-label" id="payment_number_label">Payment Number</label>
  <input type="text" class="form-control" id="payment_number" name="payment_number" placeholder="Enter your number">
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const paymentSelect = document.getElementById("payment_method");
  const numberDiv = document.getElementById("payment_number_div");
  const numberLabel = document.getElementById("payment_number_label");

  paymentSelect.addEventListener("change", function() {
    if(this.value) {
      numberDiv.style.display = "block";
      numberLabel.textContent = `${this.value} Number`;
    } else {
      numberDiv.style.display = "none";
    }
  });
});
</script>


        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

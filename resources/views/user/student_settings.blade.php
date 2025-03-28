@extends('layouts.user')

@section('title', 'Settings')

@section('user_content')
<div class="dashbaord-promo position-relative"></div>
<!-- Dashboard Cover Start -->
<div class="dashbaord-cover bg-shade sec-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 position-relative">
            <div class="dash-cover-bg rounded-3" style="background-image: url('images/student_bg.jpg');"></div>
            <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
               <div class="ava-wrap d-flex align-items-center">
                  <div class="avatar me-3 rounded-circle"><img width="150" src="images/avatar.png"
                        class="rounded-circle" alt="Avatar"></div>
                  <div class="ava-info">
                     <h4 class="display-5 text-white mb-0">Maria Carey Mc.</h4>
                     <div class="ava-meta text-white mt-1">
                        <span><i class="feather-icon icon-book"></i> 6 Courses Enrolled </span>
                        <span><i class="feather-icon icon-award"></i>3 cerficates</span>
                     </div>
                  </div>
               </div>
               <a href="courses.html" class="btn btn-sm btn-info rounded-5"><i
                     class="feather-icon icon-plus me-2"></i>Join New
                  Course</a>
            </div>
         </div>
      </div>
      <!-- Dashboard Inner Start -->
      <div class="row mt-5">
         <div class="col-lg-3">
            <aside class="dashboard-sidebar shadow-1 border rounded-3">
               <div class="widget">
                  <p class="grettings">Welcome, Maria Carey</p>
                  <nav class="dashboard-nav">
                     <ul class="list-unstyled nav">
                        <li><a class="nav-link" href="{{ route('dashboard') }}"><i
                                 class="feather-icon icon-home"></i><span>Dashboard</span></a></li>
                        <li><a class="nav-link" href="{{ route('profile') }}"><i
                                 class="feather-icon icon-user"></i><span>My
                                 Profile</span></a></li>
                        <li><a class="nav-link" href="{{ route('enrolled') }}"><i
                                 class="feather-icon icon-book-open"></i><span>Enrolled
                                 Courses</span></a>
                        </li>
                        <li><a class="nav-link" href="{{ route('whishlists') }}"><i
                                 class="feather-icon icon-gift"></i><span>Wishlist</span></a></li>

                        <li><a class="nav-link" href="{{ route('streview') }}"><i
                                 class="feather-icon icon-star"></i><span>Reviews</span></a>
                        </li>

                        <li><a class="nav-link" href="{{ route('anounced') }}"><i
                                 class="feather-icon icon-box"></i><span>My
                                 Quiz Attempts</span></a>
                        </li>
                        <li><a class="nav-link" href="{{ route('orderlist') }}"><i
                                 class="feather-icon icon-shopping-bag"></i><span>Order
                                 History</span></a></li>
                     </ul>
                  </nav>
               </div>
               <div class="widget">
                  <p class="grettings">User</p>
                  <nav class="dashboard-nav">
                     <ul class="list-unstyled nav">
                        <li><a class="nav-link active" href="{{ route('stusettings') }}"><i
                                 class="feather-icon icon-settings"></i><span>Settings</span></a></li>
                                 <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="nav-link" style="border: none; background: none; cursor: pointer;">
                                            <i class="feather-icon icon-log-out"></i><span>Logout</span>
                                        </button>
                                    </form>
                                </li>
                     </ul>
                  </nav>
               </div><!--  Widget End -->
            </aside>
         </div>
         <div class="col-lg-9 ps-lg-4">
            <section class="dashboard-sec">
               <h3 class="display-5 border-bottom pb-3 mb-4">Settings</h3>
               <div class="course-tab">
                  <ul class="nav" id="myTab" role="tablist">
                     <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                           data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                           aria-selected="true">Profile Settings</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password"
                           type="button" role="tab" aria-controls="password" aria-selected="false">Password</button>
                     </li>
                  </ul>
               </div>
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="profile" role="tabpanel">
                     <div class="position-relative profile-cover-wrap">
                        <div class="profile-cover-bg rounded-3"
                           style="background-image: url('{{ asset('/') }}frontend/assets/images/student-cover.jpg');"></div>
                        <div class="dash-cover-info d-sm-flex justify-content-between align-items-center">
                           <div class="ava-wrap position-relative horizontal-field">
                              <div class="avatar me-3 rounded-circle"><img width="120" src="{{ asset('/') }}frontend/assets/images/avatar.png"
                                    class="rounded-circle" alt="Avatar"></div>
                              <a href="#" class="icon-xs rounded-5 bg-info">
                                 <div class="feather-icon icon-camera"></div>
                              </a>

                           </div>
                           <a href="#" class="btn btn-sm btn-info rounded-5"><i
                                 class="feather-icon icon-camera me-2"></i>Edit Cover Photo</a>
                        </div>
                     </div>
                     <form action="{{ route('profile.update') }}" method="POST" class="profile-form mt-5">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Name</label>
                                    <input id="firstname" type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Email</label>
                                    <input id="lastname" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phonenumber">Phone Number</label>
                                    <input id="phonenumber" type="tel" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skill">Skill/Occupation</label>
                                    <input id="skill" type="text" name="skill" value="{{ old('skill', $user->skill) }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                           <label for="bio">Bio</label>
                           <textarea id="bio" name="bio" rows="8" class="form-control" maxlength="600">{{ old('bio', $user->bio) }}</textarea>
                           <small id="charCount">0/600</small>
                       </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Update Info</button>
                    </form>

                    {{-- Bio character count script --}}
                    <script>
                     document.addEventListener("DOMContentLoaded", function () {
                         let bioField = document.getElementById("bio");
                         let charCount = document.getElementById("charCount");
                 
                         bioField.addEventListener("input", function () {
                             charCount.textContent = bioField.value.length + "/600";
                         });
                 
                         // Initialize counter on page load
                         charCount.textContent = bioField.value.length + "/600";
                     });
                 </script>

                  </div> <!-- Tab Pane End -->
              <!-- পাসওয়ার্ড ট্যাব -->
<div class="tab-pane fade show active" id="password" role="tabpanel">
   <form action="{{ route('password.update') }}" method="POST" class="profile-form mt-5">
       @csrf
       @method('PATCH')

       <div class="form-group">
           <label for="c-password">Current Password</label>
           <input id="c-password" type="password" name="current_password" placeholder="Current password" class="form-control" required>
           @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
       </div>

       <div class="form-group">
           <label for="n-password">New Password</label>
           <input id="n-password" type="password" name="new_password" placeholder="New password" class="form-control" required>
           @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
       </div>

       <div class="form-group">
           <label for="c1-password">Confirm Password</label>
           <input id="c1-password" type="password" name="new_password_confirmation" placeholder="Confirm password" class="form-control" required>
       </div>

       <div class="submit-btn mt-25">
           <button type="submit" class="btn btn-sm btn-primary mt-3">Update Password</button>
       </div>

       @if(session('success'))
           <div class="alert alert-success mt-3">{{ session('success') }}</div>
       @endif
   </form>
</div>

<script>
   // পেজ রিফ্রেশ হলেও পাসওয়ার্ড ট্যাব ধরে রাখার জন্য সেশন স্টোরেজ ব্যবহার
   document.addEventListener("DOMContentLoaded", function () {
       let activeTab = sessionStorage.getItem("activeTab");
       if (activeTab) {
           let tabElement = document.querySelector(`[data-bs-target="${activeTab}"]`);
           if (tabElement) {
               new bootstrap.Tab(tabElement).show();
           }
       }
   });

   // ট্যাব ক্লিক হলে সেটিকে সেশন স্টোরেজে সংরক্ষণ
   document.querySelectorAll('a[data-bs-toggle="tab"]').forEach(tab => {
       tab.addEventListener("shown.bs.tab", function (event) {
           sessionStorage.setItem("activeTab", event.target.getAttribute("data-bs-target"));
       });
   });
</script>

               <!-- Tab Pane End -->
                 <!-- Tab Pane End --> 
               <!-- Tab Pane End --> 
               </div>
            </section>
         </div>
      </div>
   </div>
</div>
<!-- Dashboard Cover End -->
@endsection
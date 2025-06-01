@extends('layouts.admin')

@section('title', 'Password Changes')

@section('admin_content')
 <section class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center justify-content-between">
              <div class="col-sm-auto">
                <div class="page-header-title">
                  <h5 class="mb-0">Password Changes</h5>
                </div>
              </div>
              <div class="col-sm-auto">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a
                      href="http://html.phoenixcoded.net/flatable/navigation/index.html"
                      ><i class="ph-duotone ph-house"></i
                    ></a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="javascript: void(0)">Forms</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    Form Option
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end --><!-- [ Main Content ] start -->
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
      <!-- Basic Inputs -->
      <div class="card">
        <div class="card-header"><h5>Change password form</h5></div>
        <div class="card-body">
            <form action="{{ route('update.password') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control" placeholder="Enter current password">
            </div>

            <div class="form-group">
                <label class="form-label">New Password</label>
                <input type="password" name="new_password" class="form-control" placeholder="Enter new password">
            </div>


            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>


        </div>
        {{-- <div class="card-footer pt-0">
          <button class="btn btn-primary me-2">Submit</button>
        </div> --}}
      </div>
    </div>
  </div>
</div>
<!-- [ Main Content ] end -->
      </div>
    </section>
@endsection
@extends('layouts.admin')
@section('title', 'Add New User')
@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Add New User</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <ul class="breadcrumb">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create User</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                 Name 
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                 Email 
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                 Password 
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                 Confirm Password 
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-enter password">
                                </div>
                            </div>
                            <div class="row">
                                 Role 
                                <div class="col-md-6 mb-3">
                                       <label for="roles">Roles</label>
                                <select name="roles[]" class="form-control" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ in_array($role->id, old('roles', [])) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>
                          
                            </div>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Create User</button>
                            </div>
                        </form>
                        

                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection

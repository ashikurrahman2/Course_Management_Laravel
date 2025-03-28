@extends('layouts.admin')

@section('title', 'Edit User')

@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Edit User</h5>
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
                        <h5>Edit User</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <!-- Password -->
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter a new password">
                                    </div>
                                
                                    <!-- Confirm Password -->
                                    <div class="col-md-6 mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-enter new password">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <!-- Checkbox to indicate if the password should be changed -->
                                    <div class="col-md-12 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="changePassword" name="change_password">
                                            <label class="form-check-label" for="changePassword">Change Password</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Role -->
                                <div class="col-md-6 mb-3">
                                    <label for="roles" class="form-label">Roles</label>
                                    <select name="roles[]" id="roles" class="form-select @error('roles') is-invalid @enderror" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update User</button>
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

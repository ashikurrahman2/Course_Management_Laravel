@extends('layouts.admin')
@section('title', 'Admission Details')

@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Admission Data</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admission Table -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>All Admission List</h5>
                    </div>
                    <div class="card-body">
                        @if($admissions->isEmpty())
                            <div class="alert alert-info">No Admission found.</div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th>Course</th>
                                            <th>Address</th>
                                            <th>Division</th>
                                            <th>District</th>
                                            <th>Photo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admissions as $admission)
                                        <tr>
                                            <td>{{ $admission->id }}</td>
                                            <td>{{ $admission->stu_name }}</td>
                                            <td>{{ $admission->stu_email }}</td>
                                            <td>{{ $admission->stu_phone }}</td>
                                            <td>{{ $admission->stu_gender }}</td>
                                            <td>{{ $admission->stu_course }}</td>
                                            <td>{{ $admission->stu_address }}</td>
                                            <td>{{ $admission->stu_division }}</td>
                                            <td>{{ $admission->stu_distict }}</td>
                                            <td>
                                                @if($admission->stu_photo)
                                                    <!-- Thumbnail -->
                                                    <img 
                                                        src="{{ asset($admission->stu_photo) }}" 
                                                        alt="Photo" 
                                                        width="50" 
                                                        height="50" 
                                                        style="border-radius: 50%; cursor: pointer;" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#photoModal{{ $admission->id }}">

                                                    <!-- Modal for Image Preview -->
                                                    <div class="modal fade" id="photoModal{{ $admission->id }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0">
                                                                    <img src="{{ asset($admission->stu_photo) }}" class="img-fluid" alt="Photo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span>No Photo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Actions -->
                                                <a href="{{ route('admission.show', $admission->id) }}" class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('admission.edit', $admission->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('admission.destroy', $admission->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

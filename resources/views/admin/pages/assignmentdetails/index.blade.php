@extends('layouts.admin')
@section('title', 'Assignment Details')

@section('admin_content')
<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-auto">
                        <div class="page-header-title">
                            <h5 class="mb-0">Assignment Data</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>All Assignment List</h5>
                    </div>
                    <div class="card-body">
                        @if($applications->isEmpty())
                            <div class="alert alert-info">No Assignment found.</div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            <th>Experiment name</th>
                                            <th>Submission Date</th>
                                            <th>Assignment file</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applications as $application)
                                        <tr>
                                            <td>{{ $application->id }}</td>

                                   <!-- Image with click event -->

                            



                                            <td>{{ $application->name }}</td>
                                            <td>{{ $application->course_name }}</td>
                                            <td>{{ $application->submission_date }}</td>
                                            <td>
                                                @if($application->assignment_file)
                                                    @php
                                                        $ext = strtolower(pathinfo($application->assignment_file, PATHINFO_EXTENSION));
                                                    @endphp

                                                    @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))
                                                        <!-- Image Thumbnail -->
                                                        <img 
                                                            src="{{ asset($application->assignment_file) }}" 
                                                            alt="Photo" 
                                                            width="50" 
                                                            height="50" 
                                                            style="border-radius: 50%; cursor: pointer;" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#photoModal{{ $application->id }}">
                                                        
                                                        <!-- Modal for Image Preview -->
                                                        <div class="modal fade" id="photoModal{{ $application->id }}" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-body p-0">
                                                                        <img src="{{ asset($application->assignment_file) }}" class="img-fluid" alt="Photo">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif($ext === 'pdf')
                                                        <!-- PDF Link -->
                                                        <a href="{{ asset($application->assignment_file) }}" target="_blank">
                                                            <i class="feather-icon icon-file-text" style="font-size: 24px;"></i> View PDF
                                                        </a>
                                                    @else
                                                        <span>Unsupported File</span>
                                                    @endif
                                                @else
                                                    <span>No File</span>
                                                @endif
                                            </td>

                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination links -->
                            {{-- <div class="d-flex justify-content-center mt-3">
                                {{ $applications->links('pagination::bootstrap-4') }}
                            </div> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

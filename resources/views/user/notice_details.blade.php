@extends('layouts.user')

@section('title', 'Notice Details')

@section('user_content')
<div class="container py-5">
    <!-- Page Heading -->
    <h2 class="mb-5 text-center text-primary border-bottom pb-2">Notice Board</h2>

    @foreach($notices as $notice)
        <div class="mb-5">
            <!-- Notice Title -->
            <h4 class="fw-bold text-dark mb-2">{{ $notice->title }}</h4>

            <!-- Notice Date & Type -->
            <div class="mb-2">
                <small class="text-muted me-3">
                    <i class="bi bi-calendar-event me-1"></i>
                    {{ \Carbon\Carbon::parse($notice->created_at)->format('d M, Y') }}
                </small>
                <small class="@if($notice->type == 'important') text-danger
                               @elseif($notice->type == 'general') text-success
                               @else text-primary @endif fw-semibold">
                    {{ ucfirst($notice->type) }}
                </small>
            </div>

            <!-- Notice Details -->
            <p class="text-dark" style="line-height: 1.7;">
                {{ $notice->notice_details }}
            </p>

            <hr class="mt-4">
        </div>
    @endforeach
</div>

<!-- Optional Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
/* Hover effect for notice block */
.container div.mb-5:hover h4 {
    color: #0d6efd; /* Title color change on hover */
    transition: color 0.3s;
}

.container div.mb-5:hover p {
    color: #212529;
}
</style>
@endsection

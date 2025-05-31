@extends('layouts.app')

@section('title', 'Course Details')

@section('content')

<style>
         body {
            background-color: #f8f9fa;
        }
        .course-sidebar {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
</style>
<div class="container mt-5">
    <div class="row">
        <!-- Left Side: Course Video & Details -->
        <div class="col-md-8">
            <div class="card">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="card-body">
                    {{-- <h2>Online Web Design & Development + Freelancing Course</h2> --}}
                    <h2>{{ $course->course_title }}</h2>
                    <p class="text-muted">By <strong>MDB IT Institute</strong> | Category: Web Development</p>
                    <h4 class="text-danger">ওয়েবসাইট তৈরি করতে চান?</h4>
                    <p>এই কোর্সটি আপনাকে শেখাবে কিভাবে ওয়েব ডিজাইন এবং ডেভেলপমেন্ট করা যায়।</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Course Info -->
        <div class="col-md-4">
            <div class="card p-3">
                <h3 class="text-primary">৳ 20,000</h3>
                <button class="btn btn-primary w-100">Add to cart</button>
                <hr>
                <ul class="list-unstyled">
                    <li><strong>Level:</strong> Intermediate</li>
                    <li><strong>Total Enrolled:</strong> 3</li>
                    <li><strong>Duration:</strong> 84 hours</li>
                    <li><strong>Last Updated:</strong> November 25, 2024</li>
                </ul>
            </div>
            <div class="card mt-3 p-3">
                <h5>Course by</h5>
                <p><strong>MDB IT Institute</strong></p>
                <small>Graphic Design | Web Development | Digital Marketing</small>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <!-- Course Content -->
        <div class="col-md-8">
            <h3>What Will You Learn?</h3>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li>HTML</li>
                        <li>JavaScript</li>
                        <li>Bootstrap 5</li>
                        <li>WordPress Theme Development</li>
                        <li>Ecommerce Project</li>
                        <li>Freelancing</li>
                        <li>Upwork</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li>CSS</li>
                        <li>PHP</li>
                        <li>PHP for WordPress Development</li>
                        <li>Admin Panel</li>
                        <li>SQL Database</li>
                        <li>Fiverr</li>
                        <li>All About WordPress</li>
                    </ul>
                </div>
            </div>
            
            <h3>Course Content</h3>
            <div class="accordion" id="courseAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#module1">
                            Orientation Class
                        </button>
                    </h2>
                    <div id="module1" class="accordion-collapse collapse show" data-bs-parent="#courseAccordion">
                        <div class="accordion-body">
                            <span class="text-danger">Online Orientation</span>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#module2">
                            HTML 5
                        </button>
                    </h2>
                    <div id="module2" class="accordion-collapse collapse" data-bs-parent="#courseAccordion">
                        <div class="accordion-body">
                            Introduction to HTML 5
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Requirements</h3>
                <ul>
                    <li>HTML</li>
                    <li>JavaScript</li>
                    <li>Bootstrap 5</li>
                    <li>WordPress Theme Development</li>
                    <li>Ecommerce Project</li>
                    <li>Freelancing</li>
                    <li>Upwork</li>
                </ul>
            </div>
    
            <div class="col-md-6">   
                <h3>Audience</h3>
                <ul>
                    <li>HTML</li>
                    <li>JavaScript</li>
                    <li>Bootstrap 5</li>
                    <li>WordPress Theme Development</li>
                    <li>Ecommerce Project</li>
                    <li>Freelancing</li>
                    <li>Upwork</li>
                </ul>
            </div>
        </div>
    </div>  
</div>
@endsection
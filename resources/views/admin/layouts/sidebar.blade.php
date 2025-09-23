@php
    $setting = App\Models\Setting::first();
@endphp

<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('admin.dashboard') }}" class="b-brand text-primary">
                <img src="{{ url($setting->logo) }}" alt="logo image" class="logo-lg" style="max-width: 150px; max-height: 50px;">
                <span class="badge bg-primary rounded-pill ms-2 theme-version">ShikhboAmi</span>
            </a>
        </div>

        <div class="card pc-user-card">
            <div class="card-body">
                <div class="nav-user-image">
                    <a data-bs-toggle="collapse" href="#navuserlink">
                        <img src="{{ asset(auth()->user()->user_image ?? 'admin/assets/images/user/avatar-1.jpg') }}" 
                             alt="user-image" class="user-avtar rounded-circle">
                    </a>
                </div>

                <div class="pc-user-collpsed collapse" id="navuserlink">
                    <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                    <span>Administrator</span>
                    <ul>
                        <li><a class="pc-user-links"><i class="ph-duotone ph-user"></i> <span>My Account</span></a></li>
                        <li><a class="pc-user-links"><i class="ph-duotone ph-gear"></i> <span>Settings</span></a></li>
                        <li><a class="pc-user-links"><i class="ph-duotone ph-lock-key"></i> <span>Lock Screen</span></a></li>
                        <li><a href="{{ route('admin.logout') }}" class="pc-user-links"><i class="ph-duotone ph-power"></i> <span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption"><label>Navigation</label></li>

                <!-- Dashboard -->
                <li class="pc-item">
                    <a href="{{ route('admin.dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph-duotone ph-gauge"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <!-- ShikhboAmi History -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-settings"></i></span>
                        <span class="pc-mtext">ShikhboAmi History</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('about.index') }}">About us</a></li>
                    </ul>
                </li>

                <!-- Admission -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-book"></i></span>
                        <span class="pc-mtext">Admission</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('admissionguides.index') }}">Admission Guide</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('admissionrequirement.index') }}">Admission Requirement</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('admitdata.index') }}">Admission Info</a></li>
                    </ul>
                </li>

                <!-- Banner -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-layout-grid"></i></span>
                        <span class="pc-mtext">Banner</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('banner.index') }}">Banner Info</a></li>
                    </ul>
                </li>

                <!-- Courses -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-clipboard-list"></i></span>
                        <span class="pc-mtext">Courses</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('courses.index') }}">Courses list</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('categories.index') }}">Course Category</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('details.index') }}">Course Details</a></li>
                    </ul>
                </li>

                <!-- Assignment -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-alarm"></i></span>
                        <span class="pc-mtext">Assignment</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('assignment.index') }}">Create Assignment</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('assignments.index') }}">Show Assignment Info</a></li>
                    </ul>
                </li>

                <!-- Notice -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-bell"></i></span>
                        <span class="pc-mtext">Notice</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('notice.index') }}">Create Notice</a></li>
                    </ul>
                </li>

                
                <!-- Notice -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-bell"></i></span>
                        <span class="pc-mtext">Instractor</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('instructors.index') }}">Create Instractor</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('instructor-details.index') }}">Instractor Details</a></li>
                    </ul>
                </li>

                    <!-- FAQ Management -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-bell"></i></span>
                        <span class="pc-mtext">FAQ</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('faq.index') }}">Create FAQ</a></li>
                    </ul>
                </li>
                <!-- Roles & Permissions -->
                <li class="pc-item">
                    <a href="{{ route('permissions.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="fa fa-users-cog"></i></span>
                        <span class="pc-mtext">Roles & Permissions</span>
                    </a>
                </li>

                <!-- Setting -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-settings"></i></span>
                        <span class="pc-mtext">Setting</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('seo.index') }}">SEO Setting</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('website.index') }}">Website Setting</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('page.index') }}">Page Management</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('smtp.index') }}">SMTP Setting</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

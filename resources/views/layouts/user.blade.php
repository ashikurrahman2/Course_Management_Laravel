<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from code-theme.com/html/findhouses/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2024 10:04:50 GMT -->
<head>
    @include('user.layouts.meta')
    <!-- [style] -->
    <title>ShikhboAmi | @yield('title') </title>
    @include('user.layouts.style')
    <!-- FAVICON -->

   
</head>

<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            @include('user.layouts.navbar') 
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION DASHBOARD -->
        <section class="user-page section-padding">
            <div class="container-fluid">
                <div class="row">
                    @include('user.layouts.sidebar') 
                    
                    
                    @yield('user_content')
                    
                </div>
                @include('user.layouts.footer')
            </div>
        </section>
        <!-- END SECTION DASHBOARD -->
         <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

     <!--Javascript
========================================================-->
<script src="{{ asset('/') }}frontend/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/swiper-bundle.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/nice-select2.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/glightbox.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/purecounter_vanilla.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/plyr.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/lenis.min.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/aos.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/custom.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"91e1aed55ac11d40","version":"2025.1.0","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"389fa74406c44f21b129709ce8a3ec16","b":1}' crossorigin="anonymous"></script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Dec 2024 10:04:51 GMT -->
</html>

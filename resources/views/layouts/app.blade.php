<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShikhboAmi | @yield('title')</title>

    <link rel="apple-touch-icon" href="{{ asset('/') }}frontend/assets/images/favicon.png" />
    <link rel="shortcut icon" href="{{ asset('/') }}frontend/assets/images/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/feather.css" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/aos.css" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/nice-select2.css" />
    <link href="{{ asset('/') }}frontend/assets/css/glightbox.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/swiper-bundle.min.css" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css" />
</head>
<body>
   
  @include('frontend.layouts.header')

  @yield('content')

  @include('frontend.layouts.footer')

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
</body>
</html>
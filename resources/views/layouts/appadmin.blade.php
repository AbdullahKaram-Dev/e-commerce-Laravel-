<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('backend/images/logo_2H_tech.png')}}" />
</head>
<body>

<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('partials.nav1')
<!-- partial -->
 <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
@include('partials.nav2')

@yield('content')

 </div>
</div>

<script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('backend/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('backend/js/off-canvas.js')}}"></script>
<script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/settings.js')}}"></script>
<script src="{{asset('backend/js/todolist.js')}}"></script>
<script src="{{asset('backend/js/dashboard.js')}}"></script>
<!-- Custom js for this page-->
<script src="{{asset('backend/js/data-table.js')}}"></script>
<!-- End custom js for this page-->
{{--Jave Script Sweet Alert--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
@include('sweet::alert')
</body>
</html>
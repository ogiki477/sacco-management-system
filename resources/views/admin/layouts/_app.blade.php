<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{!empty($meta_title) ? $meta_title : '' }} | Sacco Management System </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('public/img/sacco2.jpeg') }}" rel="icon">
  <link href="{{url('public/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{url('public/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{url('public/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{url('public/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{url('public/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{url('public/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{url('public/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('public/css/style.css') }}" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


 
</head>

<body>

    @include('admin.layouts._header')

    @include('admin.layouts._sidebar')

    {{-- @include('message') --}}
  <main id="main" class="main">
   
    @yield('content')
 

  </main>

     @include('admin.layouts._footer')
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('public/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{url('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{url('public/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{url('public/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{url('public/vendor/quill/quill.js') }}"></script>
  <script src="{{url('public/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{url('public/vendor/tinymce/tinymce.min.js') }} "></script>
  <script src="{{url('public/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('public/js/main.js') }}"></script>

</body>

</html>
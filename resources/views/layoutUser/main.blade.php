
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if ($title) Sistem Booking | {{$title}} @else Sistem Booking @endif </title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('template/images/favicon.png') }}">

    <!-- Google Fonts -->
    <link href="{{ asset('template/../../../../../../fonts.googleapis.com/css2bff7.css?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap') }}" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.cs') }}s">
    <link rel="stylesheet" href="{{ asset('template/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/datatables/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body>
<!-- start cssload-loader -->
<div class="preloader" id="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!-- ================================
            START HEADER AREA
================================= -->
@include('layoutUser.header')
<!-- ================================
         END HEADER AREA
================================= -->

{{-- content --}}
@yield('content')
{{-- content --}}

<!-- ================================
       START FOOTER AREA
================================= -->
@include('layoutUser.footer')
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- Template JS Files -->
<script src="{{ asset('template/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('template/js/jquery-ui.js') }}"></script>
<script src="{{ asset('template/js/popper.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('template/js/moment.min.js') }}"></script>
<script src="{{ asset('template/js/daterangepicker.js') }}"></script>
<script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('template/js/animated-headline.js') }}"></script>
<script src="{{ asset('template/js/jquery.ripples-min.js') }}"></script>
<script src="{{ asset('template/js/quantity-input.js') }}"></script>
<script src="{{ asset('template/js/copy-text-script.js') }}"></script>
<script src="{{ asset('template/js/navbar-sticky.js') }}"></script>
<script src="{{ asset('template/js/main.js') }}"></script>

<!-- Datatbles -->
<script src="{{ asset('template/datatables/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/datatables/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('template/datatables/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/datatables/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
</body>
</html>
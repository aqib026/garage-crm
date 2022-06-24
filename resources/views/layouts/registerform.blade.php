<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Carfix Curacao | Vehicle Registration Form </title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets') }}/vendors/nprogress/nprogress.css" rel="stylesheet">


    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    {{-- <link href="{{ asset('assets') }}/build/css/custom.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('assets') }}/build/css/style.css" rel="stylesheet">
    <style scoped>
        footer {
            margin: 0px
        }
    </style>
</head>

<body class="bg-transparent">
    @yield('content')
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <!-- NProgress -->
    <script src="{{ asset('assets') }}/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <!-- gauge.js -->
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('assets') }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->

    <!-- Skycons -->
    <!-- Flot -->




    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('assets') }}/vendors/moment/min/moment.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets') }}/build/js/custom.min.js"></script>

</body>

</html>

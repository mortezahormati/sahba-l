<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>
    پنل مدیریت صهبا |
    @yield('title')
</title>
<link rel="icon" type="image/x-icon" href="{{ asset('image/main-logo-2.png') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('fonts/font-awesome/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('js/jquery-jvectormap-2.0.5.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
{{--<link rel="stylesheet" href="{{ asset('auth-css/bootstrap.css') }}">--}}
<!-- Google Font: Source Sans Pro -->
{{--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
<!-- bootstrap rtl -->
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-rtl.min.css') }}">
<!-- template rtl version -->
<link rel="stylesheet" href="{{ asset('css/bootstrap-lightbox/ekko-lightbox.css') }}">



<link rel="stylesheet" href="{{ asset('dist/css/custom-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<style>.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>



@yield('css')
{{--<link rel="stylesheet" href="{{ asset('css/font.css') }}">--}}
{{--<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/sweetAlert2.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>--}}
<script src="{{ mix('js/app.js') }}"></script>

<script src="{{ asset('js/jscolor.min.js') }}"></script>
<livewire:styles/>
{{--<link rel="stylesheet" href="{{ asset('css/all.css') }}">--}}

<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
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
    <script src="{{ asset('auth-js/jquery-3.4.1.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
{{--    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>--}}


    <script src="{{ asset('js/ajax/ajax.jquery.js') }}"></script>
    <script src="{{ asset('js/ajax/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validator/additional-methods.js') }}"></script>


    <script src="{{ asset('js/plugins/sweetalert/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/persianDatepicker-master/css/persianDatepicker-default.css') }}" />
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet"/>

    <link type="text/css" rel="stylesheet" href="{{ asset('lightgallery/css/lightgallery.min.css/') }}" />

    <!-- lightgallery plugins -->
    <link type="text/css" rel="stylesheet" href="{{ asset('lightgallery/css/lg-zoom.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('lightgallery/css/lg-thumbnail.min.css') }}" />




    <style>.jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }


    </style>


    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff !important;
            border: 1px solid #007bff !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
            color: #fff !important;
            border-right: 1px solid #fff !important;
        }
        .body{
            padding-right: 0 !important;
        }
        .modal {
            padding-right: 0px !important;
        }
        .modal-open{
            padding-right: 0px !important;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">


    @yield('css')
</head>
<body class="sidebar-mini" style="height: auto; ">
<div class="wrapper">

    {{--    navbar--}}
    <nav class="main-header navbar navbar-expand   navbar-light border-bottom "
         style="background-color: #06283D !important">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sahba-menu-collapsed text-white" data-widget="pushmenu" href="#"><i
                        class="fa fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white" data-toggle="dropdown" href="#">
                    <i class="fa-solid fa-comment-dots"></i>
                    <span class="badge badge-danger navbar-badge">۳</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="#" class="dropdown-item ">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title text-white">
                                    حسام موسوی
                                    <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm ">با من تماس بگیر لطفا...</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> ۴ ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-white">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    پیمان احمدی
                                    <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">من پیامتو دریافت کردم</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> ۴ ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    سارا وکیلی
                                    <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>۴ ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام&zwnj;ها</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white" data-toggle="dropdown" href="#">
                    <i class="fas fa-sign-out-alt" style="transform: rotate(180deg)"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <span class="dropdown-item dropdown-header">۱۵ نوتیفیکیشن</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('admin.logout')}}" class="dropdown-item  text-white">
                        <i class="fas fa-sign-out-alt" style="transform: rotate(180deg)"></i>
                        <span class="float-left text-muted text-sm">خروج</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown"></li>
            {{--        <li class="nav-item">--}}
            {{--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fa fa-th-large"></i></a>--}}
            {{--        </li>--}}
        </ul>
    </nav>
    {{--end navbar --}}

    {{--    sidebar--}}

    @include('livewire.admin.dashboard.sidebar')
    {{--end sidebar --}}
    <div class="content-wrapper" style="min-height: 823px;">


        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 sahba-main-div">
                    <div class="col-sm-6">
                        <h6 class="m-0 text-white"><span><a href="{{ route('home') }}" class="text-white" title=""> پنل مدیریت صهبا | </a></span><a
                                class="text-white" href="{{ request()->url() }}" title="">@yield('title') </a></h6>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12 mt-4">
                        @include('alerts.auth.alert')
                        @include('errors.errors')
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer" style="text-align: center">
        <strong>تمامی حقوق مادی و معنوی این سایت متعلق به شرکت صهبا بوده و هرگونه کپی‌برداری از مطالب، حتی با ذکر منبع،
            غیرمجاز و مشمول پیگرد قانونی است..</strong>
    </footer>
</div>
<!-- jQuery -->
{{--<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>--}}
<script src="{{ asset('auth-js/jquery-3.4.1.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{--<!-- Morris.js charts -->--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('js/jquery-jvectormap-2.0.5.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->

<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>--}}
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ asset('dist/js/demo.js') }}"></script>--}}
<script type="text/javascript">
    itemToForm = () => {
        if (this.item === undefined) {
            return
        }
        // The rest of the code
    }

</script>

<script src="{{ mix('js/app.js') }}"></script>
<script src='{{ asset("js/select2/select2.min.js") }}'></script>

<script src="{{ asset('js/jscolor.min.js') }}"></script>
<script src="{{ asset('js/plugins/sweetalert/sweetalert2.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script src="{{ asset('js/plugins/persianDatepicker-master/js/persianDatepicker.min.js') }}"></script>
<script>
    // let's set defaults for all color pickers
    jscolor.presets.default = {
        width: 141,               // make the picker a little narrower
        position: 'right',        // position it to the right of the target
        previewPosition: 'right', // display color preview on the right
        previewSize: 40,          // make the color preview bigger
        palette: [
            '#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26',
            '#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
            '#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d',
            '#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
        ],
    };


    //         function deleteRecord(event, id) {
    //             event.preventDefault();
    //             var form = document.getElementById(id);
    //             swal.fire({
    //                 title: "آیا مطمئن هستید؟",
    // //        text: "بعد از حذف رکرود شما قابل بازگشت نخواهد بود",
    //                 type: "warning",
    //                 showCancelButton: true,
    //                 allowOutsideClick: true,
    //                 confirmButtonColor: "#DD6B55",
    //                 cancelButtonText: "خیر منصرف شدم",
    //                 confirmButtonText: "بله می‌خواهم حذف کنم",
    //                 closeOnConfirm: false
    //             }, function (isConfirm) {
    //                 if (isConfirm) {
    //                     form.submit();
    //                 }
    //             });
    //         }


</script>
@yield('scripts')
<script src="{{ asset('lightgallery/js/lightgallery.umd.min.js') }}"></script>
<!-- Or use the minified version -->
<script src="{{ asset('lightgallery/js/lightgallery.min.js') }}"></script>

<!-- lightgallery plugins -->
<script src="{{ asset('lightgallery/js/lg-thumbnail.umd.min.js') }}"></script>
<script src="{{ asset('lightgallery/js/lg-zoom.umd.min.js') }}"></script>
</body>

</html>

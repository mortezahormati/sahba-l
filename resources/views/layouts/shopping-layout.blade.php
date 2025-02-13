<!doctype html>
<html lang="fa" style="transform: none;direction: rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, g-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('image/main-logo-2.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('image/main-logo-2.png') }}">
    <title>فروشگاه صهبا</title>
    <!--    font--------------------------------------------->
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/materialdesignicons.css.map') }}">
    <!--    font--------------------------------------------->
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/style.css') }}">
    <script src="{{asset('forntend/assets/js/jquery-3.2.1.min.js')}} "></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('js/ajax/ajax.jquery.js') }}"></script>
    <script src="{{ asset('js/ajax/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validator/additional-methods.js') }}"></script>

    <script src="{{ asset('js/plugins/sweetalert/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert/sweetalert2.min.css') }}">

    @yield('css')
    <style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>
    <style>

        @media only screen and (max-width: 950px) {
            .subnav {
                display: none !important;
            }
        }
            .subnav.active {
            height: 50px;
            opacity: 1;
            z-index: 900;
            margin-top: 2.5%;
        }
        .subnav.trans {
            transition: all 1s;
        }
        .subnav {
            background: #f5f5f5;
            height: 0;
            opacity: 0;
            width: 100%;
            z-index: 0;
            direction: rtl;
            overflow: hidden;
            border-color: transparent;
            border-bottom-color: transparent;
            /*position: absolute;*/
            padding: 9px;
        }
        .navbar-nav, .note, .note .content, .subnav {
            text-align: center;
        }
        .arrow-icon.right {
            right: 10px;
        }
        .arrow-icon {
            width: 10px;
            height: 20px;
            position: absolute;
            top: 31px;
            opacity: 0;
        }
        .subnav.active ul {
            margin-right: 0;
            opacity: 1;
        }
        .subnav ul {
            /*padding-bottom: 13px;*/
            padding-right: 0;
            margin-right: -20%;
            overflow-x: auto;
            overflow-y: hidden;
            -ms-scroll-snap-points-x: snapInterval(0,100%);
            -webkit-transition: margin .4s,opacity 1s;
            -moz-transition: margin .4s,opacity 1s;
            -ms-transition: margin .4s,opacity 1s;
            -o-transition: margin .4s,opacity 1s;
            transition: margin .4s,opacity 1s;
            opacity: 0;
        }
        .navbar-default, .subnav ul {
            margin-bottom: 0;
        }
         .navbar-nav, .sample-title,.subnav ul {
            white-space: nowrap;
        }
        .subnav ul li {
            margin: 0 1.5rem;
        }
        .social li, .subnav ul li {
            display: inline-block;
            list-style: none;
        }
    </style>


</head>
<body style="transform: none;">
<header class="header-main-page">
    @include('layouts.front_section.header')
    @yield('chapternav')
</header>
@yield('content')

<!--search-category------------------------->
<!--        responsive-sidebar----------------------->
<!-- Modal -->


<!--        responsive-sidebar----------------------->


{{--            category check --}}
{{--            <div class="box-sidebar">--}}
{{--                <button class="btn btn-light btn-box-sidebar" type="button">دسته&zwnj;بندی نتایج</button>--}}
{{--                <div class="catalog">--}}
{{--                    <ul class="catalog-list">--}}
{{--                        <li><a href="#" class="catalog-link"><i class="fa fa-angle-left"></i>کالای دیجیتال</a>--}}
{{--                            <div class="show-more">--}}
{{--                                <span class="catalog-cat-item"><i class="fa fa-angle-down"></i>لوازم جانبی گوشی</span>--}}
{{--                                <span class="catalog-cat-item"><i class="fa fa-angle-down"></i>لوازم جانبی گوشی--}}
{{--                                    موبایل</span>--}}
{{--                                <ul class="catalog-list">--}}
{{--                                    <li><a href="#" class="catalog-link"> کیف و کاور گوشی</a></li>--}}
{{--                                    <li><a href="#" class="catalog-link">محافظ صفحه نمایش گوشی</a></li>--}}
{{--                                    <li><a href="#" class="catalog-link">هندزفری</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}


@include('layouts.front_section.footer')


<!--search-category------------------------->

<!--   Footer---------------------------->
<!--   Footer---------------------------->
<script src="{{asset('forntend/assets/js/jquery-3.2.1.min.js')}} "></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>

<script src="{{asset('forntend/assets/js/jquery.ez-plus.js')}}"></script>
<script src="{{asset('forntend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('forntend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('forntend/assets/js/bootstrap.js')}}"></script>
<script src="{{asset('forntend/assets/js/theia-sticky-sidebar.min.js')}}"></script>
<script src="{{asset('forntend/assets/js/main.js')}}"></script>
@yield('scripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>

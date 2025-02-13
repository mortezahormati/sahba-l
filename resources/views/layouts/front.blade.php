<!doctype html>
<html lang="fa" style="transform: none;">
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
    <style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style></head>
<body style="transform: none;">

<header class="header-main-page">
    <div class="d-block">
        <div>
            <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
                <div class="header-right">
                    <div class="logo">
                        <a href="#"><img src="assets/images/logo.png" alt="logo"></a>
                    </div>

                    <div class="col-lg-8 col-md-12 col-xs-12 pull-right">
                        <div class="search-header search-box">
                            <form action="#">
                                <input type="text" class="header-search-input" placeholder="جستجو در دیجی استور...">
                                <button class="btn-search" type="submit"><img src="assets/images/search.png" alt="search"></button>
                            </form>
                            <div class="search-result">
                                <ul class="search-result-list">
                                    <li>
                                        <a href="#" class="btn btn-light btn-remove-search">موبایل
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-light btn-remove-search">لپ تاپ
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-light btn-remove-search">مودم
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-light btn-remove-search">شیائومی
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-light btn-remove-search">دوربین
                                            <i class="mdi mdi-close"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="search-result-most-view">
                                    <li><a href="#">موبایل <i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">لپ تاپ <i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">مودم <i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">شیائومی <i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">دوربین <i class="fa fa-angle-left"></i></a></li>
                                </ul>
                                <div class="search-results-list js-search-ad-banner">
                                    <a href="#">
                                        <img src="assets/images/banner-search.jpg" alt="banner-search">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Start megamenu-->
    </div>
    <!--        End megamenu------------------->


    <!--    responsive-megamenu-mobile----------------->


    <!--    responsive-megamenu-mobile----------------->
</header>
<div class="nav-categories-overlay"></div>
<div class="overlay-search-box"></div>

<!--search-category------------------------->

<!--        responsive-sidebar----------------------->
<div class="col-12">
    <div class="header-filters">
        <button class="btn-filter btn-filter-advanced" onclick="document.getElementById('modal-search').style.display='block'">جستجوی پیشرفته</button>
        <button class="btn-filter btn-filter-direction" data-toggle="modal" data-target="#exampleModalCenter">پربازدیدترین</button>
        <div class="remodal-search-advanced" id="modal-search">
            <nav class="remodal-page-layout">
                <button class="search-filter-remodal-close" onclick="document.getElementById('modal-search').style.display='none'">
                    <i class="fa fa-close"></i>
                </button>
                <div class="remodal-page-header">لوازم جانبی گوشی موبایل</div>
                <div class="remodal-page-main">
                    <div class="filter-bar">
                        <button class="js-listing-options-clear">پاک کردن همه</button>
                        <div class="js-box-content-items">
                            <a href="#">
                                <label for="switch3">
                                    <input type="checkbox" id="switch3">
                                    <span class="switch">
                                            <h1 class="switch-title">کالاهای موجود </h1>
                                        </span>
                                    <span class="toggle"></span>
                                </label>
                            </a>
                        </div>
                    </div>
                    <div class="remodal-page-content">
                        <div class="filter">
                            <label for="search" class="profile-edit-label">
                                <span>جستجو در نتایج</span>
                                <input type="text" value="" name="searchInput" id="search" placeholder="نام محصول مورد نظر را بنویسید ...">
                            </label>
                        </div>

                        <div class="filter">
                            <a href="#">
                                <label for="switch4">
                                    <input type="checkbox" id="switch4">
                                    <span class="switch"></span>
                                    <h1 class="switch-title">فقط کالاهای اصل </h1>
                                    <span class="toggle"></span>
                                </label>
                            </a>
                        </div>

                        <div class="filter">
                            <a href="#">
                                <label for="switch5">
                                    <input type="checkbox" id="switch5"><span class="switch"></span>
                                    <h1 class="switch-title">فقط کالاهای آماده ارسال</h1>
                                    <span class="toggle"></span>
                                </label>
                            </a>
                        </div>

                        <div class="filter">
                            <div class="toggle-box">
                                <div class="toggle-box-active">
                                    <ul>
                                        <li class="has-sub">
                                            <a href="#">دسته&zwnj;بندی نتایج</a>
                                            <ul class="catalog-list">
                                                <li>
                                                    <a href="#" class="catalog-link"><i class="fa fa-angle-left"></i>کالای دیجیتال</a>
                                                    <div class="show-more">
                                                        <span class="catalog-cat-item"><i class="fa fa-angle-down"></i>لوازم جانبی گوشی</span>
                                                        <span class="catalog-cat-item"><i class="fa fa-angle-down"></i>لوازم جانبی گوشی
                                                                موبایل</span>
                                                        <ul class="catalog-list">
                                                            <li><a href="#" class="catalog-link"> کیف و کاور
                                                                    گوشی</a></li>
                                                            <li><a href="#" class="catalog-link">محافظ صفحه نمایش
                                                                    گوشی</a></li>
                                                            <li><a href="#" class="catalog-link">هندزفری</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="filter">
                            <div class="toggle-box">
                                <div class="toggle-box-active">
                                    <ul>
                                        <li class="has-sub">
                                            <a href="#">برند</a>
                                            <ul>
                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">سامسونگ</label>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">نوکیا</label>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">اپل</label>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">شیائومی</label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">آنر</label>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">ماهوت</label>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">سونی</label>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">هوآوی</label>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="filter">
                            <div class="toggle-box">
                                <div class="toggle-box-active">
                                    <ul>
                                        <li class="has-sub">
                                            <a href="#">فروشنده</a>
                                            <ul>
                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">دیجی&zwnj;استور</label>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">دیجی&zwnj;استور</label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="filter-label">
                                                        <div class="form-auth-row">
                                                            <label for="remember" class="ui-checkbox">
                                                                <input type="checkbox" value="1" name="login" id="remember">
                                                                <span class="ui-checkbox-check"></span>
                                                            </label>
                                                            <label for="remember" class="remember-me">دیجی&zwnj;استور</label>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true" style="">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 305px; margin:20px auto;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="remodal-header">مرتب&zwnj;سازی بر اساس</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="remodal-list-sort">
                <ul class="listing-sort nav nav-tabs" id="myTab" role="tablist" data-label="مرتب&zwnj;سازی بر اساس :">
                    <li class="listing-active nav-item"><a class="nav-link active" id="mostvisited-tab" data-toggle="tab" href="#mostvisited" role="tab" aria-controls="mostvisited" aria-selected="true">پربازدید ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="bestselling-tab" data-toggle="tab" href="#bestselling" role="tab" aria-controls="bestselling" aria-selected="false">پرفروش
                            ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="mostpopular-tab" data-toggle="tab" href="#mostpopular" role="tab" aria-controls="mostpopular" aria-selected="false">محبوب
                            ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="false">جدید ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="cheapest-tab" data-toggle="tab" href="#cheapest" role="tab" aria-controls="cheapest" aria-selected="false">ارزان ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="mostexpensive-tab" data-toggle="tab" href="#mostexpensive" role="tab" aria-controls="mostexpensive" aria-selected="false">گران ترین</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!--        responsive-sidebar----------------------->
<div class="col-lg-3 col-md-4 col-xs-12 float-right sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1442.25px;"><div class="sidebar-wrapper search-sidebar">

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

            <div class="box-sidebar">
                <button class="btn btn-light btn-box-sidebar" type="button">
                    جستجو در نتایج:
                </button>
                <form action="#">
                    <input type="text" class="input-sidebar" placeholder="نام محصول یا برند مورد نظر را بنویسید…">
                    <button class="btn-search-sidebar"><img src="{{ asset('forntend/assets/images/search.png') }}" alt="search"></button>
                </form>
            </div>

            <div class="box-sidebar">
                <button class="btn btn-light btn-box-sidebar" type="button" data-toggle="collapse" data-target="#collapseExamplebrand" aria-expanded="false" aria-controls="collapseExamplebrand">
                    <i class="fa fa-chevron-down arrow"></i>برند
                </button>
                <div class="collapse" id="collapseExamplebrand">
                    <div class="catalog">
                        <form action="#">
                            <input type="text" class="input-sidebar" placeholder="نام محصول یا برند مورد نظر را بنویسید…">
                            <button class="btn-search-sidebar"><img src="{{ asset('forntend/assets/images/search.png') }}" alt="search"></button>
                        </form>
                        <ul>
                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label for="remembersumsung" class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="remembersumsung">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="remembersumsung" class="remember-me">سامسونگ</label>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label for="remembernokia" class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="remembernokia">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="remembernokia" class="remember-me">نوکیا</label>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label for="rememberapple" class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="rememberapple">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="rememberapple" class="remember-me">اپل</label>
                                    </div>
                                </a>
                            </li>


                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="rememberXiaomi ">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="rememberXiaomi " class="remember-me">شیائومی</label>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="rememberhonor">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="rememberhonor" class="remember-me">آنر</label>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="remembermahoot">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="remembermahoot" class="remember-me">ماهوت</label>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="remembersony">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="remembersony" class="remember-me">سونی</label>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="rememberhuawei">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="rememberhuawei" class="remember-me">هوآوی</label>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-sidebar">
                <button class="btn btn-light btn-box-sidebar" type="button" data-toggle="collapse" data-target="#collapseExampleSeller" aria-expanded="false" aria-controls="collapseExampleSeller">
                    <i class="fa fa-chevron-down arrow"></i>فروشنده
                </button>
                <div class="collapse show" id="collapseExampleSeller">
                    <div class="catalog">
                        <ul>
                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label for="rememberseller1" class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="rememberseller1">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="rememberseller1" class="remember-me">دیجی استور</label>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="filter-label">
                                    <div class="form-auth-row">
                                        <label for="rememberseller2" class="ui-checkbox">
                                            <input type="checkbox" value="1" name="login" id="rememberseller2">
                                            <span class="ui-checkbox-check"></span>
                                        </label>
                                        <label for="rememberseller2" class="remember-me">دیجی استور</label>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-sidebar">
                <div class="filter-switch">
                    <div class="switch-box">
                        <div class="centered hidden-xs">
                            <div class="card">
                                <a href="#">
                                    <label for="switch1">
                                        <input type="checkbox" id="switch1"><span class="switch">
                                            <h1 class="switch-title">فقط کالای موجود</h1>
                                        </span>
                                        <span class="toggle"></span>
                                    </label>
                                </a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-sidebar">
                <div class="filter-switch">
                    <div class="switch-box">
                        <div class="centered hidden-xs">
                            <div class="card">
                                <a href="#">
                                    <label for="switch2">
                                        <input type="checkbox" id="switch2"><span class="switch">
                                            <h1 class="switch-title">فقط کالای آماده ارسال</h1>
                                        </span>
                                        <span class="toggle"></span>
                                    </label>
                                </a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <!--   adplacement -------------------->
            <div class="adplacement">
                <div class="col-12 col-lg-12 pull-right" style="padding:0;">
                    <a href="#" class="item-adplacement">
                        <img src="assets/images/post-adplacement/1000012860.jpg" title="صوتی و تصویری" alt="صوتی و تصویری">
                    </a>
                </div>
            </div>
            <!--   adplacement -------------------->

        </div></div></div>
<div class="col-lg-9 col-md-8 col-xs-12 pull-left">
    <div class="js-products">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">فروشگاه اینترنتی دیجی استور</a></li>
                <li class="breadcrumb-item"><a href="#">کالای دیجیتال</a></li>
                <li class="breadcrumb-item"><a href="#">موبایل</a></li>
                <li class="breadcrumb-item active open" aria-current="page">گوشی موبایل</li>
            </ol>
        </nav>

        <div class="listing-listing">
            <div class="listing-counter">۱۹۲,۷۳۲ کالا</div>
            <div class="listing-header">
                <span class="mdi mdi-sort-variant"></span>
                <ul class="listing-sort nav nav-tabs" id="myTab2" role="tablist" data-label="مرتب&zwnj;سازی بر اساس :">
                    <li class="listing-active nav-item"><a class="nav-link active" id="mostvisited-tab" data-toggle="tab" href="#mostvisited" role="tab" aria-controls="mostvisited" aria-selected="true">پربازدید ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="bestselling-tab" data-toggle="tab" href="#bestselling" role="tab" aria-controls="bestselling" aria-selected="false">پرفروش
                            ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="mostpopular-tab" data-toggle="tab" href="#mostpopular" role="tab" aria-controls="mostpopular" aria-selected="false">محبوب
                            ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="false">جدید ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="cheapest-tab" data-toggle="tab" href="#cheapest" role="tab" aria-controls="cheapest" aria-selected="false">ارزان ترین</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="mostexpensive-tab" data-toggle="tab" href="#mostexpensive" role="tab" aria-controls="mostexpensive" aria-selected="false">گران ترین</a>
                    </li>
                </ul>
            </div>

            <!-- <ul class="listing-item"> -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="mostvisited" role="tabpanel" aria-labelledby="mostvisited-tab">
                    <ul class="listing-item">
                        <li>
                            @foreach($products as $p)
                            <div class="col-lg-3 col-md-3 col-xs-12 pull-right px-0">
                                <div class="promotion-box">
                                    <div class="product-seller-details">
                                        <span class="product-main-seller">{{ $p->vendor_persian_name }}</span>
                                    </div>

                                    <a href="{{ route('single.product.index'  , [$p->id ,$p->link]) }}" class="promotion-box-image">
                                        <img src="{{ url('Products/'.$p->img) }}" alt="product">
                                    </a>

                                    <div class="product-box-content">
                                        <a href="#" class="product-box-title">
                                          {{ $p->title }}
                                        </a>
                                    </div>

                                    <div class="product-box-rate">
                                        <span>۲,۶۵۰ نفر</span>

                                        <div class="product-star mb-3">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>

                                    <div class="product-box-row">
                                        <span class="price-value-wrapper">{{ number_format($p->price) }} </span>
                                        <span class="price-currency">تومان </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="bestselling" role="tabpanel" aria-labelledby="bestselling-tab">
                    <ul class="listing-item">
                        <li>


                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="mostpopular" role="tabpanel" aria-labelledby="mostpopular-tab">
                    <ul class="listing-item">
                        <li>

                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                    <ul class="listing-item">
                        <li>


                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="cheapest" role="tabpanel" aria-labelledby="cheapest-tab">
                    <ul class="listing-item">
                        <li>

                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="mostexpensive" role="tabpanel" aria-labelledby="mostexpensive-tab">
                    <ul class="listing-item">
                        <li>


                        </li>
                    </ul>
                </div>
            </div>
            <!-- </ul> -->
            <div class="pager">
                <ul class="page-item">
                    <li class="pagination-item"><a href="#" class="pager-item-active">1</a></li>
                    <li class="pagination-item"><a href="#">2</a></li>
                    <li class="pagination-item"><a href="#">3</a></li>
                    <li class="pagination-item"><a href="#">4</a></li>
                    <li class="pagination-item"><a href="#">5</a></li>
                    <li class="pagination-item">
                        <div class="pager-items-partition"></div>
                    </li>
                    <li class="pagination-item"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--search-category------------------------->

<!--   Footer---------------------------->
<!--   Footer---------------------------->



</body>
</html>

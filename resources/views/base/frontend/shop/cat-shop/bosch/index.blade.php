@extends('layouts.shopping-layout')

@section('title', __('admin.users.user-profile'))
@section('css')
    <link rel="stylesheet" href="{{ asset('forntend/assets/css/price-range.css') }}">
    <style>
        .loader-gif {
            display: none;
        }

    </style>

@endsection
@section('chapternav')
    <div class="subnav design-and-advertisement trans active">
        <div class="container-fluid sub-menu-products">
            <ul>
                <li>
                    <a href="{{ route('cat.shop.index' , 'panasonic') }}" style="background: none;">
                        <img src="{{ asset('forntend/assets/images/products-brands/panasonic.png') }}"
                             alt="panasonic محصولات " style="opacity: 1;">
                        {{--                        <span>پاناسونیک</span>--}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('cat.shop.index' , 'bosch') }}" style="background: none;">
                        <img src="{{ asset('forntend/assets/images/products-brands/bosch.png') }}" alt="محصولات bosch"
                             style="opacity: 1;">
                        {{--                        <span>بوش</span>--}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('cat.shop.index' , 'v-tech') }}" style="background: none;">
                        <img src="{{ asset('forntend/assets/images/products-brands/V-TECH.png') }}"
                             alt="V-TECH محصولات " style="opacity: 1;">
                        {{--                        <span>وی تک</span>--}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('cat.shop.index' , 'fine') }}" style="background: none;">
                        <img src="{{ asset('forntend/assets/images/products-brands/V-TECH.png') }}"
                             alt="V-TECH محصولات " style="opacity: 1;">
                        {{--                        <span>fine </span>--}}
                    </a>
                </li>
            </ul>

        </div>
        <div>
            <li>
                <a href="{{ route('cat.shop.index' , 'panasonic') }}" style="background: none;">
                    <img src="{{ asset('forntend/assets/images/products-brands/panasonic.png') }}"
                         alt="panasonic محصولات " style="opacity: 1;">
                    {{--                        <span>پاناسونیک</span>--}}
                </a>
            </li>
            <li>
                <a href="{{ route('cat.shop.index' , 'bosch') }}" style="background: none;">
                    <img src="{{ asset('forntend/assets/images/products-brands/bosch.png') }}" alt="محصولات bosch"
                         style="opacity: 1;">
                    {{--                        <span>بوش</span>--}}
                </a>
            </li>
        </div>

    </div>
@endsection
@section('content')
    @include('alerts.admin.alert');
    <div class="nav-categories-overlay"></div>
    <div class="overlay-search-box" style="opacity: 0; visibility: hidden;"></div>

    <!--search-category------------------------->

    <!--        responsive-sidebar----------------------->
    <div class="col-12">
        {{--       @include('base.frontend.shop.headers')--}}
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
                    <ul class="listing-sort nav nav-tabs" id="myTab" role="tablist"
                        data-label="مرتب&zwnj;سازی بر اساس :">
                        <li class="listing-active nav-item"><a class="nav-link active" id="mostvisited-tab"
                                                               data-toggle="tab" href="#mostvisited" role="tab"
                                                               aria-controls="mostvisited" aria-selected="true">پربازدید
                                ترین</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="bestselling-tab" data-toggle="tab"
                                                href="#bestselling" role="tab" aria-controls="bestselling"
                                                aria-selected="false">پرفروش
                                ترین</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="mostpopular-tab" data-toggle="tab"
                                                href="#mostpopular" role="tab" aria-controls="mostpopular"
                                                aria-selected="false">محبوب
                                ترین</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" id="cheapest-tab" data-toggle="tab" href="#cheapest"
                                                role="tab" aria-controls="cheapest" aria-selected="false">ارزان ترین</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="mostexpensive-tab" data-toggle="tab"
                                                href="#mostexpensive" role="tab" aria-controls="mostexpensive"
                                                aria-selected="false">گران ترین</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--        responsive-sidebar----------------------->
    <div class="col-lg-3 col-md-4 col-xs-12 float-right sticky-sidebar"
         style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
        <div class="col-md-12 product-sub-menu">
            تست یک
        </div>


{{--        bosch side-bar--}}
{{--        @include('base.frontend.shop.side-bar')--}}
    </div>
        <div class="col-lg-9 col-md-8 col-xs-12 pull-left">

            <div class="loader-gif">
                <img src="{{ asset('forntend/assets/images/search-product.gif') }}" alt="">
            </div>
            <div class="js-products">
                {{--            @include('base.frontend.shop.nav-bar')--}}


                <div class="listing-listing">
                    <div class="listing-counter text-black">
                        {{ $products->count() }}
                        کالا

                    </div>
                    <div class="listing-header">
                        <span class="mdi mdi-sort-variant"></span>
                        <ul class="listing-sort nav nav-tabs" id="myTab2" role="tablist"
                            data-label="مرتب&zwnj;سازی بر اساس :">
                            <li class="listing-active nav-item"><a class="nav-link active" id="mostvisited-tab"
                                                                   data-toggle="tab" href="#mostvisited" role="tab"
                                                                   aria-controls="mostvisited" aria-selected="true">پربازدید
                                    ترین</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="bestselling-tab" data-toggle="tab"
                                                    href="#bestselling" role="tab" aria-controls="bestselling"
                                                    aria-selected="false">پرفروش
                                    ترین</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="mostpopular-tab" data-toggle="tab"
                                                    href="#mostpopular" role="tab" aria-controls="mostpopular"
                                                    aria-selected="false">محبوب
                                    ترین</a>
                            </li>
                            {{--                        <li class="nav-item"><a class="nav-link" id="cheapest-tab" data-toggle="tab" href="#cheapest" role="tab" aria-controls="cheapest" aria-selected="false">ارزان ترین</a>--}}
                            {{--                        </li>--}}
                            {{--                        <li class="nav-item"><a class="nav-link" id="mostexpensive-tab" data-toggle="tab" href="#mostexpensive" role="tab" aria-controls="mostexpensive" aria-selected="false">گران ترین</a>--}}
                            {{--                        </li>--}}
                        </ul>
                    </div>

                    <!-- <ul class="listing-item"> -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="mostvisited" role="tabpanel"
                             aria-labelledby="mostvisited-tab">
                            <ul class="listing-item">
                                <li>
                                    @foreach($products as $product)
                                        <div class="col-lg-3 col-md-3 col-xs-12 pull-right px-0">
                                            <div class="promotion-box">
                                                <div class="product-seller-details">
                                                    <span
                                                        class="product-main-seller">فروشنده : {{ $product->vendor_persian_name }}</span>
                                                </div>

                                                <a href="{{ route('single.product.index' , [$product->id , $product->link])  }}"
                                                   class="promotion-box-image">
                                                    <img src="{{ url('Products/'.$product->img) }}" alt="product">
                                                </a>

                                                <div class="product-box-content">
                                                    <a href="{{ route('single.product.index' , [$product->id , $product->link])  }}"
                                                       class="product-box-title">{{ $product->title }}</a>
                                                </div>

                                                <div class="product-box-rate">
                                                    <span>{{ rand(500,2000) }} نفر</span>
                                                    <div class="product-star mb-3">
                                                        @for ($i = 0; $i < $product->rate_count ; $i++)
                                                            <i class="fa fa-star active"></i>
                                                        @endfor
                                                        @if($product->rate_count <= 5)
                                                            @for ($i = 0; $i < 5-$product->rate_count ; $i++)
                                                                <i class="fa fa-star "></i>
                                                            @endfor
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="product-box-row">
                                                    <span
                                                        class="price-value-wrapper">{{ number_format($product->price) }} </span>
                                                    <span class="price-currency">تومان </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </li>
                            </ul>
                            <div class="pagination">
                                {{ $products->links() }}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bestselling" role="tabpanel" aria-labelledby="bestselling-tab">
                            <ul class="listing-item">
                                <li>
                                    @foreach($products_best_sell as $product)
                                        <div class="col-lg-3 col-md-3 col-xs-12 pull-right px-0">
                                            <div class="promotion-box">
                                                <div class="product-seller-details">
                                                    <span
                                                        class="product-main-seller">فروشنده : {{ $product->vendor_persian_name }}</span>
                                                </div>

                                                <a href="#" class="promotion-box-image">
                                                    <img src="{{ url('Products/'.$product->img) }}" alt="product">
                                                </a>

                                                <div class="product-box-content">
                                                    <a href="{{ route('single.product.index' , [$product->id , $product->link])  }}"
                                                       class="product-box-title">{{ $product->title }}</a>
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
                                                    <span
                                                        class="price-value-wrapper">{{ number_format($product->price) }} </span>
                                                    <span class="price-currency">تومان </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </li>
                            </ul>
                            <div class="pagination">
                                {{ $products_best_sell->links() }}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mostpopular" role="tabpanel" aria-labelledby="mostpopular-tab">
                            <ul class="listing-item">
                                <li>

                                    @foreach($products_best_popular as $product)
                                        <div class="col-lg-3 col-md-3 col-xs-12 pull-right px-0">
                                            <div class="promotion-box">
                                                <div class="product-seller-details">
                                                    <span
                                                        class="product-main-seller">فروشنده : {{ $product->vendor_persian_name }}</span>
                                                </div>

                                                <a href="#" class="promotion-box-image">
                                                    <img src="{{ url('Products/'.$product->img) }}" alt="product">
                                                </a>

                                                <div class="product-box-content">
                                                    <a href="{{ route('single.product.index' , [$product->id , $product->link])  }}"
                                                       class="product-box-title">{{ $product->title }}</a>
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
                                                    <span
                                                        class="price-value-wrapper">{{ number_format($product->price) }} </span>
                                                    <span class="price-currency">تومان </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </li>
                            </ul>
                            <div class="pagination">
                                {{ $products_best_popular->links() }}
                            </div>
                        </div>

                        <div class="tab-pane fade" id="cheapest" role="tabpanel" aria-labelledby="cheapest-tab">
                            <ul class="listing-item">
                                <li>


                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="mostexpensive" role="tabpanel"
                             aria-labelledby="mostexpensive-tab">
                            <ul class="listing-item">
                                <li>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- </ul> -->

                </div>
            </div>
        </div>
        <script>
            // $(document).ready(function () {
            //     $('.main-menu-product').on('click' , function (e){
            //         e.preventDefault()
            //         $('.sub-menu-products').show()
            //
            //     })
            // })


        </script>
@endsection



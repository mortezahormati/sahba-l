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
@section('content')
    @include('alerts.admin.alert');
    <div class="col-12">
        <div class="page-content">
            <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                <div class="checkout-tab">
                    <div class="checkout-tab-pill listing-active-cart">
                        سبد خرید
                        <span class="checkout-tab-counter">{{ $items->count() ?? '' }}</span>
                    </div>
                </div>

            </div>
        </div>
        <div class="cart-tab-main" style="">

            @include('base.frontend.basket.detail.basket-list')
{{--            section for product --}}
            <div class="total-price-basket">
                @include('base.frontend.basket.detail.total-price')
            </div>

        </div>
    </div>
@endsection

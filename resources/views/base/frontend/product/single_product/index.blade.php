@extends('layouts.shopping-layout')


{{--@section('title', __('admin.users.user-profile'))--}}
{{--@section('css')--}}
{{--@endsection--}}
@section('content')
    @include('alerts.admin.alert')
    <div class="product-page" style="transform: none;">
        @include('base.frontend.product.single_product.detail.article')
{{--        @include('base.frontend.product.single_product.detail.product_price')--}}

        @include('base.frontend.product.single_product.detail.related_product')
        @include('base.frontend.product.single_product.detail.buy_box')



    </div>
@endsection
@section('scripts')
    <script src="{{asset('forntend/assets/js/single-product.js')}}"></script>
@endsection

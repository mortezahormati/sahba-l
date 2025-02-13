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
                    <a href="{{ route('cat.shop.index' , 'panasonic') }}"  style="background: none;">
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

    </div>
@endsection

@extends('layouts.app-without-livewire')

@section('title' , __('admin.side-bar.add-product'))
@section('css')
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">--}}

    <style>
        tbody, td, tfoot, th, thead, tr {
            vertical-align: middle !important;
        }

        .dropzone {
            height: 75px !important;
            cursor: pointer !important;
        }

        .modal {
            z-index: 2000;
            position: absolute !important;
            top: 5% !important;
        }

        .error {
            color: red !important;
        }

        .dropzone {
            height: 110px !important;
            cursor: pointer !important;
        }

        .dropdown-select {
            display: none;
        }

        .status-bord:hover {
            -webkit-box-shadow: 0 3px 10px 2px rgb(0 0 0 / 15%);
            -moz-box-shadow: 0 3px 10px 2px rgba(0, 0, 0, 0.15);
            box-shadow: 0 3px 10px 2px rgb(0 0 0 / 15%);
        }

        .status-bord {
            border-radius: 8px;
        }

        .sahba-card-sub-header {
            background-color: #1363df !important;
        }

        .nav-tabs .nav-link.active {
            color: #06283d !important;
            background-color: #f0f0f1 !important;
            border-color: #fcfcfc #fcfcfc #fff;
        }

        .ck-editor__editable {
            min-height: 300px;
        }


    </style>
@endsection
@section('content')
    @include('alerts.admin.alert')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('products.new') }}" method="post" class="padding-30" enctype="multipart/form-data">
                @csrf
                @include('errors.errors')
                <div class="card">
                    <div class="card-header sahba-card-sub-header">
                        <h5 class="card-title text-white">افزودن کالای جدید</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="min-height: 600px !important;min-height: 500px">
                        <div class="row">
                            <div class="col-2 col-sm-2">
                                <div class="nav flex-column nav-tabs nav-tabs-right h-100 status-bord"
                                     id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical"
                                     style="background-color: #06283d ; min-height: 500px">
                                    <a class="nav-link  active show text-white" id="vert-tabs-right-home-tab"
                                       data-toggle="pill" href="#vert-tabs-right-home" role="tab"
                                       aria-controls="vert-tabs-right-home" aria-selected="true">اطلاعات پایه</a>
                                    <a class="nav-link  text-white" id="vert-tabs-right-profile-tab" data-toggle="pill"
                                       href="#vert-tabs-right-profile" role="tab"
                                       aria-controls="vert-tabs-right-profile" aria-selected="false">ویژگی های کالا</a>

                                    <a class="nav-link text-white" id="vert-tabs-right-description-tab"
                                       data-toggle="pill" href="#vert-tabs-right-description" role="tab"
                                       aria-controls="vert-tabs-right-description" aria-selected="true">توضیحات</a>
                                    <a class="nav-link text-white" id="vert-tabs-right-technical-specifications-tab"
                                       data-toggle="pill" href="#vert-tabs-right-technical-specifications" role="tab"
                                       aria-controls="vert-tabs-right-technical-specifications" aria-selected="true">مشخصات
                                        فنی</a>
                                    <a class="nav-link text-white" id="vert-tabs-right-accessories-tab"
                                       data-toggle="pill" href="#vert-tabs-right-accessories" role="tab"
                                       aria-controls="vert-tabs-right-accessories" aria-selected="true">لوازم جانبی </a>
                                    <a class="nav-link  text-white" id="vert-tabs-right-messages-tab" data-toggle="pill"
                                       href="#vert-tabs-right-messages" role="tab"
                                       aria-controls="vert-tabs-right-messages" aria-selected="false">اطلاعات مالی</a>
                                </div>
                            </div>
                            <div class="col-10 col-sm-10 status-bord "
                                 style="background-color: #f0f0f1;border-radius: 8px;padding: 20px;">
                                <div class="tab-content" id="vert-tabs-right-tabContent">
                                    <div class="tab-pane  active show" id="vert-tabs-right-home" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-home-tab">
                                        <div class="row">

                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.title')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.title') }}"
                                                           name="title" class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.name')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.name') }}"
                                                           name="name" class="text form-control">
                                                </div>
                                            </div>


                                            <div class="col-md-4 ">
                                                <div class="form-group  mt-3" style="float: left">
                                                    <label for="sahba-checkbox"
                                                           class="font-size-5 ">@lang('admin.products.status')
                                                    </label>
                                                    <div class="wrapper-sahba  mt-4">
                                                        <div class="switch_box ">
                                                            <input type="checkbox"
                                                                   name="status"
                                                                   class="switch_1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.child_sub_category')
                                                    </label>
                                                    <select type="text"
                                                            name="child_sub_category_id"
                                                            class="form-control">
                                                        @foreach($child_sub_categories as $c)
                                                            <option value="{{ $c->id }}">{{ $c->title }}
                                                                --- {{ $c->link }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.brand')
                                                    </label>
                                                    <div class="">
                                                        <select class="js-select-brands" name="brands[]"
                                                                multiple="multiple"
                                                                style="width: 100%"
                                                                class="form-control">
                                                            @foreach($brands as $b)
                                                                <option value="{{ $b->id }}"> {{ $b->title }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group  mt-3" style="float: left">
                                                    <label for="sahba-checkbox"
                                                           class="font-size-5 ">@lang('admin.products.publish')
                                                    </label>
                                                    <div class="wrapper-sahba  mt-4">
                                                        <div class="switch_box ">
                                                            <input type="checkbox"
                                                                   name="publish"
                                                                   class="switch_1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mt-3">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.tags')
                                                </label>
                                                <div class="">
                                                    <select class="js-select-tags" name="tags[]" multiple="multiple"
                                                            style="width: 100%"
                                                            class="form-control">
                                                        @foreach($tags as $b)
                                                            <option value="{{ $b->id }}"> {{ $b->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.color_id')
                                                </label>
                                                <div class="">
                                                    <select class="js-select-colors" name="colors[]" multiple="multiple"
                                                            style="width: 100%"
                                                            class="form-control">
                                                        <option value="" disabled="disabled">انتخاب کنید</option>
                                                        @foreach($colors as $b)
                                                            <option value="{{ $b->id }}">
                                                                {{ $b->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="text-black">{{ __('admin.products.img') }}</label>
                                                        <img src="{{ asset('image/upload-image-2.png') }}"
                                                             height="75px" alt="" style="margin-top: 50px;">
                                                        <input type="file" name="img" id="imgInp"
                                                               class="upload-input"/>
                                                    </div>
                                                    <div class="col-md-6 mt-4" style="text-align: left !important">
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <img id="blah" src="#" class="img-thumbnail"
                                                             style="margin-top: 20px;"/>
                                                    </div>

                                                </div>


                                                {{-- <div class="col-md-2"></div> --}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-right-profile" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-profile-tab">
                                        <div class="row">
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="number"
                                                           class="font-size-5 ">@lang('admin.products.number')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.number') }}"
                                                           name="number" class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="text"
                                                           class="font-size-5 ">@lang('admin.products.weight')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.weight') }}"
                                                           name="weight" class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <div class="form-group">
                                                    <label for="order_count"
                                                           class="font-size-5 ">@lang('admin.products.part_number')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.part_number') }}"
                                                           name="part_number" class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-group  mt-3" style="float: left">
                                                    <label for="sahba-checkbox"
                                                           class="font-size-5 ">@lang('admin.products.original')
                                                    </label>
                                                    <div class="wrapper-sahba  mt-4">
                                                        <div class="switch_box ">
                                                            <input type="checkbox"
                                                                   name="original"
                                                                   class="switch_1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group  mt-3" style="float: left">
                                                    <label for="sahba-checkbox"
                                                           class="font-size-5 ">@lang('admin.products.special')
                                                    </label>
                                                    <div class="wrapper-sahba  mt-4">
                                                        <div class="switch_box ">
                                                            <input type="checkbox"
                                                                   name="special"
                                                                   class="switch_1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="order_count"
                                                           class="font-size-5 ">@lang('admin.products.order_count')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.order_count') }}"
                                                           name="order_count" class="text form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <label for="order_count"
                                                   class="font-size-5 ">@lang('admin.products.body')
                                            </label>
                                            <div class="col-md-12 mt-3">
                                               <textarea class="ckeditor form-control" name="body"
                                                         id="body_attr"
                                                         cols="30" rows="10" placeholder=""></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-right-messages" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-messages-tab">
                                        <div class="row">

                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.price')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.price') }}"
                                                           name="price" class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.price_from')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.price_from') }}"
                                                           name="price_from" class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.price_to')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.price_to') }}"
                                                           name="price_to" class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.discount_price')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.discount_price') }}"
                                                           name="discount_price" class="text form-control">
                                                </div>
                                            </div>
                                            {{--                                        <div class="col-md-3 mt-3">--}}
                                            {{--                                            <div class="form-group">--}}
                                            {{--                                                <label for="product"--}}
                                            {{--                                                       class="font-size-5 ">@lang('admin.products.gift')--}}
                                            {{--                                                </label>--}}
                                            {{--                                                <select wire:model.defer="product.gift" type="text" name="gift"--}}
                                            {{--                                                        class="form-control">--}}
                                            {{--                                                    <option value="0" > فاقد کارت هدیه  </option>--}}
                                            {{--                                                    <option value="1">کارت هدیه شگفت انگیز</option>--}}
                                            {{--                                                </select>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-right-description" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-description-tab">
                                        {{--                                        <input id="description" name="description">--}}
                                        <textarea class="ckeditor form-control" name="description" id="description"
                                                  cols="30" rows="10" placeholder="">
                                        </textarea>
                                    </div>

                                        <div class="tab-pane fade" id="vert-tabs-right-technical-specifications"
                                             role="tabpanel"
                                             aria-labelledby="vert-tabs-right-dtechnical-specifications-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label for="cctv_group"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_group')
                                                                </label>
                                                                <input type="text"

                                                                       name="cctv_group" class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="cctv_power_source"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_power_source')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_power_source"
                                                                       class="text form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label for="cctv_outdoor_use"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_outdoor_use')
                                                                </label>
                                                                <input type="text"

                                                                       name="cctv_outdoor_use"
                                                                       class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="cctv_sensor"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_outdoor_use')
                                                                </label>
                                                                <input type="text"

                                                                       name="cctv_sensor" class="text form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">

                                                                <label for="cctv_compression"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_outdoor_use')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_compression"
                                                                       class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="cctv_resolution"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_resolution')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_resolution" class="text form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-md-6">

                                                                <label for="lenz"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.lenz')
                                                                </label>
                                                                <input type="text"
                                                                       name="lenz" class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="viewing_angle"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.viewing_angle')
                                                                </label>
                                                                <input type="text"
                                                                       name="viewing_angle" class="text form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-md-6">

                                                                <label for="range_pan_horizontal_movement"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.range_pan_horizontal_movement')
                                                                </label>
                                                                <input type="text"
                                                                       name="range_pan_horizontal_movement"
                                                                       class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="rang_tilt_vertical_movement"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.rang_tilt_vertical_movement')
                                                                </label>
                                                                <input type="text"
                                                                       name="rang_tilt_vertical_movement"
                                                                       class="text form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">

                                                                <label for="cctv_ai_programming"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_ai_programming')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_ai_programming"
                                                                       class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="cctv_temperature_of_performance"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_temperature_of_performance')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_temperature_of_performance"
                                                                       class="text form-control">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label for="max_frame"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.max_frame')
                                                                </label>
                                                                <input type="text"
                                                                       name="max_frame" class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="range_dynamics"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.range_dynamics')
                                                                </label>
                                                                <input type="text"
                                                                       name="range_dynamics" class="text form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label for="record_day_night"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.record_day_night')
                                                                </label>
                                                                <input type="text"

                                                                       name="record_day_night"
                                                                       class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="cctv_resolution_ability"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_resolution_ability')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_resolution_ability"
                                                                       class="text form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">
                                                                <label for="night_vision"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.night_vision')
                                                                </label>
                                                                <input type="text"
                                                                       name="night_vision" class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="min_colored_light"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.min_colored_light')
                                                                </label>
                                                                <input type="text"
                                                                       name="min_colored_light"
                                                                       class="text form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">

                                                                <label for="optical_magnification"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.optical_magnification')
                                                                </label>
                                                                <input type="text"
                                                                       name="optical_magnification"
                                                                       class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="cctv_voice"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_voice')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_voice" class="text form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-6">

                                                                <label for="cctv_memory_card_slot"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_memory_card_slot')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_memory_card_slot"
                                                                       class="text form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="cctv_resistance_to_vandalism"
                                                                       class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_resistance_to_vandalism')
                                                                </label>
                                                                <input type="text"
                                                                       name="cctv_resistance_to_vandalism"
                                                                       class="text form-control">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>



                                            {{--                                            <textarea class="ckeditor form-control" name="technical_specifications"--}}
                                            {{--                                                      id="technical_specifications" cols="30" rows="10" placeholder="">--}}
                                            {{--                                            </textarea>--}}
                                        </div>

                                    <div class="tab-pane fade" id="vert-tabs-right-accessories" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-accessories-tab">
                                        <textarea class="ckeditor form-control" name="accessories" id="accessories"
                                                  cols="30" rows="10" placeholder="">
                                        </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10 justify-content-center">
                                <div class="form-group mt-5 text-center">
                                    <button
                                        class="btn  btn-outline-dark ">@lang('admin.products.attribute.create')</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <!-- ./card-body -->
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $('.js-select-brands').select2();
            $('.js-select-tags').select2();
            $('.js-select-colors').select2();
            $('#add_product_attributes').on('submit' , function (e) {
                e.preventDefault();
                alert(123);
            })








        });
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: {
                    // The UI will be English.
                    ui: 'fa',

                    // But the content will be edited in Arabic.
                    content: 'fa'
                }
            })
            .catch(error => {
                console.error(error);
            });
        // ClassicEditor
        //     .create(document.querySelector('#technical_specifications'), {
        //         toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        //         language: {
        //             // The UI will be English.
        //             ui: 'fa',
        //
        //             // But the content will be edited in Arabic.
        //             content: 'fa'
        //         }
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        ClassicEditor
            .create(document.querySelector('#accessories'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: {
                    // The UI will be English.
                    ui: 'fa',

                    // But the content will be edited in Arabic.
                    content: 'fa'
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body_attr'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: {
                    // The UI will be English.
                    ui: 'fa',

                    // But the content will be edited in Arabic.
                    content: 'fa'
                }
            })
            .catch(error => {
                console.error(error);
            });
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection









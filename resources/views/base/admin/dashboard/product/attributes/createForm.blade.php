@extends('layouts.app-without-livewire')

@section('title' , __('admin.side-bar.add-product'))
@section('css')





@endsection
@section('content')

    @include('alerts.admin.alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header sahba-card-header">
                    <h5 class="card-title text-white">افزودن ویژگی های محصول
                        {{ $product->name }}
                        @isset($product->img)
                            <img class="thumbnail-img-category"
                                 src="{{ url('Products/'.$product->img) }}"
                                 style="height: 70px;" alt="">
                        @endisset
                    </h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('products.attribute.create' , $product) }}" method="post" class="padding-30">
                        @csrf
                        @include('errors.errors')
                        <div class="col-md-10 justify-content-center">
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="cctv_group"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_group')
                                        </label>
                                        <input type="text"

                                               name="cctv_group" class="text form-control " style="background-color: antiquewhite;" value="{{ $product->pattribute ? $product->pattribute->cctv_group : '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cctv_type"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_type')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_type : '' }}"
                                               name="cctv_type" class="text form-control " style="background-color: antiquewhite;" >
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="cctv_outdoor_use"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_outdoor_use')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_outdoor_use : '' }}"

                                               name="cctv_outdoor_use"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cctv_sensor"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_sensor')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_sensor : '' }}"

                                               name="cctv_sensor" class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">

                                        <label for="cctv_compression"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_compression')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_compression : '' }}"
                                               name="cctv_compression"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cctv_resolution"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_resolution')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_resolution : '' }}"
                                               name="cctv_resolution" class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">

                                        <label for="lenz"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.lenz')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->lenz : '' }}"
                                               name="lenz" class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="viewing_angle"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.viewing_angle')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->viewing_angle : '' }}"
                                               name="viewing_angle" class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">

                                        <label for="range_pan_horizontal_movement"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.range_pan_horizontal_movement')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->range_pan_horizontal_movement : '' }}"
                                               name="range_pan_horizontal_movement"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rang_tilt_vertical_movement"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.rang_tilt_vertical_movement')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->rang_tilt_vertical_movement : '' }}"
                                               name="rang_tilt_vertical_movement"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">

                                        <label for="cctv_ai_programming"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_ai_programming')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_ai_programming : '' }}"
                                               name="cctv_ai_programming"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cctv_temperature_of_performance"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_temperature_of_performance')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_temperature_of_performance : '' }}"
                                               name="cctv_temperature_of_performance"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="col-md-10 justify-content-center">
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="max_frame"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.max_frame')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->max_frame : '' }}"
                                               name="max_frame" class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="range_dynamics"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.range_dynamics')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->range_dynamics : '' }}"
                                               name="range_dynamics" class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="record_day_night"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.record_day_night')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->record_day_night : '' }}"

                                               name="record_day_night"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cctv_resolution_ability"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_resolution_ability')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_resolution_ability : '' }}"
                                               name="cctv_resolution_ability"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="night_vision"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.night_vision')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->night_vision : '' }}"
                                               name="night_vision" class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="min_colored_light"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.min_colored_light')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->min_colored_light : '' }}"
                                               name="min_colored_light"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">

                                        <label for="optical_magnification"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.optical_magnification')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->optical_magnification : '' }}"
                                               name="optical_magnification"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cctv_voice"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_voice')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_voice : '' }}"
                                               name="cctv_voice" class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">

                                        <label for="cctv_memory_card_slot"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_memory_card_slot')
                                        </label>
                                        <input type="text"
                                                 value="{{ $product->pattribute ? $product->pattribute->cctv_memory_card_slot : '' }}"
                                               name="cctv_memory_card_slot"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cctv_resistance_to_vandalism"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_resistance_to_vandalism')
                                        </label>
                                        <input type="text"
                                               value="{{ $product->pattribute ? $product->pattribute->cctv_resistance_to_vandalism : '' }}"
                                               name="cctv_resistance_to_vandalism"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="cctv_power_source"
                                               class="font-weight-light font-size-4 ">@lang('admin.products.attributes.cctv_power_source')
                                        </label>
                                        <input type="text"
                                               value="{{ $product->pattribute ? $product->pattribute->cctv_power_source : '' }}"
                                               name="cctv_power_source"
                                               class="text form-control " style="background-color: antiquewhite;">
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="col-md-12 justify-content-center">
                            <div class="form-group mt-5 text-center">
                                <button
                                    class="btn  btn-outline-dark ">
                                    {{ $product->pattribute ? __('admin.products.attributes.update-product-attribute') : __('admin.products.attributes.add-product-attribute')   }}

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


@endsection
@section('scripts')

@endsection

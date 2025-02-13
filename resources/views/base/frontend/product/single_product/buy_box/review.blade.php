<div class="tab params" style="display:none;">
    <article>
        <h2 class="params-headline">
            مشخصات فنی
            <span>
                {!! $product->title !!}
            </span>
        </h2>
        <section>
            <div class="is-masked" style="padding: 4%">

                @if($product->pattribute)
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_group ?  '' : 'display:none !important' }}" style="{{ $product->pattribute->cctv_group ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15% ;color: #9496ac">@lang('admin.products.attributes.cctv_group')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1 "  >
                            <small class="d-flex  text-body-1 color-900 break-words" style="border-bottom: 1px solid #007bff">{{ $product->pattribute->cctv_group }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_type ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_type')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_type }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_power_source ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_power_source')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_power_source }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_outdoor_use ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_outdoor_use')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_outdoor_use }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_sensor ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_sensor')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_sensor }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_compression ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_compression')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_compression }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_resolution ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_resolution')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_resolution }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->lenz ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.lenz')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->lenz }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->viewing_angle ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.viewing_angle')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->viewing_angle }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->range_pan_horizontal_movement ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.range_pan_horizontal_movement')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->range_pan_horizontal_movement }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->rang_tilt_vertical_movement ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.rang_tilt_vertical_movement')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->rang_tilt_vertical_movement }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_ai_programming ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_ai_programming')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_ai_programming }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_temperature_of_performance ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_temperature_of_performance')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_temperature_of_performance }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->max_frame ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.max_frame')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->max_frame }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->range_dynamics ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.range_dynamics')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->range_dynamics }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->record_day_night ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.record_day_night')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->record_day_night }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->night_vision ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.night_vision')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->night_vision }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->min_colored_light ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.min_colored_light')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->min_colored_light }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->optical_magnification ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.optical_magnification')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->optical_magnification }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_voice ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_voice')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_voice }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_memory_card_slot ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_memory_card_slot')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_memory_card_slot }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_memory_card_slot ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_memory_card_slot')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_memory_card_slot }} </small>
                        </div>
                    </div>
                    <div class="w-100 d-flex last" style="{{ $product->pattribute->cctv_resistance_to_vandalism ?  '' : 'display:none !important' }}">
                        <p class="ml-4 text-body-1 color-500 py-2 py-3-lg p-2-lg " style="width:15%  ;color: #9496ac">@lang('admin.products.attributes.cctv_resistance_to_vandalism')</p>
                        <div class="  w-100 py-2 py-3-lg grow-1">
                            <small class="d-flex  text-body-1 color-900 break-words"  style="border-bottom: 1px solid #007bff" >{{ $product->pattribute->cctv_resistance_to_vandalism }} </small>
                        </div>
                    </div>

                @else
                    <h4 class="text-center text-warning">

                        برای این محصولی ویژگی ای ثبت نشده است .!!!

                    </h4>



                @endif
            </div>
        </section>
    </article>
    <script>
        $(document).ready(function () {
            $('.break-words').text()
        })
    </script>
</div>


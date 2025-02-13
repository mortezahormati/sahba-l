<div>
    <div id="zoom-box"></div>
    <div class="c-product__config"><span class="c-product__title-en">Samsung Galaxy A51 SM-A515F/DSN Dual SIM 128GB With 6GB Ram Mobile Phone</span>
        <div class="c-product__engagement">
            <div class="c-product__engagement-item">
                <div class="c-product__engagement-rating">
                    ۴.۴
                    <span class="c-product__engagement-rating-num">
                                        (۴۰۹۱)
                                    </span></div>
            </div>
            <div class="c-product__engagement-item js-scroll-to-tab" data-id="comments">
                <div class="c-product__engagement-link" data-activate-tab="comments">
                    ۶۹۶۴
                    دیدگاه کاربران
                </div>
            </div>
            <div class="c-product__engagement-item js-scroll-to-tab" data-id="questions">
                <div class="c-product__engagement-link" data-activate-tab="questions">
                    ۱۳۴۴
                    پرسش و پاسخ
                </div>
            </div>
        </div>
        <div class="c-product__guaranteed"><span>
                            پیشنهاد شده توسط بیش از ۹۹۹ نفر از خریداران
                        </span></div>
        <div class="c-product__config-wrapper">
            <div class="c-product__circle-variants">
                <div class="c-product__circle-variants__title">
                    <header>رنگ :</header>
                    <span class="js-color-title"></span>
                </div>
                <ul class="js-product-variants">
                    @if($product->colors && $product->colors->count() >= 1)
                        @foreach($product->colors as $c)
                            <li class="js-c-ui-variant c-circle-variant__item color-name"
                                data-event="config_change" data-event-category="product_page" data-id="{{ $c->id }}"
                                data-event-label="change: color">
                                <label
                                    data-snt-event="dkProductPageClick"
                                    data-snt-params=''
                                    class="js-circle-variant-color c-circle-variant c-circle-variant--color"
                                    data-code="#2196f3">
                                    <input type="radio" value="4" name="color"
                                                               id="variant"
{{--                                                               wire:change="changeStatusColor({{$c->id}})"--}}
                                                               class="js-variant-selector js-color-filter-item"
                                                               data-title="{{ $c->name }}" data-type="color">
                                    <span class="c-circle-variant__border"></span>
                                    <span class="c-tooltip c-tooltip--small-bottom c-tooltip--short">{{ $c->name }}</span>
                                    <span class="c-circle-variant__shape" style="background-color: {{ $c->color_palette }}"></span>
                                </label>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="c-product__params js-is-expandable"
                 data-collapse-count="3">
                <ul data-title="ویژگی‌های کالا" style="font-size:1rem ;font-weight: 600" >
                       {!! $product->body !!}
                </ul>
                <div class="c-product__additional-info">
                    <div class="c-product__additional-item ">
                        هشدار سامانه صهبا: حتما در زمان تحویل دستگاه، به کمک کد فعال‌سازی چاپ
                        شده روی جعبه یا کارت گارانتی، دستگاه را از طریق سامانه صهبا ثبت کنید،
                    </div>
                </div>
            </div>

{{--            <div class="c-product__plus-box js-pdp-roosta-badge u-show">--}}
{{--                <div class="c-product__plus-box-row c-product__plus-box-row--between"><span--}}
{{--                        class="c-product__rostaee-box-title"><img--}}
{{--                            src="../../static/files/fe996d9b.svg" alt="Rostaee Badge">--}}
{{--                                        کسب و کارهای بومی--}}
{{--                                    </span><a href="../../landings/village-businesses/index.html"--}}
{{--                                              class="c-product__plus-box-link">اطلاعات بیشتر</a></div>--}}
{{--                <div class="c-product__plus-box-row c-product__plus-box-row--specs"><span--}}
{{--                        class="c-product__plus-box-description">--}}
{{--                                        این کالا جزو تولیدات بومی - محلی می باشد.--}}
{{--                                    </span></div>--}}
{{--            </div>--}}
        </div>
        <div class="c-product__plus-box js-pdp-plus-box ">
            <div class="c-product__plus-box-row c-product__plus-box-row--between"><span
                    class="c-product__plus-box-title c-digiplus-sign--before">
                                        خدمات ویژه کاربران دیجی‌پلاس
                                                                            </span><a
                    href="../../plus/landing/index.html" class="c-product__plus-box-link">شما
                    هم عضو شوید</a></div>
            <div class="c-product__plus-box-row c-product__plus-box-row--specs"><span
                    class="c-product__plus-box-description js-plus-feature-cash-back u-hidden">
                                        ۰ تومان هدیه نقدی
                                    </span><span class="c-product__plus-box-description">ارسال رایگان</span><span
                    class="c-product__plus-box-description">۳۰ روز بازگشت کالا</span><span
                    class="c-product__plus-box-description js-plus-feature-jet ">
                                        امکان ارسال فوری
                                    </span></div>
        </div>
{{--        <div class="c-product__config">--}}
{{--            <div class="c-product__plus-box js-pdp-plus-box ">--}}
{{--                <div class="c-product__plus-box-row c-product__plus-box-row--between"><span--}}
{{--                        class="c-product__plus-box-title c-digiplus-sign--before">--}}
{{--                                        خدمات ویژه کاربران دیجی‌پلاس--}}
{{--                                                                            </span><a--}}
{{--                        href="../../plus/landing/index.html" class="c-product__plus-box-link">شما--}}
{{--                        هم عضو شوید</a></div>--}}
{{--                <div class="c-product__plus-box-row c-product__plus-box-row--specs"><span--}}
{{--                        class="c-product__plus-box-description js-plus-feature-cash-back u-hidden">--}}
{{--                                        ۰ تومان هدیه نقدی--}}
{{--                                    </span><span class="c-product__plus-box-description">ارسال رایگان</span><span--}}
{{--                        class="c-product__plus-box-description">۳۰ روز بازگشت کالا</span><span--}}
{{--                        class="c-product__plus-box-description js-plus-feature-jet ">--}}
{{--                                        امکان ارسال فوری--}}
{{--                                    </span></div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <script>
        $(".color-name").on('change' , function () {
            var id = $(this).data('id');
            var name = $(this).find('.js-color-filter-item').attr('data-title');
            $(".js-color-title").text(name)
        });
        document.addEventListener('DOMContentLoaded', function () {

        });
    </script>
</div>

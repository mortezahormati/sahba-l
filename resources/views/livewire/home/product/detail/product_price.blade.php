<div style="width: 45%;">
    <div class="c-product__summary js-product-summary">
        <div class="c-box">
            <div class="c-product__seller-info js-seller-info">
                <div class="js-seller-info-changable c-product__seller-box">
                    <div class="c-product__seller-counter">
                        <div>فروشنده</div>
                        <a href="#suppliers" class="js-seller-count-row u-hidden"><span
                                class="js-seller-count u-text-bold"></span><span
                                class="u-text-bold"> فروشنده</span>
                            دیگر
                        </a></div>
                    <div
                        class="c-product__seller-row c-product__seller-row--seller c-product__seller-row--clickable js-seller-info-seller js-seller-variant">
                        <div class="c-product__seller-row-main ">
                            {{ $product->vendor_persian_name }}
                        </div>
                    </div>
                    <div
                        class="c-product__seller-row c-product__seller-row--guarantee c-product__seller-row--clickable js-seller-info-guarantee"
                        style="pointer-events: none;">
                        <div class="c-product__seller-row-main js-guarantee-text">
                            {{ $product->warranty ?  $product->warranty->name : 'فاقد ضمانتنامه' }}
                        </div>
                        <div
                            class="c-product__seller-extra js-guarantee-extra-toggle u-hidden"></div>
                    </div>

                    <div
                        class="c-product__seller-row c-product__seller-row--column js-seller-info-shipment c-product__seller-row--clickable">
                        <div class="c-product__seller-row-main c-product__seller-row-main--arrow-left">
                            @if(($product->number) > 0)
                            <span
                                class="c-product__delivery-warehouse js-provider-main-title c-product__delivery-warehouse--no-lead-time">
                                موجود در انبار صهبا : {{ $product->number }}
                                عدد
                            </span>
                            @else
                               درصورت موجود شدن اطلاع بده
                            @endif
                        </div>

                    </div>
{{--                    <div class="c-product-info-box js-shipment-info-expand">--}}
{{--                        <div class="c-product-info-box__header">--}}
{{--                            <div--}}
{{--                                class="c-product-info-box__header-back-btn js-product-info-box-back-btn"></div>--}}
{{--                            جزئیات ارسال--}}
{{--                        </div>--}}
{{--                        <div class="c-product-info-box__body-wrapper">--}}
{{--                            <div class="c-product-info-box__body">--}}
{{--                                <div--}}
{{--                                    class="c-shipment-info-box__row js-shipment-info-main-container">--}}
{{--                                    <div class="c-shipment-info-box__row--title">--}}
{{--                                        ارسال توسط دیجی‌کالا--}}
{{--                                    </div>--}}
{{--                                    <div class="c-shipment-info-box__row--content">--}}
{{--                                        این کالا پس از مدت زمان مشخص شده توسط فروشنده در انبار--}}
{{--                                        دیجی‌کالا تامین و آماده پردازش می‌گردد و توسط پیک--}}
{{--                                        دیجی‌کالا در بازه انتخابی ارسال خواهد شد.--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div--}}
{{--                        class="c-product__seller-row c-product__seller-row--gift c-product__seller-row--clickable js-seller-info-gift u-show"--}}
{{--                        style="pointer-events: none;">--}}
{{--                        <div--}}
{{--                            class="c-product__seller-row-main js-gift-text js-single-gift "></div>--}}
{{--                        <div--}}
{{--                            class="c-product__seller-row-main js-gift-text js-multi-gift u-hidden">--}}
{{--                            <span class="js-gift-count">۰</span>--}}
{{--                            هدیه--}}
{{--                        </div>--}}
{{--                        <div class="c-product__seller-extra js-gift-extra-toggle "></div>--}}
{{--                    </div>--}}
{{--                    <div class="c-product-info-box js-gift-info-expand">--}}
{{--                        <div class="c-product-info-box__header">--}}
{{--                            <div--}}
{{--                                class="c-product-info-box__header-back-btn js-product-info-box-back-btn"></div>--}}
{{--                            لیست هدیه‌ها--}}
{{--                        </div>--}}
{{--                        <div class="c-product-info-box__body-wrapper">--}}
{{--                            <div class="c-product-info-box__body">--}}
{{--                                <div>--}}
{{--                                    <div class="c-product__gift-title">--}}
{{--                                        لیست هدیه ها--}}
{{--                                    </div>--}}
{{--                                    <div class="c-product__gift-content js-gift-items"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div
                        class="c-product__seller-row c-product__seller-row--best-price-row js-data-best-price u-hidden">
                        بهترین قیمت ۳۰ روز گذشته
                    </div>
                    <div class="c-product__seller-row c-product__seller-row--price">
                        <div class="c-product__seller-price-info">
                            <div class="c-product__seller-price-label">
                                قیمت فروشنده
                                <span class="js-dk-wiki-trigger c-wiki c-wiki__holder">
                                    <span class="c-wiki-sign">

                                    </span>
                                    <div class="c-wiki__container js-dk-wiki is-right">
                                        <div class="c-wiki__arrow">

                                        </div>
                                        <p class="c-wiki__text">
            این کالا توسط فروشنده آن،شرکت صهبا، قیمت‌گذاری شده‌ است.

                                        </p>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="c-product__seller-price-real">
                            @if(!is_null($product->price))
                            <div class="c-product__seller-price-pure js-price-value">
                                {{ $product->price  }}
                            </div>
                                @else
                                <div class="c-product__seller-price-pure js-price-value" style="font-size:1rem !important;">
                                <span> قیمت از : {{ $product->price_from }}</span>
                                    <span> قیمت تا : {{ $product->price_to }}</span>
                                </div>
                            @endif
                            تومان
                        </div>
                    </div>
{{--                    <div class="c-product__remaining-in-stock--parent">--}}
{{--                        <div class="c-cart-view-count">--}}
{{--                            ۱۰۰+--}}
{{--                            نفر در حال بازدید این کالا می‌باشند.--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="c-product__seller-row c-product__seller-row--add-to-cart"><a
                        class="btn-add-to-cart btn-add-to-cart--full-width js-add-to-cart js-cart-page-add-to-cart js-btn-add-to-cart"
                        data-product-id="2361428"
                        data-variant="13152337"
                        href="../../cart/add/13152337/1/index.html"
                        data-event="add_to_cart" data-event-category="ecommerce"
                        data-event-label="price: 72300000 - seller: marketplace - seller_name: کارزین تل - seller_rating: 84 - multiple_configs: True - position: 0"><span
                            class="btn-add-to-cart__txt">افزودن به سبد خرید</span></a></div>
            </div>
            <a href="#suppliers">
                <div
                    class="c-product-shipping-limitation c-product-shipping-limitation__mt-8 js-btn-supplier-list js-btn-cheapest-price u-hidden">
                    <div
                        class="c-product-shipping-limitation__title c-product-shipping-limitation__title--info">
                        این کالا را ارزان‌تر بخرید
                    </div>
                    <div class="c-product-shipping-limitation__dsc">
                        از
                        <span class="js-cheapest-price"></span> تومان
                        توسط فروشندگان دیگر
                    </div>
                </div>
            </a>
            <a target="_blank"
                   href="../../mag/pricing-sale-and-price-monitoring-at-digikala/index.html"
                   class="c-product__white-box u-hidden">
                <div class="o-hint o-hint--small o-hint--text o-hint--neutral ">
                    فرآیند قیمت‌گذاری و نظارت بر قیمت‌ها
                </div>
            </a>
            <div
                class="c-product__price-survey-question u-hidden js-price-question js-pricing-survey"
                data-variant="13152337"
                data-observed-price="72300000"><label
                    class="js-price-yes js-pricing-survey-btn js-fair-pricing-btn"
                    data-snt-event="dkProductPageClick"
                    data-snt-params='{"item":"price-survey","item_option":"بله"}'
                    data-value="no" data-event="pricing_experience"
                    data-event-category="product_page">
                    آیا قیمت مناسب‌تری سراغ دارید؟
                </label>
                <div
                    class="c-product__price-suggestion js-price-yes js-pricing-survey-btn js-fair-pricing-btn"
                    data-snt-event="dkProductPageClick"
                    data-snt-params='{"item":"price-survey","item_option":"بله"}'
                    data-value="no" data-event="pricing_experience"
                    data-event-category="product_page"></div>
            </div>
        </div>
    </div>
</div>

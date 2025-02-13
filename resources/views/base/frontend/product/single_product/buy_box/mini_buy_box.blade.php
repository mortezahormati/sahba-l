<div class="col-lg-4 col-md-4 col-xs-12 pull-left sticky-sidebar" style="padding: 0px; position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px;"><div class="product-seller-info">
            <div class="js-seller-info-changable">
                <div class="product-seller-row">
                    <div class="product-seller-first-line d-inline-block">
                        <i class="mdi mdi-storefront"></i>
                        فروشنده: {{ $product->vendor_persian_name }}
                    </div>

                </div>
                <div class="product-seller-row product-seller-row-guarantee">
                    <div class="js-guarantee-text">
                        <i class="mdi mdi-check"></i>
                       <span> {{ $product->warranty ? $product->warranty->name : '' }}</span>
                    </div>
                </div>
                <div class="product-seller-row js-seller-info-shipment">
                    <div class="js-guarantee-text">
                        @if(($product->number) > 0)
                            <i class="mdi mdi-content-save-outline"></i>

                            <span
                                class="c-product__delivery-warehouse js-provider-main-title c-product__delivery-warehouse--no-lead-time">
                                موجود در انبار صهبا :
                                {{ $product->number }}
                                عدد
                            </span>
                        @else
                            <i class="mdi mdi-bell-alert"></i>
                            درصورت موجود شدن اطلاع بده

                        @endif

                    </div>

                </div>
                {{--                        <div class="product-seller-row">--}}
                {{--                            <div class="product-seller-digiclub">--}}
                {{--                                <img src="assets/images/digiclub.png" alt="digiclub">--}}
                {{--                                <div>--}}
                {{--                                    <span>۱۵۰</span>--}}
                {{--                                    امتیاز دیجی&zwnj;کلاب--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                <div class="product-seller-row">
                    <div class="product-seller-row-price">
                        <div class="product-seller-price-label">
                            قیمت فروشنده
                        </div>
                        <div class="product-seller-price-real">
                            <div class="product-seller-price-prev">۶,۲۸۹,۰۰۰ </div>
                            تومان
                        </div>
                    </div>
                    <div class="product-remaining-in-stock-parent">
                        <div class="cart-view-count">
                            <i class="mdi mdi-eye-outline"></i>
                            ۱۰+
                            نفر در حال بازدید این کالا می&zwnj;باشند.
                        </div>
                    </div>
                    <a href="{{ route('basket.add' , $product->id) }}" class="btn-add-to-cart">
                                                <span class="btn-add-to-cart-txt">افزودن
                                                    به سبد خرید
                                                </span>
                    </a>
                </div>
            </div>
        </div></div></div>

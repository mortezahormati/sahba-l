<div class="p-tabs" style="transform: none;">
    <div class="col-lg-9 col-md-12 col-xs-12 pull-right p-0 res-w" style="transform: none;">
        @include('base.frontend.product.single_product.buy_box.tabs')


        <div class="tabs-content" style="transform: none;">
            <div class="tab-active-content" style="transform: none;">
                            @include('base.frontend.product.single_product.buy_box.tab_content')
                            @include('base.frontend.product.single_product.buy_box.review')
{{--                            @include('base.frontend.product.single_product.buy_box.comments')--}}
{{--                            @include('base.frontend.product.single_product.buy_box.faqs')--}}
            </div>
            <div class="footer-product-id">
                <span>شناسه کالا :</span>
                <span>SHB - {{ $product->id + 100000 }}</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-xs-12 pull-left sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

        <div class="theiaStickySidebar" style="padding-top: 1px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 40px;">
            <div class="mini-buy-box-fixed">
                <div class="mini-buy-box js-mini-buy-box">
                    <div class="mini-buy-box-product-info">
                        <img src="{{ url('Products/'.$product->img) }}" class="mini-buy-box-product-info-img" alt="{{ $product->title }}">
                        <div class="mini-buy-box-product-info-info">
                            <div class="title">{{ $product->title }}</div>
                            <div class="colors">
                                <label class="ui-variant-color">
                                    <span class="ui-variant-shape  js-color-pallete" style=" height: 25px; width: 25px;background-color: #bbb;border-radius: 50%;display: inline-block; margin-top: 16px;"></span>
{{--                                    <span class="" style="background-color: #181818"></span>--}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mini-buy-box-row mini-buy-box-seller ">
                            <div class="product-seller-first-line d-inline-block">
                                <i class="mdi mdi-storefront"></i>
                                فروشنده: {{ $product->vendor_persian_name }}
                            </div>
                    </div>
                    <div class="mini-buy-box-row mini-buy-box-seller ">

                        <label class="js-mini-seller-name">
                            {{ $product->provider_persian_name }}
                        </label>
                    </div>
                    <div class="mini-buy-box-row mini-buy-box-warranty">
                        <label for="">
                            <i class="mdi mdi-check"></i>
                            {{ $product->warranty ? $product->warranty->name : 'فاقد ضمانتنامه' }}
                        </label>
                    </div>
                    <div class="mini-buy-box-row mini-buy-box-stock">
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
                    <div class="mini-buy-box-row mini-buy-box-best-price js-data-best-price text-success">
                        <i class="mdi mdi-information-outline"></i>
                        بهترین قیمت ۳۰ روز گذشته
                    </div>
                    <div class="product-seller-row product-seller-row-price mini-buy-box-price-row">
                        <div class="product-mini-seller-price-real">
                            <div class="product-mini-seller-price-pure js-price-value d-inline-block">۶,۲۱۵,۰۰۰
                            </div>
                            <span class="mini-buy-box-toman">تومان</span>
                        </div>
                    </div>
                    <div class="mini-buy-box-btn-row">
                        <a href="{{ route('basket.add' , $product->id) }}" class="btn btn-danger product-add-to-cart-btn">
                            افزودن به سبد خرید
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




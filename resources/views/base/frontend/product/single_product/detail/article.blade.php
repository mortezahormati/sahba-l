<article class="js-product" style="transform: none;">
    <div class="product-nav-container">
        @include('base.frontend.product.single_product.detail.nav-bar')
    </div>
    <div class="col-lg-4 col-md-12 col-xs-12 pull-right">
        @include('base.frontend.product.single_product.detail.gallery')
        @include('base.frontend.product.single_product.detail.social_modal')
    </div>

    <div class="col-lg-8 col-md-12 col-xs-12 pull-left px-0" style="transform: none;">
        @include('base.frontend.product.single_product.detail.product_config')
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12 pull-left px-0">
        @include('base.frontend.product.single_product.detail.product_usb')
    </div>
</article>

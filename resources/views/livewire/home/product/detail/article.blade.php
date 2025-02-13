<div>
<article class="c-product js-product">
    <section class="c-product__info">
        @include('livewire.home.product.detail.title')
        <div class="c-product__attributes js-product-attributes u-relative">
            @include('livewire.home.product.detail.product_config')
            @include('livewire.home.product.detail.product_price')
        </div>
        @include('livewire.home.product.detail.product_usb')
    </section>
    @include('livewire.home.product.detail.gallery')
</article>
</div>

<div>
    <div class="c-product__bottom-section u-mt-12 has-mini-buybox">
        <div id="tabs" class="o-box o-box--no-border o-box--grow c-product__tabs-container">
            <div class="">
                @include('livewire.home.product.buy_box.tabs')
                @include('livewire.home.product.buy_box.description')
                {{--            @include('livewire.home.product.buy_box.review')--}}
                {{--            @include('livewire.home.product.buy_box.tab_content')--}}
                {{--            @include('livewire.home.product.buy_box.comments')--}}
                {{--            @include('livewire.home.product.buy_box.faqs')--}}
            </div>
        </div>
        <div class="c-mini-buy-box-fixed">
            @include('livewire.home.product.buy_box.mini_buy_box')
            @include('livewire.home.product.buy_box.supplires')
        </div>
    </div>
</div>

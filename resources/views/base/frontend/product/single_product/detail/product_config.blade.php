<section class="product-info" style="transform: none;">
    <div class="product-headline">
        <div class="product-title-container">
            <div class="product-directory">
                <ul class="mb-0">
                    @if( $product->brands && $product->brands->count() >= 1 )
                        @foreach($product->brands as $b)
                            <a href="#" class="link-border">
                                <img
                                    style="width: 6%"
                                    class="img-fluid img-thumbnail"
                                    src="{{ asset('storage/'.$b->img) }}"
                                    alt="brand logo"/>
                                <span class="text-info"> {{ $b->name }}</span>
                                <span class="text-info"> /</span>
                            </a>
                        @endforeach
                    @endif
                    <li>
                        <a href="#" class="link-border">{{ $product->name }}</a>
                    </li>
                </ul>
                <h1 class="product-title">
                    {{ $product->name }}
                </h1>
            </div>
        </div>
    </div>
    <div class="product-attributes" style="transform: none;">
        <div class="col-lg-8 col-md-8 col-xs-12 pull-right pr-0">
            <div class="product-config">
                <span class="product-title-en">
                    {{ $product->title }}
                </span>
                <div class="product-engagement">
                    <div class="product-engagement-item">
                        <div class="product-engagement-rating">{{ $product->rate_count }}
                            <span class="product-engagement-rating-num">
                                                    ({{ $product->rate_count }})
                                                </span>
                        </div>
                    </div>
{{--                    <div class="product-engagement-item">--}}
{{--                        <div class="product-engagement-set"></div>--}}
{{--                        <div class="product-engagement-link" data-activate-tab="comments">--}}
{{--                            ۸۱--}}
{{--                            دیدگاه کاربران--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="product-engagement-item">--}}
{{--                        <div class="product-engagement-set"></div>--}}
{{--                        <div class="product-engagement-link" data-activate-tab="questions">--}}
{{--                            ۱۴--}}
{{--                            پرسش و پاسخ--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                @include('base.frontend.product.single_product.detail.title')
            </div>
        </div>
        @include('base.frontend.product.single_product.buy_box.mini_buy_box')
    </div>



</section>







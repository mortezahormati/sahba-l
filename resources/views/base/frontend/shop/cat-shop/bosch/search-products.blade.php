<div class="listing-listing" style="width: 100%">
    <div class="listing-counter">
        {{ $products->count() }}
        کالا

    </div>
    <div class="listing-header">
        <span class="mdi mdi-sort-variant"></span>
        <ul class="listing-sort nav nav-tabs" id="myTab2" role="tablist" data-label="مرتب&zwnj;سازی بر اساس :">
            <li class="listing-active nav-item"><a class="nav-link active" id="mostvisited-tab" data-toggle="tab" href="#mostvisited" role="tab" aria-controls="mostvisited" aria-selected="true">پربازدید ترین</a>
            </li>
            <li class="nav-item"><a class="nav-link" id="bestselling-tab" data-toggle="tab" href="#bestselling" role="tab" aria-controls="bestselling" aria-selected="false">پرفروش
                    ترین</a>
            </li>
            <li class="nav-item"><a class="nav-link" id="mostpopular-tab" data-toggle="tab" href="#mostpopular" role="tab" aria-controls="mostpopular" aria-selected="false">محبوب
                    ترین</a>
            </li>
            {{--                        <li class="nav-item"><a class="nav-link" id="cheapest-tab" data-toggle="tab" href="#cheapest" role="tab" aria-controls="cheapest" aria-selected="false">ارزان ترین</a>--}}
            {{--                        </li>--}}
            {{--                        <li class="nav-item"><a class="nav-link" id="mostexpensive-tab" data-toggle="tab" href="#mostexpensive" role="tab" aria-controls="mostexpensive" aria-selected="false">گران ترین</a>--}}
            {{--                        </li>--}}
        </ul>
    </div>

    <!-- <ul class="listing-item"> -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="mostvisited" role="tabpanel" aria-labelledby="mostvisited-tab">
            <ul class="listing-item">
                <li>
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-3 col-xs-12 pull-right px-0">
                            <div class="promotion-box">
                                <div class="product-seller-details">
                                    <span class="product-main-seller">فروشنده : {{ $product->vendor_persian_name }}</span>
                                </div>

                                <a href="#" class="promotion-box-image">
                                    <img src="{{ url('Products/'.$product->img) }}" alt="product">
                                </a>

                                <div class="product-box-content">
                                    <a href="{{ route('single.product.index' , [$product->id , $product->link])  }}" class="product-box-title">{{ $product->title }}</a>
                                </div>

                                <div class="product-box-rate">
                                    <span>۲,۶۵۰ نفر</span>
                                    <div class="product-star mb-3">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>

                                <div class="product-box-row">
                                    <span class="price-value-wrapper">{{ number_format($product->price) }} </span>
                                    <span class="price-currency">تومان </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </li>
            </ul>
            <div class="pagination">
                {{ $products->links() }}
            </div>
        </div>
        <div class="tab-pane fade" id="bestselling" role="tabpanel" aria-labelledby="bestselling-tab">
            <ul class="listing-item">
                <li>
                    @foreach($products_best_sell as $product)
                        <div class="col-lg-3 col-md-3 col-xs-12 pull-right px-0">
                            <div class="promotion-box">
                                <div class="product-seller-details">
                                    <span class="product-main-seller">فروشنده : {{ $product->vendor_persian_name }}</span>
                                </div>

                                <a href="#" class="promotion-box-image">
                                    <img src="{{ url('Products/'.$product->img) }}" alt="product">
                                </a>

                                <div class="product-box-content">
                                    <a href="{{ route('single.product.index' , [$product->id , $product->link])  }}" class="product-box-title">{{ $product->title }}</a>
                                </div>

                                <div class="product-box-rate">
                                    <span>۲,۶۵۰ نفر</span>
                                    <div class="product-star mb-3">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>

                                <div class="product-box-row">
                                    <span class="price-value-wrapper">{{ number_format($product->price) }} </span>
                                    <span class="price-currency">تومان </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </li>
            </ul>
            <div class="pagination">
                {{ $products_best_sell->links() }}
            </div>
        </div>
        <div class="tab-pane fade" id="mostpopular" role="tabpanel" aria-labelledby="mostpopular-tab">
            <ul class="listing-item">
                <li>

                    @foreach($products_best_popular as $product)
                        <div class="col-lg-3 col-md-3 col-xs-12 pull-right px-0">
                            <div class="promotion-box">
                                <div class="product-seller-details">
                                    <span class="product-main-seller">فروشنده : {{ $product->vendor_persian_name }}</span>
                                </div>

                                <a href="#" class="promotion-box-image">
                                    <img src="{{ url('Products/'.$product->img) }}" alt="product">
                                </a>

                                <div class="product-box-content">
                                    <a href="{{ route('single.product.index' , [$product->id , $product->link])  }}" class="product-box-title">{{ $product->title }}</a>
                                </div>

                                <div class="product-box-rate">
                                    <span>۲,۶۵۰ نفر</span>
                                    <div class="product-star mb-3">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>

                                <div class="product-box-row">
                                    <span class="price-value-wrapper">{{ number_format($product->price) }} </span>
                                    <span class="price-currency">تومان </span>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </li>
            </ul>
            <div class="pagination">
                {{ $products_best_popular->links() }}
            </div>
        </div>

        <div class="tab-pane fade" id="cheapest" role="tabpanel" aria-labelledby="cheapest-tab">
            <ul class="listing-item">
                <li>




                </li>
            </ul>
        </div>
        <div class="tab-pane fade" id="mostexpensive" role="tabpanel" aria-labelledby="mostexpensive-tab">
            <ul class="listing-item">
                <li>

                </li>
            </ul>
        </div>
    </div>
    <!-- </ul> -->

</div>

<div class="col-lg-12 col-md-12 col-xs-12 pull-right p-0">
    <div class="row">
        <div class="col-12">
            <div class="widget widget-product card">
                <header class="card-header">
                    <span class="title-one" style="font-size: 18px ; font-weight: bold">محصولات مرتبط</span>
                </header>
                @if($same_products->count() > 0)
                <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 3261px;">
                                @foreach($same_products as $same)
                                    <div class="owl-item active" style="width: 455.75px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="{{ route('single.product.index' , [$same->id , $same->link])  }}">
                                                <img src="{{ url('Products/'.$same->img) }}" class="img-fluid"
                                                     alt="img-slider">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="{{ route('single.product.index' , [$same->id , $same->link])  }}">
                                                    {{ $same->name  }}
                                                </a>
                                            </h2>
                                            <div class="price">
                                                {{--                                        <del><span>۴,۵۳۰,۰۰۰<span>تومان</span></span></del>--}}
                                                <ins>
                                                    <span>{{ $same->price ? $same->price : '' }}<span>تومان</span></span>
                                                </ins>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev disabled"><i
                                    class="fa fa-angle-right"></i></button>
                            <button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-left"></i>
                            </button>
                        </div>
                        <div class="owl-dots disabled"></div>
                </div>

                @else
                    <div class="col-md-12 text-center justify-content-center" style="min-height: 250px">
                        <h4 class="text-center text-warning" style="margin-top: 5%">

                            برای این محصول محصولات مشابهی موجود نیست .!!!

                        </h4>
                    </div>

                @endif

        </div>
    </div>
</div>

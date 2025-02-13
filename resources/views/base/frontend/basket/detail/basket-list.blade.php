<div class="col-lg-9 col-md-9 col-xs-12 pull-right">
    <div class="page-content-cart">
        @if(!$items->isEmpty())
            @foreach($items as $item)

                    <div class="checkout-body">
                        <a href="{{ route('basket.remove' , $item->id) }}" class="remove-from-cart">
                            <i class="mdi mdi-close"></i>
                        </a>
                        <a href="#" class="col-thumb"><img src="{{ url('Products/'.$item->img) }}" alt="img-slider"></a>

                        <div class="checkout-col-desc">
                            <a href="#">
                                <h3>
                                    {{ $item->title }}
                                </h3>
                            </a>
                            <div class="checkout-variant-color">
                                <span class="checkout-variant-title" >{{ $item->colors->last()->name }}</span>
                                <div class="checkout-variant-shape" style="background-color: {{ $item->colors->last()->color_palette }}"></div>
                                <div class="checkout-guarantee">
                                    <i class="fa fa-check"></i>
                                    {{ $item->warranty->name ?? 'فاقد ضمانتنامه'  }}
                                </div>
                            </div>
                            <form action="{{ route('basket.update' , $item->id) }}" method="post" id="count-change-sale">
                                @csrf
                                <div class="quantity">
                                    <input name="quantity" id="quantity" data-id="{{ $item->id }}" type="number" min="1" max="{{ $item->number - 2 }}" step="1" value="{{ $item->quantity }}">
                                    <div class="quantity-nav">
                                        <div class="quantity-button quantity-up">+</div>
                                        <div class="quantity-button quantity-down">-</div>
                                        <button type="submit" class="btn btn-success mt-2">
                                            به روز رسانی
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <a href="#" class="add-to-sfl">
                                <div class="cart-item-product-price">
                                    {{ number_format($item->price) }}
                                    <span>
                                            @lang('home.basket.unit-of-price')
                                        </span>
                                </div>
                            </a>
                        </div>
                    </div>

                <hr style="background-color: #007bff; width: 80%;margin-right: 5%">
            @endforeach
        @else
            <div class="container">
                <div class="checkout-empty">
                    <div class="checkout-empty-icon">
                        <span class="mdi mdi-cart-remove"></span>
                    </div>
                    <div class="checkout-empty-title">
                      @lang('home.basket.empty-basket')
                        <a href="{{ route('shop.index') }}">
                            @lang('home.basket.go-to-products-shop')
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>

</div>
<script>
    {{--$(document).ready(function () {--}}
    {{--   $('#count-change-sale').on('submit' , function (e) {--}}
    {{--       $('input[data-id="' + {{ $item }} + '"]').val();--}}
    {{--       $('input[data-id="' + name + '"]')--}}
    {{--       alert(123);--}}
    {{--   })--}}
    {{--})--}}
</script>

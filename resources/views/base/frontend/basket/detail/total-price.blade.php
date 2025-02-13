@inject('basket' ,'App\Support\Basket\Basket' )
<div class="col-lg-3 col-md-3 col-xs-12 pull-left">
    <div class="page-aside">
            @csrf
            <input type="hidden" name="amount" value="">
            <input type="hidden" name="amount">
        <div class="checkout-summary">
            <ul class="checkout-summary-summary">
                <li>
                    <span>مبلغ کل </span>
                    <span>
                        {{ number_format($basket->subTotal() , 1) }}
                        @lang('home.basket.unit-of-price')
                    </span>
                </li>
                <li>
                    <span>
                        <small>
                            (9 درصد)
                        </small>
                        هزینه ارزش افزوده </span>
                    <span>{{ number_format(($basket->subTotal() * 0.09)) }}
                        @lang('home.basket.unit-of-price')
                    </span>
                </li>
                <li>
                    <span>مبلغ قابل پرداخت</span>
                    <span>
                        {{ number_format(($basket->subTotal() + ($basket->subTotal()*0.09) ),1)   }}
                        @lang('home.basket.unit-of-price')
                    </span>
                </li>

            </ul>
            <hr>
           <div class="col-md-12 text-center mb-2">
               <a href="{{ route('basket.checkout-form') }}" class="btn btn-info"> ثبت و تایید سفارش </a>
           </div>
        </div>

        <div class="checkout-summary-content">
            <p>کالاهای موجود در سبد شما ثبت و رزرو نشده&zwnj;اند، برای ثبت سفارش مراحل بعدی را تکمیل کنید.</p>
        </div>
    </div>
</div>

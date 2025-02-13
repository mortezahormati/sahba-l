<div class="product-config-wrapper">
    <div class="product-variants">
        @if($product->colors && $product->colors->count() >= 1)
            <div  style="display: flex ; flex-wrap: wrap;"> <span>
               رنگ :
           </span>
                <span class="js-color-title"></span></div>
            <div  style="display: flex ; flex-wrap: wrap;">
                <ul>
                    @foreach($product->colors as $c)
                        <li class="js-c-ui-variant color-name"
                            data-id="{{ $c->id }}"
                        >
                            <label class="ui-variant-color">
                                <span class="ui-variant-shape" style="background-color: {{ $c->color_palette }}"></span>
                                <input type="radio" name="color" id="variant" class="js-variant-selector"
                                       checked="" data-title="{{ $c->name }}" data-pallete="{{ $c->color_palette  }}">
                                <span class="ui-variant-check"></span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

        @endif
    </div>
    <div class="product-params">
        {!! $product->body !!}
        <div class="product-additional-info">
            <div class="product-additional-item">
                <p>هشدار سامانه صهبا: حتما در زمان تحویل دستگاه، به کمک کد فعال&zwnj;سازی
                    چاپ شده روی جعبه یا کارت گارانتی، دستگاه را از طریق سامانه صهبا، برای
                    سیم&zwnj;کارت خود فعال&zwnj;سازی کنید. آموزش تصویری در آدرس اینترنتی
                    hmti.ir/05
                </p>
            </div>
        </div>
    </div>
</div>

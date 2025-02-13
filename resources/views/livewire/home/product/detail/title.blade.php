<div>
    <section class="c-product__info">

        <div class="c-product__title-container">
            @if( $product->brands && $product->brands->count() >= 1 )
                @foreach($product->brands as $b)
                    <a href="{{ $b->link }}">
                        <img
                            class="c-product__title-container--brand-img"
                            src="{{ asset('storage/'.$b->img) }}"
                            alt="brand logo"/>
                    </a>
                    <div>
                        <div class="c-product__title-container--brand"><a
                                class="c-product__title-container--brand-link"
                                href="">{{ $b->name }}</a><span> / </span><a
                                class="c-product__title-container--brand-link"
                                href="">  {{ $b->title }}
                            </a>
                        </div>
                        @endforeach
                        <h1 class="c-product__title">
                          {{ $product->name }}
                        </h1>
                    </div>


            @endif
        </div>
    </section>
</div>

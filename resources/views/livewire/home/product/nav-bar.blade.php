<div>
    <div class="c-product__nav-container">
        <nav class="js-breadcrumb ">
            <ul vocab="https://schema.org/" typeof="BreadcrumbList" class="c-breadcrumb">
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{ route('home.front') }}">
                        <span property="name">صهبا</span>
                    </a>
                    <meta property="position" content="1">
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{ ($product->child_sub_category && $product->child_sub_category->subCategory &&  $product->child_sub_category->subCategory->category ) ? $product->child_sub_category->subCategory->category->link  : '#' }}">
                        <span property="name">{{ ($product->child_sub_category && $product->child_sub_category->subCategory &&  $product->child_sub_category->subCategory->category ) ? $product->child_sub_category->subCategory->category->title  : '' }}</span>
                    </a>
                    <meta property="position" content="2">
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{($product->child_sub_category && $product->child_sub_category->subCategory ) ? $product->child_sub_category->subCategory->link : '#'  }}">
                        <span property="name">{{($product->child_sub_category && $product->child_sub_category->subCategory ) ? $product->child_sub_category->subCategory->title : ''  }}</span>
                    </a>
                    <meta property="position" content="3">
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{($product->child_sub_category) ? $product->child_sub_category->subCategory->link : ''  }}">
                        <span property="name">{{($product->child_sub_category) ? $product->child_sub_category->subCategory->title : ''  }}</span>
                    </a>
                    <meta property="position" content="4">
                </li>
                <li>
                    <span property="name">
                        {{ $product->title }}
                    </span>
                </li>
            </ul>
        </nav>
{{--        <div class="c-product__ext-links">--}}
{{--            <a href="../../landings/seller-introduction/index.html"--}}
{{--               class="c-product__ext-link c-product__ext-link--seller"--}}
{{--               data-snt-event="dkProductPageClick"--}}
{{--               data-snt-params='{"item":"seller-registration","item_option":null}'--}}
{{--               data-event="seller_reg_link" data-event-category="product_page"--}}
{{--               data-event-label="dkp: 2361428 - current_seller: کارزین تل"--}}
{{--               title="کالای خود را در دیجی‌کالا بفروشید" target="_blank">کالای--}}
{{--                خود را در دیجی‌کالا--}}
{{--                بفروشید</a>--}}
{{--        </div>--}}
    </div>
</div>

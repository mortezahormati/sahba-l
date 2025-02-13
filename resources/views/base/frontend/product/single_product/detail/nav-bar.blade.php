<nav aria-label="breadcrumb">
    <ol class="breadcrumb px-0">
        <li class="breadcrumb-item">
            <a property="item" typeof="WebPage" href="{{ route('home.front') }}">
                <span property="name">فروشگاه اینترنتی صهبا</span>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a property="item" typeof="WebPage" href="{{ ($product->child_sub_category && $product->child_sub_category->subCategory &&  $product->child_sub_category->subCategory->category ) ? $product->child_sub_category->subCategory->category->link  : '#' }}">
                <span property="name">{{ ($product->child_sub_category && $product->child_sub_category->subCategory &&  $product->child_sub_category->subCategory->category ) ? $product->child_sub_category->subCategory->category->title  : '' }}</span>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a property="item" typeof="WebPage" href="{{($product->child_sub_category && $product->child_sub_category->subCategory ) ? $product->child_sub_category->subCategory->link : '#'  }}">
                <span property="name">{{($product->child_sub_category && $product->child_sub_category->subCategory ) ? $product->child_sub_category->subCategory->title : ''  }}</span>
            </a>
        </li>
        <li class="breadcrumb-item active open" aria-current="page">{{ $product->name }}</li>
    </ol>
</nav>

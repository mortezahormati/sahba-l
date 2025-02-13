<div class="product-gallery">
    <div class="zoomWrapper" style="height: 411px; width: 411px;">
        <img class="zoom-img" id="img-product-zoom" src="{{ url('Products/'.$product->img) }}" data-zoom-image="{{ url('Products/'.$product->img) }}" width="411" alt="img-slider" style="position: absolute;">
    </div>
    <div id="gallery_01f" style="width:420px;float:right;">
        <ul class="gallery-items owl-carousel owl-theme owl-rtl owl-loaded owl-drag" id="gallery-slider">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 743px;">
                    <div class="owl-item active" style="width: 138.582px; margin-left: 10px;">
                        <li class="item">
                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ url('Products/'.$product->img) }}" data-zoom-image="{{ url('Products/'.$product->img) }}">
                                <img src="{{ url('Products/'.$product->img) }}" width="100" alt="img-slider">
                            </a>
                        </li>
                    </div>
                        @foreach($product_images as $img)
                        <div class="owl-item active" style="width: 138.582px; margin-left: 10px;">
                            <li class="item">
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ url('Gallery/Product/'.$product->id.'/'.$img->img) }}" data-zoom-image="{{ url('Gallery/Product/'.$product->id.'/'.$img->img) }}">
                                    <img src="{{ url('Gallery/Product/'.$product->id.'/'.$img->img) }}" width="100" alt="img-slider">
                                </a>
                            </li>
                        </div>
                        @endforeach
                </div>
            </div>
            <div class="owl-nav">
                <button type="button" role="presentation" class="owl-prev disabled"><i class="fa fa-angle-right"></i>
                </button>
                <button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-left"></i>
                </button>
            </div>
            <div class="owl-dots disabled"></div>
        </ul>
    </div>
    <div class="gallery-item">
        <ul class="gallery-options">
            <li class="option-wishes">
                <button class="btn-option btn-option-wishes">
                    <i class="mdi mdi-heart-outline"></i>
                    <span class="tooltip-short">افزودن به علاقه&zwnj;مندی</span>
                </button>
            </li>
            <li class="option-social">
                <button class="btn-option btn-option-social" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="mdi mdi-share-outline"></i>
                    <span class="tooltip-short">اشتراک گذاری</span>
                </button>
            </li>
            <li class="option-alarm">
                <button class="btn-option btn-option-alarm" data-toggle="modal" data-target="#exampleModalCenteralarm">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="tooltip-short">اطلاع&zwnj;رسانی</span>
                </button>
            </li>
            <li class="option-alarm">
                <a href="product-comparison.html" class="btn-option btn-option-comparison">
                    <i class="mdi mdi-compare"></i>
                    <span class="tooltip-short">مقایسه</span>
                </a>
            </li>
        </ul>
    </div>
</div>

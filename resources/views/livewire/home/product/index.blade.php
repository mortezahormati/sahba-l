<div>
    <style>
        @media screen and (-ms-high-contrast: none) {
            .c-shipment-page__to-payment-sticky, .c-checkout__to-shipping-sticky {
                position: relative !important;
            }

            .c-checkout-aside {
                position: relative !important;
            }
        }

        /* all edge versions */
        @supports (-ms-ime-align:auto) {
            .c-shipment-page__to-payment-sticky, .c-checkout__to-shipping-sticky {
                position: relative !important;
            }

            .c-checkout-aside {
                position: relative !important;
            }
        }
    </style>
    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">
            <div class="o-page c-product-page">
                <div class="container">
                    @include('livewire.home.product.nav-bar')
                    @include('livewire.home.product.detail.article')
                    @include('livewire.home.product.detail.related_product')
                    @include('livewire.home.product.detail.buy_box')
                    @include('livewire.home.product.detail.buy_product')
                </div>
            </div>
            <div class="remodal c-modal c-modal--sm"
                 data-remodal-id="share"
                 role="dialog"
                 aria-labelledby="modalTitle"
                 tabindex="-1z"
                 aria-describedby="modalDesc"
                 data-remodal-options=""
            >
                <div class="c-modal__top-bar  c-modal__top-bar--has-line">
                    <div class="c-modal__title ">اشتراک‌گذاری</div>
                    <div class="c-modal__close" data-remodal-action="close"></div>
                </div>
                <form class="c-share" id="sendToFriend">
                    <div class="c-share__title">
                        با استفاده از روش‌های زیر می‌توانید این صفحه را با دوستان خود به اشتراک بگذارید.
                    </div>
                    <div class="c-share__options">
                        <div class="c-share__social-buttons"><a
                                href="https://twitter.com/intent/tweet?url=https://www.digikala.com/product/dkp-2361428/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF-%D9%85%D8%AF%D9%84-galaxy-a51-sm-a515fdsn-%D8%AF%D9%88-%D8%B3%DB%8C%D9%85-%DA%A9%D8%A7%D8%B1%D8%AA-%D8%B8%D8%B1%D9%81%DB%8C%D8%AA-128%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA"
                                rel="nofollow" class="o-btn c-share__social c-share__social--twitter"
                                target="_blank"></a><a
                                href="https://www.facebook.com/sharer/sharer.php?m2w&amp;s=100&amp;p[url]=https://www.digikala.com/product/dkp-2361428/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF-%D9%85%D8%AF%D9%84-galaxy-a51-sm-a515fdsn-%D8%AF%D9%88-%D8%B3%DB%8C%D9%85-%DA%A9%D8%A7%D8%B1%D8%AA-%D8%B8%D8%B1%D9%81%DB%8C%D8%AA-128%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA"
                                rel="nofollow" class="o-btn c-share__social c-share__social--fb" target="_blank"></a><a
                                href="https://wa.me?text=https://www.digikala.com/product/dkp-2361428/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF-%D9%85%D8%AF%D9%84-galaxy-a51-sm-a515fdsn-%D8%AF%D9%88-%D8%B3%DB%8C%D9%85-%DA%A9%D8%A7%D8%B1%D8%AA-%D8%B8%D8%B1%D9%81%DB%8C%D8%AA-128%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA"
                                rel="nofollow" class="o-btn c-share__social c-share__social--whatsapp"
                                target="_blank"></a>
                            <div class="o-btn c-share__social c-share__social--email js-email-btn"></div>
                        </div>
                        <div class="o-btn o-btn--outlined-gray-sm o-btn--copy c-share__link-btn js-copy-url"
                             data-copy="https://www.digikala.com/product/dkp-2361428">
                            کپی لینک
                        </div>
                    </div>
                    <div class="js-email-row u-hidden">
                        <div class="c-share__email-row">
                            <div class="c-share__email"><label class="o-form__field-container">
                                    <div class="o-form__field-frame"><input name="send_to_friend[email]" type="email"
                                                                            placeholder="آدرس ایمیل را وارد نمایید"
                                                                            value=""
                                                                            class="o-form__field js-input-field "/>
                                    </div>
                                </label><input type="hidden" name="send_to_friend[product_id]" value="2361428"></div>
                            <button type="submit" class="o-btn o-btn--contained-red-sm">ارسال</button>
                        </div>
                    </div>
                    <div class="c-share__referral">
                        <div class="c-share__referral-content">
                            <div class="c-share__referral-title">جایزه شما</div>
                            <div class="c-share__referral-desc">با دعوت دوستانتان، پس از اولین خریدشان، کدتخفیف و امتیاز
                                هدیه بگیرید.
                            </div>
                            <div
                                class="o-btn o-btn--outlined-gray-sm o-btn--copy o-btn--full-width c-share__referral-code u-hidden js-copy-referral-code"
                                data-copy=""></div>
                            <div
                                class="o-btn o-btn--outlined-red-sm o-btn--full-width o-btn--r-voucher c-share__referral-code  js-get-referral-code">
                                دریافت کد تخفیف
                            </div>
                        </div>
                        <div class="c-share__referral-img"><img src="../../static/files/84182fb2.svg"/></div>
                    </div>
                </form>
            </div>
            <div class="remodal c-remodal-price-chart" data-remodal-id="price-chart" role="dialog"
                 aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <div class="c-remodal-price-chart__main">
                    <div class="c-remodal-am-price-chart__header">
                        <div class="c-remodal-am-price-chart__title">
                            نمودار قیمت فروش
                        </div>
                        <button data-remodal-action="close" class="c-remodal-am-price-chart__close"
                                aria-label="Close"></button>
                    </div>
                    <div class="c-remodal-am-price-chart__product-title">
                        گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت
                    </div>
                    <div class="c-remodal-price-chart__content c-remodal-am-price-chart__content">
                        <div id="productPriceChart" class="c-remodal-am-price-chart__base"></div>
                        <div class="c-remodal-am-price-chart__row">
                            <div class="c-am-chart-legend">
                                <div class="c-am-chart-legend__row"><span
                                        class="c-am-chart-legend__line c-am-chart-legend--marketable"></span><span
                                        class="c-am-chart-legend__circle c-am-chart-legend--marketable"></span><label>موجود</label>
                                </div>
                                <div class="c-am-chart-legend__row"><span
                                        class="c-am-chart-legend__line c-am-chart-legend--not-marketable"></span><span
                                        class="c-am-chart-legend__circle c-am-chart-legend--not-marketable"></span><label>ناموجود</label>
                                </div>
                                <div class="c-am-chart-legend__row"><span
                                        class="c-am-chart-legend__line c-am-chart-legend--pure-price"></span><label>قیمت
                                        بدون تخفیف</label></div>
                            </div>
                        </div>
                        <div class="c-am-chart-varient"><label
                                class="c-am-chart-varient__label js-am-chart-varient-label"></label>
                            <ul class="c-am-chart-varient__list js-price-chart-varient-list"></ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="remodal c-remodal-notification" data-remodal-id="observed" role="dialog"
                 aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                <div class="c-remodal-notification__main">
                    <div class="c-remodal-notification__aside">
                        <div class="c-remodal-notification__title-ilu">به من اطلاع بده</div>
                        <div class="c-remodal-notification__ilu"></div>
                    </div>
                    <div class="c-remodal-notification__content">
                        <form class="c-form-notification" id="observed-form">
                            <div class="c-form-notification__title">اطلاع به من در زمان:</div>
                            <div class="c-form-notification__row">
                                <div class="c-form-notification__col">
                                    <div class="c-form-notification__status">
                                        موجود شدن
                                    </div>
                                </div>
                            </div>
                            <div class="c-form-notification__row js-observe-modal-errors u-hidden-visually">
                                <div class="c-form-notification__col">
                                    <div class="c-message-light c-message-light--error js-form-error-items"></div>
                                </div>
                            </div>
                            <div class="c-form-notification__title">از طریق:</div>
                            <div class="c-form-notification__row">
                                <div class="c-form-notification__col">
                                    <ul class="c-form-notification__params">
                                        <li><label class="c-form-notification__label" for="notification-param-1">ایمیل
                                                به
                                                <span class="js-observed-user-email"></span></label><label
                                                class="c-ui-checkbox"><input type="checkbox" value="1"
                                                                             name="observed[email]"
                                                                             id="notification-param-1"><span
                                                    class="c-ui-checkbox__check"></span></label></li>
                                        <li><label class="c-form-notification__label" for="notification-param-2">پیامک
                                                به
                                                <span class="js-observed-user-number"></span></label><label
                                                class="c-ui-checkbox"><input type="checkbox" value="1"
                                                                             name="observed[sms]"
                                                                             checked id="notification-param-2"><span
                                                    class="c-ui-checkbox__check"></span></label></li>
                                        <li><label class="c-form-notification__label" for="notification-param-3">سیستم
                                                پیام
                                                شخصی دیجی‌کالا</label><label class="c-ui-checkbox"><input
                                                    type="checkbox"
                                                    value="1"
                                                    name="observed[notification]"
                                                    checked
                                                    id="notification-param-3"><span
                                                    class="c-ui-checkbox__check"></span></label></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="c-form-notification__row c-form-notification__row--submit">
                                <div class="c-form-notification__col">
                                    <button type="button" id="add-to-observed" class="btn-remodal-primary">ثبت</button>
                                    <button data-remodal-action="cancel" class="btn-remodal-secondary">بازگشت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="remodal c-modal c-modal--xs"
                 data-remodal-id="auto-buy"
                 role="dialog"
                 aria-labelledby="modalTitle"
                 tabindex="-1z"
                 aria-describedby="modalDesc"
                 data-remodal-options=""
            >
                <div class="c-modal__top-bar  ">
                    <div class="c-modal__title ">رزرو کالا در زمان موجود شدن</div>
                    <div class="c-modal__close" data-remodal-action="close"></div>
                </div>
                <div class="c-product-auto-buy o-text-right"><p class="c-product-auto-buy__dsc">
                        این کالا پس از موجود شدن به مدت یک ساعت برای شما رززو می‌گردد
                        و می‌توانید با پرداخت هزینه سفارش آن را خریداری نمایید.
                    </p><h4 class="c-product-auto-buy__notic-header">اطلاع از طریق:</h4>
                    <form id="auto-buy-form">
                        <div class="c-product-auto-buy__notic-row"><label class="o-form__check-box"><input
                                    class="o-form__check-box-input js-auto-buy-user-email" name="autoBuy[email]"
                                    value="1"
                                    type="checkbox"><span class="o-form__check-box-sign"></span><span
                                    class="js-ui-checkbox-label">
            ایمیل به user@digikala.com
        </span></label></div>
                        <div class="c-product-auto-buy__notic-row"><label class="o-form__check-box"><input
                                    class="o-form__check-box-input js-auto-buy-user-phone" name="autoBuy[sms]" value="1"
                                    type="checkbox" checked><span class="o-form__check-box-sign"></span><span
                                    class="js-ui-checkbox-label">
            پیامک به ۰۹۱۲۳۴۵۶۷۸۹
        </span></label></div>
                        <div class="c-product-auto-buy__notic-row"><label class="o-form__check-box"><input
                                    class="o-form__check-box-input js-auto-buy-dk-notification"
                                    name="autoBuy[notification]"
                                    value="1" type="checkbox" checked><span class="o-form__check-box-sign"></span><span
                                    class="js-ui-checkbox-label">
            پیام شخصی دیجی‌کالا
        </span></label></div>
                    </form>
                    <div class="c-product-auto-buy__footer"><p class="c-product-auto-buy__plus-dsc"
                                                               data-icon="Brand-Digiplus-Sign">
                            تنها برای کاربران دیجی‌پلاس
                        </p><a href="../../plus/landing/index.html"
                               class="o-btn o-btn--outlined-purple-lg o-btn--full-width"
                               data-after-icon="Icon-Navigation-Chevron-Left">
                            عضویت در دیجی‌پلاس
                        </a></div>
                </div>
            </div>
            <div class="remodal c-remodal-notification" data-remodal-id="incredible-observed" role="dialog"
                 aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                <div class="c-remodal-notification__main">
                    <div class="c-remodal-notification__aside">
                        <div class="c-remodal-notification__title-ilu">به من اطلاع بده</div>
                        <div class="c-remodal-notification__ilu"></div>
                    </div>
                    <div class="c-remodal-notification__content">
                        <form class="c-form-notification" id="incredible-observed-form">
                            <div class="c-form-notification__title">اطلاع به من در زمان:</div>
                            <div class="c-form-notification__row">
                                <div class="c-form-notification__col">
                                    <div class="c-form-notification__status">
                                        پیشنهاد شگفت‌انگیز
                                    </div>
                                </div>
                            </div>
                            <div class="c-form-notification__row js-observe-modal-errors u-hidden-visually">
                                <div class="c-form-notification__col">
                                    <div class="c-message-light c-message-light--error js-form-error-items"></div>
                                </div>
                            </div>
                            <div class="c-form-notification__title">از طریق:</div>
                            <div class="c-form-notification__row">
                                <div class="c-form-notification__col">
                                    <ul class="c-form-notification__params">
                                        <li><label class="c-form-notification__label"
                                                   for="incredible-notification-param-1">ایمیل
                                                به <span class="js-observed-user-email"></span></label><label
                                                class="c-ui-checkbox"><input type="checkbox" value="1"
                                                                             name="observed[email]"
                                                                             id="incredible-notification-param-1"><span
                                                    class="c-ui-checkbox__check"></span></label></li>
                                        <li><label class="c-form-notification__label"
                                                   for="incredible-notification-param-2">پیامک
                                                به <span class="js-observed-user-number"></span></label><label
                                                class="c-ui-checkbox"><input type="checkbox" value="1"
                                                                             name="observed[sms]"
                                                                             checked
                                                                             id="incredible-notification-param-2"><span
                                                    class="c-ui-checkbox__check"></span></label></li>
                                        <li><label class="c-form-notification__label"
                                                   for="incredible-notification-param-3">سیستم
                                                پیام شخصی دیجی‌کالا</label><label class="c-ui-checkbox"><input
                                                    type="checkbox" value="1" name="observed[notification]" checked
                                                    id="incredible-notification-param-3"><span
                                                    class="c-ui-checkbox__check"></span></label></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="c-form-notification__row c-form-notification__row--submit">
                                <div class="c-form-notification__col">
                                    <button type="button" id="add-to-incredible-observed" class="btn-remodal-primary">
                                        ثبت
                                    </button>
                                    <button data-remodal-action="cancel" class="btn-remodal-secondary">بازگشت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="remodal c-remodal-gallery" data-remodal-id="gallery" role="dialog" aria-labelledby="modal1Title"
                 aria-describedby="modal1Desc">
                <div class="c-remodal-gallery__main js-level-one-gallery">
                    <div class="c-remodal-gallery__top-bar">
                        <div class="c-remodal-gallery__tabs js-top-bar-tabs">
                            <div class="c-remodal-gallery__tab c-remodal-gallery__tab--selected js-gallery-tab"
                                 data-id="1">
                                تصاویر رسمی
                            </div>
                        </div>
                        <button data-remodal-action="close" class="c-remodal-gallery__close"
                                aria-label="Close"></button>
                    </div>
                    <div class="c-remodal-gallery__content is-active js-gallery-tab-content" id="gallery-content-1">
                        <div class="c-remodal-gallery__main-img js-gallery-main-img js-video-container">
                            <video id="pdp-video-container"
                                   class="video-js vjs-default-skin vjs-big-play-centered"></video>
                        </div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img is-active js-img-main-1"
                             data-slide-title="Slide "><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604447.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604447.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 1"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-2"
                             data-slide-title="Slide 1"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604450.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604450.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 2"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-3"
                             data-slide-title="Slide 2"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604454.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604454.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 3"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-4"
                             data-slide-title="Slide 3"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604458.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604458.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 4"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-5"
                             data-slide-title="Slide 4"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604461.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604461.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 5"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-6"
                             data-slide-title="Slide 5"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604464.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604464.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 6"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-7"
                             data-slide-title="Slide 6"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604469.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604469.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 7"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-8"
                             data-slide-title="Slide 7"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604473.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604473.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 8"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-9"
                             data-slide-title="Slide 8"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604478.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604478.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 9"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-10"
                             data-slide-title="Slide 9"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604481.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604481.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 10"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-11"
                             data-slide-title="Slide 10"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604487.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604487.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 11"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-12"
                             data-slide-title="Slide 11"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115604491.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/115604491.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 12"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-13"
                             data-slide-title="Slide 12"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940868.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940868.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 13"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-14"
                             data-slide-title="Slide 13"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940873.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940873.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 14"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-15"
                             data-slide-title="Slide 14"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940876.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940876.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 15"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-16"
                             data-slide-title="Slide 15"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940878.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940878.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 16"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-17"
                             data-slide-title="Slide 16"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940881.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940881.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 17"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-18"
                             data-slide-title="Slide 17"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940886.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940886.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 18"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-19"
                             data-slide-title="Slide 18"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940889.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940889.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 19"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-20"
                             data-slide-title="Slide 19"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940892.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940892.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 20"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-21"
                             data-slide-title="Slide 20"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940896.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940896.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 21"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-22"
                             data-slide-title="Slide 21"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940899.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940899.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 22"
                                data-type=""></div>
                        <div class="c-remodal-gallery__main-img js-gallery-main-img  js-img-main-23"
                             data-slide-title="Slide 22"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/116940906.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                data-high-res-src="https://dkstatics-public.digikala.com/digikala-products/116940906.jpg?x-oss-process=image/resize,h_1600/quality,q_80"
                                class="pannable-image"
                                title=""
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت main 1 23"
                                data-type=""></div>
                        <div class="c-remodal-gallery__info">
                            <div class="c-remodal-gallery__title">گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم
                                کارت ظرفیت 128گیگابایت
                            </div>
                            <div class="c-remodal-gallery__thumbs js-official-thumbs">
                                <div class="c-remodal-gallery__thumb is-video js-image-thumb"
                                     data-video-cover="https://dkstatics-public.digikala.com/digikala-video-cover/100006851.jpg?x-oss-process=image/resize,w_600/quality,q_80"
                                     data-video-src="https://dkstatics-public.digikala.com/digikala-video-playlist/100004335.m3u8"
                                     data-product-id="2361428"
                                     data-id="1"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-video-cover/100006851.jpg?x-oss-process=image/resize,m_fill,h_115,w_115"
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت video">
                                </div>
                                <div class="c-remodal-gallery__thumb is-video js-image-thumb"
                                     data-video-cover="https://dkstatics-public.digikala.com/digikala-video-cover/f28b77b2e47f5a8a6c7771b1f3738ca0fffb36f1_1601117858.jpg?x-oss-process=image/resize,w_600/quality,q_80"
                                     data-video-src="https://dkstatics-public.digikala.com/digikala-video-playlist/5b36d76839560b799d7cf0d37ba4bc1f5020161e_1601118824.m3u8"
                                     data-product-id="2361428"
                                     data-id="2"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-video-cover/f28b77b2e47f5a8a6c7771b1f3738ca0fffb36f1_1601117858.jpg?x-oss-process=image/resize,m_fill,h_115,w_115"
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت video">
                                </div>
                                <div class="c-remodal-gallery__thumb is-video js-image-thumb"
                                     data-video-cover="https://dkstatics-public.digikala.com/digikala-video-cover/263db9814d1cf1033219667046174c70885388dd_1605714776.jpg?x-oss-process=image/resize,w_600/quality,q_80"
                                     data-video-src="https://dkstatics-public.digikala.com/digikala-video-playlist/69a90e2c551d4e78497827f921390d3f0fe7cc03_1605714911.m3u8"
                                     data-product-id="2361428"
                                     data-id="3"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-video-cover/263db9814d1cf1033219667046174c70885388dd_1605714776.jpg?x-oss-process=image/resize,m_fill,h_115,w_115"
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت video">
                                </div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="1"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604447.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 1"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="2"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604450.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 2"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="3"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604454.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 3"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="4"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604458.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 4"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="5"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604461.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 5"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="6"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604464.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 6"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="7"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604469.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 7"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="8"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604473.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 8"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="9"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604478.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 9"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="10"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604481.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 10"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="11"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604487.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 11"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="12"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/115604491.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 12"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="13"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940868.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 13"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="14"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940873.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 14"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="15"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940876.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 15"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="16"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940878.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 16"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="17"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940881.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 17"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="18"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940886.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 18"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="19"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940889.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 19"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="20"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940892.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 20"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="21"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940896.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 21"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="22"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940899.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 22"
                                        data-type=""></div>
                                <div class="c-remodal-gallery__thumb js-image-thumb" data-order="23"><img
                                        data-src="https://dkstatics-public.digikala.com/digikala-products/116940906.jpg?x-oss-process=image/resize,m_lfit,h_115,w_115/quality,q_60"
                                        title=""
                                        alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت thumb 2 23"
                                        data-type=""></div>
                            </div>
                            <div
                                class="c-remodal-gallery__other-imgs js-comments-files-thumbnails-summary js-see-more-imgs"></div>
                        </div>
                    </div>
                    <div
                        class="c-remodal-gallery__content c-remodal-gallery__content--comments js-gallery-tab-content js-comments-with-thumbnails"
                        id="gallery-content-2"></div>
                </div>
                <div class="c-remodal-gallery__main js-level-two-gallery js-comments"></div>
                <div class="c-remodal-gallery__main js-answers">
                    <div class="c-remodal-gallery__top-bar">
                        <div class="c-remodal-gallery__head-title">
                            پاسخ فروشنده
                        </div>
                        <button data-remodal-action="close" class="c-remodal-gallery__close"
                                aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <div class="remodal c-remodal-pricing" data-remodal-id="unfair-pricing" role="dialog"
                 aria-labelledby="modal1Title"
                 aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                <div class="c-remodal-pricing__main">
                    <div class="c-remodal-pricing__aside">
                        <div class="c-remodal-pricing__title-img">گزارش قیمت مناسب‌تر این کالا</div>
                        <div class="c-remodal-pricing__img"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115598446.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت">
                        </div>
                    </div>
                    <div class="c-remodal-pricing__content">
                        <form class="c-form-pricing js-pricing-form" id="unfairPricingForm"><input type="hidden"
                                                                                                   name="unfair_pricing[is_price_competitive]"
                                                                                                   id="is-price-competitive"
                                                                                                   value="0"><input
                                type="hidden" name="unfair_pricing[product_id]" value="2361428"><input type="hidden"
                                                                                                       name="unfair_pricing[observed_price]"
                                                                                                       id="pricing-observed-price">
                            <div class="c-form-pricing__title">این کالا را با چه قیمتی دیده‌اید؟</div>
                            <div
                                class="c-message-light c-message-light--margined-vertically c-message-light--success js-unfair-pricing-message u-hidden-visually">
                                <span></span></div>
                            <div
                                class="c-message-light c-message-light--margined-vertically c-message-light--error js-unfair-pricing-error u-hidden-visually"></div>
                            <div class="c-form-pricing__row js-valid-row">
                                <div class="c-form-pricing__col"><label class="c-ui-input"><input
                                            class="c-ui-input__field c-ui-input__field--has-currency js-price-delimiter"
                                            type="text" autocomplete="off"
                                            name="unfair_pricing[claimed_price]"
                                            placeholder="مثلا ۳۵۰۰۰">
                                        <div class="c-ui-input__currency">تومان</div>
                                    </label></div>
                            </div>
                            <div class="c-form-pricing__row js-valid-row">
                                <div class="c-form-pricing__col"><label class="c-ui-switch c-ui-switch--primary"><input
                                            class="c-ui-switch__checkbox js-toggle-price-survey-options" type="checkbox"
                                            value="1" checked name="unfair_pricing[is_claimed_store_online]"><span
                                            class="c-ui-switch__slider c-ui-switch__slider--round"></span></label><span
                                        class="c-form-pricing__label-text">در فروشگاه اینترنتی دیده‌ام</span></div>
                            </div>
                            <div class="c-form-pricing__additional js-price-survey-store-container">
                                <div class="c-form-pricing__title">
                                    نام فروشگاه
                                </div>
                                <div class="c-form-pricing__row js-valid-row">
                                    <div class="c-form-pricing__col"><label class="c-ui-input"><input
                                                class="c-ui-input__field" type="text" name="unfair_pricing[store]"
                                                placeholder=""></label></div>
                                </div>
                                <div class="c-form-pricing__title">مکان فروشگاه</div>
                                <div class="c-form-pricing__row js-valid-row">
                                    <div class="c-form-pricing__col"><label class="c-ui-input"><select
                                                class="js-ui-select"
                                                name="unfair_pricing[store_state]">
                                                <option value="0">انتخاب استان</option>
                                                <option value="9">تهران</option>
                                                <option value="6">البرز</option>
                                                <option value="5">اصفهان</option>
                                                <option value="12">خراسان رضوی</option>
                                                <option value="18">فارس</option>
                                                <option value="28">مازندران</option>
                                                <option value="14">خوزستان</option>
                                                <option value="2">آذربایجان شرقی</option>
                                                <option value="3">آذربایجان غربی</option>
                                                <option value="4">اردبیل</option>
                                                <option value="7">ایلام</option>
                                                <option value="8">بوشهر</option>
                                                <option value="10">چهار محال و بختیاری</option>
                                                <option value="11">خراسان جنوبی</option>
                                                <option value="13">خراسان شمالی</option>
                                                <option value="15">زنجان</option>
                                                <option value="16">سمنان</option>
                                                <option value="17">سیستان و بلوچستان</option>
                                                <option value="19">قزوین</option>
                                                <option value="20">قم</option>
                                                <option value="21">کردستان</option>
                                                <option value="22">کرمان</option>
                                                <option value="23">کرمانشاه</option>
                                                <option value="24">کهگیلویه و بویراحمد</option>
                                                <option value="25">گلستان</option>
                                                <option value="26">گیلان</option>
                                                <option value="27">لرستان</option>
                                                <option value="29">مرکزی</option>
                                                <option value="30">هرمزگان</option>
                                                <option value="31">همدان</option>
                                                <option value="32">یزد</option>
                                            </select></label></div>
                                </div>
                            </div>
                            <div class="c-form-pricing__additional js-price-survey-online-container">
                                <div class="c-form-pricing__title">آدرس اینترنتی فروشگاه</div>
                                <div class="c-form-pricing__row js-valid-row">
                                    <div class="c-form-pricing__col"><label class="c-ui-input"><input
                                                class="c-ui-input__field c-ui-input__field--left-placeholder"
                                                type="text"
                                                name="unfair_pricing[online_store_url]"
                                                placeholder="www.example.com"></label></div>
                                </div>
                            </div>
                            <div class="c-form-pricing__row c-form-pricing__row--submit">
                                <div class="c-form-pricing__col">
                                    <button type="submit" class="btn-primary js-unfair-price-submit">ثبت اطلاعات
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="remodal c-remodal-feedback js-feedback-modal"
                 data-remodal-id="feedback-survey"
                 role="dialog"
                 aria-labelledby="modal1Title"
                 aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                <div class="c-remodal-feedback__main">
                    <div class="c-remodal-feedback__aside">
                        <div class="c-remodal-feedback__title-img">بازخورد در مورد این کالا</div>
                        <div class="c-remodal-feedback__img"><img
                                data-src="https://dkstatics-public.digikala.com/digikala-products/115598446.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60"
                                alt="گوشی موبایل سامسونگ مدل Galaxy A51 SM-A515F/DSN دو سیم کارت ظرفیت 128گیگابایت">
                        </div>
                    </div>
                    <div class="c-remodal-feedback__content"><p>قبلا در این نظرسنجی شرکت کرده‌اید.</p></div>
                </div>
            </div>
            <div class="remodal c-modal c-remodal-seller-rate-info"
                 data-remodal-id="seller-rate-info"
                 role="dialog"
                 aria-labelledby="modalTitle"
                 tabindex="-1z"
                 aria-describedby="modalDesc"
                 data-remodal-options=""
            >
                <div class="c-modal__top-bar  ">
                    <div class="c-modal__title c-remodal-seller-rate-info__modal-title">عملکرد فروشنده</div>
                    <div class="c-modal__close" data-remodal-action="close"></div>
                </div>
                <div class="c-remodal-seller-rate-info__container">
                    <div class="c-remodal-seller-rate-info__title">
                        تامین به موقع:
                    </div>
                    <p class="c-remodal-seller-rate-info__text">
                        این معیار نمایانگر آن است که فروشنده در بازه‌ی زمانی اعلام شده بدون هیچ تاخیری، کالا را تامین و
                        ارسال کرده است.
                    </p>
                    <div class="c-remodal-seller-rate-info__title">
                        تعهد ارسال:
                    </div>
                    <p class="c-remodal-seller-rate-info__text">
                        این معیار نمایانگر آن است که فروشنده سفارشات ثبت شده‌ی مشتریان را بدون کنسلی (لغو سفارش) ارسال
                        کرده
                        است.
                    </p>
                    <div class="c-remodal-seller-rate-info__title">
                        بدون مرجوعی:
                    </div>
                    <p class="c-remodal-seller-rate-info__text">
                        این معیار نمایانگر درصد کالاهای مرجوع شده
                        از سوی مشتری است که به علت تخلفات فروشنده و با دلایل قابل قبول از طرف مشتری مرجوع شده است.
                    </p></div>
            </div>
        </div>
        <div id="sidebar">
            <aside></aside>
        </div>
    </main>
    <div id="footer-data-ux"></div>
    <div class="c-footer__product-id"><span>شناسه کالا :</span><span>DKP - ۲۳۶۱۴۲۸</span></div>


</div>


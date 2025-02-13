<style>

</style>

<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="sidebar-wrapper search-sidebar">
{{--       --}}
        <form action="#"  id="searchProduct">
        <div class="box-sidebar">
            <button class="btn btn-light btn-box-sidebar" type="button">
                جستجوی محصولات  :
            </button>
            <div class="form-product">
                <input type="text" name="product" class="input-sidebar" placeholder="نام محصول مورد نظر را بنویسید…">
                <button class="btn-search-sidebar"><img src="{{ asset('forntend/assets/images/search.png') }}" alt="search"></button>
            </div>

        </div>
        <div class="box-sidebar">
            <button class="btn btn-light btn-box-sidebar" type="button" data-toggle="collapse" data-target="#collapseExamplebrand" aria-expanded="false" aria-controls="collapseExamplebrand">
                <i class="fa fa-chevron-down arrow"></i>برند
            </button>
            <div class="collapse show" id="collapseExamplebrand">
                <div class="catalog">
                    <ul>

                        @foreach($brands as $brand)
                        <li>
                            <a href="#" class="filter-label">
                                <div class="form-auth-row">
                                    <label for="remember{{ $brand->name }}" class="ui-checkbox">
                                        <input type="checkbox"  name="brands[{{ $brand->id }}]" id="remember{{ $brand->name }}">
                                        <span class="ui-checkbox-check"></span>
                                    </label>
                                    <label for="remember{{ $brand->name }}" class="remember-me">{{ $brand->title }}</label>

                                </div>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="box-sidebar" style="overflow: hidden">
            <button class="btn btn-light btn-box-sidebar" type="button" data-toggle="collapse" data-target="#collapsePriceLimit" aria-expanded="false" aria-controls="collapseExamplebrand">
                <i class="fa fa-chevron-down arrow"></i>محدوده قیمت
            </button>
            <div class="collapse show" id="collapsePriceLimit">

              <div class="col-md-12" style="margin-top: 16%">
                  <div class="slider-wrapper mt-4">
                      <div id="slider-range"></div>
                      <div class="range-wrapper">
                          <div class="range"></div>
                          <input type="hidden" name="min_price_count">
                          <input type="hidden" name="max_price_count">
{{--                          <div class="range-alert">+</div>--}}
                          <div class="gear-wrapper">
                              <div class="gear-large gear-one">
{{--                                  <div class="gear-tooth"></div>--}}
{{--                                  <div class="gear-tooth"></div>--}}
{{--                                  <div class="gear-tooth"></div>--}}
{{--                                  <div class="gear-tooth"></div>--}}
                              </div>
                              <div class="gear-large gear-two">
{{--                                  <div class="gear-tooth"></div>--}}
{{--                                  <div class="gear-tooth"></div>--}}
{{--                                  <div class="gear-tooth"></div>--}}
{{--                                  <div class="gear-tooth"></div>--}}
                              </div>
                          </div>

                      </div>

                      <div class="marker marker-0"><sup></sup></div>
{{--                      <div class="marker marker-25"><sup></sup></div>--}}
{{--                      <div class="marker marker-50"><sup></sup></div>--}}
{{--                      <div class="marker marker-75"><sup></sup>85,000</div>--}}
                      <div class="marker marker-100"><sup></sup></div>
                  </div>
              </div>
            </div>
        </div>

        <div class="box-sidebar">
            <div class="filter-switch">
                <div class="switch-box">
                    <div class="centered hidden-xs">
                        <div class="card">
                            <a href="#">
                                <label for="switch1">
                                    <input type="checkbox" id="switch1" name="exists_product"><span class="switch">
                                            <h1 class="switch-title">فقط کالای موجود</h1>
                                        </span>
                                    <span class="toggle"></span>
                                </label>
                            </a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        </form>



        <!--   adplacement -------------------->
        <div class="adplacement">
            <div class="col-12 col-lg-12 pull-right" style="padding:0;">
                <a href="#" class="item-adplacement">
                    <img src="{{ asset('forntend/assets/images/video-camera.png') }}" title="" alt="تبلیغات صهبا">
                </a>
            </div>
        </div>
        <!--   adplacement -------------------->

    </div>
</div>
{{--<input type="hidden" name>--}}
</div>
<script>

    $(function() {
        $('#slider-range').slider({
            range: true,
            min: 100000,
            max: 100000000,
            step: 100,
            values: [100000,100000000]
        });

        // Move the range wrapper into the generated divs
        $('.ui-slider-range').append($('.range-wrapper'));

        // Apply initial values to the range container
        $('.range').
        html(
            '<span class="range-value" name="max_price"><sup>تومان</sup>'
            +
            $("#slider-range").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,")
            +
            '</span>' +
            '<span class="range-divider">' + '</span>' +
            '<span class="range-value" name="min_price"><sup>تومان</sup>'
            +
            $('#slider-range').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,")
            +
            '</span>'
        );

        // Show the gears on press of the handles
        $('.ui-slider-handle, .ui-slider-range').on('mousedown', function() {
            $('.gear-large').addClass('active');
        });

        // Hide the gears when the mouse is released
        // Done on document just incase the user hovers off of the handle
        $(document).on('mouseup', function() {
            if ($('.gear-large').hasClass('active')) {
                $('.gear-large').removeClass('active');
            }
        });

        // Rotate the gears
        var gearOneAngle = 0,
            gearTwoAngle = 0,
            rangeWidth = $('.ui-slider-range').css('width');

        $('.gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        $('.gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

        $('#slider-range').slider({
            slide: function(event, ui) {

                // Update the range container values upon sliding

                $('.range').
                html(
                    '<span class="range-divider"></span><span class="range-value" name="max_price" data-max="'+ui.values[1] +'"><sup>تومان</sup>'
                    + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
                    + '</span>'
                    +
                        '<span class="range-value" name="min_price" data-min="'+ui.values[0] +'"><sup>تومان</sup>'
                    +
                    ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
                    + '</span>'

                );
                $("[name='min_price_count']").val(ui.values[0]);
                $("[name='max_price_count']").val(ui.values[1]);

                // Get old value
                var previousVal = parseInt($(this).data('value'));

                // Save new value
                $(this).data({
                    'value': parseInt(ui.value)
                });

                // Figure out which handle is being used
                if (ui.values[0] == ui.value) {

                    // Left handle
                    if (previousVal > parseInt(ui.value)) {
                        // value decreased
                        gearOneAngle -= 7;
                        $('.gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
                    } else {
                        // value increased
                        gearOneAngle += 7;
                        $('.gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
                    }

                } else {

                    // Right handle
                    if (previousVal > parseInt(ui.value)) {
                        // value decreased
                        gearOneAngle -= 7;
                        $('.gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
                    } else {
                        // value increased
                        gearOneAngle += 7;
                        $('.gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
                    }

                }

                if (ui.values[1] === 110000) {
                    if (!$('.range-alert').hasClass('active')) {
                        $('.range-alert').addClass('active');
                    }
                } else {
                    if ($('.range-alert').hasClass('active')) {
                        $('.range-alert').removeClass('active');
                    }
                }
            }
        });

        // Prevent the range container from moving the slider
        $('.range, .range-alert').on('mousedown', function(event) {
            event.stopPropagation();
        });

    });
    $("#searchProduct").submit(function(e) {


        e.preventDefault(); // avoid to execute the actual submit of the form.
        //
        var form = $(this);


        // var actionUrl = form.attr('action');

        $('.js-products').html('');
        $('loader-gif').show();
        setInterval(
        $.ajax({
            type: "POST",
            url: `{{ route('product.full-text-search.action') }}`,
            data:form.serializeArray(),
            cache: false,
                // {
                //
                //     'min_price' : min_price ,
                //     'max_price' : max_price ,
                // } , // serializes the form's elements.
            success: function(data)
            {
                $('loader-gif').hide();
                $('.js-products').html(data);
            }
        }) , 50000);

    });

</script>

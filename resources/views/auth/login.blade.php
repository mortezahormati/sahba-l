@extends('layouts.auth')

@section('content')
    <style>
        .cascading-right {
            margin-right: -50px;
            border-radius: 19px;
            background-color: #fff;
            box-shadow: 0 9px 25px rgb(33 168 177);
            border: none !important;
            padding: 35px 50px;
        }

        .text-auth {
            clear: both;
            text-align: right;
        }

        a {
            text-decoration: none !important;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
        .grecaptcha-badge{
            display: none !important;
        }
    </style>
    <div class="container">

        <!-- Section: Design Block -->
        <section class="text-center text-lg-start">

            <form action="{{ route('login') }}" method="post" id="send-mobile">
            <!-- Jumbotron -->
                <div class="container py-4" style="margin-top: 12%">
                    <div class="row g-0 align-items-center">

                        <div class="col-lg-4 mb-5 mb-lg-0">

                        </div>
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                                <div class="card-body p-3 shadow-5 text-center">

                                    <h2 class="fw-bold mb-3"><img src="{{ asset('image/logo.png') }}" alt=""
                                                                  height="145px">
                                    </h2>
                                    @include('alerts.auth.alert')
                                    {{--                                @include('alerts.auth.recaptcha')--}}


{{--                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>--}}

                                    @csrf
                                    <div class="form-outline mb-4 justify-content-center">
                                    </div>
                                    <div class="form-outline mb-4 ">
                                        <p class="form-label text-auth ">@lang('auth.hello!')</p>
                                        <label class="form-label text-auth" style="float: right"
                                               for="form3Example3">@lang('auth.enter_phone_number')</label>
                                        <input name="phone_number" type="text" id="form3Example3"
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/^09\d{9}$/, this.value);"
                                               style="text-align: center;
                                               letter-spacing: 6px;
                                               font-size: large;"
                                               class="form-control w-80 mb-2"/>
                                    </div>
                                    <div class="form-outline mb-4 " style="text-align: right !important;">
                                        @include('auth.partials.errors')
                                    </div>
                                    <div class="form-outline mb-4 justify-content-center">
                                        <!-- Submit button -->
                                        {!! htmlFormButton('ورود',['class' => 'btn btn-info text-white btn-block mb-4','data-foo' => 'bar']) !!}

{{--                                        <button type="submit" class="btn btn-info text-white btn-block mb-4">--}}
{{--                                            @lang('auth.login.enter')--}}
{{--                                        </button>--}}
                                    </div>
                                    <!-- Register buttons -->
{{--                                    <div class="text-center">--}}
{{--                                        <p>--}}
{{--                                            @lang('auth.login.social_login')--}}
{{--                                        </p>--}}
{{--                                        <a href="">--}}
{{--                                            <img src="{{ asset('image/gmail.png') }}" alt="" width="35px">--}}
{{--                                        </a>--}}
{{--                                        <a href="">--}}
{{--                                            <img src="{{ asset('image/github.png') }}" alt="" width="35px">--}}
{{--                                        </a>--}}

{{--                                    </div>--}}

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </form>
            <!-- Jumbotron -->
        </section>
        <!-- Section: Design Block -->
    </div>
@endsection
@section('scripts')
    {{--    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>--}}




    <script>


        $('#send-mobile').validate({
            rules: {
                phone_number: {
                    minlength: 11,
                    maxlength: 11,
                    required: true,
                    digits: true
                }
            },
            messages: {
                phone_number: {
                    minlength: "حداقل تعداد 11 کاراکتر نیاز است ",
                    maxlength: "حداکثر تعداد 11 کاراکتر نیاز است ",
                    required: "فیلد مورد نظر الزامی می باشد ",
                    digits: "مقدار به صورت عددی می باشد "
                }
            },
            submitHandler: function (form) {
                form.submit();
            }


        });
        // grecaptcha.execute();


    </script>

@endsection


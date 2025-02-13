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
            text-align: right !important;

        }

        a {
            text-decoration: none;
            color: #71c0c5 !important;
        }

        .text-decoration-sahba {
            text-decoration: none !important;
            color: red !important;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
    </style>
    <div class="container" style="">

        <!-- Section: Design Block -->
        <section class="text-center text-lg-start">


            <!-- Jumbotron -->
            <div class="container py-4" style="margin-top: 12%">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-4 mb-5 mb-lg-0">

                        @include('alerts.auth.alert');
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                            <div class="card-body p-3 shadow-5 text-center">
                                <h2 class="fw-bold mb-3"><img src="{{ asset('image/logo.png') }}" alt="" height="145px">
                                </h2>
                                <form action="{{ route('login.mobile') }}" method="post" name="loginForm"
                                      id="loginForm">
                                    @csrf
                                    {{--                                    @php--}}
                                    {{--                                        echo $token_code ;--}}
                                    {{--                                    @endphp--}}
                                    <input type="hidden" name="delivered_token_code" value="{{ $token_code }}">
                                    <input type="hidden" name="phone_number" value="{{ $phone_number }}">
                                    <input type="hidden" value="{{ $sms_flash }}" id="sms_flash">
                                    <div class="form-outline mb-4 justify-content-center"></div>

                                    <div class="form-outline mb-4 text-auth">

                                        <label class="form-label" style="float: right"
                                               for="form3Example3">@lang('auth.enter_token_code')</label>
                                        <input name="token_code" type="text" id="form3Example3"
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                               maxlength="5"
                                               class="form-control w-80 mb-2" style="text-align: center;
                                               letter-spacing: 10px;
                                               font-size: large;"/>


                                    </div>
                                    <div class="form-outline mb-4 text-auth">
                                        <div class="countdown"
                                             style="float: left ;font-size: smaller ; direction: rtl "></div>
                                        <a class="get-code-again text-decoration-sahba" href=""
                                           style="float: left ; font-size: smaller">
                                            @lang('auth.login.resend')
                                        </a>
                                        <a class="text-decoration-sahba" style="font-size: smaller"
                                           href="{{ route('login.with.user.pass' , $phone_number) }}">
                                            <i class="fa fa-arrow-left"></i>
                                            @lang('auth.enterWithPassword')
                                        </a>
                                    </div>
                                    <div class="form-outline mb-4 " style="text-align: right !important;">
                                        @include('auth.partials.errors')
                                    </div>
                                    <div class="form-outline mb-4 justify-content-center">
                                        <button type="submit"
                                                class="loginButton btn btn-info text-white btn-block mb-4">
                                            @lang('auth.login.confirm')
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')



    <script>
        var sms_flash = $("#sms_flash").val();
        if (sms_flash == true) {
            Swal.fire({
                position: 'top-end',
                text: '{{ __('auth.smsSent') }}',
                toast: true,
                showConfirmButton: false,
                icon: 'success',
            });
        }
        $(document).ready(function () {
            $('.get-code-again').hide();
            timeOut();

        });

        $('#loginForm').validate({
            rules: {
                token_code: {
                    minlength: 5,
                    maxlength: 5,
                    required: true,
                    digits: true
                }
            },
            messages: {
                token_code: {
                    minlength: "حداقل تعداد 5 کاراکتر نیاز است ",
                    maxlength: "حداکثر تعداد 5 کاراکتر نیاز است ",
                    required: "فیلد مورد نظر الزامی می باشد ",
                    digits: "مقدار به صورت عددی می باشد "
                }
            },
            submitHandler: function (form) {
                form.submit();
            }


        });

        function timeOut() {
            var timer2 = "{{ $time }}";
            var interval = setInterval(function () {


                var timer = timer2.split(':');
                //by parsing integer, I avoid all extra string processing
                var minutes = parseInt(timer[0], 10);
                var seconds = parseInt(timer[1], 10);
                --seconds;
                minutes = (seconds < 0) ? --minutes : minutes;
                if (minutes < 0) {
                    clearInterval(interval)
                }
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;
                //minutes = (minutes < 10) ?  minutes : minutes;
                if (minutes < 0) {
                    $('.countdown').hide();
                    $('.get-code-again').show();
                }
                $('.countdown').html(minutes + ':' + seconds + `<span style="clear: both !important;">  مانده تا دریافت مجدد کد  </span>`);
                timer2 = minutes + ':' + seconds;
            }, 1000);
        }

        $(".get-code-again").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var token = $("input[name='delivered_token_code']").val();
            var phone_number = $("input[name='phone_number']").val();

            var ajaxurl = '/getResetGenerateCode/' + token + '/' + phone_number;
            $.ajax({
                type: "POST",
                url: ajaxurl,
                dataType: 'json',
                success: function (data) {
                    Swal.fire({
                        position: 'top-end',
                        text: data.message,
                        toast: true,
                        showConfirmButton: false,
                        icon: 'warning',
                    });
                    if (data.type == "alreadySent") {
                        $('.get-code-again').show();
                        $('.countdown').hide();
                    } else {
                        timeOut();
                        $('.get-code-again').hide();
                        $('.countdown').show();
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

    </script>
@endsection

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
    </style>
    <div class="container" style="">

        <!-- Section: Design Block -->
        <section class="text-center text-lg-start">


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
                            <div class="card-body p-5 shadow-5 text-center">
                                <h2 class="fw-bold mb-5"><img src="{{ asset('image/logo.png') }}" alt="" height="75px">
                                </h2>
                                @include('alerts.auth.alert')

                                <form action="{{ route('login.with.password') }}" method="post" id="set_password_form">
                                    @csrf

{{--                                    <input type="hidden" name="delivered_token_code" value="{{ $token_code }}">--}}
                                    <input type="hidden" name="phone_number" value="{{ $phone_number }}">
                                    <input type="hidden" name="hash_number" value="{{ $hash_number }}">
                                    <div class="form-outline mb-4 justify-content-center">
                                        <label class="form-label"
                                               for="form3Example3">@lang('auth.enterPassword')</label>

                                        <input name="password" type="text" id="form3Example3"
                                               style="text-align: center; letter-spacing: 4px "
                                               class="form-control w-80 text-info mb-2"/>
                                    </div>
                                    <div class="form-outline mb-4 " style="text-align: right !important;">

                                        @include('auth.partials.errors')
                                    </div>
                                    <div class="form-outline mb-4 justify-content-center">
                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            @lang('auth.login.enter')
                                        </button>

                                    </div>
                                    <!-- Register buttons -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
        </section>
        <!-- Section: Design Block -->
    </div>

@endsection
@section('scripts')



    <script>


        $('#set_password_form').validate({
            rules: {
                password: {
                    minlength: 6,
                    required: true,
                },
                phone_number:{
                    required:true
                }
            },
            messages:{
                password: {
                    minlength: "حداقل تعداد 6 کاراکتر نیاز است "  ,
                    required:"فیلد مورد نظر الزامی می باشد ",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }


        });


    </script>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('auth-css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('auth-css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth-css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('auth-css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    {{--    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}
    {{--    <script>--}}
    {{--        var onSubmit = function(token) {--}}
    {{--            console.log('success!');--}}
    {{--        };--}}

    {{--        var onloadCallback = function() {--}}
    {{--            grecaptcha.render('submit', {--}}
    {{--                'sitekey' : '{{ config('services.recaptcha.site_key') }}',--}}
    {{--                'callback' : onSubmit--}}
    {{--            });--}}
    {{--        };--}}
    {{--    </script>--}}

    {!! htmlScriptTagJsApi(['form_id' =>'send-mobile' ]) !!}
    @yield('css')
</head>
{{--style="background-image: url({{asset('/image/back-test.svg')}})--}}

<body style="font-family: irs !important; background-image: url('{{ asset('image/login-bg-4.svg') }}');  background-repeat: no-repeat; background-size: 100%
    ">
@yield('content')

<script src="{{ asset('auth-js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('auth-js/jquery.validate.min.js') }}"></script>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


@yield('scripts')

</body>


</html>


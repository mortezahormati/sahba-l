<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 sahba-main-div">
            <div class="col-sm-6">
                <h6 class="m-0 text-white"><span><a href="{{ route('home') }}" class="text-white" title=""> پنل مدیریت صهبا | </a></span><a
                        class="text-white" href="{{ request()->url() }}" title="">@yield('title') </a></h6>
            </div><!-- /.col -->

        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12 mt-4">
                @include('alerts.auth.alert')
{{--                @if(session('mustVerifiedEmail'))--}}
{{--                    <div class="alert alert-warning alert-dismissible fade show" role="alert">--}}
{{--                        <strong>@lang('admin.users.yourEmailNotVerified',['link' => route('user.auth.sendVerificationEmail')])</strong>--}}
{{--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if(session('emailSendSuccess'))--}}
{{--                    <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                        <strong>@lang('admin.users.emailSendSuccess')</strong>--}}
{{--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                @endif--}}
            </div>

        </div>
    </div><!-- /.container-fluid -->
</div>

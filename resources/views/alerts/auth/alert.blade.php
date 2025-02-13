@if(session('wrongToken'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('wrongToken') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

@if(session('smsSuccessSentUser'))
    <script>
        Swal.fire({
            position: 'top-end',
            text : '{{session('smsSuccessSentUser') }}' ,
            toast:true,
            showConfirmButton: false,
            icon: 'success',
        });
    </script>
@endif
@if(session('passwordWrong'))
    <script>
        Swal.fire({
            position: 'top-end',
            text : '{{session('passwordWrong') }}' ,
            toast:true,
            showConfirmButton: false,
            icon: 'danger',
        });
    </script>
@endif
@if(session('mustVerifiedEmail'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>@lang('admin.users.yourEmailNotVerified',['link' => route('user.auth.sendVerificationEmail')])</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('emailSendSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>@lang('admin.users.emailSendSuccess')</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
{{--@if(session('emailSendSuccess'))--}}
{{--    <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--        <strong>@lang('admin.users.emailSendSuccess')</strong>--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}
@if(session('userEmailVerifiedSuccessed'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>@lang('admin.users.userEmailVerifiedSuccess')</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('firstEnterYourEmail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="row">
            <div class="col-md-3">
                <strong>@lang('admin.users.firstEnterYourEmail')</strong>
            </div>
            <div class="col-md-5">
                <form action="{{ route('store-user-profile') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="email" class="form-control" placeholder="ایمیل را وارد کنید ... ">
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="form-control btn btn-info" value="ارسال" >
                        </div>
                    </div>

                </form>
            </div>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>




    </div>
@endif

@extends('layouts.app-without-livewire')

@section('title', __('admin.users.user-profile'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">

    <style>
        .nav-link {
            color: #4a5568;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm > .col, .gutters-sm > [class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        hr {
            width: 80% !important;
            border-top: 1px solid rgb(0 123 255 / 60%);
        }

        .btn-outline-danger {
            color: #dc3545 !important;
        }

        .btn-outline-danger:hover {
            color: #fffff5 !important;
        }

        .nav-tabs .nav-link.active {

            color: #ffffff !important;
            background-color: #007bff !important;
            border-color: #dee2e6 #dee2e6 #ffffff;
        }

        .modal {
            top: 20% !important;
            right: 30% !important;
        }
        @media only screen and (max-width: 724px) {
            .modal {
                right: 0% !important;
            }
        }

        .modal-btn-close {
            border: none !important;
        }

        .error {
            color: red;
            font-size: 10px;
        }


        .cart {
            height: 150px;
            width: 310px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(30px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 80px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .cart-title {
            position: relative;
            left: 40px;
            color: rgba(49, 49, 206, 0.8);
        }
    </style>

@endsection
@section('content')
    <div class="row gutters-sm">
        @include('alerts.admin.alert')
        <div class="col-md-3 d-none d-md-block">
            <div class="card">
                <div class="card-body">
                    <nav class="nav flex-column nav-pills nav-gap-y-1">
                        <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                            <img  src="{{ asset('icons/profile.png') }}">
                            <span
                                class="mr-4">@lang('admin.users.personal-profile') </span>
                        </a>
                        <a href="#orders" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <img  src="{{ asset('icons/clock.png') }}">
                            <span class="mr-4">@lang('admin.users.orders') </span>
                        </a>
                        <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <img  src="{{ asset('icons/settings.png') }}">
                               <span class="mr-4">@lang('admin.users.security') </span>
                        </a>

                        <a href="#notification" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <img  src="{{ asset('icons/notification.png') }}">
                            <span class="mr-4">@lang('admin.users.notification') </span>
                        </a>
                        <a href="#billing" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <img  src="{{ asset('icons/bill.png') }}">
                            <span class="mr-4">@lang('admin.users.billing') </span>
                        </a>
                        <a href="#address" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <img  src="{{ asset('icons/map.png') }}">
                            <span class="mr-4">@lang('admin.users.address') </span>
                        </a>
                        <a href="#gift" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <img  src="{{ asset('icons/gift-box.png') }}">
                            <span class="mr-4">@lang('admin.users.gift') </span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header border-bottom mb-3 d-flex d-md-none">
                    <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" class="nav-link has-icon active">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#orders" data-toggle="tab" class="nav-link has-icon active">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#security" data-toggle="tab" class="nav-link has-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-shield">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#notification" data-toggle="tab" class="nav-link has-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-bell">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#billing" data-toggle="tab" class="nav-link has-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-credit-card">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#address" data-toggle="tab" class="nav-link has-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-credit-card">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#gift" data-toggle="tab" class="nav-link has-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-credit-card">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="profile">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="mb-2 mt-2 p-1">اطلاعات حساب کاربری</h6>
                                <hr>
                            </div>
                            <div class="col-md-9">
                                <div class="text-left">
                                    @if($user->profile_img)
                                        <a href="" class="" data-toggle="modal"
                                           data-target="#ModalUserProfileImageCreate">

                                            <img class="profile-user-img img-fluid img-circle"
                                                 src="{{ url('Users/'.$user->profile_img) }}"
                                                 alt="">
                                        </a>

                                    @else
                                        <a href="" class="" data-toggle="modal"
                                           data-target="#ModalUserProfileImageCreate">
                                            <img class="profile-user-img img-fluid img-circle"
                                                 src="{{ asset('img/avatar5.png') }}" alt="User profile picture"><br>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row gutters-sm mt-4">
                            <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                <div class="row">
                                    <div class="col-md-10 p-2">
                                        <div class="d-flex ai-center">
                                            <p class="text-muted ml-1">نام و نام خانوادگی</p>
                                        </div>
                                        <p class="text-bold ">{{ $user->persian_family_name }}</p>
                                    </div>
                                    <div class="col-md-2  mt-5">
                                        <a href="" class="" data-toggle="modal" data-target="#ModalUserNameCreate"><img
                                                src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                <div class="row">
                                    <div class="col-md-10 p-2">
                                        <div class="d-flex ai-center">
                                            <p class="text-muted ml-1">کد ملی </p>
                                        </div>
                                        <p class="text-bold ">{{ $user->national_code }}</p>
                                    </div>
                                    <div class="col-md-2  mt-5">
                                        <a href="" class="" data-toggle="modal" data-target="#ModalNationalCode"><img
                                                src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                <div class="row">
                                    <div class="col-md-10 p-2">
                                        <div class="d-flex ai-center">
                                            <p class="text-muted ml-1">شماره موبایل</p>
                                        </div>
                                        <p class="text-bold ">{{ $user->phone_number }}</p>
                                    </div>
                                    <div class="col-md-2  mt-5">
                                        <a href="" class="" data-toggle="modal" data-target="#ModalPhoneNumber"><img
                                                src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                <div class="row">
                                    <div class="col-md-10 p-2">
                                        <div class="d-flex ai-center">
                                            <p class="text-muted ml-1">ایمیل</p>
                                        </div>
                                        @if(!is_null($user->email))
                                            <p class="text-bold ">{{ $user->email }}</p>
                                        @else
                                            <small class="text-danger"> .برای دسترسی بیشتر به خدمات سایت ایمیل خودرا
                                                وارد نمایید</small>
                                        @endif
                                    </div>
                                    <div class="col-md-2  mt-5">
                                        <a href="" class="" data-toggle="modal" data-target="#ModalEmail"><img
                                                src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                <div class="row">
                                    <div class="col-md-10 p-2">
                                        <div class="d-flex ai-center">
                                            <p class="text-muted ml-1">تاریخ تولد</p>
                                        </div>
                                        <p class="text-bold ">{{ $user->persian_birth_day }}</p>
                                    </div>
                                    <div class="col-md-2  mt-5">
                                        <a href="" class="" data-toggle="modal" data-target="#ModalBirthday"><img
                                                src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                <div class="row">
                                    <div class="col-md-10 p-2">
                                        <div class="d-flex ai-center">
                                            <p class="text-muted ml-1">رمز عبور</p>
                                        </div>
                                        <p class="text-bold ">{{ $user->real_lw_pass }}</p>
                                    </div>
                                    <div class="col-md-2  mt-5">
                                        <a href="" class="" data-toggle="modal" data-target="#ModalPassword"><img
                                                src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="mb-2 mt-4 p-1">اطلاعات حقوقی </h6>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                @if($user->company)
                                    <div class="row gutters-sm">
                                        <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                            <div class="row">
                                                <div class="col-md-10 p-2">
                                                    <div class="d-flex ai-center">
                                                        <p class="text-muted ml-1">نام شرکت</p>
                                                    </div>
                                                    <p class="text-bold ">{{ $user->company->name }}</p>
                                                </div>
                                                <div class="col-md-2  mt-5">
                                                    <a href="" class="" data-toggle="modal" data-target="#ModalCompanyName"><img
                                                            src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                            <div class="row">
                                                <div class="col-md-10 p-2">
                                                    <div class="d-flex ai-center">
                                                        <p class="text-muted ml-1">سمت شغلی</p>
                                                    </div>
                                                    <p class="text-bold ">{{ $user->company->job }}</p>
                                                </div>
                                                <div class="col-md-2  mt-5">
                                                    <a href="" class="" data-toggle="modal" data-target="#ModalCompanyJob"><img
                                                            src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters-sm">
                                        <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                            <div class="row">
                                                <div class="col-md-10 p-2">
                                                    <div class="d-flex ai-center">
                                                        <p class="text-muted ml-1">شماره ثابت شرکت</p>
                                                    </div>
                                                    <p class="text-bold ">{{ $user->company->phone_number }}</p>
                                                </div>
                                                <div class="col-md-2  mt-5">
                                                    <a href="" class="" data-toggle="modal" data-target="#ModalCompanyPhone_number"><img
                                                            src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border: .2px dashed #d2eac2;border-radius: 8px">
                                            <div class="row">
                                                <div class="col-md-10 p-2">
                                                    <div class="d-flex ai-center">
                                                        <p class="text-muted ml-1">شناسه ملی شرکت</p>
                                                    </div>
                                                    <p class="text-bold ">{{ $user->company->national_code }}</p>
                                                </div>
                                                <div class="col-md-2  mt-5">
                                                    <a href="" class="" data-toggle="modal" data-target="#ModalCompanyNationalCode"><img
                                                            src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                <p class="text-muted">این گزینه برای کسانی است که نیاز به خرید سازمانی (با فاکتور رسمی و
                                    گواهی ارزش&zwnj;افزوده) دارند.</p>
                                <a href="" data-toggle="modal" data-target="#ModalJuridicalKnowledge"><span
                                        class="font-size-4">ثبت اطلاعات حقوقی</span><i
                                        class="nav-icon fa-solid fa-arrow-left mr-2"></i></a>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="orders">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="mb-2 mt-2 p-1">سفارشات</h6>
                                <hr>
                            </div>
                            <div class="col-md-9">
                                <div class="text-left">
                                    <img src="{{ asset('icons/clock-orders.png') }}" class=" img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="current-order-tab" data-toggle="tab"
                                       href="#current-order" role="tab" aria-controls="current-order"
                                       aria-selected="true"> جاری<span class="badge badge-danger mr-2"> 3</span></a>

                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="receive-order-tab" data-toggle="tab" href="#receive-order"
                                       role="tab" aria-controls="receive-order"
                                       aria-selected="false"> تحویل داده شده<span
                                            class="badge badge-danger mr-2"> 3</span></a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="cancel-order-tab" data-toggle="tab" href="#cancel-order"
                                       role="tab" aria-controls="cancel-order"
                                       aria-selected="false"> لغو شده<span class="badge badge-danger mr-2"> 3</span></a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="current-order" role="tabpanel"
                                     aria-labelledby="current-order-tab">
                                    <div class="col-md-12 text-center">
                                        <img src="{{ asset('image/digi/gift-card.svg') }}" alt="">
                                        <div class="text-muted">لغو شدده</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="receive-order" role="tabpanel"
                                     aria-labelledby="receive-order-tab">
                                    <div class="col-md-12 text-center">
                                        <img src="{{ asset('image/digi/gift-card.svg') }}" alt="">
                                        <div class="text-muted">هنوز از کارت هدیه استفاده نکرده‌اید</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="cancel-order" role="tabpanel"
                                     aria-labelledby="cancel-order-tab">
                                    <div class="col-md-12 text-center">

                                        <div class="text-muted">هنوز از کارت هدیه استفاده نکرده‌اید</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="security">

                    </div>
                    <div class="tab-pane" id="notification">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="mb-2 mt-2 p-1">پیغام ها</h6>
                                <hr>
                            </div>
                            <div class="col-md-9">
                                <div class="text-left">
                                    <img src="{{ asset('icons/mailbox.png') }}" class=" img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('image/digi/empty-notification.svg') }}" alt="">
                                <div class="text-muted">هنوز پیامی نیومده</div>
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane" id="billing">

                    </div>
                    <div class="tab-pane" id="address">
                        <div class="row ">
                            <div class="col-md-3">
                                <h6 class="mb-2 mt-2 p-1">آدرس ها</h6>
                                <hr>
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-4">
                                {{--                            <a href="" class="" data-toggle="modal" data-target="#ModalPassword"><img src="{{ asset('icons/edit-32.png') }}" alt="" width="20px"></a>--}}

                                <a class="btn  btn-outline-danger float-left  " data-toggle="modal"
                                   data-target="#ModalAddress"> <i class="fa-solid fa-map-location"></i>
                                    آدرس جدید </a>
                            </div>
                        </div>

                        <div class="row mt-2">
                            @foreach($user->userAddresses as $a)
                                <div class="col-md-10 ">
                                    <span
                                        class="text-bold font-size-12">
                                         <img src="{{ asset('icons/address-16.png') }}" width="18px" alt="">
                                        {{ $a->address }}</span>
                                </div>
                                <div class="col-md-2 ">
                                    <a href="{{ route('admin-users-profile-remove-address' , $a) }}" class="text-bold font-size-12 text-red" style="float: left"><i class="fa fa-remove color-red"></i></a>
                                </div>
                                <div class="row col-md-12 mt-5">
                                    <div class="col-md-5 ">
                                        <div class="row">
                                            {{--                                            <div class="col-md-12 text-muted mt-2">--}}

                                            {{--                                               --}}
                                            {{--                                                <span> </span>--}}
                                            {{--                                            </div>--}}
                                            <div class="col-md-12 text-muted mt-2">
                                                <img src="{{ asset('icons/postal-code.png') }}" width="18px" alt="">
                                                <span class="mr-1">{{ $a->postal_code }}</span>
                                            </div>
                                            <div class="col-md-12 text-muted mt-2">
                                                <img src="{{ asset('icons/smartphone.png') }}" width="18px" alt="">
                                                <span class="mr-1">{{ $a->const_phone_number }}</span>
                                            </div>
                                            <div class="col-md-12 text-muted mt-2">
                                                <img src="{{ asset('icons/reciver.png') }}" width="18px" alt="">
                                                <span class="mr-1">{{ $a->delivered_name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <img class="" style="float: left" src="{{ asset('image/map/map.png') }}"
                                             width="200px"
                                             alt="">
                                    </div>
                                </div>

                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="gift">
                        <div class="row ">
                            <div class="col-md-3">
                                <h6 class="mb-2 mt-2 p-1">کارت های هدیه</h6>
                                <hr>
                            </div>
                            <div class="col-md-9">
                                <div class="text-left">
                                    <img src="{{ asset('image/digi/gift-card.svg') }}" class=" img-fluid" alt="">
                                </div>
                            </div>
{{--                            <div class="col-md-5"></div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <a class="btn  btn-outline-danger float-left "> <i class="fa-solid fa-map-location"></i>--}}
{{--                                    کارت جدید </a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="row col-md-12 mt-3">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="active-gift-tab" data-toggle="tab"
                                           href="#active-gift" role="tab" aria-controls="active-gift"
                                           aria-selected="true">فعال</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="deactive-gift-tab" data-toggle="tab"
                                           href="#deactive-gift" role="tab" aria-controls="deactive-gift"
                                           aria-selected="false">غیر فعال</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="active-gift" role="tabpanel"
                                         aria-labelledby="active-gift-tab">
                                        <div class="col-md-12 text-center">
                                            @if($active_gifts->count() > 0)
                                                    <table id="myForm" class="table table-striped text-center">
                                                        <thead role="rowgroup">
                                                        <tr role="row" class="title-row">
                                                            <th>@lang('admin.products.gifts.name')</th>
                                                            <th>@lang('admin.products.gifts.amount')</th>
                                                            <th>@lang('admin.products.gifts.cart_number')</th>
                                                            <th>@lang('admin.products.gifts.starts_at')</th>
                                                            <th>@lang('admin.products.gifts.expires_at')</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($active_gifts as $ag)
                                                        <tr role="row">
                                                            <td>{{ $ag->name }}</td>
                                                            <td>{{ $ag->amount }}</td>
                                                            <td>{{ $ag->cart_number }}</td>
                                                            <td>{{ $ag->persian_started_at }}</td>
                                                            <td>{{ $ag->persian_expired_at }}</td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                            @else
                                                <img src="{{ asset('image/digi/gift-card.svg') }}" alt="">
                                                <div class="text-muted">هنوز از کارت هدیه استفاده نکرده‌اید</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="deactive-gift" role="tabpanel"
                                         aria-labelledby="deactive-gift-tab">
                                        <div class="col-md-12 text-center mt-5 mb-5">
                                            @if($deactive_gifts->count() > 0)

                                                    <table id="myForm" class="table table-striped text-center">
                                                        <thead role="rowgroup">
                                                        <tr role="row" class="title-row">
                                                            <th>@lang('admin.products.gifts.name')</th>
                                                            <th>@lang('admin.products.gifts.active')</th>
                                                            <th>@lang('admin.products.gifts.amount')</th>
                                                            <th>@lang('admin.products.gifts.cart_number')</th>
                                                            <th>@lang('admin.products.gifts.expires_at')</th>
                                                            <th>@lang('admin.products.gifts.operation')</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($deactive_gifts as $dg)
                                                        <tr role="row">
                                                            <td>{{ $dg->name }}</td>
                                                            <td>{{ $dg->active }}</td>
                                                            <td>{{ $dg->amount }}</td>
                                                            <td>{{ $dg->cart_number }}</td>
                                                            <td>{{ $dg->persian_expired_at }}</td>
                                                           <td>
                                                               <a href="{{ route('gift.active' , $dg) }}" class="badge badge-success">فعال سازی </a>
                                                           </td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                            @else
                                                <img src="{{ asset('image/digi/gift-card.svg') }}" alt="">
                                                <div class="text-muted">هنوز از کارت هدیه استفاده نکرده‌اید</div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('base.admin.dashboard.users.update-modal.user-name')
    @include('base.admin.dashboard.users.update-modal.phone-number')
    @include('base.admin.dashboard.users.update-modal.national-code')
    @include('base.admin.dashboard.users.update-modal.birthday')
    @include('base.admin.dashboard.users.update-modal.email')
    @include('base.admin.dashboard.users.update-modal.juridical-knowledge')
    @include('base.admin.dashboard.users.update-modal.password')
    @include('base.admin.dashboard.users.update-modal.address')
    @include('base.admin.dashboard.users.update-modal.profile-image')

    <script>
        $(document).ready(function () {
            $(".birth-day").persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
            });
        });


        {{--    $(document).ready(function () {--}}
        {{--        $(".btn-submit-user").click(function(e){--}}



        {{--            e.preventDefault();--}}
        {{--            var form = $('#userNameCreate').serialize();--}}

        {{--            $.ajax({--}}
        {{--                type:'POST',--}}
        {{--                url:"{{ route('store-user-profile') }}",--}}
        {{--                data:form,--}}
        {{--                success:function(data){--}}
        {{--                    if($.isEmptyObject(data.error)){--}}
        {{--                        Toast.fire({--}}
        {{--                            icon: 'success',--}}
        {{--                            title: data.message--}}
        {{--                        })--}}
        {{--                    }else{--}}
        {{--                        printErrorMsg(data.error);--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            });--}}
        {{--        });--}}

        {{--        function printErrorMsg (msg) {--}}
        {{--            $(".print-error-msg").find("ul").html('');--}}
        {{--            $(".print-error-msg").css('display','block');--}}
        {{--            $.each( msg, function( key, value ) {--}}
        {{--                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');--}}
        {{--            });--}}
        {{--        }--}}
        {{--    });--}}

    </script>
@endsection


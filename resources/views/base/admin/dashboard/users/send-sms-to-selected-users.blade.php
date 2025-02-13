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
<form action="" method="post" id="submitForm">
    @csrf
    <div class="modal fade text-right" id="ModalAddress" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">متن پیام را وارد کنید </p>
                    </div>
                    <div class="row col-md-12">

                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="sms_text"
                                       class="font-size-5 ">متن پیامک
                                </label>
                                <textarea rows="8" placeholder="..." name="sms_text" class="text form-control"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 justify-content-center">
                        <div class="form-group mt-5 text-center">
                            <button
                                class="btn btn-submit-national btn-outline-dark ">بررسی اطلاعات
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#submitForm').validate({
            rules: {
                sms_text: {
                    required: true,
                },
            },
            messages: {
                sms_text: {
                    required: "متن الزمی می باشد!",
                },
            }
        })
    </script>
</form>
@endsection

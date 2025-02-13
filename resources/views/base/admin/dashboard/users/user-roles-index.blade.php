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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header sahba-card-header">
                    <h5 class="card-title text-white">@lang('admin.users.role')</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>

                        <button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('save-user-roles' , $user) }}" method="post">
                    @csrf
                <div class="card-body">
                    <div class="row mb-4 mt-3">
                        <div class="col-md-12">


                                <div class="card bg-primary-gradient">
                                    <!-- /.card-header -->
                                    @foreach($roles as $role )
                                        <div class="col-md-12 p-4 " style="border:.5px dashed #ffffff">
                                            <label for="sahba-checkbox" >
                                                {{ $role->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="roles[]" value="{{ $role->name }}" {{ $user->roles->contains($role) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach

                                </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 justify-content-center">
                        <div class="form-group mt-5 text-center">
                            <button
                                class="btn btn-submit-national btn-outline-dark ">ثبت نقش
                            </button>
                        </div>
                    </div>
                </div>
                </form>
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
@endsection

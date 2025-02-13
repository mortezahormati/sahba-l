@extends('layouts.app-without-livewire')

@section('title' , __('admin.side-bar.coupon'))
@section('css')
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">--}}

    <style>
        tbody, td, tfoot, th, thead, tr {
            vertical-align: middle !important;
        }

        .dropzone {
            height: 75px !important;
            cursor: pointer !important;
        }

        .modal {
            z-index: 2000;
            position: absolute !important;
            top: 5% !important;
        }

        .error {
            color: red !important;
        }


    </style>
@endsection
@section('content')
    @include('alerts.admin.alert')
    <div class="row">


        <div class="col-md-4">
            <div class="card">
                <div class="card-header  sahba-card-header">
                    <h5 class="card-title text-white">@lang('admin.products.coupons.add-coupon')</h5>

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
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12 mt-3">
                            @include('errors.errors')
                            <form id="createForm" action="{{ route('coupon.create') }}" method="post"
                                  name="createColors" class="padding-30">
                                @csrf

                                <div class="form-group ">
                                    <label for="">
                                        {{ __('admin.products.coupons.name') }}
                                    </label>
                                    <input type="text"
                                           name="name" class="text form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        {{ __('admin.products.coupons.code') }}
                                    </label>
                                    <input type="text"
                                           name="code" class="text form-control">
                                </div>

                                <div class="form-group">
                                    <label for="id_label_single">
                                        انتخاب محصول
                                    </label>
                                    <div class="">
                                        <select class="js-select-products" name="products[]" multiple="multiple"
                                                style="width: 100%">
                                            <option value="" disabled="disabled">انتخاب کنید</option>
                                            @foreach($products as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-12">

                                        <label for="">نوع تخفیف</label>
                                        <select name="type" class="form-control type-amount" id="select2-dropdown">
                                            <option value="">انتخاب کنید</option>
                                            <option value="1">درصدی</option>
                                            <option value="2">مقداری</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <input type="text" name="discount_amount" class="form-control dis-am">
                                        <input type="text" name="percent_amount" class="form-control pre-am hide">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">تاریخ شروع</label>
                                            <input name="date_from" type="text" class="date-from form-control"
                                                   value="{{str_replace('-','/',\Morilog\Jalali\Jalalian::forge('now')->format('Y-m-d'))}}"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">تاریخ پایان</label>
                                            <input name="date_to" type="text" class="date-to form-control"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('admin.products.coupons.max-uses') }}</label>
                                    <input type="text"
                                           placeholder=""
                                           name="max_uses" class="text form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">{{__('admin.products.coupons.description')}}</label>
                                    <textarea name="description" class="text form-control"></textarea>
                                </div>

                                <div class="form-group mt-5">
                                    <div class="row wrapper-sahba">
                                        <div class="switch_box  col-md-12 ">
                                            <div class="col-md-6">
                                                <label for="sahba-checkbox">@lang('admin.products.coupons.status')
                                                </label>
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <input type="checkbox" name="status"
                                                       class="switch_1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-5 text-center">
                                    <button
                                        class="btn  btn-outline-dark ">@lang('admin.products.coupons.add-coupon')</button>
                                </div>

                            </form>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./card-body -->
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header sahba-card-header">
                    <h5 class="card-title text-white">@lang('admin.products.coupons.coupons')</h5>

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
                <div class="card-body">
                    <div class="row mb-4 mt-3">

                        <div class="col-md-5">
                            <a class="">

                            </a>
                        </div>
                        <div class="col-md-7 text-left">
                            {{--                            <a class="btn btn-danger trash-link text-white"--}}
                            {{--                               href="{{ route('colors.trash')}}">--}}
                            {{--                                <span>@lang('admin.trash')</span>--}}
                            {{--                                <i class="fa-regular fa-trash-can" style="margin-right: 5px"></i>--}}
                            {{--                                <span class="badge badge-danger"> {{ $count_trash }}</span>--}}
                            {{--                            </a>--}}
                        </div>
                    </div>
                    <div class="row  ">
                        <div class="col-md-12 mt-4">
                            {{--                            @include('base.admin.dashboard.product.color.list')--}}
                            <div class="table-responsive">
                                <table id="myForm" class="table table-striped text-center">
                                    <thead role="rowgroup">
                                    <tr role="row" class="title-row">
                                        <th>@lang('admin.products.coupons.row')</th>
                                        <th>@lang('admin.products.coupons.id')</th>
                                        <th>@lang('admin.products.coupons.name')</th>
                                        <th>@lang('admin.products.coupons.code')</th>
                                        <th>@lang('admin.products.coupons.type')</th>
                                        <th>@lang('admin.products.coupons.discount_amount')</th>
                                        <th>@lang('admin.products.coupons.percent_amount')</th>
                                        <th>@lang('admin.products.coupons.max_uses')</th>
                                        <th>@lang('admin.products.coupons.starts_at')</th>
                                        <th>@lang('admin.products.coupons.expires_at')</th>
{{--                                        <th>@lang('admin.products.coupons.status')</th>--}}
                                        <th>@lang('admin.products.coupons.operation')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $c)
                                        <tr role="row">
                                            <td>{{ ($coupons->currentPage()-1) * $coupons->perPage() + $loop->index + 1 }}</td>
                                            <td><a href="">{{ 1000+$c->id }}</a></td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->code }}</td>
                                            <td>{{ $c->type_persian_name }}</td>
                                            <td>{{ $c->discount_amount ?  $c->discount_amount : ' - ' }}</td>
                                            <td>{{ $c->percent_amount ? $c->percent_amount : ' - '}}</td>
                                            <td>{{ $c->max_uses }}</td>
                                            <td>
{{--                                                {{ \Morilog\Jalali\Jalalian::fromCarbon($c->starts_at) }}--}}
                                                {{ $c->persian_started_at }}
                                            </td>
                                            <td>{{ $c->persian_expired_at }}</td>
{{--                                            <td>{{ $c->status }}</td>--}}


                                            <td>
                                                <div class="">
                                                    <form method="POST" id="remove-color-{{$c->id}}"
                                                          action="{{route('coupon.destroy',['coupon'=>$c->id])}}"
                                                          style='display:inline'>
                                                        {{method_field('delete')}}
                                                        @csrf
                                                        <button title="حذف"
                                                                class="btn btn-link text-danger confirmation no-padding">
                                                            <span class="fas fa-remove "></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    {{ $coupons->links() }}
                                </div>
                            </div>

                        </div>

                    </div>


                    <!-- /.row -->
                </div>

            </div>
        </div>

    </div>
    <div class="row">

    </div>
    <script>
        $(document).on("click", ".closed-removed", function () {
            $('.modal-backdrop').removeClass('show').addClass('hide')
        });
        $(document).on("click", ".open-pracavailable", function () {
            var serviceid = $(this).data('id');
            var me = $(this);
            $('.modal-content .modal-body').empty()
            console.log(serviceid);
            var url = "/admin/colors/{id}/edit-modal";
            url = url.replace('{id}', serviceid);
            console.log(url);
            $.ajax({
                type: 'get',
                url: url,
                success: function (data) {

                    var html = "";
                    html += data;

                    $('.loader-modal').hide()
                    $('.modal-content .modal-body').append(html)


                    $('#pracavailable').removeClass('hide')
                    $('#pracavailable').modal('show');


                },
                error: function (data) {
                    console.log('Error:', data);
                }

            });
        });


        $(document).ready(function () {


            $('.js-select-products').select2();
            $(".date-from").persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
            });
            $(".date-to").persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
            });
            $('.type-amount').on('change', function (e) {
                var type = $('.type-amount').val();
                if (type == "2") {
                    $('.dis-am').addClass('show');
                    $('.dis-am').removeClass('hide');
                    $('.pre-am').removeClass('show');
                    $('.pre-am').addClass('hide');
                } else {
                    $('.dis-am').removeClass('show');
                    $('.dis-am').addClass('hide');
                    $('.pre-am').addClass('show');
                    $('.pre-am').removeClass('hide');
                }
            })

            // $("#createForm").validate({
            //     rules: {
            //         // simple rule, converted to {required:true}
            //         name: "required",
            //         // compound rule
            //         email: {
            //             required: true,
            //             email: true
            //         }
            //     },
            //
            // });

            // $('#createForm').on('submit', function (e) {
            //     e.preventDefault();
            //
            //
            // })
            $('.confirmation').on('click', function (e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: "آیا مطمئن هستید؟",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "خیر منصرف شدم",
                    confirmButtonText: "بله می‌خواهم پاک کنم",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                });

            });

            $('.status-active').on('click', function (e) {
                e.preventDefault();
                var formData = {
                    id: $(this).find('input').val(),
                };
                var element_id = $(this).find('input').val()
                var type = "POST"
                var ajaxurl = `{{ route('coupon.status') }}`;
                var item = $(this)
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if (data.status == 1) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            })
                            item.removeClass('bg-danger');
                            item.addClass('bg-success');
                            item.html('');
                            item.html(`
                                 فعال
                                <input type="hidden" class="hidden-val" value="` + element_id + `">
                           `);


                            $('#myForm').trigger("reset")
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message
                            })
                            item.removeClass('bg-success');
                            item.addClass('bg-danger');
                            item.html('');
                            item.html(`
                                 غیرفعال
                                 <input type="hidden" class="hidden-val" value="` + element_id + `">
                           `);

                            // operation_element.css('display' , none);
                            $('#myForm').trigger("reset")

                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });


        });

    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        $('#createForm').validate({
            rules: {
                name: {
                    required: true,
                },
                code: {
                    required: true,
                },
                type: {
                    required: true,
                },
                date_from: {
                    required: true,
                },
                date_to: {
                    required: true,
                },
                max_uses: {
                    required: true,
                    integer: true,
                }
            },
            messages: {
                name: {
                    required: "نام الزامی است . ",
                },
                code: {
                    required: " کد الزامی است!",
                },
                type: {
                    required: "نوع تخفیف الزامی است!",
                },
                date_from: {
                    required: " الزامی می باشد!",
                },
                date_to: {
                    required: " الزامی می باشد!",
                },
                max_uses: {
                    required: " الزامی می باشد!",
                    integer: "مقدار باید به صورت عددی باشد!",
                }
            },
            submitHandler: function (form) {

                // var formData = $('#createForm').serialize();
                var formData = form.serialize();
                var type = "POST"
                var ajaxurl = `{{ route('coupon.create') }}`;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == 1) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            })
                            setInterval(function () {
                                location.reload();
                            }, 2000)
                        }
                    },
                    error: function (data) {
                        Toast.fire({
                            icon: 'error',
                            title: data.message
                        })
                    }
                });


            }


        });
    </script>

@endsection
@section('scripts')

    <script>

    </script>


    {{--    <script--}}
    {{--        src=" https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>--}}

@endsection




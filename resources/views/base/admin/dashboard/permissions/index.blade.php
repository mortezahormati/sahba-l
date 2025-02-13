@extends('layouts.app-without-livewire')

@section('title' , __('admin.side-bar.permissions'))
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
        .sahba-letter-space{
            letter-spacing: 8px;
        }


    </style>
@endsection
@section('content')
    @include('alerts.admin.alert')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header  sahba-card-header">
                    <h5 class="card-title text-white">@lang('admin.permissions.add-permission')</h5>
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
                            <form id="createPermissionForm" action="{{ route('permissions.create') }}" method="post"
                                  name="createColors" class="padding-30">
                                @csrf
                                <div class="form-group">
                                    <label for="">
                                        {{ __('admin.permissions.name') }}
                                    </label>
                                    <input type="text"
                                           name="name" class="text form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="">
                                        {{ __('admin.permissions.persian_name') }}
                                    </label>
                                    <input type="text" name="persian_name" class="form-control">
                                </div>
                                <div class="form-group mt-5 text-center">
                                    <button
                                        class="btn  btn-outline-dark ">@lang('admin.permissions.add-permission')</button>
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
                    <h5 class="card-title text-white">@lang('admin.roles.roles')</h5>
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
                                        <th>@lang('admin.permissions.row')</th>
                                        <th>@lang('admin.permissions.id')</th>
                                        <th>@lang('admin.permissions.name')</th>
                                        <th>@lang('admin.permissions.persian_name')</th>
                                        <th>@lang('admin.permissions.operation')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($permissions->count() > 0 )
                                        @foreach($permissions as $p)
                                            <tr role="row">
                                                <td>{{ ($permissions->currentPage()-1) * $permissions->perPage() + $loop->index + 1 }}</td>
                                                <td><a href="">{{ 1000+$p->id }}</a></td>
                                                <td>{{ $p->name }}</td>
                                                <td>{{ $p->persian_name }}</td>
                                                <td>
                                                    <div class="">
                                                        <form method="POST" id="remove-color-{{$p->id}}"
                                                              action="{{route('permissions.destroy',['permission'=>$p->id])}}"
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
                                    {{ $permissions->links() }}
                                </div>
                                @else
                                    </tbody>
                                </table>
                                @endif


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
            var url = "/admin/colors/{id}/edit-modal";
            url = url.replace('{id}', serviceid);
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
            $(".date-to").persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
            });
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

        $('#createPermissionForm').validate({
            lang: 'fa',
            rules: {
                name: {
                    required: true,
                },
                persian_name: {
                    required: true,
                    lettersonly:true,
                },

            },
            messages: {
                name: {
                    required: "نام الزامی است . ",
                },
                persian_name: {
                    required: "نام فارسی الزامی است . ",
                    lettersonly : "فیلد نام شامل حروف فارسی می باشد!",
                },

            },
            submitHandler: function (form) {

                var formData = form.serialize();
                var type = "POST"
                var ajaxurl = `{{ route('roles.create') }}`;
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




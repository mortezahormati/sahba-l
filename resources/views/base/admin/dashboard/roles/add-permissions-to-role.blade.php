@extends('layouts.app-without-livewire')

@section('title' , __('admin.side-bar.roles'))
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
        <div class="col-md-12">
            <form action="{{ route('save.permission.role' , $role) }}" method="post">
                @csrf
            <div class="card">
                <div class="card-header sahba-card-header">
                    <h5 class="card-title text-white">@lang('admin.roles.add-role-to-permissions') {{ $role->persian_name }}</h5>

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
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.brand-product')
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_brand as $per_brand )
                                    <div class="col-md-12">
                                        <label for="sahba-checkbox" >
                                            {{ $per_brand->persian_name }}
                                        </label>
                                        <input type="checkbox"  name="permissions[]" value="{{ $per_brand->name }}" {{ $role->permissions->contains($per_brand) ? 'checked' : '' }}  class="switch_1" >
                                    </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.products')
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_products as $sec_product )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{--                                            نمایش برند محصولات--}}
                                                {{ $sec_product->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_product->name }}" {{ $role->permissions->contains($sec_product) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.colors-product')
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_colors as $sec_product_color )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{--                                            نمایش برند محصولات--}}
                                                {{ $sec_product_color->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_product_color->name }}" {{ $role->permissions->contains($sec_product_color) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.tags-product')
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_tags as $sec_product_tag )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_product_tag->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_product_tag->name }}" {{ $role->permissions->contains($sec_product_tag) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.warranty-product')
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_warranty as $sec_warranty )
                                        <div class="col-md-12">


                                            <label for="sahba-checkbox" >
                                                {{ $sec_warranty->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_warranty->name }}" {{ $role->permissions->contains($sec_warranty) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.users')
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_users as $sec_user )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_user->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_user->name }}" {{ $role->permissions->contains($sec_user) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.category')
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_category as $sec_cat )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_cat->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_cat->name }}" {{ $role->permissions->contains($sec_cat) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.sub-category')
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_sub_category as $sec_sub )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_sub->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]"  value="{{ $sec_sub->name }}"  {{ $role->permissions->contains($sec_sub) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.child-sub-category')
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_child_sub_category as $sec_child_sub )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_child_sub->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_child_sub->name }}" {{ $role->permissions->contains($sec_child_sub) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row  ">

                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.gallery-product')
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_product_gallery as $sec_p_gallery )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_p_gallery->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_p_gallery->name }}" {{ $role->permissions->contains($sec_p_gallery) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.coupon')
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_coupon as $sec_cp )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_cp->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_cp->name }}" {{ $role->permissions->contains($sec_cp) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.gift')
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_gift as $sec_gi )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_gi->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_gi->name }}" {{ $role->permissions->contains($sec_gi) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>


                    </div>
                    <div class="row">


                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.auth-user-profile')
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_user_profile as $sec_user_p )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_user_p->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_user_p->name }}" {{ $role->permissions->contains($sec_user_p) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.trash-category')
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_trash_categories as $sec_trash_cats_all )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_trash_cats_all->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_trash_cats_all->name }}" {{ $role->permissions->contains($sec_trash_cats_all) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary-gradient">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @lang('admin.roles.update-permissions.system-log')
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    @foreach($permissions_section_system_log as $sec_system_log )
                                        <div class="col-md-12">
                                            <label for="sahba-checkbox" >
                                                {{ $sec_system_log->persian_name }}
                                            </label>
                                            <input type="checkbox"  name="permissions[]" value="{{ $sec_system_log->name }}" {{ $role->permissions->contains($sec_system_log) ? 'checked' : '' }}  class="switch_1" >
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <div class="row">
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

            </form>
        </div>
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

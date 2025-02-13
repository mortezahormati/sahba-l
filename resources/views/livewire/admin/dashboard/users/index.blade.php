@section('title' , __('admin.side-bar.users'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">
    <style>
        .dropzone{
            height: 75px !important;
        }
        body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){
            padding-right: 0 !important;
        }
    </style>
@endsection
<div class="row">
    <div class="col-md-12">
        @include('alerts.admin.alert')
        <div class="card">
            <div class="card-header sahba-card-header">
                <h5 class="card-title text-white">@lang('admin.users.users')</h5>

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
                            <form action="" onclick="event.preventDefault();">
                                <div class="t-header-searchbox font-size-13">
                                    <input type="text" wire:model.debounce.1000="search"
                                           placeholder="{{__('admin.users.search')}}"
                                           class="text form-control">
                                </div>
                            </form>
                        </a>
                    </div>
{{--                    <div class="col-md-7 text-left">--}}
{{--                        <a class="btn btn-success text-white"--}}
{{--                           href="{{ route('products.create')}}"--}}
{{--                         >--}}
{{--                            <span>@lang('admin.users.create')</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
                <div class="row  ">
                    <div class="col-md-12 mt-4">
                        <div class="table-responsive table-striped text-center">
                            <form id="sendSmsToSelectedUsers" multiple>


                            <table class="table table-striped text-center">
                                <thead role="rowgroup">
                                <tr role="row" class="title-row">
                                    <th>@lang('admin.users.row')</th>
                                    <th>@lang('admin.users.name')</th>
                                    <th>@lang('admin.users.email')</th>
                                    <th>@lang('admin.users.phone_number')</th>
                                    <th>@lang('admin.users.role')</th>
                                    <th>@lang('admin.users.created_at')</th>
                                    <th>@lang('admin.users.operation')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                    <tr role="row" class="">
                                        <td>{{ ($users->currentPage()-1) * $users->perPage() + $loop->index + 1 }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-1 mt-1">
                                                    <input type="checkbox" name="{{ $u->name }}"  class=" checkBoxDis form-check-input" value="{{$u->id}}">
                                                </div>
                                                <div class="col-md-11">
                                                    <a href="">{{ $u->persian_family_name }}</a>
                                                </div>
                                            </div>

                                        </td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->phone_number ? $u->phone_number : ' فاقد شماره'   }}</td>
                                        <td>
                                            @foreach($u->roles as $role )
                                                <span class="badge badge-secondary">{{ $role->persian_name }}</span>
                                            @endforeach
                                        </td>
                                        <td>  {{ $created_at_carbon }}</td>
                                        <td>

                                            <a href="{{ route('remove-user-profile') }}" data-id="{{ $u->id }}"  class="mlg-15 delete-profile mr-2">
                                                <i class="fa fa-remove text-danger"></i>
                                            </a>
                                            <a href="{{ route('edit-user-roles' , $u) }}" title="نقش کاربری"   class="mlg-15 mr-2">
                                                <i class="fa-solid fa-address-book text-bg-info"></i>
                                            </a>
                                            <a href="{{ route('update-user-profile' , $u) }}"  title="ویرایش کاربر" class="mlg-15 mr-2">
                                                <i class="fa fa-edit text-success"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $users->links() }}
                                <button type="submit" class="btn send-sms btn-outline-dark" style="display: none"><img src="{{ asset('icons/sms-32.png') }}"> ارسال پیامک به کاربران برگزیده</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(".checkBoxDis").click(function() {
                if($(this).is(":checked")) {
                    $(".send-sms").show(300);
                } else {
                    $(".send-sms").hide(200);
                }
            });

            $('.delete-profile').on('click', function (e) {
                e.preventDefault();

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
                        var id =  $(this).data("id");
                        $.ajax({
                            type: "POST",
                            url: `{{ route('remove-user-profile') }}`,
                            data: {
                                'id' : id,
                            },
                            cache: false,
                            success: function(response) {
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
                                Toast.fire({
                                        text:  response.message,
                                        icon: 'success',
                                    }
                                )
                            },
                            failure: function (response) {
                                Swal.fire({
                                    confirmButtonText:'بازگشت',
                                    text:  response.message,
                                    icon: 'danger',
                                    confirmButtonColor:'#db2237'
                                })
                            }
                        });
                    }
                });

            });

            $('#sendSmsToSelectedUsers').on('submit' , function (e) {
                e.preventDefault();
                Swal.fire({
                    text: 'متن پیامک را وارد کنید',
                    input: 'textarea',
                    confirmButtonColor: '#06283d',
                    confirmButtonText: 'تایید'
                }).then(function(result) {
                    if(result.value.length >= 70){
                        Swal.fire({
                            text: ' متن پیامک باید کمتر از 70 کاراکتر باشد ',
                            icon: 'danger',
                            confirmButtonColor: '#db2237',
                            confirmButtonText: 'بازگشت'
                            }
                        )
                    }
                    if (result.value) {

                        var form = $('#sendSmsToSelectedUsers');
                        var formData =  form.serializeArray();
                        var text = $('.swal2-textarea').val();
                        $.ajax({
                            type: "POST",
                            url: `{{ route('send-sms-to-selected-users-form') }}`,
                            data: {
                                'form-data' : formData ,
                                'text' : text
                            },
                            cache: false,
                            success: function(response) {
                                Swal.fire({
                                        confirmButtonText:'ادامه',
                                        text:  response.message,
                                        icon: 'success',
                                        confirmButtonColor:'#2fba72'
                                }

                                )
                            },
                            failure: function (response) {
                                Swal.fire({
                                    confirmButtonText:'بازگشت',
                                    text:  response.message,
                                    icon: 'danger',
                                    confirmButtonColor:'#db2237'
                                    })
                            }
                        });
                    }
                    else{
                        Swal.fire({
                            confirmButtonText:'بازگشت',
                            text: "وارد کردن متن الزامیست!",
                            icon: 'danger',
                            confirmButtonColor:'#db2237'
                        })
                    }



                })




            })
        })
    </script>

</div>




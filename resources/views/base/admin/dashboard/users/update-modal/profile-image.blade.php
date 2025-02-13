<form action="{{ route('updating-user-profile', $user) }}" method="post" id="userProfileImageCreate" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-right" id="ModalUserProfileImageCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                        تصویر پروفایل
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">
                            لطفا تصویر خود را بارگزاری فرمایید . لازم به ذکر است محدودیت تصویر 2 مگابایت است
                        </p>
                    </div>

                    <div class=" alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="row col-md-12">
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">تصویر پروفایل
                                </label>
                                <input type="file"
                                       placeholder=""
                                       name="profile_img" class="text form-control" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 justify-content-center">
                        <div class="form-group mt-5 text-center">
                            <button
                                class="btn btn-submit-user  btn-outline-dark ">بررسی اطلاعات
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#userProfileImageCreate').validate({
                rules:{
                    profile_img:{
                        required: true,
                        extension: "jpg|jpeg|png|ico|bmp"
                    },
                },
                messages:{
                    profile_img: {
                        required : "فیلد نام الزمی می باشد!",
                        extension:"فرمت تصویر بای به صورت های jpg,jpeg,png,ico,bmp "
                    },
                }
            })
        </script>
        {{--        <script>--}}
        {{--            $(".btn-submit-user").click(function(e){--}}



        {{--                e.preventDefault();--}}
        {{--                var form = $('#userNameCreate').serialize();--}}

        {{--                $.ajax({--}}
        {{--                    type:'POST',--}}
        {{--                    url:"{{ route('store-user-profile') }}",--}}
        {{--                    data:form,--}}
        {{--                    success:function(data){--}}
        {{--                        if($.isEmptyObject(data.error)){--}}
        {{--                            Toast.fire({--}}
        {{--                                icon: 'success',--}}
        {{--                                title: data.message--}}
        {{--                            })--}}
        {{--                        }else{--}}
        {{--                            printErrorMsg(data.error);--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            });--}}

        {{--            function printErrorMsg (msg) {--}}
        {{--                $(".print-error-msg").find("ul").html('');--}}
        {{--                $(".print-error-msg").css('display','block');--}}
        {{--                $.each( msg, function( key, value ) {--}}
        {{--                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');--}}
        {{--                });--}}
        {{--            }--}}
        {{--        </script>--}}
    </div>
</form>




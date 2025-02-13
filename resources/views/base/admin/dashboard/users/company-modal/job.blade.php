<form action="{{ route('update-user-company-profile' , $user) }}" method="post" id="jobUpdate">
@csrf
    <div class="modal fade text-right" id="ModalCompanyJob" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                        ثبت سمت شغلی خود در شرکت
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">لطفا اطلاعات سمت شغلی خود را وارد کنید.
                           </p>
                    </div>

                    <div class=" alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">سمت شغلی
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="job" class="text form-control" value="">
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
            $('#jobUpdate').validate({
                rules:{
                    job:{
                        required:true ,
                        minlength:3,
                        lettersonly:true,
                    },
                },
                messages:{
                    job : {
                        required : "فیلد نام الزمی می باشد!",
                        minlength : "فیلد نام حداقل سه کاراکتر می باشد! ",
                        lettersonly : "فیلد نام شامل حروف فارسی می باشد!",
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




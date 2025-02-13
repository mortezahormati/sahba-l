<form action="{{ route('update-user-company-profile' , $user) }}" method="post" id="nameUpdate">
    @csrf
    <div class="modal fade text-right" id="ModalCompanyName" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                        ثبت اطلاعات شناسایی شرکت
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">لطفا اطلاعات شناسایی خود را وارد کنید. نام شرکت شما باید با اطلاعاتی
                            که وارد می‌کنید همخوانی داشته باشند.</p>
                    </div>

                    <div class=" alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">نام شرکت
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="name" class="text form-control" value="">
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
            $('#nameUpdate').validate({
                rules:{
                    name:{
                        required:true ,
                        minlength:3,
                        lettersonly:true,
                    },
                },
                messages:{
                    name : {
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




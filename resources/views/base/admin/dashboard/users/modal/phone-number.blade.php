<form action="{{ route('store-user-profile') }}" method="post" id="phoneNumberCreate">
    @csrf
    <div class="modal fade text-right" id="ModalPhoneNumber" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                        ثبت تلفن همراه
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">لطفا اطلاعات تلفن همراه خود را وارد کنید.
                        </p>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number"
                                       class="font-size-5 ">شماره همراه
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="phone_number" class="text form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 justify-content-center">
                        <div class="form-group mt-5 text-center">
                            <button
                                class="btn btn-submit-user-phone-number btn-outline-dark ">بررسی اطلاعات
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#phoneNumberCreate').validate({
            rules:{
                phone_number:{
                    required:true ,
                    minlength:11,
                    maxlength:11,
                    digits:true
                },
            },
            messages:{
                phone_number : {
                    required: "فیلد شماره همراه الزمی می باشد!",
                    minlength: "فیلد شماره همراه حداقل 11 کاراکتر می باشد!",
                    maxlength: "فیلد شماره همراه حداکثر 11 کاراکتر می باشد!",
                    digits: "فیلد نام الزمی می باشد!",
                }
            }
        })
    </script>
{{--    <script>--}}
{{--        $(".btn-submit-user-phone-number").click(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var form = $('#phoneNumberCreate').serialize();--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: "{{ route('store-user-profile') }}",--}}
{{--                data: form,--}}
{{--                success: function (data) {--}}
{{--                    if ($.isEmptyObject(data.error)) {--}}
{{--                        alert(data.success);--}}
{{--                        location.reload();--}}
{{--                    } else {--}}
{{--                        printErrorMsg(data.error);--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
</form>


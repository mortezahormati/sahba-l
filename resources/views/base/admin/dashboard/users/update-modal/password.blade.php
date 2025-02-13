<form action="{{ route('updating-user-profile', $user) }}" method="post" id="PasswordForm">
    @csrf
    <div class="modal fade text-right" id="ModalPassword" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                        رمز عبور
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">لطفا اطلاعات کد رمز عبور وارد کنید. </p>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">رمز عبور
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="password" class="text form-control" id="password">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">تکرار رمز عبور
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="password_confirmation" class="text form-control">
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
        $('#PasswordForm').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "فیلد رمز عبور الزمی می باشد!",
                    minlength: "فیلد رمز عبور حداقل سه کاراکتر می باشد! ",
                },
                password_confirmation: {
                    required: "فیلد تکرار رمز عبور الزمی می باشد!",
                    equalTo: "فیلد تکرار رمز عبور باید مشابه رمز عبور باشد! ",
                }
            }
        })
    </script>
</form>

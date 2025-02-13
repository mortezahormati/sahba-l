<form action="{{ route('updating-user-profile' , $user) }}" method="post" id="NationalCodeForm">
    @csrf
    <div class="modal fade text-right" id="ModalNationalCode" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                        ثبت اطلاعات کدملی
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">لطفا اطلاعات کد ملی خود را وارد کنید. </p>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">کد ملی
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="national_code" class="text form-control">
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
        $('#NationalCodeForm').validate({
            rules:{
                national_code:{
                    required:true ,
                    minlength:10,
                    maxlength:10,
                    digits:true,
                }
            },
            messages:{
                national_code : {
                    required : "فیلد نام الزمی می باشد!",
                    minlength : "فیلد نام حداقل 10 کاراکتر می باشد! ",
                    maxlength : "فیلد نام حداکثر 10 کاراکتر می باشد! ",
                    digits : "فیلد شناسه ملی شامل اعداد می باشد!",
                },
            }
        })
    </script>
</form>

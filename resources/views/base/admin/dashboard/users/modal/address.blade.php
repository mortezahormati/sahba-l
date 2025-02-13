<form action="{{ route('store-user-profile') }}" method="post" id="addressForm">
    @csrf
    <div class="modal fade text-right" id="ModalAddress" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                       آدرس جدید
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">ل آدرس پستی خود را وارد نمایید </p>
                    </div>
                    <div class="row col-md-12">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="product"
                                           class="font-size-5 ">آدرس پستی
                                    </label>
                                    <textarea  rows="4" width="90%" name="address" class="text form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="product"
                                           class="font-size-5 ">کد پستی
                                    </label>
                                    <input type="text"
                                           placeholder=""
                                           name="postal_code" class="text form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product"
                                           class="font-size-5 ">تلفن ثابت
                                    </label>
                                    <input type="text"
                                           placeholder=""
                                           name="const_phone_number" class="text form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product"
                                           class="font-size-5 ">نام دریافت کننده
                                    </label>
                                    <input type="text"
                                           placeholder=""
                                           name="delivered_name" class="text form-control">
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
        $('#addressForm').validate({
            rules: {
                address: {
                    required: true,
                },
                postal_code: {
                    required: true,
                    digits: true

                },
                delivered_name: {
                    minlength:5,
                    lettersonly:true,
                },
            },
            messages: {
                address: {
                    required: "فیلد آدرس الزمی می باشد!",
                },
                postal_code: {
                    required: "فیلد کپستی الزمی می باشد!",
                    digits : "فیلد کد شامل اعداد می باشد!",
                },
                delivered_name: {
                    minlength: "حداقل نام گیرنده شامل 3 کاراکتر می باشد.",
                    lettersonly : "فیلد نام گیرنده شامل حروف فارسی می باشد!",
                }
            }
        })
    </script>
</form>

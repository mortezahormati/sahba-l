<form action="{{ route('store-user-profile') }}" method="post" id="birthdayForm">
    @csrf
    <div class="modal fade text-right" id="ModalBirthday" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                        ثبت پست الکترونیکی ( ایمیل )
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">لطفا اطلاعات تاریخ تولد خود را وارد کنید. </p>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6">

                            <label for="">تاریخ تولد</label>
                            <input name="birth_day" type="text" class="birth-day form-control"
                                   value="{{str_replace('-','/',\Morilog\Jalali\Jalalian::forge('now')->format('Y-m-d'))}}"/>

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
        $('#birthdayForm').validate({
            rules: {
                birth_day: {
                    required: true,
                },
            },
            messages: {
                birth_day: {
                    required: "فیلد تاریخ الزمی می باشد!",
                },
                family: {
                    required: "فیلد تاریخ الزمی می باشد!",
                }
            }
        })
    </script>
</form>

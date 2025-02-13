<form action="{{ route('updating-user-profile' , $user) }}" method="post" id="emailForm">
    @csrf
    <div class="modal fade text-right" id="ModalEmail" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <p class="small">لطفا اطلاعات ایمیل خود را وارد کنید. </p>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">ایمیل
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="email" class="text form-control">
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
        $('#emailForm').validate({
            rules:{
                email:{
                    required:true ,
                    email2 :true,
                }
            },
            messages:{
                email : {
                    required : "فیلد ایمیل الزمی می باشد!",
                    email2 : "پست الکترونیکی نا معتبر است  ",
                },
            }
        })
    </script>
</form>

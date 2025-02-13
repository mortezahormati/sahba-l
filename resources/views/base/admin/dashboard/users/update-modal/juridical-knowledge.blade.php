<form action="{{ route('updating-user-profile' , $user) }}" method="post" id="JuridicalKnowledgeForm">
    @csrf
    <div class="modal fade text-right" id="ModalJuridicalKnowledge" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>
                        اطلاعات حقوقی
                    </h6>
                    <div>
                        <a type="button" class="close modal-btn-close text-danger" data-dismiss="modal"
                           aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <p class="small">لطفا اطلاعات حقوقی را وارد کنید. </p>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">نام سازمان
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="company_name" class="text form-control">
                            </div>
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">سمت / شغل
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="job" class="text form-control">
                            </div>
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">تلفن ثابت
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="company_phone_number" class="text form-control">
                            </div>
                            <div class="form-group">
                                <label for="product"
                                       class="font-size-5 ">شناسه ملی
                                </label>
                                <input type="text"
                                       placeholder=""
                                       name="company_national_code" class="text form-control">
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
        $('#JuridicalKnowledgeForm').validate({
            rules:{
                company_name:{
                    required:true ,
                    minlength:3,
                    lettersonly:true,
                },
                job:{
                    required:true ,
                    lettersonly:true,
                },
                company_phone_number :{
                    required:true ,
                    minlength:10,
                    digits: true
                },
                company_national_code :{
                    required:true ,
                    digits: true
                },
            },
            messages:{
                company_name : {
                    required : "فیلد نام الزامی می باشد!",
                    minlength : "فیلد نام حداقل سه کاراکتر می باشد! ",
                    lettersonly : "فیلد نام شامل حروف فارسی می باشد!",
                },
                job : {
                    required : "فیلد شغل/سمت الزامی می باشد!",
                    lettersonly : "فیلد شغل/سمت شامل حروف فارسی میشود!",
                },
                company_phone_number : {
                    required : "فیلد تلفن ثابت الزامی می باشد!",
                    minlength : "فیلد تلفن ثابت حداقل 10 کاراکتر می باشد! ",
                    digits : "فیلد تلفن ثابت شامل اعداد می باشد!",
                },
                company_national_code : {
                    required : "فیلد شناسه ملی الزمی می باشد!",
                    digits : "فیلد شناسه ملی شامل اعداد می باشد!",
                }
            }
        })
    </script>

</form>

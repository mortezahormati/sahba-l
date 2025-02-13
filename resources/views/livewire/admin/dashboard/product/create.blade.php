@section('title', __('admin.products.add-product'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">
    <style>
        .dropzone {
            height: 110px !important;
            cursor: pointer !important;
        }

        .dropdown-select {
            display: none;
        }

        .status-bord:hover {
            -webkit-box-shadow: 0 3px 10px 2px rgb(0 0 0 / 15%);
            -moz-box-shadow: 0 3px 10px 2px rgba(0, 0, 0, 0.15);
            box-shadow: 0 3px 10px 2px rgb(0 0 0 / 15%);
        }
        .status-bord{
            border-radius: 8px;
        }
        .sahba-card-sub-header{
            background-color: #1363df !important;
        }
        .nav-tabs .nav-link.active{
            color: #ffffff !important;
            background-color: #47b5ff !important;
            border-color: #dee2e6 #dee2e6 #ffffff;
        }
    </style>
@endsection

<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="productForm" class="padding-30">
            @include('errors.errors')
            <div class="card">
                <div class="card-header sahba-card-sub-header">
                    <h5 class="card-title text-white">افزودن کالای جدید</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="min-height: 600px !important;">
                    <div class="row">
                        <div class="col-2 col-sm-2">
                            <div class="nav flex-column nav-tabs nav-tabs-right h-100 status-bord" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical"  style="background-color: #06283d">
                                <a class="nav-link  active show text-white" id="vert-tabs-right-home-tab" data-toggle="pill" href="#vert-tabs-right-home" role="tab" aria-controls="vert-tabs-right-home" aria-selected="true">اطلاعات پایه</a>
                                <a class="nav-link  text-white" id="vert-tabs-right-profile-tab" data-toggle="pill" href="#vert-tabs-right-profile" role="tab" aria-controls="vert-tabs-right-profile" aria-selected="false">ویژگی های کالا</a>
                                <a class="nav-link  text-white" id="vert-tabs-right-messages-tab" data-toggle="pill" href="#vert-tabs-right-messages" role="tab" aria-controls="vert-tabs-right-messages" aria-selected="false">اطلاعات مالی</a>
{{--                                <a class="nav-link active" id="vert-tabs-right-settings-tab" data-toggle="pill" href="#vert-tabs-right-settings" role="tab" aria-controls="vert-tabs-right-settings" aria-selected="true">Settings</a>--}}
                            </div>
                        </div>
                        <div class="col-10 col-sm-10 status-bord " style="background-color: #f0f0f1;border-radius: 8px;padding: 20px;">
                            <div class="tab-content" id="vert-tabs-right-tabContent">
                                <div class="tab-pane  active show" id="vert-tabs-right-home" role="tabpanel" aria-labelledby="vert-tabs-right-home-tab">
                                    <div class="row">

                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.title')
                                                </label>
                                                <input wire:model.lazy="product.title" type="text"
                                                       placeholder="{{ __('admin.products.title') }}"
                                                       name="title" class="text form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.child_sub_category')
                                                </label>
                                                <select wire:model.defer="product.child_sub_category" type="text" name="child_sub_category"
                                                        class="form-control">
                                                    <option value="NULL"> انتخاب کنید</option>
                                                    @foreach($child_sub_categories as $c)
                                                        <option value="{{ $c->id }}">{{ $c->title }} --- {{ $c->link }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4 ">
                                            <div class="form-group  mt-3" style="float: left">
                                                <label for="sahba-checkbox"
                                                       class="font-size-5 ">@lang('admin.products.status')
                                                </label>
                                                <div class="wrapper-sahba  mt-4">
                                                    <div class="switch_box ">
                                                        <input type="checkbox" wire:model.lazy="product.status" name="status"
                                                               class="switch_1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.name')
                                                </label>
                                                <input wire:model.lazy="product.name" type="text"
                                                       placeholder="{{ __('admin.products.name') }}"
                                                       name="name" class="text form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="form-group">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.brand')
                                                </label>
                                                <select wire:model.defer="product.brand_id" type="text" name="brand_id"
                                                        class="form-control">
                                                    <option value="NUll">انتخاب کنید</option>
                                                    @foreach($brands as $b)
                                                        <option value="{{ $b->id }}"> {{ $b->title }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group  mt-3">
                                                <label for="sahba-checkbox"
                                                       class="font-size-5 ">@lang('admin.products.publish')
                                                </label>
                                                <div class="wrapper-sahba  mt-4">
                                                    <div class="switch_box">
                                                        <input type="checkbox" wire:model.lazy="product.publish" name="publish"
                                                               class="switch_1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-8 mt-3">
                                            <label for="product"
                                                   class="font-size-5 ">@lang('admin.products.tags')
                                            </label>
                                            <textarea rows="4" wire:model.lazy="product.title" type="text"
                                                      placeholder="{{ __('admin.products.enter-tags') }}"
                                                      name="title" class="text form-control"></textarea>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="text-black">{{ __('admin.products.img') }}</label>

                                                </div>
                                                <div class="col-md-6 mt-4" style="text-align: left !important">
                                                    @if($img)
                                                        <img src="{{ $img->temporaryUrl()}}" style="height:110px ; width:110px" class="" alt="">
                                                    @endif
                                                </div>

                                                <div class="col-md-3 mt-4" >
                                                    <div class="dropzone">
{{--                                                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon"--}}
{{--                                                             style="margin-top: 54% ; margin-right: 16% !important;"/>--}}
                                                        <img src="{{ asset('image/upload-image-2.png') }}" height="75px" alt="">
                                                        <input type="file" name="img" wire:model.lazy="img" class="upload-input"/>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row justify-content-center mt-3 mb-2">
                                                <div class="col-md-10 justify-content-center">
                                                    <small class="progress-title"
                                                           style="display: none">@lang('admin.categories.on-uploading')</small>
                                                    <div wire:ignore id="progressBar" class="progress" style="display:none">
                                                        <div class="progress-bar" role="progressbar" style="width:0;">0%</div>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- <div class="col-md-2"></div> --}}

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-right-profile" role="tabpanel" aria-labelledby="vert-tabs-right-profile-tab">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <label  class="text-black">{{ __('admin.products.color_id') }}</label>
                                            <input type="color" name="color_id" class="mr-5" style="width: 30%;">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="vert-tabs-right-messages" role="tabpanel" aria-labelledby="vert-tabs-right-messages-tab">
                                    <div class="row">

                                        <div class="col-md-2 mt-3">
                                            <div class="form-group">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.price')
                                                </label>
                                                <input wire:model.lazy="product.price" type="text"
                                                       placeholder="{{ __('admin.products.price') }}"
                                                       name="price" class="text form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <div class="form-group">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.price_from')
                                                </label>
                                                <input wire:model.lazy="product.price" type="text"
                                                       placeholder="{{ __('admin.products.price_from') }}"
                                                       name="price_from" class="text form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <div class="form-group">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.price_to')
                                                </label>
                                                <input wire:model.lazy="product.price_to" type="text"
                                                       placeholder="{{ __('admin.products.price_to') }}"
                                                       name="price_to" class="text form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <div class="form-group">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.discount_price')
                                                </label>
                                                <input wire:model.lazy="product.discount_price" type="text"
                                                       placeholder="{{ __('admin.products.discount_price') }}"
                                                       name="discount_price" class="text form-control">
                                            </div>
                                        </div>
{{--                                        <div class="col-md-3 mt-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="product"--}}
{{--                                                       class="font-size-5 ">@lang('admin.products.gift')--}}
{{--                                                </label>--}}
{{--                                                <select wire:model.defer="product.gift" type="text" name="gift"--}}
{{--                                                        class="form-control">--}}
{{--                                                    <option value="0" > فاقد کارت هدیه  </option>--}}
{{--                                                    <option value="1">کارت هدیه شگفت انگیز</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                    </div>
                                </div>
{{--                                <div class="tab-pane fade active show" id="vert-tabs-right-settings" role="tabpanel" aria-labelledby="vert-tabs-right-settings-tab">--}}
{{--                                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- ./card-body -->
    </div>
    <script>
        document.addEventListener('livewire:load', () => {

            let progressSection = document.querySelector('#progressBar');
            progressBar = progressSection.querySelector('.progress-bar');
            progressTitle = document.querySelector('.progress-title');

            document.addEventListener('livewire-upload-start', (event) => {
                progressSection.style.display = 'flex';
            });
            document.addEventListener('livewire-upload-finish', (event) => {
                progressTitle.style.display = 'none';
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-error', (event) => {
                progressTitle.style.display = 'none';
                progressSection.style.display = 'none';

                // loader gif git
            });
            document.addEventListener('livewire-upload-progress', (event) => {
                // progressSection.style.display='flex';
                progressTitle.style.display = 'flex';
                progressBar.style.width = `${event.detail.progress}%`;
                progressBar.textContent = `${event.detail.progress}%`;
            });
        });
    </script>
</div>


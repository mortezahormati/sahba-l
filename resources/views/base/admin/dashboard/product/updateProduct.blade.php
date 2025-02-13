@extends('layouts.app-without-livewire')

@section('title' , __('admin.side-bar.update-product'))
@section('css')
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">--}}

    <style>
        tbody, td, tfoot, th, thead, tr {
            vertical-align: middle !important;
        }

        .dropzone {
            height: 75px !important;
            cursor: pointer !important;
        }

        .modal {
            z-index: 2000;
            position: absolute !important;
            top: 5% !important;
        }

        .error {
            color: red !important;
        }

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

        .status-bord {
            border-radius: 8px;
        }

        .sahba-card-sub-header {
            background-color: #1363df !important;
        }

        .nav-tabs .nav-link.active {
            color: #06283d !important;
            background-color: #f0f0f1 !important;
            border-color: #fcfcfc #fcfcfc #fff;
        }

        .ck-editor__editable {
            min-height: 300px;
        }


    </style>
@endsection
@section('content')
    @include('alerts.admin.alert')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('products.update' , $product->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
                <input type="hidden" name="product" value="$">
                @csrf
                @include('errors.errors')
                <div class="card">
                    <div class="card-header sahba-card-sub-header">
                        <h5 class="card-title text-white"> کالای {{ $product->name }}</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="min-height: 600px !important;min-height: 500px">
                        <div class="row">
                            <div class="col-2 col-sm-2">
                                <div class="nav flex-column nav-tabs nav-tabs-right h-100 status-bord"
                                     id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical"
                                     style="background-color: #06283d ; min-height: 500px">
                                    <a class="nav-link  active show text-white" id="vert-tabs-right-home-tab"
                                       data-toggle="pill" href="#vert-tabs-right-home" role="tab"
                                       aria-controls="vert-tabs-right-home" aria-selected="true">اطلاعات پایه</a>
                                    <a class="nav-link  text-white" id="vert-tabs-right-profile-tab" data-toggle="pill"
                                       href="#vert-tabs-right-profile" role="tab"
                                       aria-controls="vert-tabs-right-profile" aria-selected="false">ویژگی های کالا</a>

                                    <a class="nav-link text-white" id="vert-tabs-right-description-tab"
                                       data-toggle="pill" href="#vert-tabs-right-description" role="tab"
                                       aria-controls="vert-tabs-right-description" aria-selected="true">توضیحات</a>
                                    <a class="nav-link text-white" id="vert-tabs-right-technical-specifications-tab"
                                       data-toggle="pill" href="#vert-tabs-right-technical-specifications" role="tab"
                                       aria-controls="vert-tabs-right-technical-specifications" aria-selected="true">مشخصات
                                        فنی</a>
                                    <a class="nav-link text-white" id="vert-tabs-right-accessories-tab"
                                       data-toggle="pill" href="#vert-tabs-right-accessories" role="tab"
                                       aria-controls="vert-tabs-right-accessories" aria-selected="true">لوازم جانبی </a>
                                    <a class="nav-link  text-white" id="vert-tabs-right-messages-tab" data-toggle="pill"
                                       href="#vert-tabs-right-messages" role="tab"
                                       aria-controls="vert-tabs-right-messages" aria-selected="false">اطلاعات مالی</a>
                                </div>
                            </div>
                            <div class="col-10 col-sm-10 status-bord "
                                 style="background-color: #f0f0f1;border-radius: 8px;padding: 20px;">
                                <div class="tab-content" id="vert-tabs-right-tabContent">
                                    <div class="tab-pane  active show" id="vert-tabs-right-home" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-home-tab">
                                        <div class="row">

                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.title')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.title') }}"
                                                           name="title" value="{{ $product->title }}" class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.name')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.name') }}"
                                                           name="name"  value="{{ $product->name }}" class="text form-control">
                                                </div>
                                            </div>


                                            <div class="col-md-4 ">
                                                <div class="form-group  mt-3" style="float: left">
                                                    <label for="sahba-checkbox"
                                                           class="font-size-5 ">@lang('admin.products.status')
                                                    </label>
                                                    <div class="wrapper-sahba  mt-4">
                                                        <div class="switch_box ">
                                                            <input type="checkbox"
                                                                   name="status"
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
                                                           class="font-size-5 ">@lang('admin.products.child_sub_category')
                                                    </label>
                                                    <select type="text"
                                                            name="child_sub_category_id"
                                                            class="form-control">
                                                        @foreach($child_sub_categories as $c)
                                                            <option value="{{ $c->id }}" {{ $product->child_sub_categories_id = $c->id ? 'selected' : '' }} >{{ $c->title }}
                                                                --- {{ $c->link }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.brand')
                                                    </label>
                                                    <div class="">
                                                        <select class="js-select-brands" name="brands[]"
                                                                multiple="multiple"
                                                                style="width: 100%"
                                                                class="form-control">
                                                            @foreach($brands as $b)
                                                                <option value="{{ $b->id }}"> {{ $b->title }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group  mt-3" style="float: left">
                                                    <label for="sahba-checkbox"
                                                           class="font-size-5 ">@lang('admin.products.publish')
                                                    </label>
                                                    <div class="wrapper-sahba  mt-4">
                                                        <div class="switch_box ">
                                                            <input type="checkbox"
                                                                   name="publish"
                                                                   class="switch_1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mt-3">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.tags')
                                                </label>
                                                <div class="">
                                                    <select class="js-select-tags" name="tags[]" multiple="multiple"
                                                            style="width: 100%"
                                                            class="form-control">
                                                        @foreach($tags as $b)
                                                            <option value="{{ $b->id }}"> {{ $b->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label for="product"
                                                       class="font-size-5 ">@lang('admin.products.color_id')
                                                </label>
                                                <div class="">
                                                    <select class="js-select-colors" name="colors[]" multiple="multiple"
                                                            style="width: 100%"
                                                            class="form-control">
                                                        @foreach($colors as $b)
                                                            <option value="{{ $b->id }}">
                                                                {{ $b->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="text-black">{{ __('admin.products.img') }}</label>
                                                        <img src="{{ asset('image/upload-image-2.png') }}"
                                                             height="75px" alt="" style="margin-top: 50px;">
                                                        <input type="file" name="img" id="imgInp"
                                                               class="upload-input"/>
                                                    </div>
                                                    <div class="col-md-6 mt-4" style="text-align: left !important">
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <img id="blah" src="#" class="img-thumbnail"
                                                             style="margin-top: 20px;"/>
                                                    </div>

                                                </div>


                                                {{-- <div class="col-md-2"></div> --}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-right-profile" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-profile-tab">
                                        <div class="row">
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="number"
                                                           class="font-size-5 ">@lang('admin.products.number')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.number') }}"
                                                           name="text" class="text form-control" value="{{ $product->text }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="text"
                                                           class="font-size-5 ">@lang('admin.products.weight')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.weight') }}"
                                                           name="weight" class="text form-control"  value="{{ $product->weight }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group  mt-3" style="float: left">
                                                    <label for="sahba-checkbox"
                                                           class="font-size-5 ">@lang('admin.products.original')
                                                    </label>
                                                    <div class="wrapper-sahba  mt-4">
                                                        <div class="switch_box ">
                                                            <input type="checkbox"
                                                                   name="original"  value="{{ $product->original }}"
                                                                   class="switch_1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group  mt-3" style="float: left">
                                                    <label for="sahba-checkbox"
                                                           class="font-size-5 ">@lang('admin.products.special')
                                                    </label>
                                                    <div class="wrapper-sahba  mt-4">
                                                        <div class="switch_box ">
                                                            <input type="checkbox"
                                                                   name="special" value="{{ $product->special }}"
                                                                   class="switch_1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="order_count"
                                                           class="font-size-5 ">@lang('admin.products.order_count')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.order_count') }}"
                                                           name="order_count"  value="{{ $product->order_count }}"
                                                           class="text form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="order_count"
                                                   class="font-size-5 ">@lang('admin.products.body')
                                            </label>
                                            <div class="col-md-12 mt-3">
                                               <textarea class="ckeditor form-control" name="body"
                                                         id="body_attr"
                                                         cols="30" rows="10">{{ $product->body }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-right-messages" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-messages-tab">
                                        <div class="row">

                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.price')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.price') }}"
                                                           name="price" value="{{ $product->price }}"
                                                           class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.price_from')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.price_from') }}"
                                                           name="price_from" value="{{ $product->price_from }}"
                                                           class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.price_to')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.price_to') }}"
                                                           name="price_to"  value="{{ $product->price_to }}"
                                                           class="text form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <div class="form-group">
                                                    <label for="product"
                                                           class="font-size-5 ">@lang('admin.products.discount_price')
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{ __('admin.products.discount_price') }}"
                                                           name="discount_price"  value="{{ $product->discount_price }}"
                                                           class="text form-control">
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
                                    <div class="tab-pane fade" id="vert-tabs-right-description" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-description-tab">
                                        {{--                                        <input id="description" name="description">--}}
                                        <textarea class="ckeditor form-control" name="description" id="description"
                                                  cols="30" rows="10" >{{ $product->description }}</textarea>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-right-technical-specifications"
                                         role="tabpanel"
                                         aria-labelledby="vert-tabs-right-dtechnical-specifications-tab">
                                        <textarea class="ckeditor form-control" name="technical_specifications"
                                                  id="technical_specifications"
                                                  cols="30" rows="10" >{{ $product->technical_specifications }}</textarea>
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-right-accessories" role="tabpanel"
                                         aria-labelledby="vert-tabs-right-accessories-tab">
                                        <textarea class="ckeditor form-control" name="accessories" id="accessories"
                                                  ols="30" rows="10">{{ $product->accessories }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10 justify-content-center">
                                <div class="form-group mt-5 text-center">
                                    <button
                                        class="btn  btn-outline-dark ">@lang('admin.products.add-product')</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <!-- ./card-body -->
        </div>
        @php
        $brands_pro = $product->brands;
        @endphp
    </div>
    <script>
        $(document).ready(function () {
            {{--$('.js-select-brands').select2({--}}
            {{--    ajax: {--}}
            {{--        url: `{{ route('product.get.brands' , $product->id) }}`--}}
            {{--    }--}}
            {{--});--}}
            // const testData = () => {
            //     return [{
            //         id: 'test1',
            //         text: "test text"
            //     }];
            // }
            $('.js-select-brands').select2(
                // {
                //     data: testData()
                // }
            );
            $('.js-select-tags').select2();
            $('.js-select-colors').select2();


        });

        var brandsSelect = $('.js-select-brands');
        // $.ajax({
        //     type: 'GET',
        //     url: `/get/brands/`+  +`/b`+
        // }).then(function (data) {
        //     // create the option and append to Select2
        //     var option = new Option(data.name, data.id, true, true);
        //     brandsSelect.append(option).trigger('change');
        //
        //     // manually trigger the `select2:select` event
        //     brandsSelect.trigger({
        //         type: 'select2:select',
        //         params: {
        //             data: data
        //         }
        //     });
        // });

        ClassicEditor
            .create(document.querySelector('#technical_specifications'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: {
                    // The UI will be English.
                    ui: 'fa',

                    // But the content will be edited in Arabic.
                    content: 'fa' ,
                    {{--data: {{ $product->description }}--}}
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: {
                    // The UI will be English.
                    ui: 'fa',

                    // But the content will be edited in Arabic.
                    content: 'fa'
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#accessories'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: {
                    // The UI will be English.
                    ui: 'fa',

                    // But the content will be edited in Arabic.
                    content: 'fa'
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#body_attr'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                language: {
                    // The UI will be English.
                    ui: 'fa',

                    // But the content will be edited in Arabic.
                    content: 'fa'
                }
            })
            .catch(error => {
                console.error(error);
            });
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection









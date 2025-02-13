@extends('layouts.app-without-livewire')

@section('title' , __('admin.side-bar.add-product'))
@section('css')
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
            /*min-height: 500px;*/
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

        <div class="col-md-4">
            <div class="card">
                <div class="card-header  sahba-card-header">
                    <h5 class="card-title text-white">@lang('admin.products.gallery.add-image')</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <form action="{{ route('product.single.gallery.update',$product->id) }}" method="post"
                                  class="padding-30" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="">
                                        @lang('admin.products.gallery.name')
                                    </label>
                                    <input name="name" type="text"
                                           placeholder="{{ __('admin.products.gallery.name') }}" name="title"
                                           class="text form-control">
                                </div>
                                <div class="form-group">
                                    <label for="position" class="">
                                        @lang('admin.products.gallery.image-position')
                                    </label>
                                    <select type="text" name="position"
                                            class="form-control">
                                        <option value="NULL">انتخاب کنید</option>
                                        <option value="1"> تصویر اول</option>
                                        <option value="2"> تصویر دوم</option>
                                        <option value="3"> تصویر سوم</option>
                                        <option value="4"> تصویر چهارم</option>
                                        <option value="5">پ تصویر نجم</option>
                                        <option value="6"> تصویر ششم</option>
                                    </select>
                                </div>

                                <div class="form-group mt-5">
                                    <div class="row wrapper-sahba">
                                        <div class="switch_box  col-md-12 " style="margin-right: -6px">
                                            <div class="col-md-6">
                                                <label for="position" class="">
                                                    @lang('admin.products.gallery.status')
                                                </label>
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <input type="checkbox" name="status"
                                                       class="switch_1">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="col-md-2"></div> --}}


                                <div class="form-group mt-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="text-black">{{ __('admin.products.img') }}</label>
                                            <img src="{{ asset('image/upload-image-2.png') }}"
                                                 height="75px" alt="" style="margin-top: 15px;">
                                            <input type="file" name="img" id="imgInp"
                                                   class="upload-input"/>
                                        </div>
                                        <div class="col-md-6 mt-4" style="text-align: left !important">
                                        </div>
                                        <div class="col-md-3 mt-4">
                                            <img id="blah" src="{{ asset('image/replaces-image.jpg') }}"
                                                 class="img-thumbnail"
                                                 style="margin-top: 20px;"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">

                                </div>
                                <div class="form-group mt-5 text-center">
                                    <button
                                        class="btn  btn-outline-dark ">@lang('admin.products.gallery.add-image')</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./card-body -->
            </div>

        </div>
        <div class="col-md-8">
            <div class="card" style="min-height: 750px">
                <div class="card-header sahba-card-header">
                    <h5 class="card-title text-white">گالری تصاویر محصول {{ $product->title }}</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-4" style="min-height: 1000px">
                            <div class="row">
                                <div class="row">
                                    @foreach($product_images as $img)
                                        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                                               data-title=""
                                               data-image="{{ url('Gallery/Product/'.$product->id.'/'.$img->img) }}"
                                               data-target="#image-gallery">
                                                <img class="img-thumbnail"
                                                     src="{{ url('Gallery/Product/'.$product->id.'/'.$img->img) }}"
                                                     alt="Another alt text">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                            </div>
                                            <div class="modal-footer">
                                                <div class="row col-md-12">
                                                    <div class="col-md-3">
                                                        <button type="button" id="show-next-image"
                                                                class="btn btn-secondary float-right"><i
                                                                class="fa fa-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-secondary float-left"
                                                                id="show-previous-image"><i
                                                                class="fa fa-arrow-left"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

            </div>
        </div>

    </div>




    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
    <script>
        let modalId = $('#image-gallery');

        $(document)
            .ready(function () {

                loadGallery(true, 'a.thumbnail');

                //This function disables buttons when needed
                function disableButtons(counter_max, counter_current) {
                    $('#show-previous-image, #show-next-image')
                        .show();
                    if (counter_max === counter_current) {
                        $('#show-next-image')
                            .hide();
                    } else if (counter_current === 1) {
                        $('#show-previous-image')
                            .hide();
                    }
                }

                /**
                 *
                 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
                 * @param setClickAttr  Sets the attribute for the click handler.
                 */

                function loadGallery(setIDs, setClickAttr) {
                    let current_image,
                        selector,
                        counter = 0;

                    $('#show-next-image, #show-previous-image')
                        .click(function () {
                            if ($(this)
                                .attr('id') === 'show-previous-image') {
                                current_image--;
                            } else {
                                current_image++;
                            }

                            selector = $('[data-image-id="' + current_image + '"]');
                            updateGallery(selector);
                        });

                    function updateGallery(selector) {
                        let $sel = selector;
                        current_image = $sel.data('image-id');
                        $('#image-gallery-title')
                            .text($sel.data('title'));
                        $('#image-gallery-image')
                            .attr('src', $sel.data('image'));
                        disableButtons(counter, $sel.data('image-id'));
                    }

                    if (setIDs == true) {
                        $('[data-image-id]')
                            .each(function () {
                                counter++;
                                $(this)
                                    .attr('data-image-id', counter);
                            });
                    }
                    $(setClickAttr)
                        .on('click', function () {
                            updateGallery($(this));
                        });
                }
            });

        // build key actions
        $(document)
            .keydown(function (e) {
                switch (e.which) {
                    case 37: // left
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                            $('#show-previous-image')
                                .click();
                        }
                        break;

                    case 39: // right
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                            $('#show-next-image')
                                .click();
                        }
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.preventDefault(); // prevent the default action (scroll / move caret)
            });
        $(document).read(function () {

            lightGallery(document.getElementById('lightgallery'));


        })
    </script>

@endsection
@section('scripts')
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'));
    </script>

@endsection

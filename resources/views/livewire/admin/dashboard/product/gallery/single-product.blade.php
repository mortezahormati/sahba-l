@section('title' , __('admin.products.gallery.gallery'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">
    <style>
        tbody, td, tfoot, th, thead, tr {
            vertical-align: middle !important;
        }
        .dropzone {
            height: 75px !important;
            cursor: pointer !important;
        }
    </style>
@endsection
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
                        <form wire:submit.prevent="productGalleryFor" class="padding-30">
                            @include('errors.errors')
                            <div class="form-group">
                                <label for="" class="">
                                    @lang('admin.products.gallery.name')
                                </label>
                                <input wire:model.lazy="gallery.name" type="text"
                                       placeholder="{{ __('admin.products.gallery.name') }}" name="title"
                                       class="text form-control">
                            </div>
                            <div class="form-group">
                                <label for="position" class="">
                                    @lang('admin.products.gallery.image-position')
                                </label>
                                <select wire:model.defer="gallery.position" type="text" name="position"
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
                                            <input type="checkbox" wire:model.lazy="gallery.status" name="status"
                                                   class="switch_1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">

                                <div class="row">
                                    {{-- <div class="col-md-2"></div> --}}
                                    <div class="col-md-3">
                                        <label for="position" class="">
                                            @lang('admin.products.gallery.img')
                                        </label>
                                    </div>
                                    <div class="col-md-6" style="text-align: left !important">
                                        @if($img)
                                            <img src="{{ $img->temporaryUrl()}}" style="height:75px ; width:75px"
                                                 class="" alt="">
                                        @endif
                                    </div>

                                    <div class="center col-md-2" style="margin-right: 6%;">
                                        <div class="dropzone">
                                            <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon"
                                                 style="margin-top: 30%"/>
                                            <input type="file" name="img" wire:model.lazy="img" class="upload-input"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-center mt-3 mb-2">
                                    <div class="col-md-10 justify-content-center">
                                        <small class="progress-title" style="display: none">در حال بارگزاری...</small>
                                        <div wire:ignore id="progressBar" class="progress" style="display:none">
                                            <div class="progress-bar" role="progressbar" style="width:0;">0%</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group mt-2">

                            </div>
                            <div class="form-group mt-5 text-center">
                                <button class="btn  btn-outline-dark ">@lang('admin.products.gallery.add-image')</button>
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
        <div class="card">
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
                <div class="row mb-4 mt-3">

                    <div class="col-md-5">
                        <a class="">
                            <form action="" onclick="event.preventDefault();">
                                <div class=" font-size-13">
                                    <input type="text" wire:model.debounce.1000="search"
                                           placeholder="{{__('admin.products.gallery.search-gallery')}}"
                                           class="text form-control">
                                    {{-- <input type="text" class="text search-input__box " value=""></input>--}}
                                </div>
                            </form>
                        </a>
                    </div>
                    <div class="col-md-7 text-left">

                    </div>
                </div>
                <div class="row  ">
                    <div class="col-md-12 mt-4">
                        {{--                        @if($readyToLoad)--}}
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead role="rowgroup">
                                <tr role="row" class="title-row">
                                    <th>@lang('admin.products.gallery.row')</th>
                                    <th>@lang('admin.products.gallery.id')</th>
                                    <th>@lang('admin.products.gallery.name')</th>
                                    <th>@lang('admin.products.gallery.position')</th>
                                    <th>@lang('admin.products.gallery.img')</th>
                                    <th>@lang('admin.products.gallery.status')</th>
                                    <th>@lang('admin.products.gallery.operation')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_images as $g)
                                    <tr role="row">
                                        <td>{{ ($product_images->currentPage()-1) * $product_images->perPage() + $loop->index + 1 }}</td>
                                        <td><a href="">{{ 1000+$g->id }}</a></td>
                                        <td>
                                            {{ $g->name }}
                                        </td>

                                        <td>
                                            {{ $g->position   }}
                                        </td>
                                        <td>
                                            @isset($g->img)
                                                <img class="thumbnail-img-category"
                                                     src="{{ asset('storage/'.$g->img) }}"
                                                     style="height: 70px;" alt="">
                                            @endisset
                                        </td>
                                        <td>
                                            @if($g->status == 1 )
                                                <button type="submit" wire:click="disableGalleryStatus({{$g->id}})"
                                                        class="badge badge-success bg-success">{{ __('admin.brands.statusActive') }}
                                                </button>
                                            @else
                                                <button wire:click="enableGalleryStatus({{$g->id}})" type="submit"
                                                        class="badge badge-danger bg-danger"> {{ __('admin.brands.statusDeActive') }}
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($g->status == 0 )
                                                <a type="submit" wire:click="deleteProductGallery({{ $g->id }})"
                                                   class=" ml-2 text-danger"
                                                   title="حذف">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                                <a href="{{ route('product.single.gallery.update',$g ) }}"
                                                   class=" ml-2 text-success"
                                                   title="ویرایش"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-dark">@lang('admin.products.gallery.statusActivated') </span>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>

                            <div class="pagination">
                                {{ $product_images->links() }}
                            </div>
                        </div>


                    </div>

                </div>
                <!-- /.row -->
            </div>

        </div>
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





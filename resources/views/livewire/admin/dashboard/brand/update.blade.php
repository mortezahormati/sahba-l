@section('title' , __('admin.brands.updateCategory'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">
    <style>
        .dropzone {
            height: 125px !important;
            cursor: pointer !important;
        }
    </style>

@endsection
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header  sahba-card-header">
                <h5 class="card-title text-white">'{{ __('admin.brands.updateCategory')}}  &nbsp;  {{ $brand->title }}</h5>

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
                        <h4 class="box__title"></h4>
                        <form wire:submit.prevent="updateBrand" class="padding-30">
                            @include('errors.errors')
                            <div class="form-group">
                                <input wire:model.lazy="brand.title" type="text"
                                       placeholder="{{ __('admin.categories.title') }}"
                                       value="{{$brand->title }}"
                                       name="title" class="text form-control">
                            </div>
                            <div class="form-group">
                                <input wire:model.lazy="brand.name" type="text"
                                       placeholder="{{ __('admin.categories.name') }}"
                                       name="name" class="text form-control">
                            </div>
                            <div class="form-group">
                                <input wire:model.lazy="brand.link" type="text"
                                       placeholder="{{ __('admin.categories.link') }}"
                                       name="link" class="text form-control">
                            </div>
                            <div class="form-group mt-5">
                                <div class="row wrapper-sahba">
                                    <div class="switch_box  col-md-12 ">
                                        <div class="col-md-6">
                                            <label for="sahba-checkbox"
                                                   class="font-size-5 ">@lang('admin.categories.status')</label>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <input type="checkbox" wire:model.defer="brand.status" name="status" class="switch_1">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group mt-3">


                                <div class="row">
                                    {{-- <div class="col-md-2"></div> --}}
                                    <div class="col-md-3">
                                        <label for="sahba-checkbox"
                                               class="font-size-5 ">
                                            {{ __('admin.categories.img') }}</label>
                                        <img class="thumbnail-img-category mr-3" src="{{ asset('storage/'.$brand->img) }}" style="height: 125px;" alt="">

                                    </div>
                                    <div class="col-md-6" style="text-align: left !important">
                                        @if($img)
                                            <img src="{{ $img->temporaryUrl()}}" style="height:120px" class="" alt="">
                                        @endif
                                    </div>

                                    <div class="center col-md-2" style="margin-right: 6%;">
                                        <div class="dropzone">
                                            <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" style="margin-top: 17% ;margin-right: 40% !important" />
                                            <input type="file" name="img" wire:model.lazy="img" class="upload-input" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-center mt-3 mb-2">
                                    <div class="col-md-10 justify-content-center" >
                                        <small class="progress-title" style="display: none">{{ __('admin.categories.') }}</small>
                                        <div wire:ignore id="progressBar" class="progress" style="display:none">
                                            <div class="progress-bar" role="progressbar" style="width:0;">0%</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group mt-2">

                            </div>
                            <div class="form-group mt-5 text-center">
                                <button class="btn btn-outline-dark ">@lang('admin.categories.updateBtnCategories')</button>
                            </div>
                        </form>

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            // img = document.querySelector('.thumbnail-img-category');
            // fullPage = document.querySelector('#fullpage');
            // img.addEventListener('click' ,function(){
            //     fullPage.style.backgroundImage = 'url(' + img.src + ')';
            //     fullPage.style.display = 'block';
            // });
            let progressSection = document.querySelector('#progressBar');
            progressBar = progressSection.querySelector('.progress-bar');
            progressTitle = document.querySelector('.progress-title');
            // progressValue= progressSection.querySelector('.progress-value');

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




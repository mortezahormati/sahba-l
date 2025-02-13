@section('title' , __('admin.tags.updateTag'))
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
                <h5 class="card-title text-white">'{{ __('admin.tags.updateTag')}} </h5>

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
                        <form wire:submit.prevent="updateTag" class="padding-30">
                            @include('errors.errors')
                            <div class="form-group">
                                <input wire:model.lazy="tag.name" type="text"
                                       placeholder="{{ __('admin.warranties.name') }}"
                                       value="{{$tag->name }}"
                                       name="title" class="text form-control">
                            </div>
                            <div class="form-group">
                                <input wire:model.lazy="tag.link" type="text"
                                       placeholder="{{ __('admin.tags.link') }}"
                                       value="{{$tag->link }}"
                                       name="title" class="text form-control">
                            </div>
                            <div class="form-group mt-5">
                                <div class="row wrapper-sahba">
                                    <div class="switch_box  col-md-12 ">
                                        <div class="col-md-6">
                                            <label for="sahba-checkbox"
                                                   class="font-size-5 ">@lang('admin.tags.status')</label>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <input type="checkbox" wire:model.defer="tag.status" name="status" class="switch_1">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group mt-2">

                            </div>
                            <div class="form-group mt-5 text-center">
                                <button class="btn btn-outline-dark ">@lang('admin.tags.updateBtnTags')</button>
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




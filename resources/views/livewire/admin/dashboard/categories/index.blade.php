@section('title' , __('admin.categories.categories'))
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
<div class="row" >
    <div class="col-md-12">
        @include('livewire.admin.notification.alerts.alerts')
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header  sahba-card-header">
                <h5 class="card-title text-white">@lang('admin.categories.create')</h5>
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
                        <form wire:submit.prevent="categoryForm" class="padding-30">
                            @include('errors.errors')
                            <div class="form-group">
                                <input wire:model.lazy="category.title" type="text"
                                       placeholder="{{ __('admin.categories.title') }}"
                                       name="title" class="text form-control">
                            </div>
                            <div class="form-group">
                                <input wire:model.lazy="category.name" type="text"
                                       placeholder="{{ __('admin.categories.name') }}"
                                       name="name" class="text form-control">
                            </div>
                            <div class="form-group">
                                <input wire:model.lazy="category.link" type="text"
                                       placeholder="{{ __('admin.categories.link') }}"
                                       name="link" class="text form-control">
                            </div>
                            <div class="form-group mt-5">
                                <div class="row wrapper-sahba">
                                    <div class="switch_box  col-md-12 ">
                                        <div class="col-md-6">
                                            <label for="sahba-checkbox"
                                                   class="font-size-5 "><small>@lang('admin.categories.status')</small>
                                            </label>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <input type="checkbox" wire:model.lazy="category.status" name="status"
                                                   class="switch_1">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group mt-3">

                                <div class="row">
                                    {{-- <div class="col-md-2"></div> --}}
                                    <div class="col-md-3">
                                        <small class="text-black">{{ __('admin.categories.img') }}</small>

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
                                <button class="btn  btn-outline-dark ">@lang('admin.categories.addcategories')</button>
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
                <h5 class="card-title text-white">@lang('admin.categories.categories')</h5>
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
                        <a class="btn   btn-outline-dark ml-2 active" href="{{ route('categories.index')}}">
                            @lang('admin.categories.categories')
                        </a>
                        <a class="btn   btn-outline-dark ml-2" href="{{ route('sub-categories.index')}}">
                            @lang('admin.categories.sub-categories')
                        </a>
                        <a class="btn   btn-outline-dark ml-2" href="{{ route('child-sub-categories.index')}}">
                            @lang('admin.categories.sub-childe-categories')
                        </a>
                    </div>
                    <div class="col-md-5">
                        <a class="">
                            <form action="" onclick="event.preventDefault();">
                                <div class=" font-size-13">
                                    <input type="text" wire:model.debounce.1000="search"
                                           placeholder="{{__('admin.categories.search-category')}}"
                                           class="text form-control">
                                    {{-- <input type="text" class="text search-input__box " value=""></input>--}}
                                </div>
                            </form>
                        </a>
                    </div>
                    <div class="col-md-2 text-left">
                        <a class="btn btn-danger trash-link text-white"
                           href="{{ route('categories.trash')}}">
                            <span>@lang('admin.trash')</span>
                            <i class="fa-regular fa-trash-can" style="margin-right: 5px"></i>
                            <span class="badge badge-danger"> {{ $count_trash }}</span>
                        </a>
                    </div>
                </div>
                <div class="row  ">
                    <div class="col-md-12 mt-4">

                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead role="rowgroup">
                                    <tr role="row" class="title-row">
                                        <th>@lang('admin.categories.row')</th>
                                        <th>@lang('admin.categories.id')</th>
                                        <th>@lang('admin.categories.title')</th>
                                        <th>@lang('admin.categories.img')</th>
                                        <th>@lang('admin.categories.name')</th>
                                        <th>@lang('admin.categories.status')</th>
                                        <th>@lang('admin.categories.operation')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($categories as $c)
                                            <tr role="row">
                                                <td>{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->index + 1 }}</td>
                                                <td><a href="">{{ 1000+$c->id }}</a></td>
                                                <td>
                                                    {{ $c->title }}

                                                </td>
                                                <td>
                                                    @isset($c->img)
                                                        <img class="thumbnail-img-category"
                                                             src="{{ asset('storage/'.$c->img) }}"
                                                             style="height: 70px;" alt="">
                                                    @endisset
                                                </td>
                                                <td><a href="">{{ $c->name }}</a></td>
                                                <td>
                                                    @if($c->status == 1 )
                                                        <button type="submit" wire:click="disableCategoryStatus({{$c->id}})"
                                                                class="badge badge-success bg-success">{{ __('admin.categories.statusActive') }}
                                                        </button>
                                                    @else
                                                        <button wire:click="enableCategoryStatus({{$c->id}})" type="submit"
                                                                class="badge badge-danger bg-danger"> {{ __('admin.categories.statusDeActive') }}
                                                        </button>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($c->status == 0 )
                                                    <a type="submit" wire:click="deleteCategory({{ $c->id }})"
                                                       class=" ml-2 text-danger"
                                                       title="حذف">
                                                        <i class="fa fa-remove"></i>
                                                    </a>

                                                    <a type="button" href="{{ route('categories.update-form',$c) }}"
                                                       class=" text-success "
                                                       title="ویرایش">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    @else
                                                        <span class="badge badge-dark">@lang('admin.categories.statusActivated') </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>




                                </table>

                                <div class="pagination">
                                    {{ $categories->links() }}
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



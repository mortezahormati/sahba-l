@section('title' , __('admin.tags.tags'))
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
    <div class="col-md-12">
        @include('livewire.admin.notification.alerts.alerts')
    </div>
    {{--    @include('livewire.admin.')--}}
    <div class="col-md-4">
        <div class="card">
            <div class="card-header  sahba-card-header">
                <h5 class="card-title text-white">@lang('admin.tags.add-tag')</h5>

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
                        <form wire:submit.prevent="tagForm" class="padding-30">

                            <div class="form-group">
                                <input wire:model.lazy="tag.name" type="text"
                                       placeholder="{{ __('admin.tags.name') }}"
                                       name="name" class="text form-control">
                            </div>
                            <div class="form-group">
                                <input wire:model.lazy="tag.link" type="text"
                                       placeholder="{{ __('admin.tags.link') }}"
                                       name="link" class="text form-control">
                            </div>
                            <div class="form-group mt-5">
                                <div class="row wrapper-sahba">
                                    <div class="switch_box  col-md-12 ">
                                        <div class="col-md-6">
                                            <p for="sahba-checkbox"
                                               class="font-size-5 ">@lang('admin.tags.status')
                                            </p>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <input type="checkbox" wire:model.lazy="tag.status" name="status"
                                                   class="switch_1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2">

                            </div>
                            <div class="form-group mt-5 text-center">
                                <button class="btn  btn-outline-dark ">@lang('admin.tags.add-tag')</button>
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
                <h5 class="card-title">@lang('admin.tags.table')</h5>

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
                                           placeholder="{{__('admin.tags.search')}}"
                                           class="text form-control">
                                    {{-- <input type="text" class="text search-input__box " value=""></input>--}}
                                </div>
                            </form>
                        </a>
                    </div>
                    <div class="col-md-7 text-left">
                        <a class="btn btn-danger trash-link text-white"
                           href="{{ route('tags.trash')}}">
                            <span>@lang('admin.trash')</span>
                            <i class="fa-regular fa-trash-can" style="margin-right: 5px"></i>
                            <span class="badge badge-danger"> {{ $count_trash }}</span>
                        </a>
                    </div>
                </div>
                <div class="row  ">
                    <div class="col-md-12 mt-4">
                        {{--                        @if($readyToLoad)--}}
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead role="rowgroup">
                                <tr role="row" class="title-row">
                                    <th>@lang('admin.tags.row')</th>
                                    <th>@lang('admin.tags.id')</th>
                                    <th>@lang('admin.tags.name')</th>
                                    <th>@lang('admin.tags.link')</th>
                                    <th>@lang('admin.tags.status')</th>
                                    <th>@lang('admin.tags.operation')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($tags as $t)
                                    <tr role="row">
                                        <td>{{ ($tags->currentPage()-1) * $tags->perPage() + $loop->index + 1 }}</td>
                                        <td><a href="">{{ 1000+$t->id }}</a></td>

                                        <td>{{ $t->name }}</td>
                                        <td>{{ $t->link }}</td>
                                        <td>
                                            @if($t->status == 1 )
                                                <button type="submit" wire:click="disableTagStatus({{$t->id}})"
                                                        class="badge badge-success bg-success">{{ __('admin.warranties.statusActive') }}
                                                </button>
                                            @else
                                                <button wire:click="enableTagStatus({{$t->id}})" type="submit"
                                                        class="badge badge-danger bg-danger"> {{ __('admin.warranties.statusDeActive') }}
                                                </button>
                                            @endif
                                        </td>

                                        <td>
                                            @if($t->status == 0 )
                                                <a type="submit" wire:click="deleteTag({{ $t->id }})"
                                                   class=" ml-2 text-danger"
                                                   title="حذف">
                                                    <i class="fa fa-remove"></i>
                                                </a>

                                                <a type="button" href="{{ route('tags.update-form',$t) }}"
                                                   class=" text-success "
                                                   title="ویرایش">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                <span class="badge badge-dark">@lang('admin.tags.statusActivated') </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>

                            <div class="pagination">
                                {{ $tags->links() }}
                            </div>
                        </div>
                        {{--                        @else--}}
                        {{--                            <div class="col-md-12 text-center">--}}
                        {{--                                <span>@lang('admin.brands.on-uploading')</span>--}}
                        {{--                                <img src="{{ asset('image/loader-2.gif') }}" style="width: 100px" alt="">--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}


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



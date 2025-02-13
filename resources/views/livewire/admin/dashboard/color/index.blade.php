@section('title' , __('admin.colors.colors'))
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-header  sahba-card-header">
                <h5 class="card-title text-white">@lang('admin.colors.create')</h5>

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
                        <form wire:submit.prevent="colorForm" class="padding-30">
                            @include('errors.errors')
                            <div class="form-group">
                                <input type="text" wire:model.lazy="color.name"
                                       placeholder="{{ __('admin.colors.title') }}"
                                       name="name" class="text form-control">
                            </div>
                            <div class="form-group">
                                <input wire:model.defer="color.color_palette" data-jscolor="{preset:'large', position:'right'}"
                                       placeholder="{{ __('admin.colors.name') }}"
                                       name="color_palette" class="text form-control">
                            </div>
                            <div class="form-group mt-5 text-center">
                                <button class="btn  btn-outline-dark ">@lang('admin.brands.add-brand')</button>
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
                <h5 class="card-title text-white">@lang('admin.colors.colors')</h5>

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
                                           placeholder="{{__('admin.colors.search-colors')}}"
                                           class="text form-control">
                                </div>
                            </form>
                        </a>
                    </div>
                    <div class="col-md-7 text-left">
{{--                        <a class="btn btn-danger trash-link text-white"--}}
{{--                           href="{{ route('colors.trash')}}">--}}
{{--                            <span>@lang('admin.trash')</span>--}}
{{--                            <i class="fa-regular fa-trash-can" style="margin-right: 5px"></i>--}}
{{--                            <span class="badge badge-danger"> {{ $count_trash }}</span>--}}
{{--                        </a>--}}
                    </div>
                </div>
                <div class="row  ">
                    <div class="col-md-12 mt-4">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead role="rowgroup">
                                <tr role="row" class="title-row">
                                    <th>@lang('admin.colors.row')</th>
                                    <th>@lang('admin.colors.id')</th>
                                    <th>@lang('admin.colors.name')</th>
{{--                                    <th>@lang('admin.colors.status')</th>--}}
                                    <th>@lang('admin.colors.operation')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $c)
                                    <tr role="row">
                                        <td>{{ ($colors->currentPage()-1) * $colors->perPage() + $loop->index + 1 }}</td>
                                        <td>{{ 1000 + $c->id }}</td>
                                        <td  style="background-color: {{ $c->color_palette }}"><a href="">{{ $c->name }}</a></td>
{{--                                        <td>--}}
{{--                                            @if($c->status == 1 )--}}
{{--                                                <button type="submit" wire:click="disableColorStatus({{$c->id}})"--}}
{{--                                                        class="badge badge-success bg-success">{{ __('admin.colors.statusActive') }}--}}
{{--                                                </button>--}}
{{--                                            @else--}}
{{--                                                <button wire:click="enableColorStatus({{$c->id}})" type="submit"--}}
{{--                                                        class="badge badge-danger bg-danger"> {{ __('admin.colors.statusDeActive') }}--}}
{{--                                                </button>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}

                                        <td>
                                                <a type="submit" wire:click="deleteColor({{ $c->id }})"
                                                   class=" ml-2 text-danger"
                                                   title="حذف">
                                                    <i class="fa fa-remove"></i>
                                                </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $colors->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Here we can adjust defaults for all color pickers on page:
        jscolor.presets.default = {
            palette: [
                '#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26', '#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
                '#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d', '#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
            ],
            //paletteCols: 12,
            //hideOnPaletteClick: true,
            //width: 271,
            //height: 151,
            //position: 'right',
            //previewPosition: 'right',
            //backgroundColor: 'rgba(51,51,51,1)', controlBorderColor: 'rgba(153,153,153,1)', buttonColor: 'rgba(240,240,240,1)',
        }
    </script>

</div>



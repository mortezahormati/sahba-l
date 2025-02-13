@section('title' , __('admin.ai-log-reports.ai-log-reports'))
@section('css')
    <style>
        tbody, td, tfoot, th, thead, tr {
            vertical-align: middle !important;
        }
    </style>
@endsection

<div class="row " wire:init='loadAi'>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header sahba-card-header">
                <h5 class="card-title text-white">@lang('admin.ai-log-reports.ai-log-reports')</h5>

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
                    <div class="col-md-7 text-left">
                        <a class=" btn  btn-danger trash-link text-white mt-2" wire:click="deleteAllAi()">
                            <span>@lang('admin.ai-log-reports.delete_count')</span>
                            <i class=" fa-solid fa-box-archive"></i>
{{--                            <i class="fa-solid fa-boxes-packing"></i>--}}
                            <span class="badge badge-danger"> {{ $aiLogReportsCount }}</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        @if($readyToLoad)

                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead role="rowgroup">
                                    <tr role="row" class="title-row">
                                        <th>@lang('admin.ai-log-reports.row')</th>
                                        <th>@lang('admin.ai-log-reports.id')</th>
                                        <th>@lang('admin.ai-log-reports.username')</th>
                                        <th>@lang('admin.ai-log-reports.section')</th>
                                        <th>@lang('admin.ai-log-reports.action')</th>
                                        <th>@lang('admin.ai-log-reports.created_at')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($aiLogReports as $a)
                                        <tr role="row">
                                            <td>{{ ($aiLogReports->currentPage()-1) * $aiLogReports->perPage() + $loop->index + 1 }}</td>
                                            <td>{{ $a->id_number }}</td>
                                            <td>
                                                {{ $a->user->persian_family_name }}
                                            </td>

                                            <td><a href="">{{ $a->section }}</a></td>


                                            <td>
                                                @if($a->action =="created")
                                                    <span class="badge badge-success bg-success">{{ $a->action_name }}</span>
                                                @elseif($a->action =="updated")
                                                    <span class="badge badge-info bg-info">{{ $a->action_name }}</span>
                                                @elseif($a->action =="status-updated")
                                                    <span class="badge badge-info bg-warning">{{ $a->action_name }}</span>
                                                @elseif($a->action =="deleted")
                                                    <span class="badge badge-delete bg-danger">{{ $a->action_name }}</span>
                                                @elseif($a->action =="restored")
                                                    <span class="badge badge-info bg-warning">{{ $a->action_name }}</span>
                                                @elseif($a->action =="forceDeleted")
                                                    <span class="badge badge-info bg-danger">{{ $a->action_name }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ \Morilog\Jalali\Jalalian::fromCarbon($a->created_at) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="pagination">
                                {{ $aiLogReports->links() }}
                            </div>
                        @else
                            <div class="col-md-12 text-center">
                                <span>درحال بارگزاری</span>
                                <img src="{{ asset('image/loader-2.gif') }}" style="width: 100px" alt="">
                            </div>
                        @endif

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
        </div>
    </div>
</div>
{{--<div class="container-livewire">--}}
{{--    <div class="row no-gutters" wire:init='loadAi'>--}}
{{--        <div class="col-1">--}}

{{--        </div>--}}
{{--        <div class="col-10 content-div-bg  scroll scroll1">--}}
{{--            <h4 class="box__title">@lang('admin.ai-log-reports.ai-log-reports')</h4>--}}
{{--            <div class="tab__box">--}}
{{--                <div class="tab__items">--}}
{{--                    <a class="t-header-search">--}}
{{--                        <form action="" onclick="event.preventDefault();">--}}
{{--                            <div class="t-header-searchbox font-size-13">--}}
{{--                                <input type="text" wire:model.debounce.1000="search"--}}
{{--                                       placeholder="{{__('admin.ai-log-reports.search')}}"--}}
{{--                                       class="text">--}}
{{--                                --}}{{-- <input type="text" class="text search-input__box " value=""></input>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </a>--}}
{{--                    <a class="tab__item btn trash-link text-white mt-2" wire:click="deleteAllAi()">--}}
{{--                        <span>@lang('admin.ai-log-reports.delete_count')</span>--}}
{{--                        <i class="fa-solid fa-xmark" style="margin-right: 5px;"></i>--}}
{{--                        <i class="fa-solid fa-boxes-packing"></i>--}}
{{--                        <span class="badge sahba-badge"> {{ $aiLogReportsCount }}</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--          --}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}


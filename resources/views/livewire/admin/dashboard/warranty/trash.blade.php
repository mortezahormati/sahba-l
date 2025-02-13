@section('title' , __('admin.warranties.trash-warranty'))
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
    <div class=" col-md-12 col-md-offset-1">
        <div class="card">
            <div class="card-header sahba-card-header">
                <h5 class="card-title text-white">@lang('admin.warranties.trashed')</h5>

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
                    <div class="col-md-12 text-left">
                        <a class="btn btn-outline-dark ml-2"
                           href="{{ route('warranties.index') }}">
                            <i class="fa fa-arrow-left"></i>
                            @lang('admin.warranties.return')</a>
                    </div>
                </div>
                <div class="row  ">
                    <div class="col-md-12 mt-4">
                            <div class="table-responsive table-striped text-center">
                                <table class="table table-striped text-center">
                                    <thead role="rowgroup">
                                    <tr role="row" class="title-row">
                                        <th>@lang('admin.categories.row')</th>
                                        <th>@lang('admin.categories.id')</th>
                                        <th>@lang('admin.categories.name')</th>
                                        <th>@lang('admin.categories.operation')</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($warranties as $w)
                                        <tr role="row">
                                            <td>{{ ($warranties->currentPage()-1) * $warranties->perPage() + $loop->index + 1 }}</td>
                                            <td><a href="">{{ 1000+$w->id }}</a></td>
                                            <td>
                                                {{ $w->name }}
                                            </td>
                                            <td>
                                                <a type="submit" wire:click="forceDeleteWarranty({{ $w->id }})"
                                                   class="text-danger"
                                                   title="پاک کردن برای همیشه"
                                                   style="margin-left:3%"
                                                   title="حذف">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                                <a type="submit"
                                                   title="بازیابی"
                                                   class="text-success"
                                                   style="margin-right:3%"
                                                   wire:click="restoreWarranty({{ $w->id }})">
                                                    <i class="fa-solid fa-arrow-rotate-left"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="pagination">
                                {{ $warranties->links() }}
                            </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>


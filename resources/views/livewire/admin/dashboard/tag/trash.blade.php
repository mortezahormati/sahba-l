@section('title' , __('admin.tags.trash-tag'))
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
                <h5 class="card-title text-white">@lang('admin.tags.trashed')</h5>

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
                           href="{{ route('tags.index') }}">
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
                                        <th>@lang('admin.tags.row')</th>
                                        <th>@lang('admin.tags.id')</th>
                                        <th>@lang('admin.tags.name')</th>
                                        <th>@lang('admin.tags.link')</th>
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
                                                <a type="submit" wire:click="forceDeleteTag({{ $t->id }})"
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
                                                   wire:click="restoreTag({{ $t->id }})">
                                                    <i class="fa-solid fa-arrow-rotate-left"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="pagination">
                                {{ $tags->links() }}
                            </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>


@section('title' , __('admin.categories.subCategories.trash-sub-categories'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">
    <style>
        tbody, td, tfoot, th, thead, tr {
            vertical-align: middle !important;
        }
    </style>
@endsection
<div>
    <div class="row">
        <div class=" col-md-12 col-md-offset-1">
            <div class="card">
                <div class="card-header sahba-card-header">
                    <h5 class="card-title text-white">@lang('admin.categories.trashed')</h5>
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
                            <a class="btn btn-outline-dark ml-2 "
                               href="{{ route('categories.trash')}}">@lang('admin.categories.trash-categories')</a>
                            <a class="btn btn-outline-dark ml-2 active"
                               href="{{ route('sub-categories.trash') }}">@lang('admin.categories.subCategories.trash-sub-categories')</a>
                            <a class="btn btn-outline-dark ml-2"
                               href="{{ route('child-sub-categories.trash') }}">@lang('admin.categories.subCategories.childSubCategories.trash-child-sub-categories')</a>
                        </div>
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-2 text-left">

                        </div>
                    </div>
                    <div class="row  ">
                        <div class="col-md-12 mt-4">
                                <div class="table-responsive">
                                    <table class="table table-striped text-center ">
                                        <thead role="rowgroup">
                                        <tr role="row" class="title-row">
                                            <th>@lang('admin.categories.subCategories.row')</th>
                                            <th>@lang('admin.categories.subCategories.id')</th>
                                            <th>@lang('admin.categories.subCategories.title')</th>
                                            <th>@lang('admin.categories.subCategories.img')</th>
                                            <th>@lang('admin.categories.subCategories.operation')</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($subCategories as $c)
                                            <tr role="row">
                                                <td>{{ ($subCategories->currentPage()-1) * $subCategories->perPage() + $loop->index + 1 }}</td>
                                                <td><a href="">{{ 1000+$c->id }}</a></td>
                                                <td>
                                                    {{ $c->title }}
                                                </td>
                                                <td>
                                                    @isset($c->img)
                                                        <img class="thumbnail-img-category" src="{{ asset('storage/'.$c->img) }}"
                                                             style="height: 70px;" alt="">
                                                    @endisset
                                                </td>
                                                <td>
                                                    <a type="submit" wire:click="forceDeleteSubCategory({{ $c->id }})"
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
                                                       wire:click="restoreSubCategory({{ $c->id }})">
                                                        <i class="fa-solid fa-arrow-rotate-left"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <div class="pagination">
                                    {{ $subCategories->links() }}
                                </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>
</div>

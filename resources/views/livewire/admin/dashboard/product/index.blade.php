@section('title' , __('admin.products.products'))
@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">
    <style>
        .dropzone{
            height: 75px !important;
        }
    </style>
@endsection
<div class="row">
    <div class="col-md-12">
        @include('alerts.admin.alert')
        <div class="card">
            <div class="card-header sahba-card-header">
                <h5 class="card-title text-white">@lang('admin.products.create')</h5>
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
                                <div class="t-header-searchbox font-size-13">
                                    <input type="text" wire:model.debounce.1000="search"
                                           placeholder="{{__('admin.products.search-product')}}"
                                           class="text form-control">
                                </div>
                            </form>
                        </a>
                    </div>
                    <div class="col-md-7 text-left">
                        <a class="btn btn-success text-white"
                           href="{{ route('products.create')}}">
                            <span>@lang('admin.products.create')</span>
                        </a>
                        <a class="btn btn-danger trash-link text-white"
                           href="{{ route('products.trash')}}">
                            <span>@lang('admin.trash')</span>
                            <i class="fa-regular fa-trash-can" style="margin-right: 5px"></i>
                            <span class="badge sahba-badge"> {{ $count_trash }}</span>
                        </a>
                    </div>
                </div>
                <div class="row  ">
                    <div class="col-md-12 mt-4">
                            <div class="table-responsive table-striped text-center">
                                <table class="table table-striped text-center">
                                    <thead role="rowgroup">
                                    <tr role="row" class="title-row">
                                        <th>@lang('admin.products.row')</th>
                                        <th>@lang('admin.products.id')</th>
                                        <th>@lang('admin.products.img')</th>
                                        <th>@lang('admin.products.name')</th>
                                        <th>@lang('admin.products.vendor')</th>
                                        <th>@lang('admin.products.categories')</th>
                                        <th>@lang('admin.products.brand')</th>
                                        <th>@lang('admin.products.status')</th>
                                        <th>@lang('admin.products.price')</th>
                                        <th>@lang('admin.categories.operation')</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($products as $p)
                                        <tr role="row">
                                            <td>{{ ($products->currentPage()-1) * $products->perPage() + $loop->index + 1 }}</td>
                                            <td><a href="">{{ 1000+$p->id }}</a></td>
                                            <td>
                                                @isset($p->img)
                                                    <img class="thumbnail-img-category"
                                                         src="{{ url('Products/'.$p->img) }}"
                                                         style="height: 70px;" alt="">
                                                @endisset
                                            </td>
                                            <td>
                                                {{ $p->name }}
                                            </td>
                                            <td>{{ $p->vendor_persian_name }}</td>
                                            <td>
                                                {{ $p->child_sub_category ? $p->child_sub_category->name : ' - ' }}
                                            </td>
                                            <td>
                                                @if($p->brands)
                                                    @foreach($p->brands as $b)
                                                        {{ ' - ' }}
                                                        {{ $b->name  }}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if($p->status == 1)
                                                    <button type="submit" wire:click="disableProductStatus({{$p->id}})"
                                                            class="badge badge-success bg-success">{{ __('admin.categories.statusActive') }}
                                                    </button>
                                                @else
                                                    <button wire:click="enableProductStatus({{$p->id}})" type="submit"
                                                            class="badge badge-danger bg-danger"> {{ __('admin.categories.statusDeActive') }}
                                                    </button>
                                                @endif
                                            </td>

                                            <td>98000</td>

                                            <td>
                                                @if($p->status == 0)
                                                <a type="submit" wire:click="deleteProduct({{ $p->id }})"
                                                   class="mr-2"
                                                   title="حذف">
                                                    <i class="fa fa-remove text-danger"></i>
                                                </a>
                                                <a type="submit" href="{{ route('products.updateForm' , $p) }}"
                                                   class="mr-2"
                                                   title="گالری محصول">
                                                    <i class="fa-solid fa-edit text-info"></i>
                                                </a>
                                                    <a type="submit" href="{{ route('products.attribute.create.form' , $p) }}"
                                                       class="mr-2"
                                                       title="گالری محصول">
                                                        <i class="fa-solid fa-sliders text-primary"></i>
                                                    </a>
                                                <a type="submit" href="{{ route('product.single.gallery.index' , $p) }}"
                                                   class="mr-2"
                                                   title="گالری محصول">
                                                    <i class="fa-solid fa-photo-film text-warning"></i>
                                                </a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="pagination">
                                    {{ $products->links() }}
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>

        </div>
    </div>
</div>



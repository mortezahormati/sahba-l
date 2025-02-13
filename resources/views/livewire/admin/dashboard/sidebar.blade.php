<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 823px;">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link"
           style="background-color: #06283D !important;min-height: 11%;text-align: center !important;">
            <img src="{{ asset('image/main-log-3.png') }}" alt="AdminLTE Logo"
                 class="sahba-brand-image img-circle elevation-3" style="opacity: .8"><br>
            {{--        <p class="sahba-company-name"> شرکت صهبا</p>--}}
            <span class="brand-text font-weight-light text-white" style="font-size: 12px;">شرکت صهبا</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr; background-color:#06283D !important;">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">

                    <div class="image" style="margin-right: 0.5 !important;">
                        <img
                            src="{{ isset(auth()->user()->profile_img) ? url('Users/'.auth()->user()->profile_img) : asset('img/avatar3.png') }}"
                            class="img-circle elevation-2" alt="User Image">
                        <br>


                    </div>
                    <div class="info mt-2 text-white mr-2">
                        {{ isset(auth()->user()->persian_family_name) ? auth()->user()->persian_family_name : '' }}
                    </div>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        @role('super-admin')
                        <li class="nav-item">
                            <a href="{{route('home') }}"
                               class="nav-link  {{ request()->routeIs('home') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-th"></i>
                                <p>@lang('admin.side-bar.dashboard')</p>
                            </a>
                        </li>
                        @endrole

                        <li class="nav-item has-treeview ">

                            <a href="#" class="nav-link
                         @if(
                            (request()->routeIs('categories.index')) or
                            (request()->routeIs('sub-categories.index')) or
                            (request()->routeIs('child-sub-categories.index')) or
                            (request()->routeIs('categories.trash')) or
                            (request()->routeIs('sub-categories.trash')) or
                            (request()->routeIs('child-sub-categories.trash'))
                            )
                           {{ "active" }}
                         @endif
                         "
                            >
                                <i class="nav-icon fa-solid fa-paste"></i>
                                <p>
                                    @lang('admin.categories.categories')
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">

                                    <a href="{{ route('categories.index') }}"
                                       class="nav-link {{ request()->routeIs('categories.index') ? 'active' : ''}}">
                                        <i class="nav-icon fa-solid fa-paste"></i>
                                        <p>@lang('admin.side-bar.categories')</p>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sub-categories.index') }}"
                                       class="nav-link {{ request()->routeIs('sub-categories.index') ? 'active' : ''}}">
                                        <i class="nav-icon fa-solid fa-object-group"></i>
                                        <p>@lang('admin.side-bar.sub-categories')</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('child-sub-categories.index') }}"
                                       class="nav-link {{ request()->routeIs('child-sub-categories.index') ? 'active' : ''}}">
                                        <i class="nav-icon fa-solid fa-object-ungroup"></i>
                                        <p>@lang('admin.side-bar.child-sub-categories')</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.trash') }}" class="nav-link
                                         @if( (request()->routeIs('categories.trash')) or
                                        (request()->routeIs('sub-categories.trash')) or
                                         (request()->routeIs('child-sub-categories.trash')))
                                            {{ 'active' }}
                                         @endif
                                 ">
                                        <i class="nav-icon fa-solid fa-dumpster-fire"></i>
                                        <p>@lang('admin.categories.trashed')</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link
                         @if(
                            (request()->routeIs('products.index')) or
                            (request()->routeIs('products.create')) or
                            (request()->routeIs('brands.index')) or
                            (request()->routeIs('warranties.index')) or
                            (request()->routeIs('products.gallery.index')) or
                              (request()->routeIs('colors.index')) or
                              (request()->routeIs('tags.index')) or
                              (request()->routeIs('coupon.index')) or
                              (request()->routeIs('gift.index'))
                             )
                           {{ "active" }}
                         @endif
                        ">
                                <i class="nav-icon fa-solid fa-barcode"></i>
                                <p>
                                    @lang('admin.products.products')
                                    <i class=" right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
{{--                                @can('show-product')--}}
                                    <li class="nav-item">
                                        <a href="{{ route('products.index') }}"
                                           class="nav-link {{ request()->routeIs('products.index') ? 'active' : ''}}">
                                            <i class="nav-icon fa-solid fa-box-open"></i>
                                            <p>  @lang('admin.products.products')</p>
                                        </a>
                                    </li>
{{--                                @endcan--}}
{{--                                @can('show-add-product')--}}
                                    <li class="nav-item">
                                        <a href="{{ route('products.create') }}"
                                           class="nav-link {{ request()->routeIs('products.create') ? 'active' : ''}} ">
                                            <i class="fa-solid nav-icon fa-solid fa-cart-plus"></i>
                                            <p>@lang('admin.products.add-product')</p>
                                        </a>
                                    </li>
{{--                                @endcan--}}
{{--                                @can('show-product-gallery')--}}
                                    <li class="nav-item">
                                        <a href="{{ route('products.gallery.index') }}"
                                           class="nav-link {{ request()->routeIs('products.gallery.index') ? 'active' : ''}} ">
                                            {{--                                    <i class="fa-solid nav-icon fa-solid fa-cart-plus"></i>--}}
                                            <i class="fa-solid nav-icon fa-photo-film"></i>
                                            <p>@lang('admin.products.gallery.gallery')</p>
                                        </a>
                                    </li>
{{--                                @endcan--}}
{{--                                @can('show-brand-product')--}}
                                    <li class="nav-item">
                                        <a href="{{route('brands.index') }}"
                                           class="nav-link  {{ request()->routeIs('brands.index') ? 'active' : ''}}">
                                            <i class="nav-icon fa-solid fa-boxes-stacked"></i>
                                            <p>@lang('admin.side-bar.brands')</p>
                                        </a>
                                    </li>
{{--                                @endcan--}}
{{--                                @can('show-brand-product')--}}
                                    <li class="nav-item">
                                        <a href="{{route('warranties.index') }}"
                                           class="nav-link  {{ request()->routeIs('warranties.index') ? 'active' : ''}}">
                                            <i class="nav-icon fa-solid fa-truck-fast"></i>
                                            <p>@lang('admin.side-bar.warranty')</p>
                                        </a>
                                    </li>
{{--                                @endcan--}}
{{--                                @can('show-colors-product')--}}
                                    <li class="nav-item">
                                        <a href="{{route('colors.index') }}"
                                           class="nav-link  {{ request()->routeIs('colors.index') ? 'active' : ''}}">
                                            <i class="nav-icon fa-solid fa-palette"></i>
                                            <p>@lang('admin.side-bar.colors')</p>
                                        </a>
                                    </li>
{{--                                @endcan--}}


                                    <li class="nav-item">
                                        <a href="{{route('tags.index') }}"
                                           class="nav-link  {{ request()->routeIs('tags.index') ? 'active' : ''}}">
                                            <i class="nav-icon fa-solid fa-tags"></i>
                                            <p>@lang('admin.side-bar.tags')</p>
                                        </a>
                                    </li>


{{--                                @can('show-coupon')--}}
                                    <li class="nav-item">
                                        <a href="{{route('coupon.index') }}"
                                           class="nav-link  {{ request()->routeIs('coupon.index') ? 'active' : ''}}">
                                            <i class="nav-icon fa-solid fa-money-bill"></i>
                                            <p>@lang('admin.side-bar.coupon')</p>
                                        </a>
                                    </li>
{{--                                @endcan--}}
{{--                                @can('show-gift')--}}
                                    <li class="nav-item">
                                        <a href="{{route('gift.index') }}"
                                           class="nav-link  {{ request()->routeIs('gift.index') ? 'active' : ''}}">
                                            <i class="nav-icon fa-solid fa-gifts"></i>
                                            <p>@lang('admin.side-bar.gift')</p>
                                        </a>
                                    </li>
{{--                                @endcan--}}
                            </ul>
                        </li>
                        {{--                    @can('')--}}
                        <li class="nav-item">
                            <a href="{{route('ai-log-report.index') }}"
                               class="nav-link  {{ request()->routeIs('ai-log-report.index') ? 'active' : ''}}">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>@lang('admin.side-bar.ai-report')</p>
                            </a>
                        </li>
                        {{--                    @endcan--}}
                        {{--                    @can('')--}}
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link
                         @if((request()->routeIs('users.index')) or
                              (request()->routeIs('user-profile.index')))
                           {{ "active" }}
                         @endif
                        ">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p>
                                    @lang('admin.side-bar.users')
                                    <i class=" right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                       class="nav-link {{ request()->routeIs('users.index') ? 'active' : ''}}">
                                        <i class="nav-icon fa-solid fa-users"></i>
                                        <p> @lang('admin.side-bar.users')</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('user-profile.index') }}"
                                       class="nav-link  {{ request()->routeIs('user-profile.index') ? 'active' : ''}}">
                                        <i class="nav-icon fa-solid fa-user-pen"></i>
                                        <p>@lang('admin.side-bar.user-profile')</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        {{--                    @endcan--}}
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link
                         @if((request()->routeIs('roles.index')) or
                              (request()->routeIs('permissions.index')))
                           {{ "active" }}
                         @endif
                        ">
                                <i class="nav-icon fa-solid fa-shield-halved"></i>
                                <p>
                                    @lang('admin.side-bar.rolesAndPermissions')
                                    <i class=" right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('roles.index')}}"
                                       {{ request()->routeIs('roles.index') ? 'active' : ''}} class="nav-link ">
                                        <i class="nav-icon fa-solid fa-users"></i>
                                        <p> @lang('admin.side-bar.roles')</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}"
                                       {{ request()->routeIs('permissions.index') ? 'active' : ''}} class="nav-link ">
                                        <i class="nav-icon fa-solid fa-magnifying-glass"></i>
                                        <p>@lang('admin.side-bar.permissions')</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=""
                                       {{ request()->routeIs('permissions.index') ? 'active' : ''}} class="nav-link ">
                                        <i class="nav-icon fa-solid fa-passport"></i>
                                        <p>@lang('admin.side-bar.PermissionFromRoles')</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>
</div>

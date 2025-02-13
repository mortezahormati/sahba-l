<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildSubCategory;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Warranty;
use App\Observers\BrandObserver;
use App\Observers\CategoryObserver;
use App\Observers\ChildSubCategoryObserver;
use App\Observers\ColorObserver;
use App\Observers\GalleryObserver;
use App\Observers\PermissionObserver;
use App\Observers\ProductObserver;
use App\Observers\RoleObserver;
use App\Observers\SubCategoryObserver;
use App\Observers\UserObserver;
use App\Observers\WarrantyObserevr;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        SubCategory::observe(SubCategoryObserver::class);
        ChildSubCategory::observe(ChildSubCategoryObserver::class);
        Brand::observe(BrandObserver::class);
        Warranty::observe(WarrantyObserevr::class);
        Product::observe(ProductObserver::class);
        Role::observe(RoleObserver::class);
        Permission::observe(PermissionObserver::class);
        User::observe(UserObserver::class);
        Gallery::observe(GalleryObserver::class);
        Color::observe(ColorObserver::class);
    }
}

<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Livewire\Admin\Dashboard\Categories\ChildSubCategory\Index;
use App\Http\Livewire\Admin\Dashboard\Categories\ChildSubCategory\Update;
use App\Jobs\EmailSend;
use App\Mail\VerifyEmailSend;
use http\Client\Curl\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//<--------------login ------------->
Route::get('/logout',  [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');
//<--------------categories ------------->
Route::get('/categories',\App\Http\Livewire\Admin\Dashboard\categories\Index::class)->name('categories.index');
Route::get('/sub-categories',App\Http\Livewire\Admin\Dashboard\Categories\SubCategory\Index::class)->name('sub-categories.index');
Route::get('/child-sub-categories' , Index::class)->name('child-sub-categories.index');

//<--------------categories Update------------->
Route::get('/categories/update/{category}',\App\Http\Livewire\Admin\Dashboard\categories\UpdateCategory::class)->name('categories.update-form');
Route::get('/sub-categories/update/{subCategory}',App\Http\Livewire\Admin\Dashboard\Categories\SubCategory\UpdateSubCategory::class)->name('subCategories.update-form');
Route::get('/child-sub-categories/update/{childSubCategory}',Update::class)->name('child-sub-categories.update-form');

//<--------------categories trashed ------------->
Route::get('/categories/trash',\App\Http\Livewire\Admin\Dashboard\categories\Trashed::class)->name('categories.trash');
Route::get('/sub-categories/trash',\App\Http\Livewire\Admin\Dashboard\Categories\SubCategory\Trash::class)->name('sub-categories.trash');
Route::get('/child-sub-categories/trash',\App\Http\Livewire\Admin\Dashboard\Categories\ChildSubCategory\Trash::class)->name('child-sub-categories.trash');

//<-------------- brands ------------->
Route::get('/brands' ,\App\Http\Livewire\Admin\Dashboard\Brand\Index::class)->name('brands.index');
Route::get('/brands/trash' ,\App\Http\Livewire\Admin\Dashboard\Brand\Trash::class)->name('brands.trash');
Route::get('/brands/update/{brand}' ,\App\Http\Livewire\Admin\Dashboard\Brand\Update::class)->name('brands.update-form');

//<-------------- warranties ------------->
Route::get('/warranties' ,\App\Http\Livewire\Admin\Dashboard\Warranty\Index::class)->name('warranties.index');
Route::get('/warranties/trash' ,\App\Http\Livewire\Admin\Dashboard\Warranty\Trash::class)->name('warranties.trash');
Route::get('/warranties/update/{warranty}' ,\App\Http\Livewire\Admin\Dashboard\Warranty\Update::class)->name('warranties.update-form');

//<-------------- colors ------------->
Route::get('/colors' ,\App\Http\Livewire\Admin\Dashboard\Color\Index::class)->name('colors.index');
Route::get('/colors/trash' ,\App\Http\Livewire\Admin\Dashboard\Color\Trash::class)->name('colors.trash');
Route::get('/colors/update/{color}' ,\App\Http\Livewire\Admin\Dashboard\Color\Update::class)->name('colors.update-form');
//Route::get('/colors' , [\App\Http\Controllers\Admin\Dashboard\Product\ColorsController::class , 'index'])->name('colors.index');
//Route::post('/colors' , [\App\Http\Controllers\Admin\Dashboard\Product\ColorsController::class , 'create'])->name('colors.create');
//Route::post('/colors/change-status' , [\App\Http\Controllers\Admin\Dashboard\Product\ColorsController::class , 'changeStatus'])->name('colors.status');
//Route::delete('colors/{color}/delete', [\App\Http\Controllers\Admin\Dashboard\Product\ColorsController::class , 'destroy'])->name('colors.destroy');
//Route::get('colors/{id}/edit-modal', [\App\Http\Controllers\Admin\Dashboard\Product\ColorsController::class , 'updateForm'])->name('colors.updateForm');
//Route::post('colors/{id}/update', [\App\Http\Controllers\Admin\Dashboard\Product\ColorsController::class , 'update'])->name('colors.update');

//<-------------- tags  ------------->
Route::get('/tags' ,\App\Http\Livewire\Admin\Dashboard\Tag\Index::class)->name('tags.index');
Route::get('/tags/trash' ,\App\Http\Livewire\Admin\Dashboard\Tag\Trash::class)->name('tags.trash');
Route::get('/tags/update/{tag}' ,\App\Http\Livewire\Admin\Dashboard\Tag\Update::class)->name('tags.update-form');




//<-------------- gift cart ------------->

//Route::get('/gift' ,\App\Http\Livewire\Admin\Dashboard\Product\GiftCart\Index::class)->name('gift.index');
//Route::get('/gift/trash' ,\App\Http\Livewire\Admin\Dashboard\Product\Gift\Trash::class)->name('gift.trash');
//Route::get('/gift/update/{gift}' ,\App\Http\Livewire\Admin\Dashboard\Product\GiftCart\Index::class)->name('gift.update-form');


Route::get('/gift-cart' , [\App\Http\Controllers\Admin\Dashboard\Product\GiftController::class , 'index'])->name('gift.index');
Route::post('/gift-cart' , [\App\Http\Controllers\Admin\Dashboard\Product\GiftController::class , 'create'])->name('gift.create');
Route::post('/gift-cart/change-status' , [\App\Http\Controllers\Admin\Dashboard\Product\GiftController::class , 'changeStatus'])->name('gift.status');
Route::delete('/gift-cart/{gift}/delete', [\App\Http\Controllers\Admin\Dashboard\Product\GiftController::class , 'destroy'])->name('gift.destroy');
Route::get('/gift-cart/{id}/edit-modal', [\App\Http\Controllers\Admin\Dashboard\Product\GiftController::class , 'updateForm'])->name('gift.updateForm');
Route::post('/gift-cart/{id}/update', [\App\Http\Controllers\Admin\Dashboard\Product\GiftController::class , 'update'])->name('gift.update');
Route::get('/gift-cart/{gift}/active', [\App\Http\Controllers\Admin\Dashboard\Product\GiftController::class , 'activeGift'])->name('gift.active');
//<-------------- coupon cart ------------->

//Route::get('/coupon' ,\App\Http\Livewire\Admin\Dashboard\Product\Coupon\Index::class)->name('coupon.index');
//Route::get('/coupon/trash' ,\App\Http\Livewire\Admin\Dashboard\Product\Coupon\Trash::class)->name('coupon.trash');
//Route::get('/coupon/update/{coupon}' ,\App\Http\Livewire\Admin\Dashboard\Product\Coupon\Update::class)->name('coupon.update');

Route::get('/coupon' , [\App\Http\Controllers\Admin\Dashboard\Product\CouponController::class , 'index'])->name('coupon.index');
Route::post('/coupon' , [\App\Http\Controllers\Admin\Dashboard\Product\CouponController::class , 'create'])->name('coupon.create');
Route::post('/coupon/change-status' , [\App\Http\Controllers\Admin\Dashboard\Product\CouponController::class , 'changeStatus'])->name('coupon.status');
Route::delete('/coupon/{coupon}/delete', [\App\Http\Controllers\Admin\Dashboard\Product\CouponController::class , 'destroy'])->name('coupon.destroy');
Route::get('/coupon/{id}/edit-modal', [\App\Http\Controllers\Admin\Dashboard\Product\CouponController::class , 'updateForm'])->name('coupon.updateForm');
Route::post('/coupon/{id}/update', [\App\Http\Controllers\Admin\Dashboard\Product\CouponController::class , 'update'])->name('coupon.update');


//<--------------gallery------------->
//Route::get('/gallery/update/{color}' ,\App\Http\Livewire\Admin\Dashboard\Color\Update::class)->name('colors.update-form');

//<--------------ai-log-report------------->
Route::get('/ai-log-report',\App\Http\Livewire\Admin\Dashboard\Log\Index::class)->name('ai-log-report.index');


//<--------------products------------->
Route::get('/products' , \App\Http\Livewire\Admin\Dashboard\Product\Index::class)->name('products.index');
//Route::get('/products/create' , \App\Http\Livewire\Admin\Dashboard\Product\Create::class)->name('products.create');
Route::get('/products/create' ,[\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'createProductForm'])->name('products.create');
Route::get('/product/{product}/update', [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'updateForm'])->name('products.updateForm');
Route::get('/product/{product}/attributes', [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'addAttributeForm'])->name('products.attribute.create.form');
Route::post('/product/{product}/attributes', [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'addAttribute'])->name('products.attribute.create');

//example get
Route::get('/get/brands',function (){

    return  \App\Models\Brand::all();
})->name('get.brands');




Route::post('/product/{product}/update', [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'update'])->name('products.update');

Route::post('/products/create' ,[\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'createProduct'])->name('products.new');
Route::get('/products/trash' , \App\Http\Livewire\Admin\Dashboard\Product\Trash::class)->name('products.trash');
Route::get('/products/gallery' , \App\Http\Livewire\Admin\Dashboard\Product\Gallery\Index::class)->name('products.gallery.index');
//Route::get('/products/{product}/gallery' , \App\Http\Livewire\Admin\Dashboard\Product\Gallery\SingleProduct::class)->name('product.single.gallery');
Route::get('/products/{product}/gallery' , [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'productUpdateGallery'])->name('product.single.gallery.index');
Route::post('/products/{product}/gallery' , [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'productUpdatingGallery'])->name('product.single.gallery.update');


//Route::get('/get/brands/product' ,  [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'getBrands'])->name('get.brands');
//Route::get('/get/colors/product' ,  [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'getColors'])->name('get.colors');
//Route::get('/get/tags/product' ,  [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'getTags'])->name('get.tags');
Route::get('/get/brands/{product}' ,  [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'getProductBrands'])->name('product.get.brands');
Route::get('/get/colors/{product}' ,  [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'getProductColors'])->name('product.get.colors');
Route::get('/get/tags/{product}' ,  [\App\Http\Controllers\Admin\Dashboard\Product\ProductController::class , 'getProductTags'])->name('product.get.tags');


//<--------------gallery------------->





//<--------------users------------->
//Route::get('/users',\App\Http\Livewire\Admin\Dashboard\Users\Index::class)->name('users');

//<--------------users------------->
Route::get('/users' , \App\Http\Livewire\Admin\Dashboard\Users\Index::class)->name('users.index');

            //sending sms to selected users //
Route::post('/users/send-sms-to-selected-users' ,  [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'sendSmsToSelectedUsersForm'])->name('send-sms-to-selected-users-form');

//user role sync

Route::get('/user-profile/{user}/roles-update' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'editUsersRoles'])->name('edit-user-roles');
Route::post('/user-profile/{user}/roles-update' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'storeUsersRoles'])->name('save-user-roles');


Route::get('/user-profile' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'index'])->name('user-profile.index');
Route::get('/user-profile/{id}/remove-address' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'removeAddress'])->name('user-profile-remove-address');
Route::get('/admin-user-profile/{id}/remove-address' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'adminRemoveAddress'])->name('admin-users-profile-remove-address');

Route::post('/user-profile' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'storeUsersProfile'])->name('store-user-profile');


            // system users profile

Route::get('/user-profile/{user}/update' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'updateUsersProfile'])->name('update-user-profile');
Route::post('/user-profile/{user}/CompanyUpdate' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'CompanyUpdate'])->name('update-user-company-profile');
Route::post('/user-profile/{user}/update' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'updatingUsersProfile'])->name('updating-user-profile');
Route::post('/user-profile/remove' , [\App\Http\Controllers\Admin\Dashboard\User\UserController::class , 'deleteUsersProfile'])->name('remove-user-profile');
Route::get('/user-send-verification-email' , [VerificationController::class, 'send'])->name('user.auth.sendVerificationEmail');
Route::get('/user-email-verify' , [VerificationController::class, 'verify'])->name('user.email.verify');

//<--------------roles------------->
Route::get('/roles' , [\App\Http\Controllers\Admin\Dashboard\RoleController::class , 'index'])->name('roles.index');
Route::post('/roles' , [\App\Http\Controllers\Admin\Dashboard\RoleController::class , 'store'])->name('roles.create');
Route::delete('/roles/{role}/delete', [\App\Http\Controllers\Admin\Dashboard\RoleController::class , 'destroy'])->name('roles.destroy');

//<--------------permissions------------->

Route::get('/permissions' , [\App\Http\Controllers\Admin\Dashboard\PermissionController::class , 'index'])->name('permissions.index');
Route::post('/permissions' , [\App\Http\Controllers\Admin\Dashboard\PermissionController::class , 'store'])->name('permissions.create');
Route::delete('/permissions/{permission}/delete', [\App\Http\Controllers\Admin\Dashboard\RoleController::class , 'destroy'])->name('permissions.destroy');

//<--------------roles and permissions------------->
Route::get('/roles/{role}/add-permission', [\App\Http\Controllers\Admin\Dashboard\RoleController::class , 'addPermission'])->name('add.permission.role');
Route::post('/roles/{role}/add-permission', [\App\Http\Controllers\Admin\Dashboard\RoleController::class , 'savePermission'])->name('save.permission.role');





//Route::get('/test-permission' , function (){
////   auth()->user()->givePermissionsTo(['delete_product','delete_category' , 'delete_sub_child']);
////   auth()->user()->withDrawPermission(['delete_product']);
////  dd( auth()->user()->hasPermission('delete_product'));
//  dd(auth()->user()->can('delete_product'));
//});
//Route::get('/test-roles' , function (){
////   auth()->user()->givePermissionsTo(['delete_product','delete_category' , 'delete_sub_child']);
////   auth()->user()->withDrawPermission(['delete_product']);
////  dd( auth()->user()->hasPermission('delete_product'));
//    dd(auth()->user()->giveRolesTo(['super-admin']));
//});
//Route::get('/check-email' , function (){
//    $user = Auth::user();
//
//   EmailSend::dispatch($user , new VerifyEmailSend());
//
//});
//Route::get('/check-relation' , function (){
//    $subCategory = \App\Models\SubCategory::find(1);
//    dd($subCategory->category , $subCategory);
//});
//Route::get('/check-relation-sub' , function (){
//    $subCategory = \App\Models\SubCategory::find(1);
//    dd($subCategory , $subCategory->child_sub_categories);
//});

//Route::get('/ai-log' , function (){
//    \App\Models\AiLogReport::create([
//        'section' => \App\Models\Category::class ,
//        'action' => 'create' ,
//        'user_id' => \App\Models\User::find(1)->id ,
//    ]);
//});


//Route::get('/home',\App\Http\Livewire\Admin\Dashboard\Index::class)->name('home');




<?php

namespace Database\Seeders;

use App\Models\AiLogReport;
use App\Models\category;
use App\Models\ChildSubCategory;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Permission;
use App\Models\SubCategory;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        Color::factory(20)->create();
//        Gallery::factory(10)->create();
        $permissions = array(
            //brand
            array('name' => 'show-brand-product', 'persian_name' => 'نمایش برند محصولات' , 'section' =>'brand'),
            array('name' => 'add-brand-product', 'persian_name' => 'ایجاد برند محصولات' , 'section' =>'brand'),
            array('name' => 'show-trash-brand-product', 'persian_name' => 'نمایش سطل زباله برند محصولات' , 'section' =>'brand'),
            array('name' => 'status-product-brand', 'persian_name' => 'تغییر در وضعیت برند کالا' , 'section' =>'brand'),
            array('name' => 'delete-brand-product', 'persian_name' => 'حذف برند' , 'section' =>'brand'),
            array('name' => 'edit-brand-product', 'persian_name' => 'ویرایش برند' , 'section' =>'brand'),
            array('name' => 'show-product', 'persian_name' => 'نمایش  محصولات' , 'section' =>'products'),
            array('name' => 'show-add-product', 'persian_name' => 'ایجاد کالا' , 'section' =>'products'),
            array('name' => 'show-trash-product', 'persian_name' => 'نمایش سطل زباله  محصولات' , 'section' =>'products'),
            array('name' => 'status-product', 'persian_name' => 'تغییر در وضعیت  کالا' , 'section' =>'products'),
            array('name' => 'delete-product', 'persian_name' => 'حذف محصول' , 'section' =>'products'),
            array('name' => 'edit-product', 'persian_name' => 'ویرایش محصول' , 'section' =>'products'),
            array('name' => 'show-colors-product', 'persian_name' => 'نمایش رنگ محصولات' , 'section' =>'colors'),
            array('name' => 'add-colors-product', 'persian_name' => 'ایجاد رنگ محصولات' , 'section' =>'colors'),
            array('name' => 'show-trash-colors-product', 'persian_name' => 'نمایش سطل زباله رنگ محصولات' , 'section' =>'colors'),
            array('name' => 'status-product-colors', 'persian_name' => 'تغییر در وضعیت رنگ کالا' , 'section' =>'colors'),
            array('name' => 'delete-colors-product', 'persian_name' => 'حذف رنگ' , 'section' =>'colors'),
            array('name' => 'edit-colors-product', 'persian_name' => 'ویرایش رنگ' , 'section' =>'colors'),


            //tags
            array('name' => 'show-tags-product', 'persian_name' => 'نمایش برچسب محصولات' , 'section' =>'tags'),
            array('name' => 'add-tags-product', 'persian_name' => 'ایجاد برچسب محصولات' , 'section' =>'tags'),
            array('name' => 'show-trash-tags-product', 'persian_name' => 'نمایش سطل زباله برچسب محصولات' , 'section' =>'tags'),
            array('name' => 'status-product-tags', 'persian_name' => 'تغییر در وضعیت برچسب کالا' , 'section' =>'tags'),
            array('name' => 'delete-tags-product', 'persian_name' => 'حذف برچسب' , 'section' =>'tags'),
            array('name' => 'edit-tags-product', 'persian_name' => 'ویرایش برچسب' , 'section' =>'tags'),


            //warranty
            array('name' => 'show-warranty-product', 'persian_name' => 'نمایش ضمانتنامه محصولات' , 'section' =>'warranty'),
            array('name' => 'add-warranty-product', 'persian_name' => 'ایجاد ضمانتنامه محصولات' , 'section' =>'warranty'),
            array('name' => 'show-trash-warranty-product', 'persian_name' => 'نمایش سطل زباله ضمانتنامه محصولات' , 'section' =>'warranty'),
            array('name' => 'status-product-warranty', 'persian_name' => 'تغییر در وضعیت ضمانتنامه کالا' , 'section' =>'warranty'),
            array('name' => 'delete-warranty-product', 'persian_name' => 'حذف ضمانتنامه' , 'section' =>'warranty'),
            array('name' => 'edit-warranty-product', 'persian_name' => 'ویرایش ضمانتنامه' , 'section' =>'warranty'),

            //users
            array('name' => 'show-users', 'persian_name' => 'نمایش کاربران' , 'section' =>'users'),
            array('name' => 'delete-users', 'persian_name' => 'حذف کاربران' , 'section' =>'users'),
            array('name' => 'edit-users', 'persian_name' => 'ویرایش کاربران' , 'section' =>'users'),
            array('name' => 'send-sms-users', 'persian_name' => 'ارسال پیامک' , 'section' =>'users'),

            //category
            array('name' => 'show-category', 'persian_name' => 'نمایش دسته بندی ها' , 'section' =>'category'),
            array('name' => 'add-category', 'persian_name' => 'افزودن دسته بندی ' , 'section' =>'category'),
            array('name' => 'edit-category', 'persian_name' => 'ویرایش دسته بندی ' , 'section' =>'category'),
            array('name' => 'delete-category', 'persian_name' => 'حذف دسته بندی ' , 'section' =>'category'),

            //subcategory
            array('name' => 'show-subcategory', 'persian_name' => 'نمایش زیردسته بندی ها' , 'section' =>'sub_category'),
            array('name' => 'add-subcategory', 'persian_name' => 'افزودن زیردسته بندی ' , 'section' =>'sub_category'),
            array('name' => 'edit-subcategory', 'persian_name' => 'ویرایش زیردسته بندی ' , 'section' =>'sub_category'),
            array('name' => 'delete-subcategory', 'persian_name' => 'حذف زیردسته بندی ' , 'section' =>'sub_category'),

            //child-sub-category
            array('name' => 'show-child-subcategory', 'persian_name' => ' نمایش دسته های فرزند' , 'section' =>'child_sub_category'),
            array('name' => 'add-child-subcategory', 'persian_name' => 'افزودن دسته فرزند ' , 'section' =>'child_sub_category'),
            array('name' => 'edit-child-subcategory', 'persian_name' => 'ویرایش دسته های فرزند ' , 'section' =>'child_sub_category'),
            array('name' => 'delete-child-subcategory', 'persian_name' => 'حذف دسته های فرزند ' , 'section' =>'child_sub_category'),

            //product gallery
            array('name' => 'show-product-gallery', 'persian_name' => 'نمایش گالری محصولات', 'section' => 'product_gallery'),
            array('name' => 'add-product-gallery', 'persian_name' => 'افزودن تصویر جدید', 'section' => 'product_gallery'),
            array('name' => 'delete-product-gallery', 'persian_name' => 'حذف تصویر', 'section' => 'product_gallery'),
            array('name' => 'status-product-gallery', 'persian_name' => 'وضعیت تصویر', 'section' => 'product_gallery'),

            //coupon
            array('name' => 'show-coupon', 'persian_name' => 'نمایش کوپن های تخفیف' , 'section' =>'coupon'),
            array('name' => 'add-coupon', 'persian_name' => 'افزودن کوپن تخفیف ' , 'section' =>'coupon'),
            array('name' => 'edit-coupon', 'persian_name' => 'ویرایش  کوپن تخفیف ' , 'section' =>'coupon'),
            array('name' => 'delete-coupon', 'persian_name' => 'حذف کوپن تخفیف ' , 'section' =>'coupon'),

            //gift
            array('name' => 'show-gift', 'persian_name' => 'نمایش کارت های هدیه' , 'section' =>'gift'),
            array('name' => 'add-gift', 'persian_name' => 'افزودن کارت هدیه' , 'section' =>'gift'),
            array('name' => 'edit-gift', 'persian_name' => 'ویرایش کارت هدیه' , 'section' =>'gift'),
            array('name' => 'delete-gift', 'persian_name' => 'حذف کارت هدیه' , 'section' =>'gift'),

            //user-profile
            array('name' => 'show-user-profile', 'persian_name' => 'نمایش پروفایل کاربری' , 'section' =>'user_profile'),
            array('name' => 'show-profile-address', 'persian_name' => 'مشاهده آدرس' , 'section' =>'user_profile'),
            array('name' => 'show-profile-notification', 'persian_name' => 'مشاهده پیام ها' , 'section' =>'user_profile'),
            array('name' => 'show-profile-gift', 'persian_name' => 'مشاهده کارت های هدیه ' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-fullname', 'persian_name' => 'ویرایش نام و نام خانوادگی' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-national-code', 'persian_name' => 'ویرایش کد ملی' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-phone-number', 'persian_name' => 'ویرایش شماره همراه' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-email', 'persian_name' => 'ویرایش ایمیل' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-birthday', 'persian_name' => 'ویرایش تاریخ تولد' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-password', 'persian_name' => 'ویرایش رمز عبور' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-company-name', 'persian_name' => 'ویرایش نام شرکت' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-job', 'persian_name' => 'ویرایش سمت شغلی ' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-company-phone-number', 'persian_name' => 'ویرایش تلفن ثابت شرکت' , 'section' =>'user_profile'),
            array('name' => 'edit-profile-company-national-code', 'persian_name' => 'ویرایش شماره شناسه شرکت' , 'section' =>'user_profile'),

            //system-log
            array('name' => 'show-system-log', 'persian_name' => 'نمایش  گزارشات هوشمند' , 'section' =>'system_log'),
            array('name' => 'delete-trash-system-log', 'persian_name' => 'حذف گزارشات' , 'section' =>'system_log'),
            //category_trash
            array('name' => 'show-trash-category', 'persian_name' => 'نمایش  زباله دان دسته بندی ها' , 'section' =>'trash_categories'),
            array('name' => 'show-trash-subcategory', 'persian_name' => 'نمایش زباله دان زیر دسته بندی ها' , 'section' =>'trash_categories'),
            array('name' => 'show-trash-childsubcategory', 'persian_name' => 'نمایش زباله دان دسته فرزند' , 'section' =>'trash_categories'),
            array('name' => 'restore-category', 'persian_name' => 'بازیابی دسته' , 'section' =>'trash_categories'),
            array('name' => 'force-delete-category', 'persian_name' => 'حذف کامل دسته' , 'section' =>'trash_categories'),
            array('name' => 'restore-subcategory', 'persian_name' => 'بازیابی زیر دسته' , 'section' =>'trash_categories'),
            array('name' => 'force-delete-subcategory', 'persian_name' => 'حذف کامل زیر دسته' , 'section' =>'trash_categories'),
            array('name' => 'restore-childsubcategory', 'persian_name' => 'بازیابی دسته فرزند' , 'section' =>'trash_categories'),
            array('name' => 'force-delete-childsubcategory', 'persian_name' => 'حذف کامل دسته فرزند' , 'section' =>'trash_categories'),
        );

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'persian_name' => $permission['persian_name'],
                'section' => $permission['section'],
            ]);
        }
//        Category::factory(20)->create();
    }
}

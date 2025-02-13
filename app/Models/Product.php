<?php

namespace App\Models;

use App\Models\Product\Coupon;
use App\Models\Product\Pattribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;


    protected $fillable = [
        'vendor',
        'img',
        'title',
        'name',
        'link',
        'body',
        'description',
        'part_number',
        'technical_specifications',
        'accessories',
        'price',
        'discount_price',
        'without_price',
        'price_from',
        'price_to',
        'number',
        'weight',
        'status',
        'publish',
        'view',
        'shipment',
        'original',
        'order_count',
        'special',
        'warranty_id',
        'child_sub_category_id',
        'sold_count',
        'rate_count',

    ];

    protected $appends =[
        'vendor_persian_name'
    ];

    public function sluggable(): array
    {
        return [
            'link' => [
                'source' => 'title'
            ]
        ];
    }

    public function hasStock(int $quantity)
    {
        return $this->number >= $quantity;
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class , 'warranty_id' , 'id');
    }

    public function child_sub_category()
    {
        return $this->belongsTo(ChildSubCategory::class, 'child_sub_category_id', 'id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_product');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_product');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'coupon_product');
    }
    public function galleries()
    {
        return $this->belongsTo(Gallery::class, 'product_id', 'id');
    }

    public function pattribute()
    {
        return $this->hasOne(Pattribute::class ,'product_id' , 'id' );
    }


    public function getVendorPersianNameAttribute()
    {
        switch ($this->vendor) {
            case 1:
                echo "شرکت صهبا";
                break;
            case 2:
                echo "i equals 1";
                break;
            case 3:
                echo "i equals 2";
                break;
        }
    }



}

<?php

namespace App\Models\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'code' ,
        'name' ,
        'description' ,
        'uses' ,
        'max_uses' ,
        'discount_amount' ,
        'percent_amount' ,
        'type' ,
        'starts_at' ,
        'expires_at' ,
        'status'
    ];

    protected $appends =[
        'type_persian_name' ,
        'persian_started_at' ,
        'persian_expired_at' ,
    ];


    public function getTypePersianNameAttribute()
    {

        switch ($this->type) {
            case 1:
                return 'درصدی';
                break;
            case 2:
                return 'مقداری';
                break;
            default :
                return '-';
        }
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'coupon_product');
    }

    public function getPersianStartedAtAttribute(){

        return Jalalian::fromDateTime($this->starts_at)->format('Y-m-d');
    }

    public function getPersianExpiredAtAttribute(){

        return Jalalian::fromDateTime($this->expires_at)->format('Y-m-d');
    }

}

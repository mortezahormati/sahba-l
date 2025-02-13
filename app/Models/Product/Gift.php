<?php

namespace App\Models\Product;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;

class Gift extends Model
{
    use HasFactory;
    protected $fillable =[
        'name' ,
        'amount' ,
        'uses' ,
        'max_uses' ,
        'user_id',
        'description' ,
        'cart_number' ,
        'starts_at' ,
        'expires_at' ,
        'status',
        'active'
    ];

    protected $appends =[
        'persian_started_at' ,
        'persian_expired_at' ,
        'persian_active_name' ,
    ];


    public function getPersianStartedAtAttribute(){

        return Jalalian::fromDateTime($this->starts_at)->format('Y-m-d');
    }

    public function getPersianActiveNameAttribute()
    {
        switch ($this->active){
            case '0' :
                return 'غیر فعال';
            case '1' :
                return 'فعال';
            default:
                return 'غیر فعال';
        }
    }
    public function getPersianExpiredAtAttribute(){

        return Jalalian::fromDateTime($this->expires_at)->format('Y-m-d');
    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

}

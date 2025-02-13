<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
      'name' , 'color_palette'
    ];

    protected $appends =[
      'status_persian'
    ];

//    public function setStatusAttribute()
//    {
//        if($this->status == 'on'){
//           return  $this->status = 1 ;
//        }
//    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'color_product');
    }
    public function getStatusPersianAttribute()
    {
        return $this->status ==  1  ? 'فعال' :'غیرفعال';
    }


}

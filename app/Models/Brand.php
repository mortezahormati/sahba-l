<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'img', 'link', 'title' , 'status' , 'deleted_at'];

    protected $appends = ['status_persian'];

    public function getStatusPersianAttribute()
    {
        return $this->status == 1 ? 'فعال' : 'غیرفعال';
    }
}

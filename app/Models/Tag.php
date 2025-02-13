<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name' ,
        'link' ,
        'status' ,
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'tag_product');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $table ='user_addresses';
    protected $fillable = [
        'address',
        'postal_code',
        'const_phone_number',
        'delivered_name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
}

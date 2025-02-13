<?php

namespace App\Models\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'cctv_group',
        'cctv_type',
        'cctv_power_source',
        'cctv_outdoor_use',
        'cctv_sensor',
        'cctv_compression',
        'cctv_resolution',
        'lenz',
        'viewing_angle',
        'range_pan_horizontal_movement',
        'rang_tilt_vertical_movement',
        'cctv_ai_programming',
        'cctv_temperature_of_performance',
        'max_frame',
        'range_dynamics',
        'record_day_night',
        'cctv_resolution_ability',
        'night_vision',
        'min_colored_light',
        'optical_magnification',
        'cctv_voice',
        'cctv_memory_card_slot',
        'cctv_resistance_to_vandalism',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
}

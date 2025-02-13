<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

/**
 * App\Models\AiLogReport
 *
 * @property int $id
 * @property string $section
 * @property string $action
 * @property int|null $user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $action_name
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\AiLogReportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AiLogReport whereUserId($value)
 * @mixin \Eloquent
 */
class AiLogReport extends Model
{
    use HasFactory;
    protected $table ='ai_log_reports';

    protected $fillable = [
        'section',
        'action',
        'user_id',
        'id_number'
    ];

    public $appends =[
       'action_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' ,'id');
    }

    public function getActionNameAttribute()
    {
       switch ($this->action){
           case 'created' :
               return 'ایجاد' ;
           case 'updated' :
               return 'به روز رسانی';
           case 'deleted' :
               return 'انتقال به زباله دان';
           case 'status-updated' :
               return 'وضعیت دسته تغییر کرد';
           case 'restored' :
               return 'بازیابی';
           case 'forceDeleted' :
               return 'حذف از سیستم';
           default:
               return ' ';
       }


    }
//
//    public function getJalalianCreatedAtAttribute()
//    {
//        $date = Jalalian::fromCarbon($this['created_at']);
//        return $date;
//    }


}

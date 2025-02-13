<?php

namespace App\Models;

use App\Jobs\EmailSend;
use App\Mail\VerifyEmailSend;
use App\Models\Product\Gift;
use App\Services\Permission\Traits\HasPermissions;
use App\Services\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Morilog\Jalali\Jalalian;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $family
 * @property string|null $phone_number
 * @property string|null $token_code
 * @property string|null $token_expire_time
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $rehashing_password_lw
 * @property string|null $real_lw_pass
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status
 * @property-read mixed $jalalian_created_at
 * @property-read mixed $jalalian_token_expired_at
 * @property-read mixed $jalalian_updated_at
 * @property-read mixed $user_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRealLwPass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRehashingPasswordLw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTokenCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTokenExpireTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasPermissions ,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'rehashing_password_lw',
        'real_lw_pass',
        'password',
        'phone_number',
        'postal_code',
        'national_code',
        'profile_img',
        'token_code',
        'token_expire_time',
        'status',
        'birth_day',
        'company_id',
        'email_verified_at',
        'family'
    ];


    protected $appends = [
        'jalalian_created_at',
        'persian_family_name',
        'persian_birth_day',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //description :
    // این کد برای بازگزدانی اطلاعات یوزر به هر صورتی که می باشد .

    public function gifts()
    {
        return $this->hasMany(Gift::class, 'user_id', 'id');
    }

    public function getJalalianCreatedAtAttribute()
    {
        return Jalalian::fromDateTime($this->created_at);
    }


    public function getPersianFamilyNameAttribute()
    {
        return $this->name . '  ' . $this->family;
    }

    public function getPersianBirthDayAttribute()
    {

        return Jalalian::fromDateTime($this->birth_day)->format('Y/m/d');
    }

    public function sendEmailVerificationNotification()
    {
        EmailSend::dispatch($this, new VerifyEmailSend($this));
    }
//    public function getJalalianTokenExpiredAtAttribute()
//    {
//        $date = Jalalian::fromCarbon($this->token_expire_time);
//        return $date ;
//    }

    public function userAddresses()
    {
        return $this->hasMany(UserAddress::class , 'user_id' , 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id' );
    }
}

<?php

namespace App\Models;

use App\Models\User\Avatar;
use App\Models\User\Device;
use App\Models\User\Profile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user';
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user', 'cellphone', 'pin', 'type'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pin',
    ];
    /**
     * @var mixed
     */

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user', 'user');
    }

    public function avatar(): HasOne
    {
        return $this->hasOne(Avatar::class, 'user', 'user');
    }

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class, 'user', 'user');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as Authen;

class User extends Authenticatable implements MustVerifyEmail, Authen
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verification_token', 'verified', 'provider', 'provider_id', 'role_id', 'image'
    ];

    const NOTVERIFIED = false;
    const VERIFIED = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function houses(){
        return $this->hasMany('App\House');
    }

    public function isVerified(){
        return $this->verified = User::VERIFIED;
    }

    public static function verification_token(){
        return str_random(40);
    }
}

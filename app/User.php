<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'email', 'password', 'first_name', 'last_name', 'phone_number', 'state', 'city', 'street', 'street_number', 'postal_code', 'payment_type', 'admin', 'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }

    public function isActor()
    {
        return $this->actor;
    }

    public function orders()
    {
        return $this->hasMany(orders::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}

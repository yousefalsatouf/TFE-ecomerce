<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['user_id', 'product_id'];

    public function product()
    {
        return $this->hasOne('App\Product');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}

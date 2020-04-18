<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $fillable = ['user_id', 'product_id'];

    public function product()
    {
        return $this->hasOne('App\Product');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}

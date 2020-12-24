<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = ['review_id', 'user_id'];

    public function review()
    {
        return $this->hasOne('App\Review');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}

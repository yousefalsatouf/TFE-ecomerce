<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    //
    protected $table = 'inbox';
    protected $fillable = ['name', 'email', 'sub', 'message'];
    public $timestamps = false;
}

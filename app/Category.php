<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'image', 'product_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

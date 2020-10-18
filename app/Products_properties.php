<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_properties extends Model
{
    //
    protected $table = 'products_properties';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['product_name', 'product_code', 'product_price', 'image', 'shopping_cost', 'stock', 'product_info', 'sold_price', 'images', 'category_id'];

    public function categories()
    {

        return $this->belongsToMany('Category', 'categories');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function orders()
    {
        return $this->hasMany('App\Orders');
    }

    public function property()
    {
        return$this->hasOne(Products_properties::class);
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['product_name', 'product_code', 'product_price', 'image', 'stock', 'product_info', 'sale_price', 'category_id'];

    public function categories() {

        return $this->belongsToMany('Category', 'categories');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

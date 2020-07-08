<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['id','product_name','product_image','category_id','product_price','status'];


    public function category()
    {

        return $this->belongsTo(Category::class,'category_id');
    }

}

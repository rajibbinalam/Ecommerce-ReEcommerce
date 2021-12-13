<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'image', 'quantity', 'price','category_id','details',
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}

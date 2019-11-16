<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $table = 'product_details';
    //
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

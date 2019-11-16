<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    public function product(){
        return $this->belongsTo(Product::class);
    }
}

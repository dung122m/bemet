<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
    'customer_id',
    'product_id',
    'price',
    'quantity'
];
public function products(){
    return $this->hasOne(Product::class,"id","product_id");
}
 
}

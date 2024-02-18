<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id'
    ];
    public function products(){
        return $this->hasOne(Product::class,'id','product_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $appends = ['totalAmount'];
    use HasFactory;
    protected $fillable = [
    'customer_id',
    'name',
    'address',
    'phone',
    'email',
    'status',
    'token'
];

    public function customer(){
        return $this->hasOne(Customer::class,"id","customer_id");
    }
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class,"order_id","id");
    }
    public function gettotalAmountAttribute(){
        $total = 0;
        foreach($this->orderDetail as $item){
            $total += $item->price * $item->quantity;
        
        }
        return $total;
    }
}

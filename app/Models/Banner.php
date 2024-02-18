<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'image',
        'description',
        'position',
        'prioty',
        'status'
    ];
    public function scopeBanner($query,$pos = "top-banner"){
      $query = $query->where("position",$pos)->where("status",1)->orderBy("prioty","ASC");
      return $query;
    }
    
}

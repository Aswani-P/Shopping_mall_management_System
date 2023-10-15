<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable=[
        'shop_name',
        'location',
        'contact',
        'status',
        'user_id',
        'isSent'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

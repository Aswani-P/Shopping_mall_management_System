<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'shop_id',
        'product_name',
        'category',
        'price',
        'option',
        'approved_id'
    ];
    public function approve()
    {
        return $this->belongsTo(Approve::class, 'approved_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soldProduct extends Model
{
    use HasFactory;

    
    protected $fillable = [
     
      
            'name',
       'priceSold',
        'quantity',
        'category',
            'shop',
        'sellerName',
        'discount',
        'date',
        'productId',

    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laybuy extends Model
{
    use HasFactory;

    protected $fillable = [
     
        'customerId',
        'dateplaced',
         'duedate',
        'quantity',
          'price',
          'balance',
          'product',
          'shop',
          'category',

    ];
}

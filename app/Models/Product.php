<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const TABLE = 'products';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'description',
        'buy_price',
        'min_price',
        'finish_date_auction',
        'is_active',
        'user_id'
    ];
}

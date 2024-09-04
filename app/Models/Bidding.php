<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    use HasFactory;

    const TABLE = 'biddongs';
    protected $table = self::TABLE;

    protected $fillable = [
        'user_id',
        'product_id',
        'bid_price',
    ];
}

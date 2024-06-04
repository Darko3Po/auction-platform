<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;

    const TABLE = 'image_products';
    protected $table = self::TABLE;

    protected $fillable = [
        'image',
        'product_id',
    ];
}

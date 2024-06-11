<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    const TABLE = 'image';
    protected $table = self::TABLE;

    protected $fillable = [
        'name'
    ];
}

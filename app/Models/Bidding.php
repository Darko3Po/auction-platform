<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bidding extends Model
{
    use HasFactory;

    const TABLE = 'biddings';
    protected $table = self::TABLE;

    protected $fillable = [
        'user_id',
        'product_id',
        'bid_price',
    ];

    public function userName() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}

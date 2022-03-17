<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model

{
    use HasFactory;

    const TABLE = 'plans';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'slug',
        'stripe_name',
        'sripe_id',
        'price',
        'abbreviation',
    ];

    protected $casts = [
        'price' => PriceCase::class,
    ];

    public function getRoutekeyName()
    {
        return 'slug';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'building',
        'size_m2',
        'monthly_price',
        'available_from',
        'is_occupied',
        'facilities',
        'floor',
    ];

    protected $casts = [
        'available_from' => 'date',
        'is_occupied' => 'boolean',
        'size_m2' => 'integer',
        'monthly_price' => 'decimal:2',
        'floor' => 'integer',
    ];
}
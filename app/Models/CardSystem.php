<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CardSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id',
        'price',
        'code',
        'is_charged'
    ];
}

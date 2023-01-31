<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoritos_Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id',
        'users_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_temporadas_series',
        'id_temporadas_series',
        'id_thmdb_series',
        'url_1080_s',
        'url_720_s',
        'url_480_s'
    ];
}

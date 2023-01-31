<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_thmdb',
        'img_thumb',
        'img_portada' ,
        'url_1080' ,
        'url_720',
        'url_480',
        'active'
    ];


}

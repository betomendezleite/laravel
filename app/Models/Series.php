<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;


    protected $fillable = [
        'img_thumb_series',
        'img_portada_series',
        'id_thmdb_series' ,
        'active' 
    ];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres_users',
        'periodos',
        'precios' ,
        'dispositivos' ,
        'descripciones'
    ];




}

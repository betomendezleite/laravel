<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\Request;
use app\Helpers\functions;
use Illuminate\Support\Facades\Auth;

class PeliculasController extends Controller
{
    public function index()
    {
        return Peliculas::all();
    }
    public function create(Request $request)
    {
        if (Auth::user()->admin === '0') {
            return res_mensaje('No tienes privilegios para realizar esta acción');
        } else {


            $request->validate([
                'id_thmdb' => 'required|string|max:255',
                'img_thumb' => 'required|string|max:255',
                'img_portada' => 'required|string|max:255',
                'url_1080' => 'required|string|max:255',
                'url_720' => 'required|string|max:255',
                'url_480' => 'required|string|max:255',
                'active' => 'required|string|max:255',
            ]);


            $pel = Peliculas::create([
                'id_thmdb' => $request->id_thmdb,
                'img_thumb' => $request->img_thumb,
                'img_portada' => $request->img_portada,
                'url_1080' => $request->url_1080,
                'url_720' => $request->url_720,
                'url_480' => $request->url_480,
                'active' => $request->active,

            ]);

            return res_mensaje('Pelicula registrada con exito');
        }
    }
    public function update(Request $request, peliculas $peliculas)
    {


        if (Auth::user()->admin === '0') {
            return res_mensaje('No tienes privilegios para realizar esta acción');
        } else {


            $request->validate([
                'id_thmdb' => 'required|string|max:255',
                'img_thumb' => 'required|string|max:255',
                'img_portada' => 'required|string|max:255',
                'url_1080' => 'required|string|max:255',
                'url_720' => 'required|string|max:255',
                'url_480' => 'required|string|max:255',
                'active' => 'required|string|max:255',
            ]);


            $peliculas = Peliculas::find($request->id);
            $peliculas->id_thmdb = $request->id_thmdb;
            $peliculas->img_thumb = $request->img_thumb;
            $peliculas->img_portada = $request->img_portada;
            $peliculas->url_1080 = $request->url_1080;
            $peliculas->url_720 = $request->url_720;
            $peliculas->url_480 = $request->url_480;
            $peliculas->active = $request->active;

            $peliculas->save();

            return res_mensaje('Pelicula actualizada con exito');
        }
    }
    public function delete(Request $request)
    {

        if (Auth::user()->admin === '0') {
            return res_mensaje('No tienes privilegios para realizar esta acción');
        } else {

            $request->validate([
                'id' => 'required|string|max:255',
            ]);

            $planes = Peliculas::destroy($request->id);


            return res_mensaje('Pelicula eliminada con exito');
        }
    }
}

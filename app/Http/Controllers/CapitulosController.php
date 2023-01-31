<?php

namespace App\Http\Controllers;

use App\Models\Capitulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapitulosController extends Controller
{

    
    public function index()
    {
        return Capitulos::all();
    }
    public function create(Request $request)
    {
        if (Auth::user()->admin === '0') {
            return res_mensaje('No tienes privilegios para realizar esta acción');
        } else {


            $request->validate([
                'img_thumb_series' => 'required|string|max:255',
                'img_portada_series' => 'required|string|max:255',
                'id_thmdb_series' => 'required|string|max:255',
                'active' => 'required|string|max:255'
            ]);


            $pel = Capitulos::create([
                'img_thumb_series' => $request->img_thumb_series,
                'img_portada_series' => $request->img_portada_series,
                'id_thmdb_series' => $request->id_thmdb_series,
                'active' => $request->active

            ]);

            return res_mensaje('Serie registrada con exito');
        }
    }
    public function update(Request $request, capitulos $update)
    {


        if (Auth::user()->admin === '0') {
            return res_mensaje('No tienes privilegios para realizar esta acción');
        } else {


            $request->validate([
                'img_thumb_series' => 'required|string|max:255',
                'img_portada_series' => 'required|string|max:255',
                'id_thmdb_series' => 'required|string|max:255',
                'active' => 'required|string|max:255'
            ]);


            $update = Capitulos::find($request->id);
            $update->img_thumb_series = $request->img_thumb_series;
            $update->img_portada_series = $request->img_portada_series;
            $update->id_thmdb_series = $request->id_thmdb_series;
            $update->active = $request->active;


            $update->save();

            return res_mensaje('Serie actualizada con exito');
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

            $planes = Capitulos::destroy($request->id);


            return res_mensaje('Serie eliminada con exito');
        }
    }

}

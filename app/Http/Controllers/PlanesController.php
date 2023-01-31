<?php

namespace App\Http\Controllers;

use App\Models\Planes;
use Illuminate\Http\Request;
use Validator;

class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Planes::all();
        return $planes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:255',
            'periodos' => 'required|string|max:255',
            'precios' => 'required|string|max:255',
            'dispositivos' => 'required|string|max:255',
            'descripciones' => 'required|string|max:255',

        ]);
        if($validator->fails()){
           return response()->json($validator->errors());
        }

        $user = Planes::create([
            'nombres' => $request->nombres,
            'periodos' => $request->periodos,
            'precios' => $request->precios,
            'dispositivos' => $request->dispositivos,
            'descripciones' => $request->descripciones,
            
        ]);

        return response()->json([
            'message' => 'Plan registrado con exito'
        ]);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function show(planes $planes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function edit(planes $planes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, planes $planes)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'periodos' => 'required|string|max:255',
            'precios' => 'required|string|max:255',
            'dispositivos' => 'required|string|max:255',
            'descripciones' => 'required|string|max:255',
        ]);

        $planes = Planes::find($request->id);
        $planes->nombres = $request->nombres;
        $planes->periodos = $request->periodos;
        $planes->precios = $request->precios;
        $planes->dispositivos = $request->dispositivos;
        $planes->descripciones = $request->descripciones;

        $planes->save();

        return response()->json([
            'message' => 'Plan actualizada con exito'
        ]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $request->validate([
            'id' => 'required|string|max:255',
        ]);

        $planes = Planes::destroy($request->id);


        return response()->json([
            'message' => 'Plan eliminado con exito'
        ]);

    }
}

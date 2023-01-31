<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapitulosController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::post('login', [AuthController::class, 'login']);






Route::middleware('auth:sanctum')->group(function () {


    Route::get('usuarios', [AuthController::class, 'index']);
    Route::post('register', [AuthController::class, 'register']);

    Route::post('usuarios-update', [AuthController::class, 'update']);
    Route::post('usuarios-delete', [AuthController::class, 'destroy']);

    Route::get('planes', [PlanesController::class, 'index']);
    Route::post('planes-create', [PlanesController::class, 'create']);
    Route::post('planes-update', [PlanesController::class, 'update']);
    Route::post('planes-delete', [PlanesController::class, 'destroy']);

    Route::post('logouts', [AuthController::class, 'logouts']);

    //PELICULAS
    Route::get('peliculas', [PeliculasController::class, 'index']);
    Route::post('peliculas-create', [PeliculasController::class, 'create']);
    Route::post('peliculas-update', [PeliculasController::class, 'update']);
    Route::post('peliculas-delete', [PeliculasController::class, 'delete']);


    //SERIES
    Route::get('series', [SeriesController::class, 'index']);
    Route::post('series-create', [SeriesController::class, 'create']);
    Route::post('series-update', [SeriesController::class, 'update']);
    Route::post('series-delete', [SeriesController::class, 'delete']);

    //CAPITULOS
    Route::get('capitulos', [CapitulosController::class, 'index']);
    Route::post('capitulos-create', [CapitulosController::class, 'create']);
    Route::post('capitulos-update', [CapitulosController::class, 'update']);
    Route::post('capitulos-delete', [CapitulosController::class, 'delete']);

    //FAVORITOS SERIES




});

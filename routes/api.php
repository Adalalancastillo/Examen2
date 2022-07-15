<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alumnos',[AlumnoController::class,'index']);

Route::get('/alumnos/Masculino',[AlumnoController::class,'alumnosMasculino']);
Route::get('/alumnos/Femenino',[AlumnoController::class,'alumnosFemenino']);

Route::get('/alumnos/becados',[AlumnoController::class,'becado']);
Route::get('/alumnos/sinbeca',[AlumnoController::class,'sinbeca']);

Route::get('/alumnos/horario/matutino',[AlumnoController::class,'horarioM']);
Route::get('/alumnos/horario/vespertino',[AlumnoController::class,'horarioV']);

Route::get('/alumnos/problemasalud',[AlumnoController::class,'problemasalud']);
Route::get('/alumnos/sinproblemasalud',[AlumnoController::class,'sinproblemasalud']);

Route::get('/alumnos/prepa/aprobada',[AlumnoController::class,'prepaAprobada']);
Route::get('/alumnos/prepa/desaprobada',[AlumnoController::class,'prepaDesaprobada']);

Route::post('/alumnos',[AlumnoController::class,'create']);
Route::put('/alumnos/{id}',[AlumnoController::class,'update']);
Route::get('/alumnos/{id}',[AlumnoController::class,'show']);
Route::delete('/alumnos/{id}',[AlumnoController::class,'delete']);


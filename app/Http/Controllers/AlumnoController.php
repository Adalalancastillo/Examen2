<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return response([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);
    }

    public function alumnosMasculino()
    {
        $alumnos = Alumno::where('genero', 'masculino')->get();

        $data = $alumnos->where('genero','=','masculino');

        return response()->json([
            'total_data' => count($data),
            'data' => $data
        ], 200);
    }

    public function alumnosFemenino()
    {
        $alumnos = Alumno::where('genero', 'femenino')->get();

        $data = $alumnos->where('genero','=','femenino');

        $alumnos = Alumno::where('genero', 'Femenino')->get();

        $data = $alumnos->where('genero','=','Femenino');

        return response()->json([
            'total_data' => count($data),
            'data' => $data
        ], 200);
    }

    public function sinbeca()
    {
        $alumnos = Alumno::where('becado', 'no')->get();

        $data = $alumnos->where('becado','LIKE','no');

        return response()->json([
            'total_data' => count($data),
            'data' => $data
        ], 200);
    }

    public function becado()
    {
        $alumnos = Alumno::where('becado', 'si')->get();

        $data = $alumnos->where('becado','LIKE','si');

        return response()->json([
            'total_data' => count($data),
            'data' => $data
        ], 200);
    }

    public function horarioM()
    {
        $alumnos = Alumno::where('horario', 'matutino')->get();

        $data = $alumnos->where('horario','LIKE','matutino');

        return response()->json([
            'total_data' => count($data),
            'data' => $data
        ], 200);
    }

    public function horarioV()
    {
        $alumnos = Alumno::where('horario', 'vespertino')->get();

        $data = $alumnos->where('horario','LIKE','vespertino');

        return response()->json([
            'total_data' => count($data),
            'data' => $data
        ], 200);
    }

    public function sinproblemaSalud()
    {
        $alumnos = Alumno::where('problema_de_salud', 'ninguno')->get();

        $data = $alumnos->where('problema_de_salud','LIKE','ninguno');

        $alumnos = Alumno::where('problema_de_salud', 'no')->get();

        $data = $alumnos->where('problema_de_salud','LIKE','no');

        return response()->json([
            'total_data' => count($data),
            'data' => $data
        ], 200);
    }

    public function problemaSalud()
    {
        $alumnos = Alumno::where('problema_de_salud', 'si')->get();

        $data = $alumnos->where('problema_de_salud','LIKE','si');

        return response()->json([
            'total_data' => count($data),
            'data' => $data
        ], 200);
    }

    public function prepaDesaprobada()
    {
        $alumnos = Alumno::where('calificacion_prepa', '1')->get();
        $alumnos = Alumno::where('calificacion_prepa', '2')->get();
        $alumnos = Alumno::where('calificacion_prepa', '3')->get();
        $alumnos = Alumno::where('calificacion_prepa', '4')->get();
        $alumnos = Alumno::where('calificacion_prepa', '5')->get();
        $alumnos = Alumno::where('calificacion_prepa', '')->get();

        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);
    }

    public function prepaAprobada()
    {
        $alumnos = Alumno::where('calificacion_prepa', '6, 7, 8, 9, 10')->get();
        /* $alumnos = Alumno::where('calificacion_prepa', '7')->get();
        $alumnos = Alumno::where('calificacion_prepa', '8')->get();
        $alumnos = Alumno::where('calificacion_prepa', '9')->get();
        $alumnos = Alumno::where('calificacion_prepa', '10')->get(); */

        return response()->json([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ], 200);
    }


    public function create(Request $request)
    {
        $data = $this->rules($request);
        Alumno::create($data);
        return response([
            'message' => 'Se creo con exito el alumno'
        ], 201);
    }

    public function show($id)
    {
        $alumno = Alumno::where('id', $id)->first();
        return response($alumno, 200);
    }

    public function update($id,Request $request)
    {
        $data = $this->rules($request);
        Alumno::find($id)->fill($data)->save();
        return response([
            'message' => 'Se modifico con exito el alumno'
        ], 200);
    }

    public function delete($id)
    {
        Alumno::find($id)->delete();
        return response([
            'message' => 'Se elimino con exito el alumno'
        ], 200);
    }

    protected function rules($request)
    {
        return $request->validate([
            'nombre'=>'required|string',
            'edad'=>'required|string',
            'genero'=>'required',
            'carrera'=>'nullable',
            'ednia_indigena'=>'required|string',
            'horario'=>'required',
            'calificacion_prepa'=>'required',
            'becado'=>'required|string',
            'problema_de_salud'=>'required|string'
        ]);
        //return $this->validate($request, [
        //    'nombre'=>'required|string',
        //    'edad'=>'required|string',
        //    'genero'=>'required',
        //    'carrera'=>'nullable',
        //]);
    }
}

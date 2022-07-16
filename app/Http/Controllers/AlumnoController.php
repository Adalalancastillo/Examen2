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

    public function datos()
    {
        $alumnos = Alumno::all();

        $alumnosM = Alumno::where('genero', 'masculino')->get();
        $alumnosF = Alumno::where('genero', 'femenino')->get();
        $alumnosBS = Alumno::where('becado', 'si')->get();
        $alumnosBN = Alumno::where('becado', 'no')->get();
        $alumnosHM = Alumno::where('horario', 'matutino')->get();
        $alumnosHV = Alumno::where('horario', 'vespertino')->get();
        $alumnosPS = Alumno::where('problema_de_salud', 'si')->get();
        $alumnosPN = Alumno::where('problema_de_salud', 'no')->get();
        $alumnosPNI = Alumno::where('problema_de_salud', 'ninguno')->get();
        $alumnosCR = Alumno::whereBetween('calificacion_prepa', [1,5])->get();
        $alumnosCA = Alumno::whereBetween('calificacion_prepa', [6,10])->get();

        return response()->json([
            'message1' => 'Alumnos masculinos',
            'total_data1' => count($alumnosM),
            'data1' => $alumnosM,

            'message2' => 'Alumnos femeninos',
            'total_data2' => count($alumnosF),
            'data2' => $alumnosF,

            'message3' => 'Alumnos becados',
            'total_data3' => count($alumnosBS),
            'data3' => $alumnosBS,

            'message4' => 'Alumnos no becados',
            'total_data4' => count($alumnosBN),
            'data4' => $alumnosBN,

            'message5' => 'Alumnos horario matutino',
            'total_data5' => count($alumnosHM),
            'data5' => $alumnosHM,

            'message6' => 'Alumnos horario vespertino',
            'total_data6' => count($alumnosHV),
            'data6' => $alumnosHV,

            'message7' => 'Alumnos problema de salud',
            'total_data7' => count($alumnosPS),
            'data7' => $alumnosPS,

            'message8' => 'Alumnos sin problema de salud',
            'total_data8' => count($alumnosPN),
            'data8' => $alumnosPN,

            'message9' => 'Alumnos ningun problema de salud',
            'total_data9' => count($alumnosPNI),
            'data9' => $alumnosPNI,

            'message10' => 'Alumnos aprobados prepa',
            'total_data10' => count($alumnosCA),
            'data10' => $alumnosCA,

            'message11' => 'Alumnos no aprobados prepa',
            'total_data11' => count($alumnosCR),
            'data11' => $alumnosCR
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

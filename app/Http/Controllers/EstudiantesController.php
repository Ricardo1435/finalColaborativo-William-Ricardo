<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Genero;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function registerEstudiantes(){
        $generos = Genero::all();
        return view('layouts.registroEstudiante', compact('generos'));
    }

    public function showEstudiante(){
        $estudiante = Estudiante::all();
        return view('layouts.listaDeEstudiantes', compact('estudiante'));
    }


    public function saveEstudiante(Request $request){

        //Validaciones del formulario
        $data = request()->validate([
            'nombre' => 'required|max:45',
            'grado'=>'required|max:45',
            'edad'=>'required|max:45',
            'genero'=>'required'
        ],[
            'nombre.required'=>'El campo nombre no debe estar vacio.',
            'grado.required'=>'El campo grado no debe estar vacio.',
            'edad'=>'El campo edad no debe estar vacio.',
            'id_genero.required'=>'El campo tipo de genero no debe estar vacio.',
            'nombre.max'=>'El nombre no puede tener más de 45 caracteres.',
            'grado.max'=>'El grado no puede tener más de 45 caracteres.',
            'edad.max'=>'La edad no puede tener más de 45 caracteres.',
        ]); // termina el bloque de validaciones



        try{
            //Guardar el producto

            $estudiante= Estudiante::create([
                'nombre'=> $data['nombre'],
                'grado'=>$data['grado'],
                'edad'=>$data['edad'],
                'id_genero'=>$data['genero']
            ]);

        }catch(QueryException $queryException){ //capturamos el error en el catch
            return redirect()->route('estudiantes.index')->with('warning', 'Ocurrio un error al registrar el estudiante. ');
        }

        return redirect()->route('estudiantes.index')->with('success', 'Registro realizado exitosamente');

    }
}

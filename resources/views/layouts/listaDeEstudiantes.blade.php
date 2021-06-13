@extends('layouts.plantilla')

@section('contenido')
    <div class="p-3 bg-white mb-3">
        <h3>Lista de Estudiantes</h3>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nombre del estudiante" id="nom_buscar">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary rounded-right" onclick="searchEstudiante()" id="btn-comercio" ><i class="fas fa-search"></i></button>
            </div>

        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">GRADO</th>
                    <th scope="col">EDAD</th>
                    <th scope="col">GENERO</th>
                    <th scope="col" ></th>
                    <th scope="col" ></th>
                </tr>
                </thead>
                <tbody>
                @foreach($estudiante as $estu)
                    <tr>
                        <td>{{$estu->id_estudiante}}</td>
                        <td>{{$estu->nombre}}</td>
                        <td>{{$estu->grado}}</td>
                        <td>{{$estu->edad}}</td>
                        <td>{{$estu->id_genero}}</td>
                        <td class="d-flex d-inline">
                            <a href="#" class="btn btn-warning">Editar</a>&nbsp;
                            <a href="#" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

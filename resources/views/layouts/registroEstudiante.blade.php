@extends('layouts.plantilla')

@section('titulo', 'Registro de Estudiantes')

@section('contenido')
    <div class="p-1">
        <div class="text-secondary">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center text-blue text-uppercase">
                    <h4>
                        Registro de Estudiantes    <i class="fas fa-users"></i>
                    </h4>
                </div>
            </div>
        </div>
        <div class="p-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            @if(\Session::has('warning'))
                <div class="alert alert-warning">
                    <ul>
                        <li>{!! \Session::get('warning') !!}</li>
                    </ul>
                </div>
            @endif

            <form action="{{route('estudiantes.registrarEstudiante')}}" method="POST">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" maxlength="45" class="form-control" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label>Grado</label>
                            <input type="text" name="grado" maxlength="45" class="form-control" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label>Edad</label>
                            <input type="text" name="edad" maxlength="45" class="form-control" >
                        </div>
                    </div>
                </div>

                <!-- Mostrar los generos alamacenadas en la BD  -->
                <div class="row mb-3">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label>Genero</label>
                            <select name="genero" class="form-control" >
                                <option value="">--Seleccione--</option>

                                @foreach( $generos as $genero)
                                    <option value="{{$genero->id_genero}}"> {{$genero->tipo_genero}} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <!-- Termina la muestra de generos de la BD  -->


                <div class="row">
                    <div class="col-6 offset-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection


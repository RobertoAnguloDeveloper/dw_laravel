@extends('layouts.app')

@section('content')

@if(isset($_REQUEST['accion']))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Datos usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/usuarios">
                            @csrf

                            <div class="row mb-3">
                                <label for="cedula" class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>
                                <div class="col-md-6">
                                    <input id="cedula" type="text" class="form-control" name="cedula" value="{{$usuario->cedula}}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="clave" class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>
                                <div class="col-md-6">
                                    <input id="clave" type="password" class="form-control" name="clave" value="{{$usuario->clave}}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{$usuario->nombre}}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$usuario->email}}" disabled>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control" name="telefono" value="{{$usuario->telefono}}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <button name="activaInputs" onclick="editar()" type="button" class="btn btn-primary">
                                        {{ __('Editar') }}
                                    </button>
                                    <button name="edita" onclick="document.getElementById('cedula').disabled = false;" type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function editar() {
        document.getElementById("clave").disabled = false;
        document.getElementById("nombre").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("telefono").disabled = false;
    }
</script>
@endif
@endsection


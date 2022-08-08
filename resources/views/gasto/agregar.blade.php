@extends('layouts.app')

@section('content')

@if (isset($mensaje))
    <div class="alert alert-success" role="alert">
        {{ $mensaje }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div style="text-shadow: 1px 1px 1px rgb(255, 255, 255);" class="card-header"><b>{{ __('Registrando nuevo gasto') }}</b></div>

                <div style="font-size: 16px; font-weight: bold; color:white; background-color: rgb(237, 171, 30); text-shadow: 1px 1.5px 1px #000;" class="card-body">
                    <form method="POST" action="/gastos">
                        @csrf
                        <div class="row mb-3">
                            <label for="usuario_id" class="col-md-4 col-form-label text-md-end">{{ __('Cédula del usuario') }}</label>
                            <div class="col-md-6">
                                <input id="usuario_id" type="text" class="form-control" name="usuario_id" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha') }}</label>
                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control" name="fecha" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="valor_total_sin_iva" class="col-md-4 col-form-label text-md-end">{{ __('Valor total sin iva') }}</label>
                            <div class="col-md-6">
                                <input id="valor_total_sin_iva" type="text" class="form-control" name="valor_total_sin_iva" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="iva_total" class="col-md-4 col-form-label text-md-end">{{ __('Iva total') }}</label>
                            <div class="col-md-6">
                                <input id="iva_total" type="text" class="form-control" name="iva_total" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="valor_total_con_iva" class="col-md-4 col-form-label text-md-end">{{ __('Valor total con iva') }}</label>
                            <div class="col-md-6">
                                <input id="valor_total_con_iva" type="text" class="form-control" name="valor_total_con_iva" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nombre_gasto" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del gasto') }}</label>
                            <div class="col-md-6">
                                <input id="nombre_gasto" type="text" class="form-control" name="nombre_gasto" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lugar" class="col-md-4 col-form-label text-md-end">{{ __('Lugar') }}</label>
                            <div class="col-md-6">
                                <input id="lugar" type="text" class="form-control" name="lugar" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control" name="descripcion" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <input type="submit" name="agrega" class="btn btn-primary" value="{{ __('Agregar') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

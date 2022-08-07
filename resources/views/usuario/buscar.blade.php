@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row mb-2">
                <div class="col">
                    <h2 class="text-white"><u>USUARIO</u></h2>
                </div>
                <div class="col-3 justify-content-end">
                    <form action="/usuarios" method="POST">
                        @csrf

                        <div class="row">
                            <div style="margin-left: -110px;" class="col">
                                <input type="submit" name="user_list" class="btn btn-warning" value="Lista completa">
                            </div>
                            <div style="margin-right: -35px;" class="col-8">
                                <input type="number" class="form-control bg-white" name="cedula"
                                    placeholder="Buscar por cédula">
                            </div>
                            <div style="margin-left: 15px;" class="col">
                                <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (!isset($mensaje))
                <table class="table table-striped table-dark table-bordered table-sm table-responsive">
                    <tr>
                        <th>
                            <div class="bg-dark">#</div>
                        </th>
                        <th class="text-center">
                            <div class="bg-dark">CÉDULA</div>
                        </th>
                        <th class="text-center">
                            <div class="bg-dark">CLAVE</div>
                        </th>
                        <th class="text-center">
                            <div class="bg-dark">NOMBRE</div>
                        </th>
                        <th class="text-center">
                            <div class="bg-dark">EMAIL</div>
                        </th>
                        <th class="text-center">
                            <div class="bg-dark">TELÉFONO</div>
                        </th>
                        <th class="text-center">
                            <div class="bg-dark">ACCIONES</div>
                        </th>
                    </tr>
                    <tr class="col col-md-auto">
                        <td>1</td>
                        <form id="usuariosForm" action="/usuarios" method="POST" class="d-inline">
                            @csrf
                            <td><input type="text" id="cedula" name="cedula" value="{{ $usuario->cedula }}" disabled>
                            </td>
                            <td><input type="text" id="clave" name="clave" value="{{ $usuario->clave }}" disabled>
                            </td>
                            <td><input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}" disabled>
                            </td>
                            <td><input type="text" id="email" name="email" value="{{ $usuario->email }}" disabled>
                            </td>
                            <td><input type="text" id="telefono" name="telefono" value="{{ $usuario->telefono }}"
                                    disabled></td>
                            <td class="text-center">
                                <script>
                                    ids = ['clave', 'nombre', 'email',
                                        'telefono'
                                    ];
                                    idsWithCedula = ['cedula', 'clave',
                                        'nombre', 'email', 'telefono'
                                    ];
                                </script>
                                <a href="#" onclick="ed(ids);" style="padding: 0%;"
                                    class="btn btn-primary btn-sm">Editar</a>
                                <input type="submit" onclick="toSubmit(idsWithCedula);" name="editaUsuario"
                                    style="padding:0%;" class="btn btn-success btn-sm" value="Guardar">
                        </form>
                        <form action="/usuarios/{{ $usuario->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" style="padding:0%;" name="eliminar"
                                value="Eliminar"class="btn btn-danger btn-sm">
                        </form>
                        </td>
                    </tr>
                </table>
            @endif
            
            @if (isset($mensaje))
                {{--  --}}
                <div class="alert alert-success" role="alert">
                    {{ $mensaje }}
                </div>
            @endif
        </div>
        <style>
            input[disabled] {
                color: rgb(255, 255, 255);
            }

            input[type=text],
            input[type=password],
            input[type=email] {
                border: none;
                background-color: transparent;
            }
        </style>

        <script>
            function ed(ids) {
                for (i = 0; i < ids.length; i++) {
                    document.getElementById(ids[i]).disabled = false;
                    document.getElementById(ids[i]).style.backgroundColor = "white";
                    document.getElementById(ids[i]).style.color = "black";
                }
                document.getElementById(ids[0]).focus();
                document.getElementById(ids[0]).selectionStart = document.getElementById(ids[0]).value.length;
            }

            function toSubmit(idsWithCedula) {
                for (i = 0; i < idsWithCedula.length; i++) {
                    document.getElementById(idsWithCedula[i]).disabled = false;
                }
            }
        </script>
    @endsection

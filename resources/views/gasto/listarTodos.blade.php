@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="justify-content-center">
            <div style="margin-left: -50px;" class="row mb-2">
                <div class="col">
                    <h2 class="text-white"><u>GASTOS DE TODOS LOS USUARIO</u></h2>
                </div>
                @if (isset($mensaje))
                    <div class="alert alert-success" role="alert">
                        {{ $mensaje }}
                    </div>
                @endif

                @if (isset($gastos) && count($gastos) > 0)
                    <div class="justify-content-end">
                        <form id="buscarForm" action="/gastos" method="POST">
                            @csrf
                            <div class="row">
                                <div style="margin-left: 0px;" class="col-2">
                                    <input type="number" class="form-control bg-white" name="cedula"
                                        placeholder="Buscar por cédula">
                                </div>
                                <div style="margin-left: -15px;" class="col">
                                    <input type="submit" name="buscarGasto" class="btn btn-primary" value="Buscar">
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
            <table style="margin-left:-40px;" class="table table-striped table-dark table-bordered">
                <tr>
                    <th>
                        <div class="bg-dark">#</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">ID</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">USUARIO_ID</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">FECHA</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">VALOR TOTAL SIN IVA</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">IVA TOTAL</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">VALOR TOTAL CON IVA</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">NOMBRE DE GASTO</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">LUGAR</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">DESCRIPCION</div>
                    </th>
                    <th class="text-center">
                        <div class="bg-dark">ACCIONES</div>
                    </th>
                </tr>
                @foreach ($gastos as $id => $gasto)
                    <tr class="col col-md-auto">
                        <td>{{ $id + 1 }}</td>
                        <form id="gastosForm" action="/gastos" method="POST" class="d-inline">
                            @csrf
                            <td><input style="width:25px;" type="text" id="id{{ $id }}" name="id"
                                    value="{{ $gasto->id }}" disabled></td>
                            <td><input style="width:100px;" type="text" id="usuario_id{{ $id }}"
                                    name="usuario_id" value="{{ $gasto->usuario_id }}" disabled></td>
                            <td><input style="width:90px;" type="text" id="fecha{{ $id }}" name="fecha"
                                    value="{{ $gasto->fecha }}" disabled></td>
                            <td><input style="width:150px;" type="text" id="valor_total_sin_iva{{ $id }}"
                                    name="valor_total_sin_iva" value="{{ $gasto->valor_total_sin_iva }}" disabled></td>
                            <td><input style="width:85px;" type="text" id="iva_total{{ $id }}"
                                    name="iva_total" value="{{ $gasto->iva_total }}" disabled></td>
                            <td><input style="width:160px;" type="text" id="valor_total_con_iva{{ $id }}"
                                    name="valor_total_con_iva" value="{{ $gasto->valor_total_con_iva }}" disabled></td>
                            <td><input style="width:140px;" type="text" id="nombre_gasto{{ $id }}"
                                    name="nombre_gasto" value="{{ $gasto->nombre_gasto }}" disabled></td>
                            <td><input style="width:120px;" type="text" id="lugar{{ $id }}" name="lugar"
                                    value="{{ $gasto->lugar }}" disabled></td>
                            <td><input type="text" id="descripcion{{ $id }}" name="descripcion"
                                    value="{{ $gasto->descripcion }}" disabled></td>

                            <td class="text-center">
                                <div style="width:150px;">
                                    <script>
                                        ids{{ $id }} = ['usuario_id{{ $id }}', 'fecha{{ $id }}',
                                            'valor_total_sin_iva{{ $id }}',
                                            'iva_total{{ $id }}', 'valor_total_con_iva{{ $id }}',
                                            'nombre_gasto{{ $id }}', 'lugar{{ $id }}', 'descripcion{{ $id }}'
                                        ];
                                        idsWithId{{ $id }} = ['id{{ $id }}', 'usuario_id{{ $id }}',
                                            'fecha{{ $id }}', 'valor_total_sin_iva{{ $id }}',
                                            'iva_total{{ $id }}', 'valor_total_con_iva{{ $id }}',
                                            'nombre_gasto{{ $id }}', 'lugar{{ $id }}', 'descripcion{{ $id }}'
                                        ];
                                    </script>
                                    <a href="#" onclick="ed(ids{{ $id }});" style="padding: 0%;"
                                        class="btn btn-primary btn-sm">Editar</a>
                                    <input type="submit" onclick="toSubmit(idsWithId{{ $id }});"
                                        name="editaGasto" style="padding:0%;" class="btn btn-success btn-sm"
                                        value="Guardar">
                        </form>
                        <form action="{{ route('gastos.destroy', $gasto->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" style="padding:0%;" name="eliminar"
                                value="Eliminar"class="btn btn-danger btn-sm">
                        </form>
        </div>
        </td>
        </tr>
        @endforeach
        </table>
    </div>
    @endif

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

        function toSubmit(idsWithId) {
            for (i = 0; i < idsWithId.length; i++) {
                document.getElementById(idsWithId[i]).disabled = false;
            }
        }
    </script>
@endsection

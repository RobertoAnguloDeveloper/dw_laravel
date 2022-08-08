<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;
use App\Models\Gasto;
use Illuminate\Support\Facades\Auth;

class ControladorGasto extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $gasto = new gasto();
        $controladorUsuario = new ControladorUsuario();
        $gastosAll = Gasto::all();

        switch ($_POST) {
            case isset($_POST['agregarGasto']):
                return view('gasto/agregar');
                break;

            case isset($_POST['buscarGasto']):
                $gastosABuscar = Gasto::where('usuario_id', '=', $request->get('cedula'))->get();
                if($gastosABuscar->isEmpty()) {
                    return view('gasto/listarTodos')->with('gastos',$gastosAll)->with('mensaje','No se encontraron gastos para el usuario con cédula ' . $request->get('cedula'));
                } else {
                    return view('gasto/listarTodos')->with('gastos', $gastosABuscar);
                }
                break;

            case isset($_POST['agrega']):
                $existeCedula = $controladorUsuario->existeCedula($request->usuario_id);

                if($existeCedula){
                    $gasto->usuario_id = $request->usuario_id;
                    $gasto->fecha = $request->fecha;
                    $gasto->valor_total_sin_iva = $request->valor_total_sin_iva;
                    $gasto->iva_total = $request->iva_total;
                    $gasto->valor_total_con_iva = $request->valor_total_con_iva;
                    $gasto->nombre_gasto = $request->nombre_gasto;
                    $gasto->lugar = $request->lugar;
                    $gasto->descripcion = $request->descripcion;

                    $gasto->save();
                    $gastosAll = Gasto::all();
                    return view('gasto/listar')->with('mensaje', 'GASTO AGREGADO')->with('gastos', $gastosAll);
                }else{
                    return view('gasto/agregar')->with('mensaje', 'USUARIO NO ENCONTRADO')->with('gastos', $gastosAll);
                }
                break;

            case isset($_POST['editaGasto']):
                $gasto = Gasto::find($request->id);
                $gasto->usuario_id = $request->usuario_id;
                $gasto->fecha = $request->fecha;
                $gasto->valor_total_sin_iva = $request->valor_total_sin_iva;
                $gasto->iva_total = $request->iva_total;
                $gasto->valor_total_con_iva = $request->valor_total_con_iva;
                $gasto->nombre_gasto = $request->nombre_gasto;
                $gasto->lugar = $request->lugar;
                $gasto->descripcion = $request->descripcion;
                $gasto->save();
                $gastosAll = Gasto::all();
                return view('gasto/listar')->with('gastos', $gastosAll);
                break;

                case isset($_POST['gastoUser_list']):
                    $_REQUEST['accion'] = 'listarGastos';
                    $cedulaUsuarioLogged = $controladorUsuario->buscarPorEmail(Auth::user()->email)->cedula;
                    $gastos = Gasto::where('usuario_id', $cedulaUsuarioLogged)->get();
                    if($gastos->count() > 0){
                        return view('gasto/listar')->with('gastos', $gastos);
                    }else{
                        return view('gasto/listar')->with('mensaje', 'NO HAY GASTOS REGISTRADOS');
                    }
                break;

                case isset($_POST['gastos_list']):
                    $_REQUEST['accion'] = 'listarTodosGastos';
                    $gastos = Gasto::all();
                    return view('gasto/listarTodos')->with('gastos', $gastos);
                break;

            default:
                break;
        }
    }

    public function index() {
        $gastos = Gasto::all();
        return view('index')->with('gastos',$gastos);
    }

    public function destroy($id) {
        $gasto = Gasto::find($id);
        $gastoEliminado = $gasto;
        $gasto->delete();
        $gastos = Gasto::all();
        return view('gasto/listarTodos')->with('mensaje', 'GASTO CON NOMBRE = '.$gastoEliminado->nombre_gasto.' ELIMINADO')->with('gastos', $gastos);
    }
}

?>


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
                    return view('gasto/listarTodos')->with('mensaje', 'GASTO AGREGADO')->with('gastos', $gastosAll);
                }else{
                    return view('gasto/agregar')->with('mensaje', 'USUARIO NO ENCONTRADO')->with('gastos', $gastosAll);
                }
                break;


            // case isset($_POST['user_data']):
            //     $usuario = ControladorUsuario::buscarPorEmail(Auth::user()->email);
            //     $_REQUEST['accion'] = 'datosUsuario';
            //     return view('home')->with('usuario', $usuario);
            //     break;

            // case isset($_POST['buscar']):
            //     $usuario = ControladorUsuario::buscarPorCedula($_POST['cedula']);
            //     if($usuario != null){
            //         $_REQUEST['accion'] = 'datosUsuario';
            //         return view('usuario/buscar')->with('usuario', $usuario);
            //     }else{
            //         $_REQUEST['accion'] = 'buscar';
            //         return view('usuario/buscar')->with('mensaje', 'USUARIO NO ENCONTRADO');
            //     }
            //     break;

            // case isset($_POST['editaUsuario']):
            //     $usuario = ControladorUsuario::buscarPorCedula($request->get('cedula'));
            //     $user = ControladorUsuario::buscarUser($usuario);

            //     $emailUsuario = ControladorUsuario::buscarPorEmail($request->get('email'));

            //     if($emailUsuario != null) {
            //         $usuario->clave = $request->get('clave');
            //         $user->password = bcrypt($request->get('clave'));
            //         $usuario->nombre = $request->get('nombre');
            //         $user->name = $request->get('nombre');
            //         $usuario->telefono = $request->get('telefono');

            //         $usuario->save();
            //         $user->save();

            //         $usuarios = Usuario::all();

            //         if($request->get('email') == Auth::user()->email) {
            //             $_REQUEST['accion'] = 'datosUsuario';
            //             return view('home')->with('usuario', $usuario)->with('usuarios', $usuarios);
            //         } else {
            //             if ($emailUsuario->email == $request->get('email') && $emailUsuario->email != $usuario->email) {
            //                 return view('usuario/listar')->with('usuario', $usuario)->with('usuarios', $usuarios)
            //                 ->with('mensaje', 'El/Su email no será modificado porque pertenece al usuario ' . $emailUsuario->nombre);
            //             } else {
            //                 return view('usuario/listar')->with('usuario', $usuario)->with('usuarios', $usuarios);
            //             }
            //         }
            //     }else{
            //         $usuario->clave = $request->get('clave');
            //         $user->password = bcrypt($request->get('clave'));
            //         $usuario->nombre = $request->get('nombre');
            //         $user->name = $request->get('nombre');
            //         $usuario->email = $request->get('email');
            //         $user->email = $request->get('email');
            //         $usuario->telefono = $request->get('telefono');

            //         $usuario->save();
            //         $user->save();

            //         $usuarios = Usuario::all();
            //         if($request->get('email') == Auth::user()->email) {
            //             $_REQUEST['accion'] = 'datosUsuario';
            //             return view('home')->with('usuario', $usuario)->with('usuarios', $usuarios);
            //         } else {
            //             return view('usuario/listar')->with('usuario', $usuario)->with('usuarios', $usuarios);
            //         }
            //     }

            //     $_REQUEST['accion'] = 'editarUsuario';
            //     break;

                case isset($_POST['gastoUser_list']):
                    $_REQUEST['accion'] = 'listarGastos';
                    $cedulaUsuarioLogged = $controladorUsuario->buscarPorEmail(Auth::user()->email)->cedula;
                    $gastos = Gasto::where('usuario_id', $cedulaUsuarioLogged)->get();
                    return view('gasto/listar')->with('gastos', $gastos);
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

    // public function buscarPorCedula($cedula) {
    //     $usuario = Usuario::where('cedula', $cedula)->first();
    //     return $usuario;
    // }

    // public function existeEmail($email) {
    //     $usuario = Usuario::where('email', $email)->first();
    //     if ($usuario) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function editar(Request $request) {
    //     $usuarios = new Usuario();

    //     $usuarios->cedula = $request->get('cedula');
    //     $usuarios->clave = $request->get('clave');
    //     $usuarios->nombre = $request->get('nombre');
    //     $usuarios->telefono = $request->get('telefono');
    //     $usuarios->email = $request->get('email');

    //     $usuarios->save();

    //     return redirect('usuarios');
    // }

    // public function destroy($cedula) {
    //     $usuario = ControladorUsuario::buscarPorCedula($cedula);
    //     $user = ControladorUsuario::buscarUser($usuario);
    //     if($usuario->cedula == "73202647"){
    //         return view('usuario/listar')->with('usuarios', Usuario::all())->with('mensaje', 'No se puede eliminar el usuario administrador');
    //     }else{
    //         $mensaje = "El usuario " . $usuario->nombre . " ha sido eliminado";
    //         $usuario->delete();
    //         $user->delete();
    //         return view('usuario/listar')->with('usuarios', Usuario::all())->with('mensaje', $mensaje);
    //     }
    // }
}

?>


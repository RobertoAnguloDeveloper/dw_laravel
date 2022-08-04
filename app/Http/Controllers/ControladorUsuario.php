<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ControladorUsuario extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $usuario = new Usuario();
        /*Switch $request key to change between methods */
        switch ($_POST) {
            case isset($_POST['user_data']):
                $usuario = ControladorUsuario::buscarPorEmail(Auth::user()->email);
                $_REQUEST['accion'] = 'datosUsuario';
                return view('home')->with('usuario', $usuario);
                break;

            case isset($_POST['edita']):
                $usuario = ControladorUsuario::buscarPorCedula($request->get('cedula'));

                $usuario->clave = request('clave');
                $usuario->nombre = request('nombre');
                $validarEmail = ControladorUsuario::buscarPorEmail($request->get('email'));
                if($validarEmail != null) {
                    if(Auth::user()->email == $request->get('email')){
                        $usuario->email = $request->get('email');
                    } else {
                        echo '<script>alert("El email ya esta en uso");</script>';
                    }
                }else{
                    $usuario->email = $request->get('email');
                }
                
                $usuario->telefono = request('telefono');
                $usuario->save();
                $_REQUEST['accion'] = 'editarUsuario';
                return view('home')->with('usuario', $usuario);
                break;

            default:
                break;
        }
    }

    public function index() {
        $usuarios = Usuario::all();
        return view('usuario.index')->with('usuarios',$usuarios);
    }

    /*Buscar por cedula */
    public function buscarPorCedula($cedula) {
        $usuario = Usuario::where('cedula', $cedula)->first();
        return $usuario;
    }

    public function buscarPorEmail($email) {
        $usuario = Usuario::where('email', $email)->first();
        return $usuario;
    }

    public function existeEmail($email) {
        $usuario = Usuario::where('email', $email)->first();
        if ($usuario) {
            return true;
        } else {
            return false;
        }
    }

    public function editar(Request $request) {
        $usuarios = new Usuario();

        $usuarios->cedula = $request->get('cedula');
        $usuarios->clave = $request->get('clave');
        $usuarios->nombre = $request->get('nombre');
        $usuarios->telefono = $request->get('telefono');
        $usuarios->email = $request->get('email');

        $usuarios->save();

        return redirect('usuarios');
    }

}

?>


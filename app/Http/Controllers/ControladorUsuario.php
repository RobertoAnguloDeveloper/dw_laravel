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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $usuarios = Usuario::all();
        return view('usuario.index')->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregar() {
        // /* Add name, email and password to users table */
        // $userLogged = Auth::user();
        // $user = new User();
        // $user->name = request('nombre');
        // $user->email = request('email');
        // $user->password = bcrypt(request('clave'));

        // /* Send all request data to usuarios table */
        // $usuario = new Usuario;
        // $usuario->cedula = request('cedula');
        // $usuario->clave = request('clave');
        // $usuario->nombre = request('nombre');
        // $usuario->telefono = request('telefono');
        // $usuario->email = request('email');

        // $usuario->save();
        // $user->save();

        return view("nojoda");
    }

    public function clonarUsuario() {
        /* Get session user data */
        $user = Auth::user();
        /*Add this user to usuarios table */
        $usuario = new Usuario();
        $usuario->cedula = "1234568";
        $usuario->clave = $user->password;
        $usuario->nombre = $user->name;
        $usuario->email = $user->email;
        $usuario->telefono = "30000000";

        $usuario->save();
    }

    /*Buscar por email */
    public function buscarPorEmail($email) {
        $usuario = Usuario::where('email', $email)->first();
        return $usuario;
    }

    /*Existe email? */
    public function existeEmail($email) {
        $usuario = Usuario::where('email', $email)->first();
        if ($usuario) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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


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
        return view('usuario.agregar');
    }

    public function clonarUsuario() {
        /* Get session user data */
        $user = Auth::user();
        /*Add this user to usuarios table */
        $usuario = new Usuario();
        $usuario->nombre = $user->name;
        $usuario->email = $user->email;
        $usuario->password = $user->password;
        $usuario->save();
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


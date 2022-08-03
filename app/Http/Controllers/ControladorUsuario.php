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


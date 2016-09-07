<?php

/*
 * 
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Hash;
use App\User;
use \Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    /**
     * Función que verifica la información del usaurio para iniciar sesión.
     * @return Redirect
     */
    function login() {
        $email = Input::get('email');
        $password = Input::get('pass');
        $url = "/";
        if (!empty($email) && !empty($password)) {
            $usuario = User::where('email', '=', $email)->first();
            if ($usuario) {
                $p = md5($password);
                //if (Hash::check($password, $usuario->password)) {
                if ($p === $usuario->password) {
                    Auth::loginUsingId($usuario->id);
                    $type = 'mensaje';
                    $msj = 'Ha iniciado Sesión.';
                    $url = "/administrar";
                } else {
                    $type = 'error';
                    $msj = 'No coinciden los datos de inicio, por favor verifiquelos e intente nuevamente.';
                    $url = "/administrar";
                }
            } else {
                $type = 'error';
                $msj = 'Los datos son incorrectos.';
                $url = "/administrar";
            }
        } else {
            $type = 'error';
            $msj = 'No se puede realizar la operación, faltan datos.';
            $url = "/administrar";
        }
        return redirect($url)->with($type, $msj);
    }

    /**
     * 
     * @return type
     */
    function getSignOut() {
        Auth::logout();
        return redirect('/administrar')->with('mensaje', 'Ha cerrado sesión.');
    }

    /**
     * Función que redirecciona al formulario de regisro de un usuario
     * @return type
     */
    function verUsuarios() {
        if (Auth::check()) {
            switch (Auth::user()->rol_id) {
                case 1:
                    $usuarios = User::all();
                    return view('administrador.usuarios_sistema.administrador_usuarios', ['usuarios' => $usuarios]);
                case 2:
                    return view('ventas_index');
            }
        } else {
            return view('home');
        }
    }

    /**
     * 
     * @return type
     */
    function verForm() {
        if (Auth::check()) {
            switch (Auth::user()->rol_id) {
                case 1:
                    return view('administrador.usuarios_sistema.administrador_crear_usuario');
                case 2:
                    return view('ventas_index');
            }
        } else {
            return view('home');
        }
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    function verFormEdit($id) {
        if (Auth::check()) {
            switch (Auth::user()->rol_id) {
                case 1:
                    if (!empty($id)) {
                        $usuario = User::findOrFail($id);
                        return view('administrador.usuarios_sistema.administrador_editar_usuario', ['user' => $usuario->user, 'id' => $usuario->id, 'rol' => $usuario->rol, 'email' => $usuario->email]);
                    } else {
                        return redirect('usuarios')->with('error', 'No se encuentran los datos especificados.');
                    }

                case 2:
                    return view('ventas_index');
            }
        } else {
            return view('home');
        }
    }

    /**
     * 
     * @return type
     */
    function editarUsuario() {
        if (Auth::check()) {
            switch (Auth::user()->rol_id) {
                case 1:
                    $id = Input::get('id');
                    $nombre = Input::get('nombre');
                    $email = Input::get('email');
                    $pass = Input::get('pass');
                    $rol = Input::get('rol');
                    $usuario = User::FindOrFail($id);

                    if (!empty($nombre)) {
                        $usuario->user = $nombre;
                    }
                    if (!empty($email)) {
                        $usuario->email = $email;
                    }
                    if (!empty($pass)) {
                        $usuario->password = md5($pass);
                    }
                    if ($rol !== 'x') {
                        $usuario->rol_id = $rol;
                    }
                    if ($usuario->save()) {
                        $key = "mensaje";
                        $mensaje = "Se ha editado exitosamente.";
                    } else {
                        $key = "error";
                        $mensaje = "Ha ocurrido un error interno, verifique e intentelo de nuevo.";
                    }

                    return redirect('usuarios')->with($key, $mensaje);
                case 2:
                    return view('ventas_index');
            }
        } else {
            return view('home');
        }
    }

    /**
     * Función que permite registrar un nuevo usuario para el sistema
     * @return redirect
     */
    function nuevo_usuario() {
        if (Auth::check()) {
            switch (Auth::user()->rol_id) {
                case 1:
                    $nombre = Input::get('nombre');
                    $email = Input::get('email');
                    $pass = Input::get('pass');
                    $rol = Input::get('rol');

                    if (!empty($nombre) && !empty($email) && !empty($pass) && $rol != "x") {
                        $usuario = new User();
                        $usuario->user = $nombre;
                        $usuario->email = $email;
                        $usuario->password = md5($pass);
                        $usuario->rol_id = $rol;
                        if ($usuario->save()) {
                            $key = "mensaje";
                            $mensaje = "Se ha registrado exitosamente.";
                        } else {
                            $key = "error";
                            $mensaje = "Ha ocurrido un error interno, verifique e intentelo de nuevo.";
                        }
                    } else {
                        $key = "error";
                        $mensaje = "No se puede completar la acción los datos estan incompletos.";
                    }
                    return redirect('usuarios')->with($key, $mensaje);
                case 2:
                    return view('ventas_index');
            }
        } else {
            return view('home');
        }
    }

    /**
     * Función que permite realizar la eliminación de un usuario
     * @return redirect
     */
    function eliminarUsuario() {
        if (Auth::check()) {
            switch (Auth::user()->rol_id) {
                case 1:
                    $id = Input::get('id');
                    $usuario = User::findOrFail($id);
                    if ($usuario->delete()) {
                        $key = "mensaje";
                        $mensaje = "Se ha eliminado exitosamente.";
                    }
                    return redirect('usuarios')->with($key, $mensaje);
                case 2:
                    return view('ventas_index');
            }
        } else {
            return view('home');
        }
    }

}

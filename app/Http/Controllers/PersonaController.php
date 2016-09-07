<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Hash;
use App\Models\Arrendatario;
use App\Models\Codeudor;
use App\Models\Persona;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use PhpSpec\Exception\Exception;
use NumeroALetras;

class PersonaController extends Controller {

     public function __construct() {
         $this->middleware('auth');
    }

    /**
     *
     * @return type
     */
    function arrendatarios() {
        if (Auth::check()) {
            $arrendatarios = DB::table('persona')
                    ->join('arrendatario', 'persona.id', '=', 'arrendatario.persona_id')
                    ->paginate(15);
            return view('administrador.personas.administrador_arrendatarios', ['arrendatarios' => $arrendatarios]);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @return type
     */
    function verFormCrearArrendatario() {
        if (Auth::check()) {
            return view('administrador.personas.administrador_arrendatario_crear');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @return type
     */
    function guardarNuevoArrendatario() {
        if (Auth::check()) {
            //Datos persona
            $nit = Input::get('nit');
            error_log("nit - $nit");
            $nombres = Input::get('nombres');
            error_log("nombres - $nombres");
            $apellidos = Input::get('apellidos');
            error_log("apellidos - $apellidos");
            $telefono = Input::get('telefono');
            error_log("telefono - $telefono");
            $email = Input::get('email');
            error_log("email - $email");
            $profesion = Input::get('profesion');
            error_log("profesion - $profesion");
            $labora_en = Input::get('labora_en');
            error_log("laboraen - $labora_en");
            $direccion_labora = Input::get('direccion_labora');
            error_log("direccionlabora - $direccion_labora");
            $telefono_labora = Input::get('telefono_labora');
            error_log("tellabora - $telefono_labora");

            //Datos Arrendatario
            $ingreso_mensual = Input::get('ingreso_mensual');
            error_log("ingreso - $ingreso_mensual");
            $numero_registro_camara_comercio = Input::get('numero_registro_camara_comercio');
            error_log("camara  - $numero_registro_camara_comercio");
            $referencia_bancaria = Input::get('referencia_bancaria');
            error_log("refbancaria - $referencia_bancaria");
            $cuenta_corriente = Input::get('cuenta_corriente');
            error_log("corriente - $cuenta_corriente");
            $cuenta_ahorroros = Input::get('cuenta_ahorroros');
            error_log("ahorros - $cuenta_ahorroros");
            $referencia_comercial = Input::get('referencia_comercial');
            error_log("refcomenrcial - $referencia_comercial");
            $telefono_ref_comercial = Input::get('telefono_ref_comercial');
            error_log("telrefcomercial - $telefono_ref_comercial");
            $referencia_personal = Input::get('referencia_personal');
            error_log("refpersonal - $referencia_personal");
            $telefono_ref_personal = Input::get('telefono_ref_personal');
            error_log("telrefpersonal - $telefono_ref_personal");

            if (!empty($nit) && !empty($nombres) && !empty($apellidos) && !empty($telefono) && !empty($telefono) && !empty($email) && !empty($profesion) && !empty($labora_en) && !empty($direccion_labora) && !empty($direccion_labora) && !empty($telefono_labora) && !empty($ingreso_mensual) && !empty($numero_registro_camara_comercio) && !empty($referencia_bancaria) && !empty($cuenta_corriente) && !empty($cuenta_ahorroros) && !empty($referencia_comercial) && !empty($telefono_ref_comercial) && !empty($referencia_personal) && !empty($telefono_ref_personal)) {
                //GUARDO LA PERSONA
                try {
                    $persona = new Persona();
                    $persona->nit = $nit;
                    $persona->nombre = $nombres;
                    $persona->apellido = $apellidos;
                    $persona->telefono = $telefono;
                    $persona->correo = $email;
                    $persona->profesion = $profesion;
                    $persona->labora_en = $labora_en;
                    $persona->direccion_labora = $direccion_labora;
                    $persona->telefono_labora = $telefono_labora;
                    if ($persona->save()) {
                        $arrendatario = new Arrendatario();
                        $arrendatario->ingreso_mensual = $ingreso_mensual;
                        $arrendatario->numero_registro_camara_comercio = $numero_registro_camara_comercio;
                        $arrendatario->referencia_bancaria = $referencia_bancaria;
                        $arrendatario->cuenta_corriente = $cuenta_corriente;
                        $arrendatario->cuenta_ahorroros = $cuenta_ahorroros;
                        $arrendatario->referencia_comercial = $referencia_comercial;
                        $arrendatario->telefono_ref_comercial = $telefono_ref_comercial;
                        $arrendatario->referencia_personal = $referencia_personal;
                        $arrendatario->telefono_ref_personal = $telefono_ref_personal;
                        $arrendatario->persona_id = $persona->id;
                        if ($arrendatario->save()) {
                            $url = "personas/arrendatarios";
                            $key = 'mensaje';
                            $mensaje = 'Se ha registrado el arrendatario exitosamente.';
                        } else {
                            $url = "personas/arrendatarios";
                            $key = 'error';
                            $mensaje = 'No se ha registrado el arrendatario, por favor, verifique e intentelo de nuevo.';
                            $persona->delete();
                        }
                    } else {
                        $url = "personas/arrendatarios";
                        $key = 'error';
                        $mensaje = 'Ha ocurrido un error interno, por favor, verifique e intenlo de nuevo, si el problema persiste, comuníquese con el administrador de la página a fabianbustamabe@gmail.com.';
                    }
                } catch (Exception $e) {
                    $url = "personas/arrendatarios";
                    $key = 'error';
                    $mensaje = 'Ha ocurrido un error interno, por favor verifique e intentelo de nuevo.';
                }
            } else {
                $url = "personas/arrendatario/crear";
                $key = 'error';
                $mensaje = 'Los datos están incompletos.';
            }
            return redirect($url)->with($key, $mensaje);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @return type
     */
    function eliminarArrendatario() {
        if (Auth::check()) {
            $id_p = Input::get('id_p');
            if (!empty($id_p)) {
                $arrendatario = Arrendatario::FindOrFail($id_p);
                if ($arrendatario->delete()) {
                    $persona = Persona::FindOrFail($arrendatario->persona_id);
                    $persona->delete();
                    $key = "mensaje";
                    $mensaje = "Se ha eliminado.";
                }
            } else {

            }
            return redirect('personas/arrendatarios')->with($key, $mensaje);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @param type $id
     * @return type
     */
    function verFormEditarArrendatario($id) {
        if (Auth::check()) {
            if (!empty($id)) {
                $arrendatario = Arrendatario::FindOrFail($id);
                $persona = Persona::FindOrFail($arrendatario->persona_id);

                return view('administrador.personas.administrador_arrendatario_editar', [
                    'p_id' => $persona->id,
                    'p_nombres' => $persona->nombre,
                    'p_apellidos' => $persona->apellido,
                    'p_nit' => $persona->nit,
                    'p_telefono' => $persona->telefono,
                    'p_correo' => $persona->correo,
                    'p_profesion' => $persona->profesion,
                    'p_labora_en' => $persona->labora_en,
                    'p_direccion_labora' => $persona->direccion_labora,
                    'p_telefono_labora' => $persona->telefono_labora,
                    'p_direccion_residencia' => $persona->direccion_residencia,
                    'a_ingreso_mensual' => $arrendatario->ingreso_mensual,
                    'a_numero_registro_camara_comercio' => $arrendatario->numero_registro_camara_comercio,
                    'a_referencia_bancaria' => $arrendatario->referencia_bancaria,
                    'a_cuenta_corriente' => $arrendatario->cuenta_corriente,
                    'a_cuenta_ahorroros' => $arrendatario->cuenta_ahorroros,
                    'a_referencia_comercial' => $arrendatario->referencia_comercial,
                    'a_telefono_ref_comercial' => $arrendatario->telefono_ref_comercial,
                    'a_referencia_personal' => $arrendatario->referencia_personal,
                    'a_telefono_ref_personal' => $arrendatario->telefono_ref_personal,
                    'a_id' => $arrendatario->id
                ]);
            }
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @return type
     */
    function editarArrendatario() {
        if (Auth::check()) {
            $id_p = Input::get('id_p');
            $id_a = Input::get('id_a');
            if (!empty($id_a) && !empty($id_p)) {
                $nit = Input::get('nit');
                $nombre = Input::get('nombres');
                $apellido = Input::get('apellidos');
                $telefono = Input::get('telefono');
                $correo = Input::get('correo');
                $profesion = Input::get('profesion');
                $labora_en = Input::get('labora_en');
                $direccion_labora = Input::get('direccion_labora');
                $telefono_labora = Input::get('telefono_labora');
                $direccion_residencia = Input::get('direccion_residencia');

                $persona = Persona::FindOrFail($id_p);
                if (!empty($nit)) {
                    $persona->nit = $nit;
                }
                if (!empty($nombre)) {
                    $persona->nombre = $nombre;
                }
                if (!empty($apellido)) {
                    $persona->apellido = $apellido;
                }
                if (!empty($telefono)) {
                    $persona->telefono = $telefono;
                }
                if (!empty($correo)) {
                    $persona->correo = $correo;
                }
                if (!empty($profesion)) {
                    $persona->profesion = $profesion;
                }
                if (!empty($labora_en)) {
                    $persona->labora_en = $labora_en;
                }
                if (!empty($direccion_labora)) {
                    $persona->direccion_labora = $direccion_labora;
                }
                if (!empty($telefono_labora)) {
                    $persona->telefono_labora = $telefono_labora;
                }
                if (!empty($direccion_residencia)) {
                    $persona->direccion_residencia = $direccion_residencia;
                }

                $persona->save();

                $ingreso_mensual = Input::get('ingreso_mensual');
                $numero_registro_camara_comercio = Input::get('numero_registro_camara_comercio');
                $referencia_bancaria = Input::get('referencia_bancaria');
                $cuenta_corriente = Input::get('cuenta_corriente');
                $cuenta_ahorroros = Input::Get('cuenta_ahorroros');
                $referencia_comercial = Input::get('referencia_comercial');
                $telefono_ref_comercial = Input::get('telefono_ref_comercial');
                $referencia_personal = Input::get('referencia_personal');
                $telefono_ref_personal = Input::get('telefono_ref_personal');

                $arrendatario = Arrendatario::FindOrFail($id_a);
                if (!empty($ingreso_mensual)) {
                    $arrendatario->ingreso_mensual = $ingreso_mensual;
                }
                if (!empty($numero_registro_camara_comercio)) {
                    $arrendatario->numero_registro_camara_comercio = $numero_registro_camara_comercio;
                }
                if (!empty($referencia_bancaria)) {
                    $arrendatario->referencia_bancaria = $referencia_bancaria;
                }
                if (!empty($cuenta_corriente)) {
                    $arrendatario->cuenta_corriente = $cuenta_corriente;
                }
                if (!empty($cuenta_ahorroros)) {
                    $arrendatario->cuenta_ahorroros = $cuenta_ahorroros;
                }
                if (!empty($referencia_comercial)) {
                    $arrendatario->referencia_comercial = $referencia_comercial;
                }
                if (!empty($telefono_ref_comercial)) {
                    $arrendatario->telefono_ref_comercial = $telefono_ref_comercial;
                }
                if (!empty($referencia_personal)) {
                    $arrendatario->referencia_personal = $referencia_personal;
                }
                if (!empty($telefono_ref_personal)) {
                    $arrendatario->telefono_ref_personal = $telefono_ref_personal;
                }

                $arrendatario->save();
                $key = "mensaje";
                $mensaje = "Se ha editado.";
            } else {
                $key = "error";
                $mensaje = "No se puede completar la acción.";
            }
            return redirect('personas/arrendatarios')->with($key, $mensaje);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /*     * ************
     * **********
     * CODEUDORES
     * ************
     * *********** */

    /**
     *
     * @return type
     */
    function codeudores() {
        if (Auth::check()) {
            $codeudores = DB::table('persona')
                    ->join('codeudor', 'persona.id', '=', 'codeudor.persona_id')
                    ->paginate(15);
            return view('administrador.personas.administrador_codeudores', ['codeudores' => $codeudores]);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @return type
     */
    function verFormCrearCodeudor() {
        if (Auth::check()) {
            return view('administrador.personas.administrador_codeudor_crear');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function guardarNuevoCodeudor() {
        if (Auth::check()) {
            //Datos persona
            $nit = Input::get('nit');
            $nombres = Input::get('nombres');
            $apellidos = Input::get('apellidos');
            $telefono = Input::get('telefono');
            $email = Input::get('email');
            $profesion = Input::get('profesion');
            $labora_en = Input::get('labora_en');
            $direccion_labora = Input::get('direccion_labora');
            $telefono_labora = Input::get('telefono_labora');
            $direccion_residencia = Input::get('direccion_residencia');

            //Datos Arrendatario
            $ingreso_mensual = Input::get('ingreso_mensual');
            $cargo = Input::get('cargo');
            $referencia_bancaria = Input::get('referencia_bancaria');
            $cuenta_corriente = Input::get('cuenta_corriente');
            $cuenta_ahorroros = Input::get('cuenta_ahorroros');
            $referencia_comercial = Input::get('referencia_comercial');
            $telefono_ref_comercial = Input::get('telefono_ref_comercial');
            $referencia_personal = Input::get('referencia_personal');
            $telefono_ref_personal = Input::get('telefono_ref_personal');
            $finca_raiz_direccion = Input::get('finca_raiz_direccion');
            $matricula_inmobiliaria = Input::get('matricula_inmobiliaria');

            if (!empty($nit) && !empty($nombres) && !empty($apellidos) && !empty($telefono) && !empty($telefono) && !empty($email) && !empty($profesion) && !empty($labora_en) && !empty($direccion_labora) && !empty($direccion_labora) && !empty($telefono_labora) && !empty($direccion_residencia) && !empty($ingreso_mensual) && !empty($cargo) && !empty($referencia_bancaria) && !empty($cuenta_corriente) && !empty($cuenta_ahorroros) && !empty($referencia_comercial) && !empty($telefono_ref_comercial) && !empty($referencia_personal) && !empty($telefono_ref_personal)) {
                //GUARDO LA PERSONA
                $persona = new Persona();
                $persona->nit = $nit;
                $persona->nombre = $nombres;
                $persona->apellido = $apellidos;
                $persona->telefono = $telefono;
                $persona->correo = $email;
                $persona->profesion = $profesion;
                $persona->labora_en = $labora_en;
                $persona->direccion_labora = $direccion_labora;
                $persona->telefono_labora = $telefono_labora;
                $persona->direccion_residencia = $direccion_residencia;
                if ($persona->save()) {
                    $codeudor = new Codeudor();
                    $codeudor->ingresos = $ingreso_mensual;
                    $codeudor->cargo = $cargo;
                    $codeudor->referencia_bancaria = $referencia_bancaria;
                    $codeudor->cuenta_corriente = $cuenta_corriente;
                    $codeudor->cuenta_ahorros = $cuenta_ahorroros;
                    $codeudor->referencia_comercial = $referencia_comercial;
                    $codeudor->telefono_ref_comercial = $telefono_ref_comercial;
                    $codeudor->referencia_personal = $referencia_personal;
                    $codeudor->telefono_ref_personal = $telefono_ref_personal;
                    $codeudor->finca_raiz_direccion = $finca_raiz_direccion;
                    $codeudor->matricula_inmobiliaria = $matricula_inmobiliaria;
                    $codeudor->persona_id = $persona->id;
                    if ($codeudor->save()) {
                        $url = "presonas/codeudores";
                        $key = 'mensaje';
                        $mensaje = 'Se ha registrado el arrendatario exitosamente.';
                    } else {

                    }
                } else {

                }
            } else {
                $url = "personas/codeudor/crear";
                $key = 'error';
                $mensaje = 'Los datos están incompletos.';
            }
            return redirect($url)->with($key, $mensaje);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function eliminarCodeudor() {
        if (Auth::check()) {
            $id_p = Input::get('id_p');
            if (!empty($id_p)) {
                $codeudor = Codeudor::FindOrFail($id_p);
                if ($codeudor->delete()) {
                    $persona = Persona::FindOrFail($codeudor->persona_id);
                    $persona->delete();
                    $key = "mensaje";
                    $mensaje = "Se ha eliminado.";
                }
            } else {

            }
            return redirect('presonas/codeudores')->with($key, $mensaje);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function verFormEditarCodeudor($id_c) {
        if (Auth::check()) {
            if (!empty($id_c)) {
                $codeudor = Codeudor::FindOrFail($id_c);
                $persona = Persona::FindOrFail($codeudor->persona_id);
                return view('administrador.personas.administrador_codeudor_editar', [
                    'p_id' => $persona->id,
                    'p_nombres' => $persona->nombre,
                    'p_apellidos' => $persona->apellido,
                    'p_nit' => $persona->nit,
                    'p_telefono' => $persona->telefono,
                    'p_correo' => $persona->correo,
                    'p_profesion' => $persona->profesion,
                    'p_labora_en' => $persona->labora_en,
                    'p_direccion_labora' => $persona->direccion_labora,
                    'p_telefono_labora' => $persona->telefono_labora,
                    'p_direccion_residencia' => $persona->direccion_residencia,
                    'c_id' => $codeudor->id,
                    'c_ingresos' => $codeudor->ingresos,
                    'c_cargo' => $codeudor->cargo,
                    'c_referencia_bancaria' => $codeudor->referencia_bancaria,
                    'c_cuenta_corriente' => $codeudor->cuenta_corriente,
                    'c_cuenta_ahorros' => $codeudor->cuenta_ahorros,
                    'c_referencia_comercial' => $codeudor->referencia_comercial,
                    'c_telefono_ref_comercial' => $codeudor->telefono_ref_comercial,
                    'c_referencia_personal' => $codeudor->referencia_personal,
                    'c_telefono_ref_personal' => $codeudor->telefono_ref_personal,
                    'c_finca_raiz_direccion' => $codeudor->finca_raiz_direccion,
                    'c_matricula_inmobiliaria' => $codeudor->matricula_inmobiliaria,
                ]);
            } else {
                return redirect('presonas/codeudores')->with('error', 'No se reconoce el codeudor específicado');
            }
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function editarCodeudor() {
        if (Auth::check()) {
            $id_p = Input::get('p_id');
            $id_c = Input::get('c_id');
            if (!empty($id_p) && !empty($id_c)) {
                $persona = Persona::FindOrFail($id_p);
                $nit = Input::get('nit');
                if (!empty($nit)) {
                    $persona->nit = $nit;
                }
                $nombre = Input::get('nombres');
                if (!empty($nombre)) {
                    $persona->nombre = $nombre;
                }
                $apellido = Input::get('apellidos');
                if (!empty($apellido)) {
                    $persona->apellido = $apellido;
                }
                $telefono = Input::get('telefono');
                if (!empty($telefono)) {
                    $persona->telefono = $telefono;
                }
                $correo = Input::get('email');
                if (!empty($correo)) {
                    $persona->correo = $correo;
                }
                $profesion = Input::get('profesion');
                if (!empty($profesion)) {
                    $persona->profesion = $profesion;
                }
                $labora_en = Input::get('labora_en');
                if (!empty($labora_en)) {
                    $persona->labora_en = $labora_en;
                }
                $direccion_labora = Input::get('direccion_labora');
                if (!empty($direccion_labora)) {
                    $persona->direccion_labora = $direccion_labora;
                }
                $telefono_labora = Input::get('telefono_labora');
                if (!empty($telefono_labora)) {
                    $persona->telefono_labora = $telefono_labora;
                }
                $direccion_residencia = Input::get('direccion_residencia');
                if (!empty($direccion_residencia)) {
                    $persona->direccion_residencia = $direccion_residencia;
                }
                $persona->save();
                $codeudor = Codeudor::FindOrFail($id_c);
                $ingresos = Input::get('ingreso_mensual');
                if (!empty($ingresos)) {
                    $codeudor->ingresos = $ingresos;
                }
                $cargo = Input::get('cargo');
                if (!empty($cargo)) {
                    $codeudor->cargo = $cargo;
                }
                $referencia_bancaria = Input::get('referencia_bancaria');
                if (!empty($referencia_bancaria)) {
                    $codeudor->referencia_bancaria = $referencia_bancaria;
                }
                $cuenta_corriente = Input::get('cuenta_corriente');
                if (!empty($cuenta_corriente)) {
                    $codeudor->cuenta_corriente = $cuenta_corriente;
                }
                $cuenta_ahorros = Input::get('cuenta_ahorroros');
                if (!empty($cuenta_ahorros)) {
                    $codeudor->cuenta_ahorros = $cuenta_ahorros;
                }
                $referencia_comercial = Input::get('referencia_comercial');
                if (!empty($referencia_comercial)) {
                    $codeudor->referencia_comercial = $referencia_comercial;
                }
                $telefono_ref_comercial = Input::get('telefono_ref_comercial');
                if (!empty($telefono_ref_comercial)) {
                    $codeudor->telefono_ref_comercial = $telefono_ref_comercial;
                }
                $referencia_personal = Input::get('referencia_personal');
                if (!empty($referencia_personal)) {
                    $codeudor->referencia_personal = $referencia_personal;
                }
                $telefono_ref_personal = Input::get('telefono_ref_personal');
                if (!empty($telefono_ref_personal)) {
                    $codeudor->telefono_ref_personal = $telefono_ref_personal;
                }
                $finca_raiz_direccion = Input::get('finca_raiz_direccion');
                if (!empty($finca_raiz_direccion)) {
                    $codeudor->finca_raiz_direccion = $finca_raiz_direccion;
                }
                $matricula_inmobiliaria = Input::get('matricula_inmobiliaria');
                if (!empty($matricula_inmobiliaria)) {
                    $codeudor->matricula_inmobiliaria = $matricula_inmobiliaria;
                }
                $codeudor->save();
                return redirect('presonas/codeudores')->with('mensaje', 'Se ha registrado exitosamente.');
            } else {
                return redirect('presonas/codeudores')->with('error', 'No se reconoce el codeudor específicado');
            }
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @param type $nit
     * @return type
     */
    function getArrendatarioByNit($nit) {
        if ($nit) {
            $arrendatarios = DB::table('persona')
                    ->join('arrendatario', 'arrendatario.persona_id', '=', 'persona.id')
                    ->where('persona.nit', '=', $nit)
                    ->where('arrendatario.estado', '=', '0')
                    ->select(
                            'arrendatario.id as id_arrendatario', 'persona.nit as nit_persona', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.profesion as profesion', 'arrendatario.ingreso_mensual as ingresos_mensuales', 'persona.telefono'
                    )
                    ->first();
            return json_encode($arrendatarios);
        }
    }

	function getArrendatarios($nit) {
        if (Auth::check()) {
            if (!empty($nit)) {
                $arrendatarios = DB::table('persona')
						->join('arrendatario', 'arrendatario.persona_id', '=', 'persona.id')
						->where('persona.nit', '=', $nit)
						->select(
								'arrendatario.id as id', 'persona.nit as nit_persona', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.telefono as telefono', 'persona.correo as correo'
						)->get();

                $mostrar = "";
                $url = url('/');
                foreach ($arrendatarios as $user) {
				        $mostrar .= '<tr>';
                        $mostrar .= '<td>{{ "' .$user->nit_persona. '" }}</td>';
                        $mostrar .= '<td>{{ "' .$user->nombre. '" }}</td>';
                        $mostrar .= '<td>{{ "' .$user->apellido. '" }}</td>';
                        $mostrar .= '<td>{{ "' .$user->telefono. '" }}</td>';
						$mostrar .= '<td>{{ "' .$user->correo. '" }}</td>';
						$mostrar .= '<td><a class="btn btn-default" href="{{URL::to("personas/arrendatario/editar/"."' .$user->id. '")}}"><i class="fa fa-edit"></i></a></td>';
                        $mostrar .= '<td><a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="confirmar("' . $user->id . '", "' .$user->id .'", "' . $user->nombre . $user->apellido . '")"><i class="fa fa-close"></i></a></td>';
                        $mostrar .= '<td><a class="btn btn-info" data-toggle="modal" data-target="#informacion" onclick="datos("' . $user->nombre . $user->apellido . '", "' . $user->profesion . '", "' . $user->nit . '", "' . $user->telefono . '", "' . $user->correo . '", "' . $user->labora_en . '", "' . $user->telefono_labora . '", "' . $user->direccion_labora . '", "' . $user->direccion_residencia . '", "' . $user->ingreso_mensual . '", "' . $user->numero_registro_camara_comercio . '", "' . $user->referencia_bancaria . '", "' . $user->cuenta_corriente . '", "' . $user->cuenta_ahorroros . '", "' . $user->referencia_comercial . '", "' . $user->telefono_ref_comercial . '", "' . $user->referencia_personal . '", "' . $user->telefono_ref_personal . '")"><i class="fa fa-info"></i></a></td>';
                    $mostrar .= '</tr>';
                    $mostrar .= '@endforeach';
                $mostrar .= '</tbody>';
                $mostrar .= '<tfoot>';
            $mostrar .= '<tr>';
				$mostrar .= '<th>NIT</th>';
				$mostrar .= '<th>NOMBRES</th>';
				$mostrar .= '<th>APELLIDOS</th>';
				$mostrar .= '<th>TELEFONO</th>';
				$mostrar .= '<th>EMAIL</th>';
				$mostrar .= '<th colspan="3">OPCIONES</th>';
                $mostrar .= '</tr>';
                $mostrar .= '</tfoot>';
              $mostrar .= '</table>';                   
                }
            } else {
                $mostrar = "No se encuentran datos...";
            }
            return $mostrar;
        }

        return redirect('/administrar')->with('error', 'Debe iniciar sesión');
    }

    /**
     * función que devuelve la informacion de un codeudor
     * @param $nit
     */
    function getCodeudorByNit($nit) {
        if ($nit) {
            $arrendatarios = DB::table('persona')
                    ->join('codeudor', 'codeudor.persona_id', '=', 'persona.id')
                    ->where('persona.nit', '=', $nit)
                    ->select(
                            'codeudor.id as id_codeudor', 'persona.nit as nit_codeudor', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.profesion as profesion', 'codeudor.ingresos as ingresos_mensuales'
                    )
                    ->first();
            return json_encode($arrendatarios);
        }
    }

    function getCodeudor2ByNit($nit) {
        if ($nit) {
            $arrendatarios = DB::table('persona')
                    ->join('codeudor', 'codeudor.persona_id', '=', 'persona.id')
                    ->where('persona.nit', '=', $nit)
                    ->select(
                            'codeudor.id as id_codeudor2', 'persona.nit as nit_codeudor', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.profesion as profesion', 'codeudor.ingresos as ingresos_mensuales'
                    )
                    ->first();
            return json_encode($arrendatarios);
        }
    }


    function comprobante_ingreso_traer($id_arriendo) {
        if (Auth::check()) {
            $arriendo = \App\Models\Arriendo::find($id_arriendo);
            $valorletra = NumeroALetras::convertir($arriendo->valor_arriendo);
            $arrendatario = DB::table('arriendo')
                            ->join('arrendatario', 'arriendo.arrendatario_id', '=', 'arrendatario.id')
                            ->join('propiedad', 'arriendo.propiedad_id', '=', 'propiedad.id')
                            ->join('persona', 'arrendatario.persona_id', '=', 'persona.id')
                            ->get();





            return view('administrador.comprobante.ingreso-traer')->with('arriendo', $arriendo)->with('valorletra', $valorletra)->with('arrendatario', $arrendatario);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }
    function print_comprobante_ingreso_traer() {
        $cantidad_inputs = Input::get('cantidad_inputs');
        $array = array();
        for ($i = 1; $cantidad_inputs >= $i; $i++) {
            $codigo = Input::get("codigo_$i");
            $cuenta = Input::get("cuenta_$i");
            $debitos = Input::get("debitos_$i");
            $creditos = Input::get("creditos_$i");
            array_push($array, array(
                "codigo" => $codigo,
                "cuenta" => $cuenta,
                "debitos" => $debitos,
                "creditos" => $creditos
            ));
        }
        $numero_comprobante = Input::get('numero_comprobante');
        $cantidad_fecha = Input::get('cantidad_fecha');
        $recibido_de = Input::get('recibido_de');
        $otro = Input::get('otro');
        $total = Input::get('total');
        $la_suma_de = Input::get('la_suma_de');
        $cheque_no = Input::get('cheque_no');
        $banco = Input::get('banco');
        $sucursal = Input::get('sucursal');
        $efectivo = Input::get('efectivo');
        $concepto_de = Input::get('concepto_de');
        $codigo = Input::get("codigo");
        $cuenta = Input::get("cuenta");
        $debitos = Input::get("debitos");
        $creditos = Input::get("creditos");

        return view('administrador.comprobante.ingreso_print_traer', [
            'cantidad_inputs' => $array,
            'numero_comprobante' => $numero_comprobante,
            'cantidad_fecha' => $cantidad_fecha,
            'recibido_de' => $recibido_de,
            'otro' => $otro,
            'total' => $total,
            'la_suma_de' => $la_suma_de,
            'cheque_no' => $cheque_no,
            'banco' => $banco,
            'sucursal' => $sucursal,
            'efectivo' => $efectivo,
            'concepto_de' => $concepto_de,
            'codigo' => $codigo,
            'cuenta' => $cuenta,
            'debitos' => $debitos,
            'creditos' => $creditos
        ]);
    }




    function comprobante_ingreso() {
        if (Auth::check()) {
            return view('administrador.comprobante.ingreso');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function print_comprobante_ingreso() {
        $cantidad_inputs = Input::get('cantidad_inputs');
        $array = array();
        for ($i = 1; $cantidad_inputs >= $i; $i++) {
            $codigo = Input::get("codigo_$i");
            $cuenta = Input::get("cuenta_$i");
            $debitos = Input::get("debitos_$i");
            $creditos = Input::get("creditos_$i");
            array_push($array, array(
                "codigo" => $codigo,
                "cuenta" => $cuenta,
                "debitos" => $debitos,
                "creditos" => $creditos
            ));
        }
        $numero_comprobante = Input::get('numero_comprobante');
        $cantidad_fecha = Input::get('cantidad_fecha');
        $recibido_de = Input::get('recibido_de');
        $otro = Input::get('otro');
        $total = Input::get('total');
        $la_suma_de = Input::get('la_suma_de');
        $cheque_no = Input::get('cheque_no');
        $banco = Input::get('banco');
        $sucursal = Input::get('sucursal');
        $efectivo = Input::get('efectivo');
        $concepto_de = Input::get('concepto_de');
        $codigo = Input::get("codigo");
        $cuenta = Input::get("cuenta");
        $debitos = Input::get("debitos");
        $creditos = Input::get("creditos");

        return view('administrador.comprobante.ingreso_print', [
            'cantidad_inputs' => $array,
            'numero_comprobante' => $numero_comprobante,
            'cantidad_fecha' => $cantidad_fecha,
            'recibido_de' => $recibido_de,
            'otro' => $otro,
            'total' => $total,
            'la_suma_de' => $la_suma_de,
            'cheque_no' => $cheque_no,
            'banco' => $banco,
            'sucursal' => $sucursal,
            'efectivo' => $efectivo,
            'concepto_de' => $concepto_de,
            'codigo' => $codigo,
            'cuenta' => $cuenta,
            'debitos' => $debitos,
            'creditos' => $creditos
        ]);
    }

    /**
     * función que devuelve si existe o no una persona con el nit indicado
     * @param $nit -> nit de la persona a registrar
     * @return int -> 0 si existe y 1 si no.
     */
    function existePersonaByNit($nit) {
        if (!empty($nit)) {
            $persona = Persona::where('nit', '=', $nit)->first();
            if ($persona) {
                return 0;
            }
        }
        return 1;
    }

    function comprobante_egreso() {
        if (Auth::check()) {
            return view('administrador.comprobante.egreso');
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function print_comprobante_egreso() {
        $cantidad_inputs = Input::get('cantidad_inputs');
        $array = array();
        for ($i = 1; $cantidad_inputs >= $i; $i++) {
            $codigo = Input::get("codigo_$i");
            $cuenta = Input::get("cuenta_$i");
            $debitos = Input::get("debitos_$i");
            $creditos = Input::get("creditos_$i");
            array_push($array, array(
                "codigo" => $codigo,
                "cuenta" => $cuenta,
                "debitos" => $debitos,
                "creditos" => $creditos
            ));
        }
        $numero_comprobante = Input::get('numero_comprobante');
        $cantidad_fecha = Input::get('cantidad_fecha');
        $recibido_de = Input::get('recibido_de');
        $concepto_de =  Input::get('concepto_de');
        $arrendatario =  Input::get('arrendatario');
        $valor_arrendatario =  Input::get('valor_arrendatario');
        $comision =  Input::get('comision');
        $valor_comision =  Input::get('valor_comision');
        $iva =  Input::get('iva');
        $valor_iva =  Input::get('valor_iva');
        $total =  Input::get('total');
        $cheque_no =  Input::get('cheque_no');
        $banco =  Input::get('banco');
        $sucursal =  Input::get('sucursal');
        $efectivo =  Input::get('efectivo');
        $codigo = Input::get("codigo");
        $cuenta = Input::get("cuenta");
        $debitos = Input::get("debitos");
        $creditos = Input::get("creditos");

        return view('administrador.comprobante.egreso_print', [
            'cantidad_inputs' => $array,
            'numero_comprobante' => $numero_comprobante,
            'cantidad_fecha' => $cantidad_fecha,
            'recibido_de' => $recibido_de,
            'concepto_de' => $concepto_de,
            'arrendatario' => $arrendatario,
            'valor_arrendatario' => $valor_arrendatario,
            'comision' => $comision,
            'valor_comision' => $valor_comision,
            'iva' => $iva,
            'valor_iva' => $valor_iva,
            'total' => $total,
            'cheque_no' => $cheque_no,
            'banco' => $banco,
            'sucursal' => $sucursal,
            'efectivo' => $efectivo,
            'codigo' => $codigo,
            'cuenta' => $cuenta,
            'debitos' => $debitos,
            'creditos' => $creditos
        ]);
    }

    function verPropietario($nit) {
        if (!empty($nit)) {
            $persona = Persona::where('nit', '=', $nit)->first();
            if (!$persona) {
                return json_encode(array('mensaje' => 'fail_p'));
            }
            return json_encode(
                    array(
                        'mensaje' => 'ok',
                        'id' => $persona->id,
                        'nombres' => $persona->nombre,
                        'apellidos' => $persona->apellido,
                        'telefono' => $persona->telefono,
                        'email' => $persona->correo,
                        'profesion' => $persona->profesion,
                        'labora_en' => $persona->labora_en,
                        'direccion_labora' => $persona->direccion_labora,
                        'telefono_labora' => $persona->telefono_labora,
                        'direccion_residencia' => $persona->direccion_residencia
            ));
        }
        return json_encode(array('mensaje' => 'fail'));
    }

    function verCodeudor($nit) {

    }

}

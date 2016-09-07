<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Arrendatario;
use App\Models\PropiedadDesactivada;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use \App\Models\TipoPropiedad;
use Illuminate\Http\Request;
use \App\Models\Persona;
use \App\Models\Propiedad;
use \App\Models\Arriendo;
use \App\Models\Codeudor;
use App\Models\Factura;
use Carbon\Carbon;
use DateTime;
use NumeroALetras;

class PropiedadController extends Controller {

    /**
     *
     * @return type
     */
    function propiedades() {
        if (Auth::check()) {
            $propiedades = DB::table('propiedad')
                    ->join('tipo_propiedad', 'tipo_propiedad.id', '=', 'propiedad.tipo_propiedad_id')
                    ->join('persona', 'persona.id', '=', 'propiedad.persona_id')
                    ->select(
                            'propiedad.descripcion', 'propiedad.estado', 'propiedad.proposito', 'propiedad.id as id', 'propiedad.direccion as direccion', 'propiedad.barrio as barrio', 'propiedad.valor_arriendo as valor_arriendo', 'propiedad.valor_condominio as valor_condominio', 'propiedad.area as area', 'propiedad.numero_escritura as numero_escritura', 'propiedad.estrato as estrato', 'propiedad.imagen_principal as imagen_principal', 'propiedad.imagen1 as imagen1', 'propiedad.imagen2 as imagen2', 'propiedad.imagen3 as imagen3', 'propiedad.imagen4 as imagen4', 'tipo_propiedad.nombre as nombre_tp', 'persona.id as id_persona', 'persona.nit as nit', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.telefono as telefono', 'persona.correo as correo'
                    )
                    ->paginate(12);
            $barrios = DB::table('propiedad')->get();
            return view('administrador.propiedades.administrador_propiedades', ['propiedades' => $propiedades, 'barrios' => $barrios]);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function propiedadesVentas() {
        if (Auth::check()) {
            $propiedades = DB::table('propiedad')
                    ->join('tipo_propiedad', 'tipo_propiedad.id', '=', 'propiedad.tipo_propiedad_id')
                    ->join('persona', 'persona.id', '=', 'propiedad.persona_id')
                    ->where('propiedad.proposito', '=', 'Vende')
                    ->select(
                            'propiedad.descripcion', 'propiedad.estado', 'propiedad.proposito', 'propiedad.id as id', 'propiedad.direccion as direccion', 'propiedad.barrio as barrio', 'propiedad.valor_arriendo as valor_arriendo', 'propiedad.valor_condominio as valor_condominio', 'propiedad.area as area', 'propiedad.numero_escritura as numero_escritura', 'propiedad.estrato as estrato', 'propiedad.imagen_principal as imagen_principal', 'propiedad.imagen1 as imagen1', 'propiedad.imagen2 as imagen2', 'propiedad.imagen3 as imagen3', 'propiedad.imagen4 as imagen4', 'tipo_propiedad.nombre as nombre_tp', 'persona.id as id_persona', 'persona.nit as nit', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.telefono as telefono', 'persona.correo as correo'
                    )
                    ->paginate(12);
            $barrios = DB::table('propiedad')->select('barrio')->where('proposito', '=', 'Vende')->distinct()->get();
            return view('administrador.propiedades.administrador_propiedades_venta', ['barrios' => $barrios, 'propiedades' => $propiedades]);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @return type
     */
    function verFromCrearPropiedad() {
        if (Auth::check()) {
            $tipos_propiedad = TipoPropiedad::all();
            return view('administrador.propiedades.administrador_propiedades_crear', ['tipos_propiedad' => $tipos_propiedad]);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @return type
     */
    function save() {
        if (Auth::check()) {
            //PENDIENTE LA RECEPCION DE LAS IMAGENES
            //PROPIETARIO
            $id_propietario = Input::get('id_propietario');
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

            //PROPIEDAD
            $direccion = Input::get('direccion');
            $barrio = Input::get('barrio');
            $valor_arriendo = Input::get('valor_arriendo');
            $valor_condominio = Input::get('valor_condominio');
            $area = Input::get('area');
            $numero_escritura = Input::get('numero_escritura');
            $estrato = Input::get('estrato');
            $tipo_propiedad_id = Input::get('tipo_propiedad_id');
            $proposito = Input::get('proposito');
            $descripcion = Input::get('descripcion');
            //IMAGENES
            $imagen_principal = Input::file('imagen_principal');
            $imagen_1 = Input::file('imagen_1');
            $imagen_2 = Input::file('imagen_2');
            $imagen_3 = Input::file('imagen_3');
            $imagen_4 = Input::file('imagen_4');

            return $this->registrarPropiedad($direccion, $barrio, $valor_arriendo, $valor_condominio, $area, $numero_escritura, $estrato, $tipo_propiedad_id, $imagen_principal, $id_propietario, $imagen_1, $imagen_2, $imagen_3, $imagen_4, $proposito, $descripcion);


        }
        return redirect('/administrar')->with('error', 'Debe iniciar sesión');
    }

    /**
     *
     * @return type
     */
    function verArrendar() {
        $propiedades = DB::table('propiedad')
                ->join('tipo_propiedad', 'tipo_propiedad.id', '=', 'propiedad.tipo_propiedad_id')
                ->join('persona', 'persona.id', '=', 'propiedad.persona_id')
                ->where('propiedad.proposito', '=', 'Arrienda')
                ->select(
                        'propiedad.descripcion', 'propiedad.estado', 'propiedad.proposito', 'propiedad.id as id', 'propiedad.direccion as direccion', 'propiedad.barrio as barrio', 'propiedad.valor_arriendo as valor_arriendo', 'propiedad.valor_condominio as valor_condominio', 'propiedad.area as area', 'propiedad.numero_escritura as numero_escritura', 'propiedad.estrato as estrato', 'propiedad.imagen_principal as imagen_principal', 'propiedad.imagen1 as imagen1', 'propiedad.imagen2 as imagen2', 'propiedad.imagen3 as imagen3', 'propiedad.imagen4 as imagen4', 'tipo_propiedad.nombre as nombre_tp', 'persona.id as id_persona', 'persona.nit as nit', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.telefono as telefono', 'persona.correo as correo'
                )
                ->paginate(12);
        $barrios = DB::table('propiedad')->where('proposito', '=', 'Arrienda')->select('barrio')->distinct()->get();
        $idarriendo = \App\Models\Arriendo::orderby('created_at','DESC')->take(1)->get();
        return view('administrador.propiedades.administrador_propiedades_arrendar', ['propiedades' => $propiedades, 'barrios' => $barrios, 'idarriendo' => $idarriendo]);
    }

    /**
     *
     * @param type $nit
     * @return type
     */
    function getPropiedadesPropietario($nit) {
        if (Auth::check()) {
            if (!empty($nit)) {
                $propiedades = DB::table('persona')
                        ->join('propiedad', 'propiedad.persona_id', '=', 'persona.id')
                        ->join('tipo_propiedad', 'tipo_propiedad.id', '=', 'propiedad.tipo_propiedad_id')
                        ->where('persona.nit', '=', $nit)
                        ->select(
                                'propiedad.descripcion', 'propiedad.estado', 'propiedad.proposito', 'propiedad.id as id', 'propiedad.direccion as direccion', 'propiedad.barrio as barrio', 'propiedad.valor_arriendo as valor_arriendo', 'propiedad.valor_condominio as valor_condominio', 'propiedad.area as area', 'propiedad.numero_escritura as numero_escritura', 'propiedad.estrato as estrato', 'propiedad.imagen_principal as imagen_principal', 'propiedad.imagen1 as imagen1', 'propiedad.imagen2 as imagen2', 'propiedad.imagen3 as imagen3', 'propiedad.imagen4 as imagen4', 'tipo_propiedad.nombre as nombre_tp', 'persona.id as id_persona', 'persona.nit as nit', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.telefono as telefono', 'persona.correo as correo'
                        )
                        ->get();

                $mostrar = "";
                $url = url('/');
                foreach ($propiedades as $p) {
                    $mostrar .= '<div class="col-md-4">';
                    $mostrar .= ' <div class="box box-widget widget-user">';
                    $mostrar .= ' <div class="widget-user-header bg-purple-active">';
                    $mostrar .= '<h3 class="widget-user-username">' . $p->direccion . '</h3>';
                    $mostrar .= '<h5 class="widget-user-desc">' . $p->barrio . '</h5>';
                    $mostrar .= '</div>';
                    $mostrar .= '<div class="widget-user-image">';
                    $mostrar .= '<img class="img-circle" src="' . $url . '/' . $p->imagen_principal . '">';
                    $mostrar .= '</div>';
                    $mostrar .= '<div class="box-footer">';
                    $mostrar .= '<div class="row">';
                    if ($p->estado == 0) {
                        $mostrar .= '<div class="col-sm-3">';
                    } else {
                        $mostrar .= '<div class="col-sm-6">';
                    }
                    $mostrar .= '<div class="description-block" data-toggle="tooltip" data-placement="bottom" title="Información">';
                    if ($p->estado == 0) {
                        $mostrar .= '<label class="label label-default">Se ' . $p->proposito . '</label>';
                    } else if ($p->estado == 1) {
                        $mostrar .= '<label class="label label-danger">ARERNDADA</label>';
                    } else if ($p->estado == 2) {
                        $mostrar .= '<label class="label label-warning">VENDIDA</label>';
                    }
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';

                    $mostrar .= '<div class="col-sm-3">';
                    $mostrar .= '<div class="description-block" data-toggle="tooltip" data-placement="bottom" title="Información">';
                    $mostrar .= '<a class="btn btn-info" data-toggle="modal" data-target="#informacion" onclick="datos("' . $url . '", "' . $p->id . '", "' . $p->direccion . '", "' . $p->barrio . '", "' . $p->valor_arriendo . '", "' . $p->valor_condominio . '", "' . $p->area . '", "' . $p->numero_escritura . '", "' . $p->estrato . '", "' . $p->nombre_tp . '", "' . $p->imagen_principal . '", "' . $p->imagen1 . '", "' . $p->imagen2 . '", "' . $p->imagen3 . '", "' . $p->imagen4 . '", "' . $p->id_persona . '", "' . $p->nit . '", "' . $p->nombre . ' ' . $p->apellido . '", "' . $p->telefono . '", "' . $p->correo . '", "' . $p->descripcion . '")"><i class="fa fa-linkedin"></i></a>';
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';

                    if ($p->estado == 0) {
                        $mostrar .= '<div class = "col-sm-3">';
                        if ($p->proposito == "Arrienda") {
                            $mostrar .= '<div class = "description-block" data-toggle = "tooltip" data-placement = "bottom" title = "Arrendar">';
                            $mostrar .= '<button class = "btn btn-info" data-toggle = "modal" data-target = "#arrendar" onclick = "$("#id_propiedad").val("' . $p->id . '");"> <i class = "fa fa-buysellads"></i></button>';
                            $mostrar .= '</div>';
                        } else {
                            $mostrar .= '<div class = "description-block" data-toggle = "tooltip" data-placement = "bottom" title = "Vender">';
                            $mostrar .= '<button class = "btn btn-warning" data-toggle = "modal" data-target = "#vender" onclick = "$("#id_p").val("' . $p->id . '");">';
                            $mostrar .= '<i class = "fa fa- fa-vimeo"></i>';
                            $mostrar .= '</button>';
                            $mostrar .= '</div>';
                        }
                    }
                    $mostrar .= '</div>';

                    $mostrar .= '<div class="col-sm-3">';
                    $mostrar .= '<div class="description-block" data-toggle="tooltip" data-placement="bottom" title="Dar de Baja">';
                    $mostrar .= '<button class="btn btn-danger" data-toggle="modal" data-target="#darbaja" onclick="$("#id").val("' . $p->id . '");">';
                    $mostrar .= '<i class="fa fa-close"> </i>';
                    $mostrar .= '</button>';
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';

                    $mostrar .= '</div>';
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';
                }
            } else {
                $mostrar = "No se encuentran datos...";
            }
            return $mostrar;
        }

        return redirect('/administrar')->with('error', 'Debe iniciar sesión');
    }

    /**
     * @param $barrio
     * @return string
     */
    function getPropiedadesBarrio($barrio) {
        if (Auth::check()) {
            if (!empty($barrio)) {
                $propiedades = DB::table('persona')
                        ->join('propiedad', 'propiedad.persona_id', '=', 'persona.id')
                        ->join('tipo_propiedad', 'tipo_propiedad.id', '=', 'propiedad.tipo_propiedad_id')
                        ->where('propiedad.barrio', '=', $barrio)
                        ->select(
                                'propiedad.descripcion', 'propiedad.estado', 'propiedad.proposito', 'propiedad.id as id', 'propiedad.direccion as direccion', 'propiedad.barrio as barrio', 'propiedad.valor_arriendo as valor_arriendo', 'propiedad.valor_condominio as valor_condominio', 'propiedad.area as area', 'propiedad.numero_escritura as numero_escritura', 'propiedad.estrato as estrato', 'propiedad.imagen_principal as imagen_principal', 'propiedad.imagen1 as imagen1', 'propiedad.imagen2 as imagen2', 'propiedad.imagen3 as imagen3', 'propiedad.imagen4 as imagen4', 'tipo_propiedad.nombre as nombre_tp', 'persona.id as id_persona', 'persona.nit as nit', 'persona.nombre as nombre', 'persona.apellido as apellido', 'persona.telefono as telefono', 'persona.correo as correo'
                        )
                        ->get();

                $mostrar = "";
                $url = url('/');
                error_log('propiedades barrio - ' . $barrio . ' - cantidad - ' . count($propiedades));
                foreach ($propiedades as $p) {
                    $mostrar .= '<div class="col-md-4">';
                    $mostrar .= ' <div class="box box-widget widget-user">';
                    $mostrar .= ' <div class="widget-user-header bg-purple-active">';
                    $mostrar .= '<h3 class="widget-user-username">' . $p->direccion . '</h3>';
                    $mostrar .= '<h5 class="widget-user-desc">' . $p->barrio . '</h5>';
                    $mostrar .= '</div>';
                    $mostrar .= '<div class="widget-user-image">';
                    $mostrar .= '<img class="img-circle" src="' . $url . '/' . $p->imagen_principal . '">';
                    $mostrar .= '</div>';
                    $mostrar .= '<div class="box-footer">';
                    $mostrar .= '<div class="row">';
                    if ($p->estado == 0) {
                        $mostrar .= '<div class="col-sm-3">';
                    } else {
                        $mostrar .= '<div class="col-sm-6">';
                    }
                    $mostrar .= '<div class="description-block" data-toggle="tooltip" data-placement="bottom" title="Información">';
                    if ($p->estado == 0) {
                        $mostrar .= '<label class="label label-default">Se ' . $p->proposito . '</label>';
                    } else if ($p->estado == 1) {
                        $mostrar .= '<label class="label label-danger">ARERNDADA</label>';
                    } else if ($p->estado == 2) {
                        $mostrar .= '<label class="label label-warning">VENDIDA</label>';
                    }
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';

                    $mostrar .= '<div class="col-sm-3">';
                    $mostrar .= '<div class="description-block" data-toggle="tooltip" data-placement="bottom" title="Información">';
                    $mostrar .= '<a class="btn btn-info" data-toggle="modal" data-target="#informacion" onclick="datos("' . $url . '", "' . $p->id . '", "' . $p->direccion . '", "' . $p->barrio . '", "' . $p->valor_arriendo . '", "' . $p->valor_condominio . '", "' . $p->area . '", "' . $p->numero_escritura . '", "' . $p->estrato . '", "' . $p->nombre_tp . '", "' . $p->imagen_principal . '", "' . $p->imagen1 . '", "' . $p->imagen2 . '", "' . $p->imagen3 . '", "' . $p->imagen4 . '", "' . $p->id_persona . '", "' . $p->nit . '", "' . $p->nombre . ' ' . $p->apellido . '", "' . $p->telefono . '", "' . $p->correo . '", "' . $p->descripcion . '")"><i class="fa fa-linkedin"></i></a>';
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';

                    if ($p->estado == 0) {
                        $mostrar .= '<div class = "col-sm-3">';
                        if ($p->proposito == "Arrienda") {
                            $mostrar .= '<div class = "description-block" data-toggle = "tooltip" data-placement = "bottom" title = "Arrendar">';
                            $mostrar .= '<button class = "btn btn-info" data-toggle = "modal" data-target = "#arrendar" onclick = "$("#id_propiedad").val("' . $p->id . '");"> <i class = "fa fa-buysellads"></i></button>';
                            $mostrar .= '</div>';
                        } else {
                            $mostrar .= '<div class = "description-block" data-toggle = "tooltip" data-placement = "bottom" title = "Vender">';
                            $mostrar .= '<button class = "btn btn-warning" data-toggle = "modal" data-target = "#vender" onclick = "$("#id_p").val("' . $p->id . '");">';
                            $mostrar .= '<i class = "fa fa- fa-vimeo"></i>';
                            $mostrar .= '</button>';
                            $mostrar .= '</div>';
                        }
                    }
                    $mostrar .= '</div>';

                    $mostrar .= '<div class="col-sm-3">';
                    $mostrar .= '<div class="description-block" data-toggle="tooltip" data-placement="bottom" title="Dar de Baja">';
                    $mostrar .= '<button class="btn btn-danger" data-toggle="modal" data-target="#darbaja" onclick="$("#id").val("' . $p->id . '");">';
                    $mostrar .= '<i class="fa fa-close"> </i>';
                    $mostrar .= '</button>';
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';

                    $mostrar .= '</div>';
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';
                    $mostrar .= '</div>';
                }
            } else {
                $mostrar = "No se encuentran datos...";
            }
            return $mostrar;
        }
        return redirect('/administrar')->with('error', 'Debe iniciar sesión');
    }

    function arrendar() {
        if (Auth::check()) {
            $id = Input::get('id_propiedad');
            $id_arrendatario = Input::get('id_arrendatario');
            $id_codeudor = Input::get('id_codeudor');
            $id_codeudor2 = Input::get('id_codeudor2');
            $fecha_inicio = Input::get('fecha_inicio');
            $fecha_fin = Input::get('fecha_fin');
            $comision = Input::get('comision');
            $fechini = new DateTime($fecha_inicio);
            $fechfin = new DateTime($fecha_fin);
            $diferencia = $fechini->diff($fechfin);
            $meses = ( $diferencia->y * 12 ) + $diferencia->m;
            $fecha_limite = strtotime ('-30 day' , strtotime($fecha_fin)) ;
            $fecha_limite = date ('y-m-d', $fecha_limite);
            $destino_inmueble = Input::get('destino_inmueble');
            if (!empty($id) && !empty($id_arrendatario) && !empty($fecha_inicio) && !empty($fecha_fin) && !empty($fecha_limite) && !empty($destino_inmueble)) {
                $propiedad = Propiedad::FindOrFail($id);
                $arrendatario = Arrendatario::FindOrFail($id_arrendatario);
                $codeudor = Codeudor::Find($id_codeudor);
                $codeudor2 = Codeudor::Find($id_codeudor2);
                $arriendo = new Arriendo();
                $arriendo->fecha_inicio = $fecha_inicio;
                $arriendo->fecha_fin = $fecha_fin;
                $arriendo->fecha_limite_cancelacion = $fecha_limite;
                $arriendo->destino_inmueble = $destino_inmueble;
                $arriendo->arrendatario_id = Input::get('id_arrendatario');
                $arriendo->codeudor_id = Input::get('id_codeudor');
                $arriendo->codeudor2_id = Input::get('id_codeudor2');
                $arriendo->propiedad_id = Input::get('id_propiedad');
                $arriendo->valor_arriendo = $propiedad->valor_arriendo;
                $arriendo->comision = $comision;
                $porcentajecomi = $comision / 100;
                $arriendo->valor_comision = $propiedad->valor_arriendo * $porcentajecomi;
                $propiedad->id = $id;
                $arriendo->save();
                $prop = $id;
                $arrie = $arriendo->id;
                $valor = $arriendo->valor_arriendo;
                if ($arriendo->save()) {
                    $propiedad->estado = 1;
                    $propiedad->save();
                    $arrendatario->estado = 1;
                    $arrendatario->save();
                    $arrendatarioid = $arrendatario->id;
                    $this->facturar($meses, $prop, $arrie, $arrendatarioid, $valor, $fecha_inicio, $comision);

                    return redirect('propiedades/arriendos')->with('mensaje', 'Se ha arrendado exitosamente.');
                } else {
                    return redirect('propiedades/arriendos')->with('error', 'No se ha logrado realizar el registro, por favor intentelo de nuevo.');
                }
            } else {
                return redirect('propiedades/arriendos')->with('error', 'Faltan datos, verifique e intentelo de nuevo.');
            }
        }
        return redirect('/administrar')->with('error', 'Debe iniciar sesión');
    }

    public function facturar($meses, $prop, $arrie, $arrendatarioid, $valor, $fecha_inicio, $comision)
    {
        $i = 1;
        $m = 1;
        while($i <= $meses)
        {
                $propietario = DB::table('persona')
                    ->join('propiedad', 'propiedad.persona_id', '=', 'persona.id')
                    ->where('propiedad.id', '=', $prop)
                    ->select(DB::raw('persona.tipo_persona_id as tipopersona'))->first();
                $arrendatario = DB::table('persona')
                    ->join('arrendatario', 'arrendatario.persona_id', '=', 'persona.id')
                    ->where('arrendatario.id', '=', $arrendatarioid)
                    ->select(DB::raw('persona.tipo_persona_id as tipopersona'))->first();



                if ($propietario->tipopersona === 1)
                {
                    if ($arrendatario->tipopersona === 1){
                        $iva = 0;
                        $valoriva = 0;
                        $factura = new Factura();
                        $factura->persona_id = $arrendatarioid;
                        $factura->arriendo_id = $arrie;
                        $nuevafecha = strtotime ( '+'.$m.' month' , strtotime ( $fecha_inicio ) ) ;
                        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                        $factura->fecha_limite = $nuevafecha;
                        $mes = date("m", strtotime($nuevafecha));
                        if ($mes == 1) {
                            $mesactual  = "Enero";
                        }else if ($mes == 2) {
                            $mesactual  = "Febrero";
                        }else if ($mes == 3) {
                            $mesactual  = "Marzo";
                        }else if ($mes == 4) {
                            $mesactual  = "Abril";
                        }else if ($mes == 5) {
                            $mesactual  = "Mayo";
                        }else if ($mes == 6) {
                            $mesactual  = "Junio";
                        }else if ($mes == 7) {
                            $mesactual  = "Julio";
                        }else if ($mes == 8) {
                            $mesactual  = "Agosto";
                        }else if ($mes == 9) {
                            $mesactual  = "Septiembre";
                        }else if ($mes == 10) {
                            $mesactual  = "Octubre";
                        }else if ($mes == 11) {
                            $mesactual  = "Noviembre";
                        }else if ($mes == 12) {
                            $mesactual  = "Diciembre";
                        };
                        $messi = $mesactual;
                        $factura->concepto = "Ingresos recibidos por terceros correspondientes al mes de " . $messi ." de " . date("Y", strtotime($nuevafecha));
                        $factura->iva = $iva;
                        $factura->valor_iva = $valoriva;
                        $factura->arriendo = $valor;
                        $factura->comision = $comision;
                        $porcentajecomi = $comision / 100;
                        $factura->valor_comision = $valor * $porcentajecomi;
                        $retefuente = 0;
                        $factura->retefuente = $retefuente;
                        $factura->total = $valor + $valoriva + $retefuente;
                        $factura->save();
                    }
                    else if ($arrendatario->tipopersona  === 2)
                    {
                        $iva = 0;
                        $valoriva = 0;
                        $factura = new Factura();
                        $factura->persona_id = $arrendatarioid;
                        $factura->arriendo_id = $arrie;
                        $nuevafecha = strtotime ( '+'.$m.' month' , strtotime ( $fecha_inicio ) ) ;
                        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                        $factura->fecha_limite = $nuevafecha;
                        $mes = date("m", strtotime($nuevafecha));
                        if ($mes == 1) {
                            $mesactual  = "Enero";
                        }else if ($mes == 2) {
                            $mesactual  = "Febrero";
                        }else if ($mes == 3) {
                            $mesactual  = "Marzo";
                        }else if ($mes == 4) {
                            $mesactual  = "Abril";
                        }else if ($mes == 5) {
                            $mesactual  = "Mayo";
                        }else if ($mes == 6) {
                            $mesactual  = "Junio";
                        }else if ($mes == 7) {
                            $mesactual  = "Julio";
                        }else if ($mes == 8) {
                            $mesactual  = "Agosto";
                        }else if ($mes == 9) {
                            $mesactual  = "Septiembre";
                        }else if ($mes == 10) {
                            $mesactual  = "Octubre";
                        }else if ($mes == 11) {
                            $mesactual  = "Noviembre";
                        }else if ($mes == 12) {
                            $mesactual  = "Diciembre";
                        };
                        $messi = $mesactual;
                        $factura->concepto = "Ingresos recibidos por terceros correspondientes al mes de " . $messi ." de " . date("Y", strtotime($nuevafecha));
                        $factura->iva = $iva;
                        $factura->valor_iva = $valoriva;
                        $factura->arriendo = $valor;
                        $factura->comision = $comision;
                        $porcentajecomi = $comision / 100;
                        $factura->valor_comision = $valor * $porcentajecomi;
                        $retefuente = $valor * 0.035;
                        $factura->retefuente = $retefuente;
                        $factura->total = $valor + $valoriva + $retefuente;
                        $factura->save();
                    }

                }else if ($propietario->tipopersona  === 2)
                {
                    if ($arrendatario->tipopersona === 1){

                        $iva = 16;
                        $valoriva = $valor * 0.16;
                        $factura = new Factura();
                        $factura->persona_id = $arrendatarioid;
                        $factura->arriendo_id = $arrie;
                        $nuevafecha = strtotime ( '+'.$m.' month' , strtotime ( $fecha_inicio ) ) ;
                        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                        $factura->fecha_limite = $nuevafecha;
                        $mes = date("m", strtotime($nuevafecha));
                        if ($mes == 1) {
                            $mesactual  = "Enero";
                        }else if ($mes == 2) {
                            $mesactual  = "Febrero";
                        }else if ($mes == 3) {
                            $mesactual  = "Marzo";
                        }else if ($mes == 4) {
                            $mesactual  = "Abril";
                        }else if ($mes == 5) {
                            $mesactual  = "Mayo";
                        }else if ($mes == 6) {
                            $mesactual  = "Junio";
                        }else if ($mes == 7) {
                            $mesactual  = "Julio";
                        }else if ($mes == 8) {
                            $mesactual  = "Agosto";
                        }else if ($mes == 9) {
                            $mesactual  = "Septiembre";
                        }else if ($mes == 10) {
                            $mesactual  = "Octubre";
                        }else if ($mes == 11) {
                            $mesactual  = "Noviembre";
                        }else if ($mes == 12) {
                            $mesactual  = "Diciembre";
                        };
                        $messi = $mesactual;
                        $factura->concepto = "Ingresos recibidos por terceros correspondientes al mes de " . $messi ." de " . date("Y", strtotime($nuevafecha));
                        $factura->iva = $iva;
                        $factura->valor_iva = $valoriva;
                        $factura->arriendo = $valor;
                        $factura->comision = $comision;
                        $porcentajecomi = $comision / 100;
                        $factura->valor_comision = $valor * $porcentajecomi;
                        $retefuente = 0;
                        $factura->retefuente = $retefuente;
                        $factura->total = $valor + $valoriva + $retefuente;
                        $factura->save();
                    } else if ($arrendatario->tipopersona === 2){
                        $iva = 16;
                        $valoriva = $valor * 0.16;
                        $factura = new Factura();
                        $factura->persona_id = $arrendatarioid;
                        $factura->arriendo_id = $arrie;
                        $nuevafecha = strtotime ( '+'.$m.' month' , strtotime ( $fecha_inicio ) ) ;
                        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                        $factura->fecha_limite = $nuevafecha;
                        $mes = date("m", strtotime($nuevafecha));
                        if ($mes == 1) {
                            $mesactual  = "Enero";
                        }else if ($mes == 2) {
                            $mesactual  = "Febrero";
                        }else if ($mes == 3) {
                            $mesactual  = "Marzo";
                        }else if ($mes == 4) {
                            $mesactual  = "Abril";
                        }else if ($mes == 5) {
                            $mesactual  = "Mayo";
                        }else if ($mes == 6) {
                            $mesactual  = "Junio";
                        }else if ($mes == 7) {
                            $mesactual  = "Julio";
                        }else if ($mes == 8) {
                            $mesactual  = "Agosto";
                        }else if ($mes == 9) {
                            $mesactual  = "Septiembre";
                        }else if ($mes == 10) {
                            $mesactual  = "Octubre";
                        }else if ($mes == 11) {
                            $mesactual  = "Noviembre";
                        }else if ($mes == 12) {
                            $mesactual  = "Diciembre";
                        };
                        $messi = $mesactual;
                        $factura->concepto = "Ingresos recibidos por terceros correspondientes al mes de " . $messi ." de " . date("Y", strtotime($nuevafecha));
                        $factura->iva = $iva;
                        $factura->valor_iva = $valoriva;
                        $factura->arriendo = $valor;
                        $factura->comision = $comision;
                        $porcentajecomi = $comision / 100;
                        $factura->valor_comision = $valor * $porcentajecomi;
                        $retefuente = $valor * 0.035;
                        $factura->retefuente = $retefuente;
                        $factura->total = $valor + $valoriva + $retefuente;
                        $factura->save();
                    }
                };
            $i++;
            $m = $m+1;
        }
   }


    public function listarArriendos()
    {
        $arriendos = Arriendo::orderBy('fecha_fin', 'asc')->get();
        $arrendatario = Arrendatario::all();
        $propiedad = Propiedad::all();
        return view('administrador.propiedades.listar_propiedades')
                ->with('arrendatario', $arrendatario)
                ->with('arriendos', $arriendos)
                ->with('propiedad', $propiedad);
    }

    public function listado_facturas($id)
    {
        $facturas = DB::table('propiedad')
                    ->join('persona', 'propiedad.persona_id', '=', 'persona.id')
                    ->join('arriendo', 'arriendo.propiedad_id', '=', 'propiedad.id')
                    ->join('factura', 'factura.arriendo_id', '=', 'arriendo.id')
                    ->where('factura.arriendo_id', '=', $id)
                    ->select(DB::raw('factura.id as codigo, factura.fecha_limite as fecha, factura.concepto as concepto, factura.arriendo as valorarriendo , persona.nombre as nombre, persona.apellido as apellido, factura.comision as comision, factura.estado as estado'))
                    ->get();

        return view('administrador.propiedades.listado_facturas')
                ->with('facturas', $facturas);
    }
    function imprimir_factura($idfactura) {
        if (Auth::check()) {
            $factura = Factura::find($idfactura);
            $facturas = DB::table('factura')
                    ->join('arriendo', 'factura.arriendo_id', '=', 'arriendo.id')
                    ->join('propiedad', 'arriendo.propiedad_id', '=', 'propiedad.id')
                    ->join('persona', 'propiedad.persona_id', '=', 'persona.id')
                    ->where('factura.id', '=', $idfactura)
                    ->select(DB::raw('factura.id as codigo, factura.fecha_limite as fecha, factura.concepto as concepto, factura.arriendo as valorarriendo , persona.nombre as nombre, persona.apellido as apellido, factura.comision as comision, factura.valor_comision as valorcomision, factura.iva as iva, factura.total as totalf, factura.valor_iva as valoriva, factura.otros as otros, factura.retefuente as retefuente, persona.nit as nit, persona.direccion_labora as direccion'))
                    ->get();
            $valorletra = NumeroALetras::convertir($factura->total);
            return view('administrador.facturas.factura_generada')->with('facturas', $facturas)->with('valorletra', $valorletra);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }


    function print_imprimir_factura() {
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







    function vender() {
        if (Auth::check()) {
            $id = Input::get('id_p');
            if (!empty($id)) {
                $propiedad = Propiedad::FindOrFail($id);
                $propiedad->estado = 2;
                $propiedad->save();
                return redirect('/propiedades/ventas')->with('mensaje', 'Se ha vendido exitosamente.');
            } else {
                return redirect('/propiedades/ventas')->with('error', 'Faltan datos, verifique e intentelo de nuevo.');
            }
        }
        return redirect('/administrar')->with('error', 'Debe iniciar sesión');
    }

    /*     * ************************************************
     * Funciones para la WEB Pública
     * ************************************************ */

    /**
     * @return mixed
     */
    function getPropiedadesComprarPublic() {
        $propiedades = DB::table('propiedad')->where('proposito', '=', 'Vende')->OrderBy('id', 'DESC')->where('estado', '=', 0)->get();
        return view('laseguridad.buy', ['propiedades' => $propiedades]);
    }

    function getPropiedadesArrendarPublic() {
        $propiedades = DB::table('propiedad')->where('proposito', '=', 'Arrienda')->OrderBy('id', 'DESC')->where('estado', '=', 0)->get();
        return view('laseguridad.rent', ['propiedades' => $propiedades]);
    }

    function getPropiedadPublic($id) {
        if (!empty($id)) {
            $propiedad = Propiedad::FindOrFail($id);
            return view('laseguridad.single', ['propiedad' => $propiedad]);
        }
    }

    function getIndex() {
        $propiedades_vender = DB::table('propiedad')->where('proposito', '=', 'Vende')->OrderBy('id', 'DESC')->where('estado', '=', 0)->limit('3')->get();
        $propiedades_arrendar = DB::table('propiedad')->where('proposito', '=', 'Arrienda')->OrderBy('id', 'DESC')->where('estado', '=', 0)->limit('3')->get();
        return view('laseguridad.index', ['propiedades_vender' => $propiedades_vender, 'propiedades_arrendar' => $propiedades_arrendar]);
    }

    /*     * ********************************
     * FUNCIONES PROTEGIDAS
     * ***************************** */

    /**
     * Funcion que registra una nueva propiedad en el sistema
     * @param Request $request -> datos recibidos del formulario
     * @return type -> Null - si no puede registrar || Propiedad registrada
     */
    private function registrarPropiedad($direccion, $barrio, $valor_arriendo, $valor_condominio, $area, $numero_escritura, $estrato, $tipo_propiedad_id, $imagen_principal, $id_propietario, $imagen_1, $imagen_2, $imagen_3, $imagen_4, $proposito, $descripcion) {

        if (!empty($direccion) && !empty($barrio) && !empty($valor_arriendo) && (!empty($valor_condominio) || $valor_condominio == 0) && !empty($area) && !empty($numero_escritura) && !empty($estrato) && !empty($tipo_propiedad_id)) {
            $propiedad = new Propiedad();
            $propiedad->direccion = $direccion;
            $propiedad->barrio = $barrio;
            $propiedad->valor_arriendo = $valor_arriendo;
            $propiedad->valor_condominio = $valor_condominio;
            $propiedad->area = $area;
            $propiedad->numero_escritura = $numero_escritura;
            $propiedad->estrato = $estrato;
            $propiedad->tipo_propiedad_id = $tipo_propiedad_id;
            $propiedad->persona_id = $propietario->id;
            $propiedad->proposito = $proposito;
            $propiedad->estado = 0;
            $propiedad->descripcion = $descripcion;

            if ($propiedad->save()) {
                $ruta_principal = $this->subir_imagen($imagen_principal, $propiedad->id, 0);
                $ruta_1 = $this->subir_imagen($imagen_1, $propiedad->id, 1);
                $ruta_2 = $this->subir_imagen($imagen_2, $propiedad->id, 2);
                $ruta_3 = $this->subir_imagen($imagen_3, $propiedad->id, 3);
                $ruta_4 = $this->subir_imagen($imagen_4, $propiedad->id, 4);
                $propiedad->imagen_principal = $ruta_principal;
                $propiedad->imagen1 = $ruta_1;
                $propiedad->imagen2 = $ruta_2;
                $propiedad->imagen3 = $ruta_3;
                $propiedad->imagen4 = $ruta_4;
                $propiedad->save();
                if ($proposito = "Arrienda"){
                    return redirect('propiedades/arriendos')->with('mensaje', 'Propiedad registrada correctamente.');
                }
                else if ($proposito = "Vende"){
                    return redirect('propiedades/ventas')->with('mensaje', 'Propiedad registrada correctamente.');
                }



            } else {
                return redirect('propiedades')->with('error', 'No se puede realizar la acción, verifique e intentelo de nuevo.');
            }
        }
        return redirect('propiedades')->with('error', 'Faltan datos.');
    }




    /**
     *
     * Buscar si la persona ya existe que no la cree
     *
     */


    function buscarpersona($nit) {
        if ($nit) {
            $persona = DB::table('persona')
                    ->where('persona.nit', '=', $nit)
                    ->first();
            return($persona);
        }
    }

    /**
     * Fucnción que registra un nuevo propietario (Persona) dentro del sistema
     * @param Request $request -> datos recibidos del formulario
     * @return Null - si no puede registrar || Propietario registrada
     */
    private function registrarPropietario($nit, $nombres, $apellidos, $telefono, $email, $profesion, $labora_en, $direccion_labora, $telefono_labora, $direccion_residencia) {


        if (!empty($nit) && !empty($nombres) && !empty($apellidos) && !empty($telefono) && !empty($email) && !empty($profesion) && !empty($labora_en) && !empty($direccion_labora) && !empty($telefono_labora) && !empty($direccion_residencia)) {
            $propietario = new Persona();
            $propietario->nit = $nit;
            $propietario->nombre = $nombres;
            $propietario->apellido = $apellidos;
            $propietario->telefono = $telefono;
            $propietario->correo = $email;
            $propietario->profesion = $profesion;
            $propietario->labora_en = $labora_en;
            $propietario->direccion_labora = $direccion_labora;
            $propietario->telefono_labora = $telefono_labora;
            $propietario->direccion_residencia = $direccion_residencia;
            if ($propietario->save()) {
                return $propietario;
            }
        }
        return null;



    }

    function desactivar() {
        if (Auth::check()) {
            $id = Input::get('id');
            if (!empty($id)) {
                $propiedad = Propiedad::FindOrFail($id);
                if ($propiedad) {
                    $pd = new PropiedadDesactivada();
                    $pd->id = $propiedad->id;
                    $pd->direccion = $propiedad->direccion;
                    $pd->barrio = $propiedad->barrio;
                    $pd->valor_arriendo = $propiedad->valor_arriendo;
                    $pd->valor_condominio = $propiedad->valor_condominio;
                    $pd->area = $propiedad->area;
                    $pd->numero_escritura = $propiedad->numero_escritura;
                    $pd->estrato = $propiedad->estrato;
                    $pd->created_at = $propiedad->created_at;
                    $pd->updated_at = $propiedad->updated_at;
                    $pd->persona_id = $propiedad->persona_id;
                    $pd->tipo_propiedad_id = $propiedad->tipo_propiedad_id;
                    $pd->imagen_principal = $propiedad->imagen_principal;
                    $pd->imagen1 = $propiedad->imagen1;
                    $pd->imagen2 = $propiedad->imagen2;
                    $pd->imagen3 = $propiedad->imagen3;
                    $pd->imagen4 = $propiedad->imagen4;
                    $pd->proposito = $propiedad->proposito;
                    $pd->estado = $propiedad->estado;
                    $pd->descripcion = $propiedad->descripcion;
                    if ($pd->save()) {
                        $propiedad->delete();
                        return redirect()->back()->with('mensaje', 'Se ha dado de baja a la propiedad correctamente.');
                    }
                }
            }
        }
        return redirect('/')->with('error', 'Debe iniciar sesión.');
    }

    /**
     *
     * @param $imagen_principal
     */
    private function subir_imagen($imagen_principal, $id, $numero) {
        $nombre = $imagen_principal->getClientOriginalName();
        $ruta_disco = public_path() . '/img/propiedades/' . $id;
        $imagen_principal->move($ruta_disco, $id . '_' . $nombre);
        error_log("NOMBRE . . - - - " . $ruta_disco . $nombre);
        $ruta = "img/propiedades/$id/{$id}_{$nombre}";
        return $ruta;
    }


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
                            $url = "propiedades/arriendos";
                            $key = 'mensaje';
                            $mensaje = 'Arrendatario registrado correctamente.';
                        } else {
                            $url = "propiedades/arriendos";
                            $key = 'error';
                            $mensaje = 'No se ha registrado el arrendatario, por favor, verifique e intentelo de nuevo.';
                            $persona->delete();
                        }
                    } else {
                        $url = "propiedades/arriendos";
                        $key = 'error';
                        $mensaje = 'Ha ocurrido un error interno, por favor, verifique e intenlo de nuevo, si el problema persiste, comuníquese con el administrador de la página a fabianbustamabe@gmail.com.';
                    }
                } catch (Exception $e) {
                    $url = "propiedades/arriendos";
                    $key = 'error';
                    $mensaje = 'Ha ocurrido un error interno, por favor verifique e intentelo de nuevo.';
                }
            } else {
                $url = "propiedades/arriendos";
                $key = 'error';
                $mensaje = 'Los datos están incompletos.';
            }
            return redirect($url)->with($key, $mensaje);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

}

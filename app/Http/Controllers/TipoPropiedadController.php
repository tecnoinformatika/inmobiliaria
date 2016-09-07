<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use \App\Models\TipoPropiedad;
use \App\Models\Propiedad;

class TipoPropiedadController extends Controller {
    public function __construct() {        
         $this->middleware('auth');
      
        

       
    }

    function tipos_propiedades() {
        if (Auth::check()) {
            $tipos_propiedades = TipoPropiedad::all();
            return view('administrador.propiedades.administrador_tipos_propiedades', ['tipos_propiedades' => $tipos_propiedades]);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function verFormCrearTipoPropiedad() {
        if (Auth::check()) {
            return view('administrador.propiedades.administrador_tipos_propiedades_crear', ['nombre' => '']);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function guardarNuevoTipoPropiedad() {
        if (Auth::check()) {
            $nombre = Input::get('nombre');
            if (!empty($nombre)) {
                $tipo_propiedad_search = TipoPropiedad::where('nombre', '=', $nombre)->get();
                if (count($tipo_propiedad_search) === 0) {
                    $tipo_propiedad = new TipoPropiedad();
                    $tipo_propiedad->nombre = $nombre;
                    if ($tipo_propiedad->save()) {
                        $key = "mensaje";
                        $mensaje = "Se ha registrado el tipo de propiedad exitosamente.";
                    } else {
                        $key = "error";
                        $mensaje = "No se ha podido realizar la acción, verifique e intentelo de nuevo.";
                    }
                } else {
                    $key = "error";
                    $mensaje = "Existe un tipo de propiedad con ese nombre.";
                }
                return redirect('propiedades/tipos_propiedades')->with($key, $mensaje, ['nombre' => $nombre]);
            } else {
                return redirect('propiedades/tipos_propiedades')->with('error', 'Faltan datos');
            }
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function eliminarTipoPropiedad() {
        if (Auth::check()) {
            $id = Input::get('id_p');
            if (!empty($id)) {
                $tipo_propiedad_asignado = Propiedad::where('tipo_propiedad_id', '=', $id)->get();
                if (count($tipo_propiedad_asignado) === 0) {
                    $tipo_propiedad = TipoPropiedad::FindOrFail($id);
                    if ($tipo_propiedad->delete()) {
                        $key = "mensaje";
                        $mensaje = "Se ha eliminado exitosamente.";
                    } else {
                        $key = "error";
                        $mensaje = "No se ha realizado la acción, verifique e intenelo de nuevo.";
                    }
                } else {
                    $key = "error";
                    $mensaje = "Este tipo de propiedad ya está asignado a alguna propiedad, no se puede eliminar, hasta que se ralice el cambio.";
                }
            } else {
                $key = "error";
                $mensaje = "No se puede eliminar, no se ha logrado acceder a la información necesaria, verifique e intenelo de nuevo.";
            }
            return redirect('propiedades/tipos_propiedades')->with($key, $mensaje);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function verFormEditarTipoPropiedad($id) {
        if (Auth::check()) {
            if (!empty($id)) {
                $tipo_propiedad = TipoPropiedad::FindOrFail($id);
                if ($tipo_propiedad) {
                    $nombre = $tipo_propiedad->nombre;
                    return view('administrador.propiedades.administrador_tipos_propiedades_editar', ['nombre' => $nombre, 'id' => $id]);
                } else {
                    
                }
            } else {
                
            }
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

    function guardarEdicionTipoPropiedad() {
        if (Auth::check()) {
            $id = Input::get('id');
            if (!empty($id)) {
                $tipo_propiedad = TipoPropiedad::FindOrFail($id);
                if ($tipo_propiedad) {
                    $nombre = Input::get('nombre');
                    if (!empty($nombre)) {
                        $tipo_propiedad->nombre = $nombre;
                        if ($tipo_propiedad->save()) {
                            $key = "mensjae";
                            $mensaje = "Se ha editado la información exitosamente.";
                        } else {
                            $key = "error";
                            $mensaje = "No se ha realizado la acción, verifique e intenelo de nuevo.";
                        }
                    } else {
                        $key = "error";
                        $mensaje = "No se puede encontrar la información necesaria para ralizar el proceso indicado, por favor verifique e intentelo de nuevo.";
                    }
                } else {
                    $key = "error";
                    $mensaje = "No se reconoce la información indicada, por favor verifique e intenelo de nuevo.";
                }
            } else {
                $key = "error";
                $mensaje = "No se reconoce el tipo de propiedad para realiza la operación, por favor verifique e intenelo de nuevo.";
            }
            return redirect('propiedades/tipos_propiedades')->with($key, $mensaje);
        }
        return redirect('/')->with('error', 'Debe iniciar sesión');
    }

}

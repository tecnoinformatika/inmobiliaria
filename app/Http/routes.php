<?php

Route::get('/', array(
    'uses' => 'PropiedadController@getIndex'
));


Route::get('ventas', array(
    'uses' => 'PropiedadController@getPropiedadesComprarPublic'
));
Route::get('arriendos', array(
    'uses' => 'PropiedadController@getPropiedadesArrendarPublic'
));
Route::get('informacion/{id}', array(
    'uses' => 'PropiedadController@getPropiedadPublic'
));
Route::get('nosotros', function () {
    return view('laseguridad.nosotros');
});
Route::get('equipo', function () {
    return view('laseguridad.equipo');
});
Route::get('servicios', function(){
    return view('laseguridad.servicios');
});
Route::get('contacto', function(){
    return view('laseguridad.contacto');
});


Route::get('/administrar', function () {
    if (Auth::check()) {
        switch (Auth::user()->rol_id) {
            case 1:
                return view('administrador_index');
            case 2:
                return redirect('propiedades');
        }
    } else {
        return view('home');
    }
});

Route::get('logout', array(
    'uses' => 'UserController@getSignOut'
));

Route::post('inicio_sesion', array(
    'uses' => 'UserController@login',
    'as' => "login"
));

/********************************************************************************/

/**
 * RUTAS PARA ADMIN
 */
/**
 * *****************************
 * ADMINISTRACION DE USUARIOS
 * *****************************
 */

//GET
Route::get('usuarios', array(
    'uses' => 'UserController@verUsuarios',
    'as' => 'usuarios'
));

Route::get('usuarios/crear', array(
    'uses' => 'UserController@verForm',
    'as' => 'crear_usuario'
));

Route::get('usuarios/editar/{id}', array(
    'uses' => 'UserController@verFormEdit',
    'as' => 'editar_usuario'
));


//POST
Route::post('usuarios/crear_usuario', array(
    'uses' => 'UserController@nuevo_usuario',
    'as' => 'nuevo_usuario'
));

Route::post('usuarios/eliminar', array(
    'uses' => 'UserController@eliminarUsuario',
    'as' => 'eliminar'
));

Route::post('usuarios/editar_usuario', array(
    'uses' => 'UserController@editarUsuario',
    'as' => 'editar_usaurio'
));
/**********************************************/

/**
 * *****************************
 * ADMINISTRACION DE PERSONAS
 * *****************************
 */

//ARRENDATARIOS
//GET
Route::get('personas/existenit/{nit}', array(
    'uses' => 'PersonaController@existePersonaByNit'
));

Route::get('personas/buscar/{nit}', array(
    'uses' => 'PersonaController@verPropietario'
));

Route::get('personas/arrendatarios', array(
    'uses' => 'PersonaController@arrendatarios',
    'as' => 'arrendatarios'
));

Route::get('personas/arrendatario/crear', array(
    'uses' => 'PersonaController@verFormCrearArrendatario',
    'as' => 'crear_arrendatario'
));

Route::get('personas/arrendatario/editar/{id}', array(
    'uses' => 'PersonaController@verFormEditarArrendatario',
    'as' => 'crear_arrendatario'
));
Route::get('personas/arrendatario/getArrendatarioByNit/{nit}', array(
    'uses' => 'PersonaController@getArrendatarioByNit',
    'as' => 'getArrendatarioByNit'
));

Route::get('personas/arrendatario/getCodeudorByNit/{nit}', array(
    'uses' => 'PersonaController@getCodeudorByNit'
));
Route::get('personas/arrendatario/getCodeudor2ByNit/{nit}', array(
    'uses' => 'PersonaController@getCodeudor2ByNit'
));

//ARRENDATARIOS
//POST
Route::get('persona/getArrendatarios/{nit}', array(
    'uses' => 'PersonaController@getArrendatarios',
    'as' => 'getArrendatarios'
));

Route::post('personas/arrendatario/crear_arrendatario', array(
    'uses' => 'PersonaController@guardarNuevoArrendatario',
    'as' => 'guardar_arrendatario'
));

Route::post('personas/arrendatario/elimiar', array(
    'uses' => 'PersonaController@eliminarArrendatario',
    'as' => 'eliminar_arrendatario'
));

Route::post('personas/arrendatario/editar_arrendatario', array(
    'uses' => 'PersonaController@editarArrendatario',
    'as' => 'editar_arrendatario'
));

//CODEUDORES
//GET
Route::get('presonas/codeudores', array(
    'uses' => 'PersonaController@codeudores',
    'as' => 'codeudores'
));

Route::get('personas/codeudor/crear', array(
    'uses' => 'PersonaController@verFormCrearCodeudor',
    'as' => 'crear_codeudor'
));

Route::get('personas/codeudor/editar/{id_c}', array(
    'uses' => 'PersonaController@verFormEditarCodeudor',
    'as' => 'form_editar_codeudor'
));

//CODEUDORES
//POST

Route::post('personas/codeudor/crear_codeudor', array(
    'uses' => 'PersonaController@guardarNuevoCodeudor',
    'as' => 'guardar_codeudor'
));

Route::post('personas/codeudor/elimiar', array(
    'uses' => 'PersonaController@eliminarCodeudor',
    'as' => 'eliminar_codeudor'
));

Route::post('personas/codeudor/editar_codeudor', array(
    'uses' => 'PersonaController@editarCodeudor',
    'as' => 'editar_codeudor'
));
/****************/

/**
 * *****************************
 * ADMINISTRACION DE PROPIEDADES
 * *****************************
 */

//GET
Route::get('propiedades', array(
    'uses' => 'PropiedadController@propiedades'
));

Route::get('propiedades/ventas', array(
    'uses' => 'PropiedadController@propiedadesVentas'
));

Route::get('propiedades/crear', array(
    'uses' => 'PropiedadController@verFromCrearPropiedad',
    'as' => 'propiedades_form_crear'
));
Route::get('propiedades/arriendos', array(
    'uses' => 'PropiedadController@verArrendar',
    'as' => 'propiedades_form_arrendar'
));
Route::get('propiedades/getPropiedadesPropietario/{nit}', array(
    'uses' => 'PropiedadController@getPropiedadesPropietario',
    'as' => 'getPropiedadesPropietario'
));
Route::get('propiedades/getPropiedadesBarrio/{barrio}', array(
    'uses' => 'PropiedadController@getPropiedadesBarrio',
    'as' => 'getPropiedadesBarrio'
));
Route::get('listar_arriendos', array(
    'uses' => 'PropiedadController@listarArriendos',
    'as' => 'listarArriendos'
));
Route::get('listado_facturas/{id}', array(
    'uses' => 'PropiedadController@listado_facturas',
    'as' => 'listado_facturas'
));

//POST
Route::post('propiedades/guardarNuevaPropiedad', array(
    'uses' => 'PropiedadController@save',
    'as' => 'guardarNuevaPropiedad'
));
Route::post('propiedades/arrendar', array(
    'uses' => 'PropiedadController@arrendar',
    'as' => 'arrendar'
));
Route::post('propiedades/vender', array(
    'uses' => 'PropiedadController@vender',
    'as' => 'vender'
));
Route:post('propiedades/desactivar', array(
    'uses' => 'PropiedadController@desactivar',
    'as' => 'desactivar'
));

//ARRENDATARIOS
//POST
Route::post('propiedades/arrendatario/crear_arrendatario', array(
    'uses' => 'PropiedadController@guardarNuevoArrendatario',
    'as' => 'guardar_arrendatariopropiedad'
));

//TIPOS DE PROPIEDAD
//GET
Route::get('propiedades/tipos_propiedades', array(
    'uses' => 'TipoPropiedadController@tipos_propiedades',
    'as' => 'tipos_propiedades'
));
Route::get('propiedades/tipo_propiedad/crear', array(
    'uses' => 'TipoPropiedadController@verFormCrearTipoPropiedad',
    'as' => 'form_crear_tipo_propiedad'
));
Route::get('propiedades/tipo_propiedad/editar/{id}', array(
    'uses' => 'TipoPropiedadController@verFormEditarTipoPropiedad',
    'as' => 'form_editar_tipo_propiedad'
));

//POST
Route::post('propiedades/tipo_propiedad/crear_tipo_propiedad', array(
    'uses' => 'TipoPropiedadController@guardarNuevoTipoPropiedad',
    'as' => 'crear_tipo_propiedad'
));
Route::post('propiedades/tipo_propiedad/eliminar_tipo_propiedad', array(
    'uses' => 'TipoPropiedadController@eliminarTipoPropiedad',
    'as' => 'eliminar_tipo_propiedad'
));
Route::post('propiedades/tipo_propiedad/editar_tipo_propiedad', array(
    'uses' => 'TipoPropiedadController@guardarEdicionTipoPropiedad',
    'as' => 'editar_tipo_propiedad'
));

/**************/


/**********************
 * COMPROBANTES
 **********************/
//GET
Route::get('comprobante_ingreso', array(
    'uses' => 'PersonaController@comprobante_ingreso',
    'as' => 'comprobante_ingreso'
));
Route::get('comprobante_ingreso/traer/{idarriendo?}', array(
    'uses' => 'PersonaController@comprobante_ingreso_traer',
    'as' => 'comprobante_ingreso_traer'
));
Route::get('comprobante_egreso', array(
    'uses' => 'PersonaController@comprobante_egreso',
    'as' => 'comprobante_egreso'
));

//POST
Route::post('print_comprobante_ingreso', array(
    'uses' => 'PersonaController@print_comprobante_ingreso',
    'as' => 'print_comprobante_ingreso'
));
Route::post('print_comprobante_egreso', array(
    'uses' => 'PersonaController@print_comprobante_egreso',
    'as' => 'print_comprobante_egreso'
));

//post
Route::post('print_comprobante_ingreso_traer', array(
    'uses' => 'PersonaController@print_comprobante_ingreso_traer',
    'as' => 'print_comprobante_ingreso_traer'
));

Route::get('factura', array(
    'uses' => 'PersonaController@factura'
));


Route::get('imprimir_factura/{idfactura?}', array(
    'uses' => 'PropiedadController@imprimir_factura',
    'as' => 'imprimir_factura'
));


            
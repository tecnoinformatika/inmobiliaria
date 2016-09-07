@extends('administrador_index')

@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Arrendar Propiedad</h3>

                <div class="box-tools pull-right">
                    <a href="{{URL::to('propiedades')}}"><i class="fa fa-dashboard"></i> Propiedades</a>
                    <a href="{{URL::to('propiedades/crear')}}" class="btn btn-box-tool"><i
                                class="fa fa-building-o"></i> Nueva Propiedad</a>
                </div>
            </div>

            <div class="box-body table-responsive no-padding">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Propiedades por Propietario</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-body table-responsive no-padding">
                            <h3>BÚSQUEDA:</h3>

                            <div class="col-md-6">
                                <div class="form-group" id="div_imagen_principal">
                                    <label>NIT/CÉDULA: </label>
                                    <input type="text" class="form-control" placeholder="Digite el nit para buscar..."
                                           id="nit_busqueda" name="nit_busqueda" disabled="true">
                                    <input type="checkbox" id="nit" onclick="desbloqueBusqueda('nit', 'barrio')"> POR
                                    NIT/CÉDULA
                                </div>
                            </div>
                            @if(count($barrios) > 0)
                                <div class="col-md-6">
                                    <label>BARRIO: </label>
                                    <select class="form-control" disabled="true" id="barrio_busqueda"
                                            name="barrio_busqueda">
                                        <option value="x">Sleccione una opción...</option>
                                        @foreach($barrios as $b)
                                            <option value="{{$b->barrio}}">{{$b->barrio}}</option>
                                        @endforeach
                                    </select>
                                    <input type="checkbox" id="barrio" onclick="desbloqueBusqueda('barrio', 'nit')"> POR
                                    BARRIO
                                </div>
                            @endif
                            <div class="col-md-12">
                                <button type="button" class="btn btn-info form-control" id="buscar"
                                        data-toggle="tooltip"
                                        data-placement="top" title="Realizar busqueda.."
                                        onclick="buscar('{{URL::to('')}}')">
                                    <i class="fa fa-search"></i>Buscar
                                </button>
                            </div>
                        </div>
                        <div class="row" id="cantidades">
                            <div class="col-md-12">
                                <h5>Se encontraron {{count($propiedades)}} propiedades registradas para arrendar.</h5>
                            </div>
                        </div>
                        <div class="row" id="mostrar">
                            @if(count($propiedades) > 0)
                                @foreach($propiedades as $p)
                                    <div class="col-md-4">
                                        <!-- Widget: user widget style 1 -->
                                        <div class="box box-widget widget-user">
                                            <!-- Add the bg color to the header using any of the bg-* classes -->
                                            <div class="widget-user-header bg-purple-active">
                                                <h3 class="widget-user-username">{{$p->direccion}}</h3>
                                                <h5 class="widget-user-desc">{{$p->barrio}}</h5>
                                            </div>
                                            <div class="widget-user-image">
                                                <img class="img-circle" src="{{URL::to($p->imagen_principal)}}">
                                            </div>
                                            <div class="box-footer">
                                                <div class="row">
                                                    @if($p->estado == 0)
                                                        <div class="col-sm-3">
                                                            @else
                                                                <div class="col-sm-6">
                                                                    @endif
                                                                    <div class="description-block" data-toggle="tooltip"
                                                                         data-placement="bottom" title="Información">
                                                                        @if($p->estado == 0)
                                                                            <label class="label label-default">Se {{$p->proposito}}</label>
                                                                        @elseif($p->estado == 1)
                                                                            <label class="label label-danger">ARRENDADA</label>
                                                                        @elseif($p->estado == 2)
                                                                            <label class="label label-warning">VENDIDA</label>
                                                                        @endif
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="description-block" data-toggle="tooltip"
                                                                         data-placement="bottom" title="Información">
                                                                        <a class="btn btn-info" data-toggle="modal"
                                                                           data-target="#informacion"
                                                                           onclick="datos('{{URL::to('')}}', '{{$p->id}}', '{{$p->direccion}}', '{{$p->barrio}}', '{{$p->valor_arriendo}}', '{{$p->valor_condominio}}', '{{$p->area}}', '{{$p->numero_escritura}}', '{{$p->estrato}}', '{{$p->nombre_tp}}', '{{$p->imagen_principal}}', '{{$p->imagen1}}', '{{$p->imagen2}}', '{{$p->imagen3}}', '{{$p->imagen4}}', '{{$p->id_persona}}', '{{$p->nit}}', '{{$p->nombre}} {{$p->apellido}}', '{{$p->telefono}}', '{{$p->correo}}', '{{$p->descripcion}}')"><i
                                                                                    class="fa fa-linkedin"></i></a>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                @if($p->estado == 0)
                                                                    <div class="col-sm-3">
                                                                        @if($p->proposito == "Arrienda")
                                                                            <div class="description-block"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="bottom"
                                                                                 title="Arrendar">

                                                                                <button class='btn btn-info'
                                                                                        data-toggle='modal'
                                                                                        data-target='#arrendar'
                                                                                        onclick="$('#id_propiedad').val('{{$p->id}}');">
                                                                                    <i class='fa fa-buysellads'></i>
                                                                                </button>

                                                                            </div>
                                                                        @else
                                                                            <div class="description-block"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="bottom" title="Vender">
                                                                                <button class='btn btn-warning'
                                                                                        data-toggle='modal'
                                                                                        data-target='#vender'
                                                                                        onclick="$('#id_p').val('{{$p->id}}');">
                                                                                    <i
                                                                                            class='fa fa- fa-vimeo'></i>
                                                                                </button>
                                                                            </div>
                                                                            @endif
                                                                                    <!-- /.description-block -->
                                                                    </div>
                                                                @endif
                                                                
                                                                <?php 
                                                                
                                                                $idarriendos = \App\Models\Arriendo::where('propiedad_id', $p->id)->orderby('created_at','DESC')->take(1)->get();
                                                                if (count($idarriendos) > 0){
                                                                    
                                                               
                                                                foreach ($idarriendos as $idarri)
                                                                
                                                                $arrenda = $idarri->id;
                                                                
                                                                
                                                                
                                                                 ?>
                                                                @if ($arrenda > 0)
                                                               <div class="col-sm-2">
                                                                    <div class="description-block" data-toggle="tooltip"
                                                                         data-placement="bottom" title="Ver comprobante {{$arrenda}}">
                                                                        <a class="btn btn-success"
                                                                                href="{{    route ('comprobante_ingreso_traer',[$arrenda])}}">
                                                                            <i class="fa fa-file-word-o"> </i>
                                                                        </a>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                @else
                                                                
                                                                 
                                                                @endif
                                                                <?php
                                                                    }
                                                                ?>
                                                                <div class="col-sm-2">
                                                                    <div class="description-block" data-toggle="tooltip"
                                                                         data-placement="bottom" title="Dar de Baja">
                                                                        <button class="btn btn-danger"
                                                                                data-toggle='modal'
                                                                                data-target='#darbaja'
                                                                                onclick="$('#id').val('{{$p->id}}');">
                                                                            <i class="fa fa-close"> </i>
                                                                        </button>
                                                                    </div>
                                                                    <!-- /.description-block -->
                                                                </div>
                                                                <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->
                                                </div>
                                            </div>
                                            <!-- /.widget-user -->
                                        </div>
                                        
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="arrendar" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info"></i> <b>Arrendatario</b></h4>
                </div>
                {!! Form::open(array('url' => 'propiedades/arrendar', 'method' => 'post')) !!}
                <div class="modal-body">
                    <input type="text" name="id_propiedad" class="hidden" id="{{$p->id}}" value="{{$p->id}}" >
                    <label>NIT/CÉDULA *</label>

                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Digite el Nit..." id="nit_arrendatario"
                               name="nit_arrendatario" >
                                    <span class="input-group-btn">
                                      <button type="button" class="btn btn-success btn-flat" id="verifica_arrendatario"
                                              onclick="verArrendatario('{{URL::to('personas/arrendatario/getArrendatarioByNit')}}', '{{    URL::to('')}}')">
                                          <i class="fa fa-eye"></i> Verificar
                                      </button>
                                        <button type="button" class="btn btn-danger btn-flat"
                                                id="borra_nit_arrendatario"
                                                onclick="reiniciarBusquedaArrendatario()" disabled>
                                            <i class="fa  fa-retweet"></i> Reiniciar
                                        </button>
                                    </span>
                    </div>
                    <span class="help-block" id="error_imagen_principal"></span>
                        
                    <div id="info_arrendatario">

                    </div>
                    <div id="info_codeudor">

                    </div>
                    <div id="info_codeudor2">

                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                            onclick="reiniciarBusquedaArrendatario()"><i class="fa fa-close"> </i>
                        CERRAR
                    </button>
                   
                    <button type="submit" class="btn btn-success" id="arrendar_ok" disabled><i
                                class="fa fa-check"> </i>
                        ARRENDAR
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="informacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info"></i> <b>INFORMACIÓN</b></h4>
                </div>

                <div class="modal-body">
                    <div class="col-md-12">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-purple">
                                <h3 class="widget-user-username" id="v_direccion"></h3>
                                <h5 class="widget-user-desc" id="v_barrio"></h5>
                            </div>
                            <div class="box-footer no-padding">
                                <b>DATOS PROPIEDAD</b><br>

                                <div class="col-md-6">
                                    <b>ARRIENDO:</b> <span id="v_arriendo"></span>
                                </div>
                                <div class="col-md-6">
                                    <b>CONDOMINIO:</b> <span id="v_condominio"></span>
                                </div>
                                <div class="col-md-6">
                                    <b>AREA:</b> <span id="v_area"></span>
                                </div>
                                <div class="col-md-6">
                                    <b>ESCRITURA:</b> <span id="v_escritura"></span>
                                </div>
                                <div class="col-md-6">
                                    <b>ESTRATO:</b> <span id="v_estrato"></span>
                                </div>
                                <div class="col-md-6">
                                    <b>TIPO:</b> <span id="v_tipo"></span>
                                </div>
                                <div class="col-md-12">
                                    <b>DESCRIPCIÓN:</b> <span id="v_descripcion"></span>
                                </div>
                                <br>

                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0"
                                                class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <img src="" alt="..." id="v_imagen_principal">

                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="" alt="..." id="v_imagen_1">

                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="" alt="..." id="v_imagen_2">

                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="" alt="..." id="v_imagen_3">

                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="" alt="..." id="v_imagen_4">

                                                <div class="carousel-caption">
                                                    ...
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic"
                                           role="button"
                                           data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"
                                                      aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic"
                                           role="button"
                                           data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"
                                                      aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>

                                <div class="col-md-12"><br>
                                    <b>DATOS PROPIETARIO</b><br><br>

                                    <div class="col-md-6">
                                        <b>NIT:</b> <span id="v_nit"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <b>NOMBRE:</b> <span id="v_nombre"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <b>TELEFONO:</b> <span id="v_telefono"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <b>CORREO:</b> <span id="v_correo"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i>
                        CERRAR
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="darbaja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
                </div>
                {!! Form::open(array('url' => 'propiedades/desactivar', 'method' => 'post')) !!}
                <div class="modal-body">
                    ¿Está segur@ que desea dar de baja a la propiedad?
                    <input type="hidden" id="id" name="id">

                    <div class='checkbox'>
                        <label>
                            <input type='checkbox' value="vender" name='acepta_darbaja' id="acepta_darbaja"
                                   onclick="aceptaDarBaja()"> Acepta realizar el
                            procedimiento.
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i>
                        NO
                    </button>
                    <button type="submit" class="btn btn-success" disabled id="submit_darbaja"><i
                                class="fa fa-check"> </i> SI
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
                                        @endforeach
                                        {!! $propiedades->render() !!}
                                        @else
                                            No se encuentran propiedades registradas para arrendar.
                                        @endif
    <div class="modal fade" id="crearcodeudor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info"></i> <b>INFORMACIÓN</b></h4>
                </div>

                <div class="modal-body">
                    <div class="col-md-12">
                        {!! Form::open(array('url' => 'personas/codeudor/crear_codeudor', 'method' => 'post', 'id' => 'formulario')) !!}
                <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Datos Personales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>NIT/CÉDULA *</label>

                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Digite el Nit..." id="nit" name="nit">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_nombres">
                            <label>NOMBRES *</label>
                            <input type="text" class="form-control" placeholder="Digite los Nombres..." id="nombres"
                                   name="nombres">
                            <span class="help-block" id="error_nombres"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_apellidos">
                            <label>Apellidos *</label>
                            <input type="text" class="form-control" placeholder="Digite los Apellidos..." id="apellidos"
                                   name="apellidos" >
                            <span class="help-block" id="error_apellidos"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono">
                            <label>TELÉFONO *</label>
                            <input type="tel" class="form-control" placeholder="Digite el teléfono..." id="telefono"
                                   name="telefono" >
                            <span class="help-block" id="error_telefono"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_email">
                            <label>EMAIL *</label>
                            <input type="email" class="form-control" placeholder="Digite el email..." id="email"
                                   name="email" required="true" >
                            <span class="help-block" id="error_email"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_profesion">
                            <label>PROFESIÓN *</label>
                            <input type="text" class="form-control" placeholder="Digite la profesión..." id="profesion"
                                   name="profesion" >
                            <span class="help-block" id="error_profesion"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_labora_en">
                            <label>LABORA EN *</label>
                            <input type="text" class="form-control" placeholder="Digite donde labora..." id="labora_en"
                                   name="labora_en" >
                            <span class="help-block" id="error_labora_en"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_direccion_labora">
                            <label>DIRECCIÓN DONDE LABORA *</label>
                            <input type="text" class="form-control" placeholder="Digite la dirección de donde labora..."
                                   id="direccion_labora" name="direccion_labora" >
                            <span class="help-block" id="error_direccion_labora"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono_labora">
                            <label>TELEFONO DONDE LABORA *</label>
                            <input type="tel" class="form-control" placeholder="Digite el telefono de donde labora..."
                                   id="telefono_labora" name="telefono_labora" >
                            <span class="help-block" id="error_telefono_labora"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="div_direccion_residencia">
                            <label>DIRECCIÓN DE RESIDENCIA *</label>
                            <input type="text" class="form-control" placeholder="Digite la dirección de residencia..."
                                   id="direccion_residencia" name="direccion_residencia" >
                            <span class="help-block" id="error_direccion_residencia"></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Datos Codeudor</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="div_ingreso_mensual">
                            <label>INGRESOS *</label>
                            <input type="number" class="form-control" placeholder="Digite el ingreso mensual..."
                                   id="ingreso_mensual" name="ingreso_mensual" step="any" min='0' >
                            <span class="help-block" id="error_ingreso_mensual"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_numero_registro_camara_comercio">
                            <label>CARGO *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite el número de la cámara de comercio..." id="cargo" name="cargo" >
                            <span class="help-block" id="error_numero_registro_camara_comercio"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="div_referencia_bancaria">
                            <label>REFERENCIA BANCARIA *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite el número de la referencia bancaria..." id="referencia_bancaria"
                                   name="referencia_bancaria" >
                            <span class="help-block" id="error_referencia_bancaria"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_cuenta_corriente">
                            <label>CUENTA CORRIENTE *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite el número de la cuenta corriente..." id="cuenta_corriente"
                                   name="cuenta_corriente" >
                            <span class="help-block" id="error_cuenta_corriente"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_cuenta_ahorroros">
                            <label>CUENTA AHORROS *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite el número de la cuenta de ahorros..." id="cuenta_ahorroros"
                                   name="cuenta_ahorroros" >
                            <span class="help-block" id="error_cuenta_ahorroros"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_referencia_comercial">
                            <label>REFENCIA COMERCIAL *</label>
                            <input type="text" class="form-control" placeholder="Digite la referencia comercial..."
                                   id="referencia_comercial" name="referencia_comercial" >
                            <span class="help-block" id="error_referencia_comercial"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono_ref_comercial">
                            <label>TELEFONO REFENCIA COMERCIAL *</label>
                            <input type="tel" class="form-control" placeholder="Digite la referencia comercial..."
                                   id="telefono_ref_comercial" name="telefono_ref_comercial" >
                            <span class="help-block" id="error_telefono_ref_comercial"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_referencia_personal">
                            <label>REFENCIA PERSONAL *</label>
                            <input type="text" class="form-control" placeholder="Digite la referencia comercial..."
                                   id="referencia_personal" name="referencia_personal" >
                            <span class="help-block" id="error_referencia_personal"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono_ref_personal">
                            <label>TELEFONO REFENCIA PERSONAL *</label>
                            <input type="tel" class="form-control" placeholder="Digite la referencia comercial..."
                                   id="telefono_ref_personal" name="telefono_ref_personal" >
                            <span class="help-block" id="error_telefono_ref_personal"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_finca_raiz_direccion">
                            <label>DIRECCIÓN FINCA RAIZ *</label>
                            <input type="tel" class="form-control" placeholder="Digite la finca raiz..."
                                   id="finca_raiz_direccion" name="finca_raiz_direccion" >
                            <span class="help-block" id="error_finca_raiz_direccion"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_matricula_inmobiliaria">
                            <label>MATRICULA INMOBILIRIA FINCA RAIZ *</label>
                            <input type="tel" class="form-control" placeholder="Digite la finca raiz..."
                                   id="matricula_inmobiliaria" name="matricula_inmobiliaria" >
                            <span class="help-block" id="error_matricula_inmobiliaria"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="alert alert-warning alert-dismissible" style="display: none;" id="campo_error">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <span id="error">Warning alert preview. This alert is dismissable.</span>
            </div>
            <a href="{{URL::to('personas/arrendatarios')}}" class="btn btn-danger" id="cancelar"><i
                        class="fa fa-close"></i> Cancelar</a>
            <button type="submit" class="btn btn-success pull-right"><i
                        class="fa fa-check"></i> Crear
            </button>
        </div>
        {!! Form::close() !!}
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i>
                        CERRAR
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="creararrendatario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info"></i> <b>INFORMACIÓN</b></h4>
                </div>

                <div class="modal-body">
                    <div class="col-md-12">
                        {!! Form::open(array('url' => 'propiedades/arrendatario/crear_arrendatario', 'method' => 'post', 'id' => 'formulario')) !!}
                <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Datos Personales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>NIT/CÉDULA *</label>

                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Digite el Nit..." id="nit" name="nit">
                        </div>
                        <span class="help-block" id="error_nit"></span>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_nombres">
                            <label>NOMBRES *</label>
                            <input type="text" class="form-control" placeholder="Digite los Nombres..." id="nombres"
                                   name="nombres" >
                            <span class="help-block" id="error_nombres"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_apellidos">
                            <label>Apellidos *</label>
                            <input type="text" class="form-control" placeholder="Digite los Apellidos..." id="apellidos"
                                   name="apellidos" >
                            <span class="help-block" id="error_apellidos"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono">
                            <label>TELÉFONO *</label>
                            <input type="tel" class="form-control" placeholder="Digite el teléfono..." id="telefono"
                                   name="telefono" >
                            <span class="help-block" id="error_telefono"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_email">
                            <label>EMAIL *</label>
                            <input type="email" class="form-control" placeholder="Digite el email..." id="email"
                                   name="email" required="true" >
                            <span class="help-block" id="error_email"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_profesion">
                            <label>PROFESIÓN *</label>
                            <input type="text" class="form-control" placeholder="Digite la profesión..." id="profesion"
                                   name="profesion" >
                            <span class="help-block" id="error_profesion"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_labora_en">
                            <label>LABORA EN *</label>
                            <input type="text" class="form-control" placeholder="Digite donde labora..." id="labora_en"
                                   name="labora_en" >
                            <span class="help-block" id="error_labora_en"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_direccion_labora">
                            <label>DIRECCIÓN DONDE LABORA *</label>
                            <input type="text" class="form-control" placeholder="Digite la dirección de donde labora..."
                                   id="direccion_labora" name="direccion_labora" >
                            <span class="help-block" id="error_direccion_labora"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono_labora">
                            <label>TELEFONO DONDE LABORA *</label>
                            <input type="tel" class="form-control" placeholder="Digite el telefono de donde labora..."
                                   id="telefono_labora" name="telefono_labora" >
                            <span class="help-block" id="error_telefono_labora"></span>
                        </div>
                    </div>
                    <!--<div class="col-md-12">
                        <div class="form-group" id="div_direccion_residencia">
                            <label>DIRECCIÓN DE RESIDENCIA *</label>
                            <input type="text" class="form-control" placeholder="Digite la dirección de residencia..." id="direccion_residencia" name="direccion_residencia">
                            <span class="help-block" id="error_direccion_residencia"></span>
                        </div>
                    </div>-->
                </div>

            </div>

        </div>
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Datos Arrendatario</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="div_ingreso_mensual">
                            <label>INGRESOS MENSUALES *</label>
                            <input type="number" class="form-control" placeholder="Digite el ingreso mensual..."
                                   id="ingreso_mensual" name="ingreso_mensual" step="any" min='0' >
                            <span class="help-block" id="error_ingreso_mensual"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_numero_registro_camara_comercio">
                            <label>CAMARA DE COMERCIO *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite el n��mero de la cámara de comercio..."
                                   id="numero_registro_camara_comercio" name="numero_registro_camara_comercio" >
                            <span class="help-block" id="error_numero_registro_camara_comercio"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="div_referencia_bancaria">
                            <label>REFERENCIA BANCARIA *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite el número de la referencia bancaria..." id="referencia_bancaria"
                                   name="referencia_bancaria" >
                            <span class="help-block" id="error_referencia_bancaria"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_cuenta_corriente">
                            <label>CUENTA CORRIENTE *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite el número de la cuenta corriente..." id="cuenta_corriente"
                                   name="cuenta_corriente" >
                            <span class="help-block" id="error_cuenta_corriente"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_cuenta_ahorroros">
                            <label>CUENTA AHORROS *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite el número de la cuenta de ahorros..." id="cuenta_ahorroros"
                                   name="cuenta_ahorroros" >
                            <span class="help-block" id="error_cuenta_ahorroros"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_referencia_comercial">
                            <label>REFENCIA COMERCIAL *</label>
                            <input type="text" class="form-control" placeholder="Digite la referencia comercial..."
                                   id="referencia_comercial" name="referencia_comercial" >
                            <span class="help-block" id="error_referencia_comercial"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono_ref_comercial">
                            <label>TELEFONO REFENCIA COMERCIAL *</label>
                            <input type="tel" class="form-control" placeholder="Digite la referencia comercial..."
                                   id="telefono_ref_comercial" name="telefono_ref_comercial" >
                            <span class="help-block" id="error_telefono_ref_comercial"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_referencia_personal">
                            <label>REFENCIA PERSONAL *</label>
                            <input type="text" class="form-control" placeholder="Digite la referencia comercial..."
                                   id="referencia_personal" name="referencia_personal" >
                            <span class="help-block" id="error_referencia_personal"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono_ref_personal">
                            <label>TELEFONO REFENCIA PERSONAL *</label>
                            <input type="tel" class="form-control" placeholder="Digite la referencia comercial..."
                                   id="telefono_ref_personal" name="telefono_ref_personal" >
                            <span class="help-block" id="error_telefono_ref_personal"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="alert alert-warning alert-dismissible" style="display: none;" id="campo_error">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <span id="error">Warning alert preview. This alert is dismissable.</span>
            </div>
            <a href="{{URL::to('personas/arrendatarios')}}" class="btn btn-danger" id="cancelar"><i
                        class="fa fa-close"></i> Cancelar</a>
            <button type="submit" class="btn btn-success pull-right" onclick="validar()" id="crear"><i
                        class="fa fa-check"></i> Crear
            </button>
        </div>

        {!! Form::close() !!}

                                            </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i>
                        CERRAR
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection

<script>
    function desbloqueBusqueda(id_desbloquea, id_bloquea) {
        var id_desbloquea_marcado = $("#" + id_desbloquea).prop("checked") ? true : false;
        var id_bloquea_marcado = $("#" + id_bloquea).prop("checked") ? true : false;
        if (id_desbloquea_marcado) {
            $("#" + id_desbloquea + '_busqueda').removeAttr('disabled');
            $("#" + id_bloquea).removeAttr('checked');
            $("#" + id_bloquea + '_busqueda').attr('disabled', true);
        } else {
            $("#" + id_desbloquea + '_busqueda').attr('disabled', true);
            $("#" + id_desbloquea + '_busqueda').val('');
        }
    }

    function buscar(url_path, proposito) {
        $("#buscar").html("<i class='fa fa- fa-spinner'></i> Buscando..........");
        $("#buscar").removeAttr('disabled');
        var nit_buscar = $("#nit").prop("checked") ? true : false;
        var barrio_buscar = $("#barrio").prop("checked") ? true : false;
        var ruta = "";
        if (nit_buscar) {
            var nit = $("#nit_busqueda").val();
            if (nit.length > 0) {
                ruta = url_path + '/propiedades/getPropiedadesPropietario/' + nit;
            }
        } else if (barrio_buscar) {
            var barrio = $("#barrio_busqueda").val();
            if (barrio.length > 0) {
                ruta = url_path + '/propiedades/getPropiedadesBarrio/' + barrio;
            }
        }
        //alert(ruta);
        if (ruta) {
            $.ajax({
                url: ruta,
                method: 'GET'
            }).done(function (data) {
                $("#buscar").html("<i class='fa fa-search'></i> Buscar");
                $("#buscar").removeAttr('disabled');
                $("#mostrar").html("Realizando la búsqueda por favor espere....");
                if (data) {
                    $("#cantidades").html("<a class='btn btn-warning' href='javascript:location.reload()'><i class='fa fa-mail-reply'></i> Ver Todas</a><div class='col-md-12'><h5>Se encontraron propiedades.</h5></div>");
                    $("#mostrar").html(data);
                } else {
                    mostrar += "<div class='col-md-12'>";
                    mostrar += "<h3>No se encuentran propiedades, asociadas al propietario con el nit indicado.</h3>";
                    mostrar += "</div>";
                    $("#mostrar").html(mostrar);
                    mostrar = "";
                    $("#buscar").html("<i class='fa fa-search'></i> Buscar");
                    $("#buscar").removeAttr('disabled');
                }
            }).error(function (xhr, ajaxOptions, thrownError) {
                alert("Error de tipo - " + xhr.status + " con mensaje - " + thrownError);
                $("#buscar").html("<i class='fa fa-search'></i> Buscar");
                $("#buscar").removeAttr('disabled');
            });
        } else {
            alert("Debe diligenciar los datos y escoger la forma para realizar la búsqueda.");
            $("#buscar").html("<i class='fa fa-search'></i> Buscar");
            $("#buscar").removeAttr('disabled');
        }
    }

    function verArrendatario(url, url_path) {
        $("#info_arrendatario").html("<div class='col-md-12'><p> <i class='fa fa-refresh'></i> Cargando....</p></div>");
        var nit = $("#nit_arrendatario").val();
        $("#verifica_arrendatario").attr({disabled: 'true'});
        $("#nit_arrendatario").attr({readonly: 'true'});
        $.ajax({
            url: url + "/" + nit,
            method: 'GET'
        }).done(function (data) {
            //alert(data);
            var mostrar_arrendatario = "";
            var d = JSON.parse(data);
            if (d) {
                $("#borra_nit_arrendatario").removeAttr('disabled');
                mostrar_arrendatario = "<table class='table table-bordered'>";
                mostrar_arrendatario += "<thead>";
                mostrar_arrendatario += "<tr>";
                mostrar_arrendatario += "<th>NOMBRE</th>";
                mostrar_arrendatario += "<th>PROFESION</th>";
                mostrar_arrendatario += "<th>INGRESOS</th>";
                mostrar_arrendatario += "<th>TELEFONO</th>";
                mostrar_arrendatario += "</tr>";
                mostrar_arrendatario += "</thead>";
                mostrar_arrendatario += "<tbody>";
                mostrar_arrendatario += "<tr>";
                mostrar_arrendatario += "<td>" + d.nombre + " " + d.apellido + "</td>";
                mostrar_arrendatario += "<td>" + d.profesion + "</td>";
                mostrar_arrendatario += "<td>" + d.ingresos_mensuales + "</td>";
                mostrar_arrendatario += "<td>" + d.telefono + "</td>";
                mostrar_arrendatario += "</tr>";
                mostrar_arrendatario += "</tbody>";
                mostrar_arrendatario += "</table>";
                mostrar_arrendatario += "<input type='text' class='hidden' name='id_arrendatario' value='"+ d.id_arrendatario +"'>";
                mostrar_arrendatario += "<label>CODEUDOR 1</label>";
                mostrar_arrendatario += "<div class='input-group input-group-sm'>";
                mostrar_arrendatario += '<input type="text" class="form-control" placeholder="Digite el Nit..." id="nit_codeudor" name="nit_codeudor">';
                mostrar_arrendatario += '<span class="input-group-btn">';
                mostrar_arrendatario += '<button type="button" class="btn btn-info btn-flat" id="verifica_nit_codeudor" onclick="verCodeudor(\'{{URL::to('personas/arrendatario/getCodeudorByNit')}}\', \'{{URL::to('/')}}\')">';
                mostrar_arrendatario += '<i class="fa fa-eye"></i> Verificar';
                mostrar_arrendatario += '</button>';
                mostrar_arrendatario += '<button type="button" class="btn btn-danger btn-flat" id="borra_nit_codeudor" onclick="reiniciar()" disabled>';
                mostrar_arrendatario += '<i class="fa  fa-retweet"></i> Reiniciar';
                mostrar_arrendatario += '</button>';
                mostrar_arrendatario += '</span>';
                mostrar_arrendatario += '</div>';
                mostrar_arrendatario += '<span class="help-block" id="error_imagen_principal"></span>';

            } else {
                $("#verifica_arrendatario").removeAttr('disabled');
                $("#nit_arrendatario").removeAttr('readonly');
                mostrar_arrendatario = "<div class='col-md-12'><p>No existe un arrendatario registrado, para registrarlo pulse clic <a class='btn btn-info' data-toggle='modal' data-target='#creararrendatario'>aquí</a></div><br/><br/>";
            }
            $("#info_arrendatario").html(mostrar_arrendatario);
        }).error(function (error) {
            reiniciarBusquedaArrendatario();
            alert("Error");
        });
    }

    function datos(url, id_prop, direccion, barrio, arriendo, condominio, area, escritura, estrato, tipo, imgp, img1, img2, img3, img4, id_per, nit, nombre, telefono, correo, descripcion) {

        $("#v_id_propiedad").html(id_prop);
        $("#v_direccion").html(direccion);
        $("#v_barrio").html(barrio);
        $("#v_arriendo").html(arriendo);
        $("#v_condominio").html(condominio);
        $("#v_area").html(area);
        $("#v_escritura").html(escritura);
        $("#v_estrato").html(estrato);
        $("#v_tipo").html(tipo);
        $("#v_imagen_principal").attr('src', url + '/' + imgp);
        $("#v_imagen_1").attr('src', url + '/' + img1);
        $("#v_imagen_2").attr('src', url + '/' + img2);
        $("#v_imagen_3").attr('src', url + '/' + img3);
        $("#v_imagen_4").attr('src', url + '/' + img4);
        $("#v_nombre").html(nombre);
        $("#v_nit").html(nit);
        $("#v_telefono").html(telefono);
        $("#v_correo").html(correo);
        $("#v_descripcion").html(descripcion);
    }

    function aceptaDarBaja() {
        var acepta_vender = $("#acepta_darbaja").prop("checked") ? true : false;
        if (acepta_vender) {
            $("#submit_darbaja").removeAttr('disabled');
        } else {
            $("#submit_darbaja").attr('disabled', 'true');
        }
    }

    function verCodeudor(url, url_path) {
        $("#info_codeudor").html("<div class='col-md-12'><p> <i class='fa fa-refresh'></i> Cargando....</p></div>");
        var nit = $("#nit_codeudor").val();
        $("#nit_codeudor").attr({readonly: 'true'});
        $("#verifica_nit_codeudor").attr({disabled: 'true'});
        if (nit) {
            $.ajax({
                url: url + "/" + nit,
                method: 'GET'
            }).done(function (data) {
                //alert(data);
                var d = JSON.parse(data);
                var mostrar = "";
                if (d) {
                    $("#borra_nit_codeudor").removeAttr('disabled');
                    mostrar = "<table class='table table-bordered'>";
                    mostrar += "<thead>";
                    mostrar += "<tr>";
                    mostrar += "<th>NOMBRE</th>";
                    mostrar += "<th>PROFESION</th>";
                    mostrar += "<th>INGRESOS</th>";
                    mostrar += "</tr>";
                    mostrar += "</thead>";
                    mostrar += "<tbody>";
                    mostrar += "<tr>";
                    mostrar += "<td>" + d.nombre + " " + d.apellido + "</td>";
                    mostrar += "<td>" + d.profesion + "</td>";
                    mostrar += "<td>" + d.ingresos_mensuales + "</td>";
                    mostrar += "</tr>";
                    mostrar += "</tbody>";
                    mostrar += "</table>";
                    mostrar += "<input type='text' class='hidden' name='id_codeudor' value='"+ d.id_codeudor +"'>";
                    mostrar += "<label>CODEUDOR 2</label>";
                    mostrar += "<div class='input-group input-group-sm'>";
                    mostrar += '<input type="text" class="form-control" placeholder="Digite el Nit..." id="nit_codeudor2" name="nit_codeudor2">';
                    mostrar += '<span class="input-group-btn">';
                    mostrar += '<button type="button" class="btn btn-info btn-flat" id="verifica_nit_codeudor2" onclick="verCodeudor2(\'{{URL::to('personas/arrendatario/getCodeudor2ByNit')}}\', \'{{URL::to('/')}}\')">';
                    mostrar += '<i class="fa fa-eye"></i> Verificar';
                    mostrar += '</button>';
                    mostrar += '<button type="button" class="btn btn-danger btn-flat" id="borra_nit_codeudor2" onclick="reiniciar()" disabled>';
                    mostrar += '<i class="fa  fa-retweet"></i> Reiniciar';
                    mostrar += '</button>';
                    mostrar += '</span>';
                    mostrar += '</div>';
                    mostrar += '<span class="help-block" id="error_imagen_principal"></span>';

                    $("#info_codeudor").html(mostrar);
                } else {
                    $("#nit_codeudor").removeAttr('readonly');
                    $("#verifica_nit_codeudor").removeAttr('disabled');
                    $("#info_codeudor").html("<p>No se ha encontrado un codeudor con el nit indicado, si desea registrar uno nuevo codeudor, por favor de clic <a class='btn btn-info' data-toggle='modal' data-target='#crearcodeudor'>aquí</a>.</p>");
                }
            }).error(function (error) {
                alert("Ha ocurrido un error interno, verifique su conexión a internet, e intentelo de nuevo.");
                reiniciarBusquedaArrendatario();
            });
        } else {
            $("#nit_codeudor").removeAttr('readonly');
            alert("Debe digitar el Nit del Codeudor para realizar la verificación.");
        }
    }


    function verCodeudor2(url, url_path) {
        $("#info_codeudor2").html("<div class='col-md-12'><p> <i class='fa fa-refresh'></i> Cargando....</p></div>");
        var nit = $("#nit_codeudor2").val();
        $("#nit_codeudor2").attr({readonly: 'true'});
        $("#verifica_nit_codeudor2").attr({disabled: 'true'});
        if (nit) {
            $.ajax({
                url: url + "/" + nit,
                method: 'GET'
            }).done(function (data) {
                //alert(data);
                var d = JSON.parse(data);
                var mostrar_coudeudor2 = "";
                if (d) {
                    $("#borra_nit_codeudor2").removeAttr('disabled');
                    mostrar_coudeudor2 = "<table class='table table-bordered'>";
                    mostrar_coudeudor2 += "<thead>";
                    mostrar_coudeudor2 += "<tr>";
                    mostrar_coudeudor2 += "<th>NOMBRE</th>";
                    mostrar_coudeudor2 += "<th>PROFESION</th>";
                    mostrar_coudeudor2 += "<th>INGRESOS</th>";
                    mostrar_coudeudor2 += "</tr>";
                    mostrar_coudeudor2 += "</thead>";
                    mostrar_coudeudor2 += "<tbody>";
                    mostrar_coudeudor2 += "<tr>";
                    mostrar_coudeudor2 += "<td>" + d.nombre + " " + d.apellido + "</td>";
                    mostrar_coudeudor2 += "<td>" + d.profesion + "</td>";
                    mostrar_coudeudor2 += "<td>" + d.ingresos_mensuales + "</td>";
                    mostrar_coudeudor2 += "</tr>";
                    mostrar_coudeudor2 += "</tbody>";
                    mostrar_coudeudor2 += "</table>";
                    mostrar_coudeudor2 += "<input type='text' class='hidden' name='id_codeudor2' value='"+ d.id_codeudor2 +"'>";
                    mostrar_coudeudor2 += '<div class="form-group" id="div_imagen_principal">';
                    mostrar_coudeudor2 += '<label>FECHA INICIO: *</label>';
                    mostrar_coudeudor2 += '<input type="date" class="form-control" placeholder="Seleccione la fecha..." id="fecha_inicio" name="fecha_inicio" required>';
                    mostrar_coudeudor2 += '<span class="help-block" id="error_imagen_principal"></span>';
                    mostrar_coudeudor2 += '</div>';
                    mostrar_coudeudor2 += '<div class="form-group" id="div_imagen_principal">';
                    mostrar_coudeudor2 += '<label>FECHA FIN: *</label>';
                    mostrar_coudeudor2 += '<input type="date" class="form-control" placeholder="Seleccione la fecha..." id="fecha_fin" name="fecha_fin" required>';
                    mostrar_coudeudor2 += '<span class="help-block" id="error_imagen_principal"></span>';
                    mostrar_coudeudor2 += '</div>';
                    mostrar_coudeudor2 += '<div class="form-group" id="div_imagen_principal">';
                    mostrar_coudeudor2 += '<label>DESTINO INMUEBLE: *</label>';
                    mostrar_coudeudor2 += '<input type="text" class="form-control" placeholder="DEstino del inmueble..." id="destino_inmueble" name="destino_inmueble" required>';
                    mostrar_coudeudor2 += '<span class="help-block" id="error_imagen_principal"></span>';
                    mostrar_coudeudor2 += '</div>';
                    mostrar_coudeudor2 += '<label>Porcentaje de comisión *</label>';
                    mostrar_coudeudor2 += '<input class="form-control" name="comision" value="10" />'
                    mostrar_coudeudor2 += "<input type='checkbox' onclick='arrenarOk()' id='aceptar_arrendar'> ¿Acepta llevar a cabo el arrendamiento?";

                    $("#info_codeudor2").html(mostrar_coudeudor2);
                } else {
                    $("#nit_codeudor2").removeAttr('readonly');
                    $("#verifica_nit_codeudor2").removeAttr('disabled');
                    $("#info_codeudor2").html("<p>No se ha encontrado un codeudor con el nit indicado, si desea registrar uno nuevo codeudor, por favor de clic <a class='btn btn-info' data-toggle='modal' data-target='#crearcodeudor'>aquí</a>.</p>");
                }
            }).error(function (error) {
                alert("Ha ocurrido un error interno, verifique su conexión a internet, e intentelo de nuevo.");
                reiniciarBusquedaArrendatario();
            });
        } else {
            $("#nit_codeudor2").removeAttr('readonly');
            alert("Debe digitar el Nit del Codeudor para realizar la verificación.");
        }
    }

    function reiniciarBusquedaArrendatario() {
        $("#info_arrendatario").html("");
        $("#info_codeudor").html("");
        $("#verifica_arrendatario").removeAttr('disabled');
        $("#nit_arrendatario").removeAttr('readonly');
        $("#nit_arrendatario").val("");
        $("#borra_nit_arrendatario").attr({disabled: 'true'});
        $("#arrendar_ok").attr({disabled: 'true'});
    }

    function arrenarOk() {
        var id_bloquea_marcado = $("#aceptar_arrendar").prop("checked") ? true : false;
        if (id_bloquea_marcado) {
            $("#arrendar_ok").removeAttr('disabled');
        } else {
            $("#arrendar_ok").attr({disabled: 'true'});
        }

    }
</script>
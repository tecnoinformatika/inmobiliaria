@extends('administrador_index')

@section('content')
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Propiedades Registradas en el Sistema</h3>

                <div class="box-tools pull-right">
                    <a href="{{URL::to('propiedades/crear')}}" class="btn btn-box-tool"><i class="fa fa-building-o"></i>
                        Nueva Propiedad</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <h3>BÚSQUEDA:</h3>

                <div class="col-md-6">
                    <div class="form-group" id="div_imagen_principal">
                        <label>NIT/CÉDULA: </label>
                        <input type="text" class="form-control" placeholder="Digite el nit para buscar..."
                               id="nit_busqueda" name="nit_busqueda" disabled="true">
                        <input type="checkbox" id="nit" onclick="desbloqueBusqueda('nit', 'barrio')"> POR NIT/CÉDULA
                    </div>
                </div>
                @if(count($barrios) > 0)
                    <div class="col-md-6">
                        <label>BARRIO: </label>
                        <select class="form-control" disabled="true" id="barrio_busqueda" name="barrio_busqueda">
                            <option value="x">Sleccione una opción...</option>
                            @foreach($barrios as $b)
                                <option value="{{$b->barrio}}">{{$b->barrio}}</option>
                            @endforeach
                        </select>
                        <input type="checkbox" id="barrio" onclick="desbloqueBusqueda('barrio', 'nit')"> POR BARRIO
                    </div>
                @endif
                <div class="col-md-12">
                    <button type="button" class="btn btn-info form-control" id="buscar" data-toggle="tooltip"
                            data-placement="top" title="Realizar busqueda.."
                            onclick="buscar('{{URL::to('')}}')">
                        <i class="fa fa-search"></i>Buscar
                    </button>
                </div>
            </div>
            <br><br>

            <div class="box-body table-responsive no-padding">
                <div class="col-md-12">
                    <div id="cantidades"></div>
                    <div id="mostrar">
                        @if(count($propiedades) > 0)
                            <h5>Se encontraron {{count($propiedades)}} propiedades registradas.</h5>
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
                                            <img class="img-circle" src="{{$p->imagen_principal}}">
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
                                                                        <label class="label label-danger">ARERNDADA</label>
                                                                    @elseif($p->estado == 2)
                                                                        <label class="label label-warning">VENDIDA</label>
                                                                    @endif
                                                                </div>
                                                                <!-- /.description-block -->
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="description-block" data-toggle="tooltip"
                                                                     data-placement="bottom" title="Información">
                                                                    <a class="btn btn-info" data-toggle="modal"
                                                                       data-target="#informacion"
                                                                       onclick="datos('{{$p->id}}', '{{$p->direccion}}', '{{$p->barrio}}', '{{$p->valor_arriendo}}', '{{$p->valor_condominio}}', '{{$p->area}}', '{{$p->numero_escritura}}', '{{$p->estrato}}', '{{$p->nombre_tp}}', '{{$p->imagen_principal}}', '{{$p->imagen1}}', '{{$p->imagen2}}', '{{$p->imagen3}}', '{{$p->imagen4}}', '{{$p->id_persona}}', '{{$p->nit}}', '{{$p->nombre}} {{$p->apellido}}', '{{$p->telefono}}', '{{$p->correo}}', '{{$p->descripcion}}')"><i
                                                                                class="fa fa-linkedin"></i></a>
                                                                </div>
                                                                <!-- /.description-block -->
                                                            </div>
                                                            @if($p->estado == 0)
                                                                <div class="col-sm-3">
                                                                    @if($p->proposito == "Arrienda")
                                                                        <div class="description-block"
                                                                             data-toggle="tooltip"
                                                                             data-placement="bottom" title="Arrendar">

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
                                                                                    onclick="$('#id_p').val('{{$p->id}}');"><i
                                                                                        class='fa fa- fa-vimeo'></i>
                                                                            </button>
                                                                        </div>
                                                                        @endif
                                                                                <!-- /.description-block -->
                                                                </div>
                                                            @endif
                                                            <div class="col-sm-3">
                                                                <div class="description-block" data-toggle="tooltip"
                                                                     data-placement="bottom" title="Dar de Baja">
                                                                    <button class="btn btn-danger"><i
                                                                                class="fa fa-close"> </i>
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
                                    @endforeach
                                    {!! $propiedades->render() !!}
                                    @else
                                        No hay..
                                    @endif
                                </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">

                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->

        </div>
        <!-- MODAL ELIMINAR -->
        <div class="modal fade" id="vender" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
                    </div>
                    {!! Form::open(array('url' => 'propiedades/vender', 'method' => 'post')) !!}
                    <div class="modal-body">
                        ¿Está segur@ que desea cambiar el estado de la propuedad a <b>Vendida</b><strong id="user"></strong>?
                        <input type="hidden" id="id_p" name="id_p">
                        <div class='checkbox'>
                            <label>
                                <input type='checkbox' value="vender" name='acepta_vender' id="acepta_vender" onclick="aceptaVender()"> Acepta realizar el
                                procedimiento.
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i>
                            NO
                        </button>
                        <button type="submit" class="btn btn-success" disabled id="submit_vender"><i class="fa fa-check"> </i> SI</button>
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


        <div class="modal fade" id="arrendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info"></i> <b>INFORMACIÓN</b></h4>
                    </div>
                    {!! Form::open(array('url' => 'propiedades/arrendar', 'method' => 'post')) !!}
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" id="div_imagen_principal">
                                        <label>BUSCAR ARRENDATARIO POR NIT: *</label>

                                        <input type="text" class="form-control"
                                               placeholder="Digite el nit para buscar..."
                                               id="nit_arrendatario" name="nit_arrendatario">
                                        <br>
                                        <button type="button" class="btn btn-info form-control" id="buscar_arrendatario"
                                                onclick="verArrendatario('{{URL::to('personas/arrendatario/getArrendatarioByNit')}}', '{{URL::to('')}}')">
                                            <i class="fa fa-search"></i>Buscar
                                        </button>
                                        <span class="help-block" id="error_imagen_principal"></span>
                                    </div>
                                </div>

                                <input type="hidden" id="id_propiedad" name="id_propiedad" value="">
                                <input type="hidden" id="id_usuario" name="id_usuario" value="">

                                <div class="col-md-12">
                                    <div class="form-group" id="mostrar_arrendatarios"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="div_imagen_principal">
                                        <label>FECHA INICIO: *</label>
                                        <input type="date" class="form-control" placeholder="Seleccione la fehca..."
                                               id="fecha_inicio" name="fecha_inicio" disabled="true">
                                        <span class="help-block" id="error_imagen_principal"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="div_imagen_principal">
                                        <label>FECHA FIN: *</label>
                                        <input type="date" class="form-control" placeholder="Seleccione la fehca..."
                                               id="fecha_fin" name="fecha_fin" disabled="true">
                                        <span class="help-block" id="error_imagen_principal"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="div_imagen_principal">
                                        <label>FECHA LÍMITE DE CANCELACIÓN: *</label>
                                        <input type="date" class="form-control" placeholder="Seleccione la fehca..."
                                               id="fecha_limite" name="fecha_limite" disabled="true">
                                        <span class="help-block" id="error_imagen_principal"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="div_imagen_principal">
                                        <label>DESTINO INMUEBLE: *</label>
                                        <input type="text" class="form-control" placeholder="DEstino del inmueble..."
                                               id="destino_inmueble" name="destino_inmueble" disabled="true">
                                        <span class="help-block" id="error_imagen_principal"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cerrarArrendar()"><i
                                    class="fa fa-close"> </i>
                            CERRAR
                        </button>
                        <button type="submit" class="btn btn-success" id="submit_arrendar" disabled="true"><i
                                    class="fa fa-check"> </i>
                            ARRENDAR
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <script>
            function confirmar(id_p, id_a, user) {
                $("#user").html(user);
                $("#id").val(id_a);
                $("#id_p").val(id_p);
            }

            function datos(id_prop, direccion, barrio, arriendo, condominio, area, escritura, estrato, tipo, imgp, img1, img2, img3, img4, id_per, nit, nombre, telefono, correo, descripcion) {

                $("#v_id_propiedad").html(id_prop);
                $("#v_direccion").html(direccion);
                $("#v_barrio").html(barrio);
                $("#v_arriendo").html(arriendo);
                $("#v_condominio").html(condominio);
                $("#v_area").html(area);
                $("#v_escritura").html(escritura);
                $("#v_estrato").html(estrato);
                $("#v_tipo").html(tipo);
                $("#v_imagen_principal").attr('src', imgp);
                $("#v_imagen_1").attr('src', img1);
                $("#v_imagen_2").attr('src', img2);
                $("#v_imagen_3").attr('src', img3);
                $("#v_imagen_4").attr('src', img4);
                $("#v_nombre").html(nombre);
                $("#v_nit").html(nit);
                $("#v_telefono").html(telefono);
                $("#v_correo").html(correo);
                $("#v_descripcion").html(descripcion);
            }

            function aceptaVender(){
                var acepta_vender = $("#acepta_vender").prop("checked") ? true : false;
                if(acepta_vender){
                    $("#submit_vender").removeAttr('disabled');
                }else{
                    $("#submit_vender").attr('disabled', 'true');
                }
            }

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
                $("#mostrar_arrendatarios").html("<i class='fa  fa-spinner'></i> Buscando....");
                $("#submit_arrendar").attr('disabled', 'true');
                var nit = $("#nit_arrendatario").val();
                $("#buscar_arrendatario").html("Buscando....");
                $("#buscar_arrendatario").attr('disabled', 'true');
                var mostrar = "";
                $.ajax({
                    url: url + "/" + nit,
                    method: 'GET'
                }).done(function (data) {
                    //alert(data);
                    var validar = 0;
                    $("#buscar_arrendatario").html("Buscar");
                    var retorno = JSON.parse(data);
                    $.each(retorno, function (i, item) {
                        validar++;
                        var id = "'" + item.id + "'";
                        var onclic = 'onclick="idusuario(' + id + ')"';
                        mostrar += "<div class='col-sm-12'>";
                        mostrar += "<div class='checkbox' " + onclic + ">";
                        mostrar += "<label>";
                        mostrar += "<input type='checkbox' value='" + item.id + "' name='id'> " + item.nombre + " " + item.apellido;
                        mostrar += "</label>";
                        mostrar += "</div>";
                        mostrar += "</div>";
                    });
                    if (validar > 0) {
                        alert("SI");
                        $("#mostrar_arrendatarios").html(mostrar);
                        $("#submit_arrendar").removeAttr('disabled');
                        $("#buscar_arrendatario").attr('disabled', 'true');
                        $("#fecha_inicio").removeAttr('disabled');
                        $("#fecha_fin").removeAttr('disabled');
                        $("#fecha_limite").removeAttr('disabled');
                        $("#destino_inmueble").removeAttr('disabled');
                        $("#nit_arrendatario").attr('readonly', 'true');
                    } else {
                        $("#mostrar_arrendatarios").html("No se encontraron arrendatarios con el nit/cedula indicado.");
                        $("#buscar_arrendatario").removeAttr('disabled');
                        $("#fecha_inicio").attr('disabled', 'true');
                        $("#fecha_fin").attr('disabled', 'true');
                        $("#fecha_limite").attr('disabled', 'true');
                        $("#destino_inmueble").attr('disabled', 'true');
                    }
                }).error(function (xhr, ajaxOptions, thrownError) {
                    alert("Error de tupo - " + xhr.status + " con mensaje - " + thrownError);
                    $("#buscar_arrendatario").html("Buscar");
                    $("#buscar_arrendatario").removeAttr('disabled');
                });
            }

            function cerrarArrendar() {
                $("#nit_arrendatario").val("");
                $("#mostrar_arrendatarios").html("");
                $("#nit_arrendatario").removeAttr('disabled');
                $("#buscar_arrendatario").removeAttr('disabled');
                $("#fecha_inicio").attr('disabled', 'true');
                $("#fecha_fin").attr('disabled', 'true');
                $("#fecha_limite").attr('disabled', 'true');
                $("#destino_inmueble").attr('disabled', 'true');
            }

            function idusuario(id) {
                $("#id_usuario").val(id);
            }

        </script>
@endsection



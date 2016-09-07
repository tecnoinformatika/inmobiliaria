@extends('administrador_index')

@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Codeudores Registrados en el Sistema</h3>

            <div class="box-tools pull-right">                
                <a href="{{URL::to('personas/codeudor/crear')}}" class="btn btn-box-tool" ><i class="fa fa-user-plus"></i> Nuevo Codeudor</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            @if(count($codeudores) > 0)
            <table class="table table-hover">
                <tbody><tr>
                        <th>NIT</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th colspan="3">OPCIONES</th>
                    </tr>
                    @foreach ($codeudores as $user)
                    <tr>
                        <td>{{ $user->nit }}</td>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->apellido }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>{{ $user->correo }}</td>
                        <td><a class="btn btn-default" href="{{URL::to('personas/codeudor/editar/'.$user->id)}}"><i class="fa fa-edit"></i></a></td>
                        <td><a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="confirmar('{{$user->id}}', '{{$user->id}}', '{{$user->nombre}} {{$user->apellido}}')"><i class="fa fa-close"></i></a></td>
                        <td><a class="btn btn-info" data-toggle="modal" data-target="#informacion" onclick="datos('{{$user->nombre}} {{$user->apellido}}', '{{$user->profesion}}', '{{$user->nit}}', '{{$user->telefono}}', '{{$user->correo}}', '{{$user->labora_en}}', '{{$user->telefono_labora}}', '{{$user->direccion_labora}}', '{{$user->direccion_residencia}}', '{{$user->ingresos}}', '{{$user->cargo}}', '{{$user->referencia_bancaria}}', '{{$user->cuenta_corriente}}', '{{$user->cuenta_ahorros}}', '{{$user->referencia_comercial}}', '{{$user->telefono_ref_comercial}}', '{{$user->referencia_personal}}', '{{$user->telefono_ref_personal}}', '{{$user->finca_raiz_direccion}}', '{{$user->matricula_inmobiliaria}}')"><i class="fa fa-info"></i></a></td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
            {!! $codeudores->render() !!}
            @else
            No hay..
            @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">

        </div>
        <!-- /.box-footer -->
    </div>
    <!--/.box -->

</div>
<!-- MODAL ELIMINAR -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
            </div>
            {!! Form::open(array('url' => 'personas/codeudor/elimiar', 'class' => 'form-horizontal', 'method' => 'post')) !!}
            <div class="modal-body">
                ¿Está segur@ que desea eliminar el Usuario <strong id="user"></strong>?
                <input type="hidden" id="id_p" name="id_p">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i> NO</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"> </i> SI</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="informacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info"></i> <b>INFORMACIÓN</b></h4>
            </div>

            <div class="modal-body">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-purple">
                            <h3 class="widget-user-username" id="nombres"></h3>
                            <h5 class="widget-user-desc" id="profesion"></h5>
                        </div>
                        <div class="box-footer no-padding">
                            <b>DATOS PERSONALES</b>
                            <ul class="nav nav-stacked">
                                <li><a><b>NIT:</b>  <span id="nit"></span></a></li>
                                <li><a><b>TELEFONO:</b>  <span id="telefono"></span></a></li>
                                <li><a><b>CORREO:</b>  <span id="correo"></span></a></li>
                                <li><a><b>TRABAJA EN:</b>  <span id="trabaja_en"></span></a></li>
                                <li><a><b>DIRECCION TRABAJO:</b>  <span id="direccion_labora"></span></a></li>
                                <li><a><b>TELEFONO TRABAJO:</b>  <span id="telefono_labora"></span></a></li>
                                <li><a><b>DIRECCION RESIDENCIA:</b>  <span id="direccion_residencia"></span></a></li>
                            </ul><br>
                            <b>DATOS ARRENDATARIO</b>
                            <ul class="nav nav-stacked">
                                <li><a><b>INGESOS:</b> <span id="ingreso_mensual"></span></a></li>
                                <li><a><b>CARGO:</b> <span id="cargo"></span></a></li>
                                <li><a><b>REFERENCIA BANCARIA:</b> <span id="referencia_bancaria"></span></a></li>
                                <li><a><b>CUENTA CORRIENTE:</b>  <span id="cuenta_corriente"></span></a></li>
                                <li><a><b>CUENTA AHORROS:</b>  <span id="cuenta_ahorroros"></span></a></li>
                                <li><a><b>REFERENCIA COMERCIAL:</b> <span id="referencia_comercial"></span></a></li>
                                <li><a><b>TELEFONO:</b>  <span id="telefono_ref_comercial"></span></a></li>
                                <li><a><b>REFERENCIA PERSONAL:</b>  <span id="referencia_personal"></span></a></li>
                                <li><a><b>TELEFONO:</b>  <span id="telefono_ref_personal"></span></a></li>
                                <li><a><b>FINCA RAÍZ:</b> <span id="finca_raiz_direccion"></span></a></li>
                                <li><a><b>MATRICULA:</b> <span id="matricula_inmobiliaria"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i> CERRAR</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmar(id_p, id_a,user) {
        $("#user").html(user);
        $("#id").val(id_a);
        $("#id_p").val(id_p);
    }
    
    function datos(nombre, profesion, nit, telefono, correo, trabaja_en, telefono_labora, direccion_labora, direccion_residencia, ingreso_mensual, numero_registro_camara_comercio, referencia_bancaria, cuenta_corriente, cuenta_ahorroros, referencia_comercial, telefono_ref_comercial, referencia_personal, telefono_ref_personal, finca_raiz_direccion, matricula_inmobiliaria){
        $("#nombres").html(nombre);
        $("#profesion").html(profesion);
        $("#nit").html(nit);
        $('#telefono').html(telefono);
        $("#correo").html(correo);
        $("#trabaja_en").html(trabaja_en);
        $("#telefono_labora").html(telefono_labora);
        $("#direccion_labora").html(direccion_labora);
        $("#direccion_residencia").html(direccion_residencia);
        $("#ingreso_mensual").html(ingreso_mensual);
        $("#cargo").html(numero_registro_camara_comercio);
        $("#referencia_bancaria").html(referencia_bancaria);
        $("#cuenta_corriente").html(cuenta_corriente);
        $("#cuenta_ahorroros").html(cuenta_ahorroros);
        $("#referencia_comercial").html(referencia_comercial);
        $("#telefono_ref_comercial").html(telefono_ref_comercial);
        $("#referencia_personal").html(referencia_personal);
        $("#telefono_ref_personal").html(telefono_ref_personal);
        $("#finca_raiz_direccion").html(finca_raiz_direccion);
        $("#matricula_inmobiliaria").html(matricula_inmobiliaria);
    }
</script>
@endsection

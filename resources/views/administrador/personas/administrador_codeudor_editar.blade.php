@extends('administrador_index')

@section('content')
<section class="content-header">
    <h1>
        Editar Codeudor
        <small> - Formulario de edición - </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('personas/codeudores')}}"><i class="fa fa-dashboard"></i> Codeudores</a></li>
    </ol>
</section>

<section class="content">

    {!! Form::open(array('url' => 'personas/codeudor/editar_codeudor', 'method' => 'post', 'id' => 'formulario')) !!}
    <!-- SELECT2 EXAMPLE -->
    <input type="hidden" name="p_id" value="{{$p_id}}">
    <input type="hidden" name="c_id" value="{{$c_id}}">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Datos Personales</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" id="div_nit">
                        <label>NIT *</label>
                        <input type="text" class="form-control" placeholder="Digite el Nit..." id="nit" name="nit" value="{{$p_nit}}">
                        <span class="help-block" id="error_nit"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_nombres">
                        <label>NOMBRES *</label>
                        <input type="text" class="form-control" placeholder="Digite los Nombres..." id="nombres" name="nombres" value="{{$p_nombres}}">
                        <span class="help-block" id="error_nombres"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_apellidos">
                        <label>Apellidos *</label>
                        <input type="text" class="form-control" placeholder="Digite los Apellidos..." id="apellidos" name="apellidos" value="{{$p_apellidos}}">
                        <span class="help-block" id="error_apellidos"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_telefono">
                        <label>TELÉFONO *</label>
                        <input type="tel" class="form-control" placeholder="Digite el teléfono..." id="telefono" name="telefono" value="{{$p_telefono}}">
                        <span class="help-block" id="error_telefono"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_email">
                        <label>EMAIL *</label>
                        <input type="email" class="form-control" placeholder="Digite el email..." id="email" name="email" required="true" value="{{$p_correo}}"> 
                        <span class="help-block" id="error_email"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_profesion">
                        <label>PROFESIÓN *</label>
                        <input type="text" class="form-control" placeholder="Digite la profesión..." id="profesion" name="profesion" value="{{$p_profesion}}">
                        <span class="help-block" id="error_profesion"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_labora_en">
                        <label>LABORA EN *</label>
                        <input type="text" class="form-control" placeholder="Digite donde labora..." id="labora_en" name="labora_en" value="{{$p_labora_en}}">
                        <span class="help-block" id="error_labora_en"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_direccion_labora">
                        <label>DIRECCIÓN DONDE LABORA *</label>
                        <input type="text" class="form-control" placeholder="Digite la dirección de donde labora..." id="direccion_labora" name="direccion_labora" value="{{$p_direccion_labora}}">
                        <span class="help-block" id="error_direccion_labora"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_telefono_labora">
                        <label>TELEFONO DONDE LABORA *</label>
                        <input type="tel" class="form-control" placeholder="Digite el telefono de donde labora..." id="telefono_labora" name="telefono_labora" value="{{$p_telefono_labora}}">
                        <span class="help-block" id="error_telefono_labora"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group" id="div_direccion_residencia">
                        <label>DIRECCIÓN DE RESIDENCIA *</label>
                        <input type="text" class="form-control" placeholder="Digite la dirección de residencia..." id="direccion_residencia" name="direccion_residencia" value="{{$p_direccion_residencia}}">
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
                        <input type="number" class="form-control" placeholder="Digite el ingreso mensual..." id="ingreso_mensual" name="ingreso_mensual" step="any" min='0' value="{{$c_ingresos}}">
                        <span class="help-block" id="error_ingreso_mensual"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="div_numero_registro_camara_comercio">
                        <label>CARGO *</label>
                        <input type="text" class="form-control" placeholder="Digite el número de la cámara de comercio..." id="cargo" name="cargo" value="{{$c_cargo}}">
                        <span class="help-block" id="error_numero_registro_camara_comercio"></span>
                    </div>
                </div>    
                <div class="col-md-12">
                    <div class="form-group" id="div_referencia_bancaria">
                        <label>REFERENCIA BANCARIA *</label>
                        <input type="text" class="form-control" placeholder="Digite el número de la referencia bancaria..." id="referencia_bancaria" name="referencia_bancaria" value="{{$c_referencia_bancaria}}">
                        <span class="help-block" id="error_referencia_bancaria"></span>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group" id="div_cuenta_corriente">
                        <label>CUENTA CORRIENTE *</label>
                        <input type="text" class="form-control" placeholder="Digite el número de la cuenta corriente..." id="cuenta_corriente" name="cuenta_corriente" value="{{$c_cuenta_corriente}}">
                        <span class="help-block" id="error_cuenta_corriente"></span>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group" id="div_cuenta_ahorroros">
                        <label>CUENTA AHORROS *</label>
                        <input type="text" class="form-control" placeholder="Digite el número de la cuenta de ahorros..." id="cuenta_ahorroros" name="cuenta_ahorroros" value="{{$c_cuenta_ahorros}}">
                        <span class="help-block" id="error_cuenta_ahorroros"></span>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group" id="div_referencia_comercial"> 
                        <label>REFENCIA COMERCIAL *</label>
                        <input type="text" class="form-control" placeholder="Digite la referencia comercial..." id="referencia_comercial" name="referencia_comercial" value="{{$c_referencia_comercial}}">
                        <span class="help-block" id="error_referencia_comercial"></span>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group" id="div_telefono_ref_comercial">
                        <label>TELEFONO REFENCIA COMERCIAL *</label>
                        <input type="tel" class="form-control" placeholder="Digite la referencia comercial..." id="telefono_ref_comercial" name="telefono_ref_comercial" value="{{$c_telefono_ref_comercial}}">
                        <span class="help-block" id="error_telefono_ref_comercial"></span>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group" id="div_referencia_personal">
                        <label>REFENCIA PERSONAL *</label>
                        <input type="text" class="form-control" placeholder="Digite la referencia comercial..." id="referencia_personal" name="referencia_personal" value="{{$c_referencia_personal}}">
                        <span class="help-block" id="error_referencia_personal"></span>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group" id="div_telefono_ref_personal">
                        <label>TELEFONO REFENCIA PERSONAL *</label>
                        <input type="tel" class="form-control" placeholder="Digite la referencia comercial..." id="telefono_ref_personal" name="telefono_ref_personal" value="{{$c_telefono_ref_personal}}">
                        <span class="help-block" id="error_telefono_ref_personal"></span>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group" id="div_finca_raiz_direccion">
                        <label>FINCA RAIZ *</label>
                        <input type="tel" class="form-control" placeholder="Digite la finca raiz..." id="finca_raiz_direccion" name="finca_raiz_direccion" value="{{$c_finca_raiz_direccion}}">
                        <span class="help-block" id="error_finca_raiz_direccion"></span>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group" id="div_matricula_inmobiliaria">
                        <label>FINCA RAIZ *</label>
                        <input type="tel" class="form-control" placeholder="Digite la finca raiz..." id="matricula_inmobiliaria" name="matricula_inmobiliaria" value="{{$c_matricula_inmobiliaria}}">
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
        <a href="{{URL::to('personas/arrendatarios')}}" class="btn btn-danger" id="cancelar"><i class="fa fa-close"></i> Cancelar</a>
        <button type="button" class="btn btn-success pull-right" onclick="validar()" id="crear"><i class="fa fa-check"></i> Editar</button>
    </div>
    {!! Form::close() !!}
</div>
<!-- /.box -->
</div>
<!-- /.row -->

</section>

<script>
    function validar() {
        $("#crear").attr({disabled: "true"});
        $("#cancelar").attr({disabled: "true"});        
        var validacion = 0;
        //Valido el Nit
        if ($("#nit").val().length < 1) {
            validacion++;
            $("#div_nit").addClass('has-error');
            $("#error_nit").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_nit").removeClass('has-error');
        }
        //Valido el nombre
        if ($("#nombres").val().length < 1) {
            validacion++;
            $("#div_nombres").addClass('has-error');
            $("#error_nombres").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_nombres").removeClass('has-error');
        }
        //Valido el apellido
        if ($("#apellidos").val().length < 1) {
            validacion++;
            $("#div_apellidos").addClass('has-error');
            $("#error_apellidos").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_apellidos").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#telefono").val().length < 1) {
            validacion++;
            $("#div_telefono").addClass('has-error');
            $("#error_telefono").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_telefono").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#email").val().length < 1) {
            validacion++;
            $("#div_email").addClass('has-error');
            $("#error_email").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_email").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#profesion").val().length < 1) {
            validacion++;
            $("#div_profesion").addClass('has-error');
            $("#error_profesion").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_profesion").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#labora_en").val().length < 1) {
            validacion++;
            $("#div_labora_en").addClass('has-error');
            $("#error_labora_en").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_labora_en").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#direccion_labora").val().length < 1) {
            validacion++;
            $("#div_direccion_labora").addClass('has-error');
            $("#error_direccion_labora").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_direccion_labora").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#telefono_labora").val().length < 1) {
            validacion++;
            $("#div_telefono_labora").addClass('has-error');
            $("#error_telefono_labora").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_telefono_labora").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#direccion_residencia").val().length < 1) {
            validacion++;
            $("#div_direccion_residencia").addClass('has-error');
            $("#error_direccion_residencia").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_direccion_residencia").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#ingreso_mensual").val().length < 1) {
            validacion++;
            $("#div_ingreso_mensual").addClass('has-error');
            $("#error_ingreso_mensual").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_ingreso_mensual").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#cargo").val().length < 1) {
            validacion++;
            $("#div_numero_registro_camara_comercio").addClass('has-error');
            $("#error_numero_registro_camara_comercio").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_numero_registro_camara_comercio").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#referencia_bancaria").val().length < 1) {
            validacion++;
            $("#div_referencia_bancaria").addClass('has-error');
            $("#error_referencia_bancaria").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_referencia_bancaria").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#cuenta_corriente").val().length < 1) {
            validacion++;
            $("#div_cuenta_corriente").addClass('has-error');
            $("#error_cuenta_corriente").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_cuenta_corriente").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#cuenta_ahorroros").val().length < 1) {
            validacion++;
            $("#div_cuenta_ahorroros").addClass('has-error');
            $("#error_cuenta_ahorroros").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_cuenta_ahorroros").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#referencia_comercial").val().length < 1) {
            validacion++;
            $("#div_referencia_comercial").addClass('has-error');
            $("#error_referencia_comercial").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_referencia_comercial").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#telefono_ref_comercial").val().length < 1) {
            validacion++;
            $("#div_telefono_ref_comercial").addClass('has-error');
            $("#error_telefono_ref_comercial").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_telefono_ref_comercial").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#referencia_personal").val().length < 1) {
            validacion++;
            $("#div_referencia_personal").addClass('has-error');
            $("#error_referencia_personal").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_referencia_personal").removeClass('has-error');
        }
        //Valido el telefono
        if ($("#telefono_ref_personal").val().length < 1) {
            validacion++;
            $("#div_telefono_ref_personal").addClass('has-error');
            $("#error_telefono_ref_personal").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_telefono_ref_personal").removeClass('has-error');
        }
        
        
        
        
        if (validacion === 0) {
            $("#formulario").submit();
        } else {
            alert("Debe llenar todos los campos.");
            $("#crear").removeAttr('disabled');
            $("#cancelar").removeAttr('disabled');
        }
    }
</script>

@endsection



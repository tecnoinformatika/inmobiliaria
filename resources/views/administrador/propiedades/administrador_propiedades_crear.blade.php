@extends('administrador_index')

@section('content')
    <section class="content-header">
        <h1>
            Nueva Propiedad en el Sistema
            <small> - Formulario de registro -</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::to('propiedades/tipos_propiedades')}}"><i class="fa fa-dashboard"></i> Tipos de
                    Propiedad</a></li>
        </ol>
    </section>

    <section class="content">

        {!! Form::open(array('url'=>'propiedades/guardarNuevaPropiedad', 'method' => 'post', 'id' => 'formulario','enctype'=>'multipart/form-data'))!!}
                <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Imágenes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" id="div_imagen_principal">
                            <label>Imagen Principal *</label>
                            {!! Form::file('imagen_principal', ['class' => 'form-control', 'accept'=>'image/jpeg image/png', 'id' => 'imagen_principal']) !!}
                                    <!--<input type="file" class="form-control" placeholder="Digite la dirección de residencia..." id="imagen_principal" name="imagen_principal">-->
                            <span class="help-block" id="error_imagen_principal"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="div_imagen_1">
                            <label>Imagen 1 *</label>
                            {!! Form::file('imagen_1', ['class' => 'form-control', 'accept'=>'image/jpeg image/png', 'id' => 'imagen_1']) !!}
                                    <!--<input type="file" class="form-control" placeholder="Digite la dirección de residencia..." id="imagen_principal" name="imagen_principal">-->
                            <span class="help-block" id="error_imagen_1"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="div_imagen_2">
                            <label>Imagen 2 *</label>
                            {!! Form::file('imagen_2', ['class' => 'form-control', 'accept'=>'image/jpeg image/png', 'id' => 'imagen_2']) !!}
                                    <!--<input type="file" class="form-control" placeholder="Digite la dirección de residencia..." id="imagen_principal" name="imagen_principal">-->
                            <span class="help-block" id="error_imagen_2"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="div_imagen_3">
                            <label>Imagen 3 *</label>
                            {!! Form::file('imagen_3', ['class' => 'form-control', 'accept'=>'image/jpeg image/png', 'id' => 'imagen_3']) !!}
                                    <!--<input type="file" class="form-control" placeholder="Digite la dirección de residencia..." id="imagen_principal" name="imagen_principal">-->
                            <span class="help-block" id="error_imagen_3"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="div_imagen_4">
                            <label>Imagen 4 *</label>
                            {!! Form::file('imagen_4', ['class' => 'form-control', 'accept'=>'image/jpeg image/png', 'id' => 'imagen_4']) !!}
                                    <!--<input type="file" class="form-control" placeholder="Digite la dirección de residencia..." id="imagen_principal" name="imagen_principal">-->
                            <span class="help-block" id="error_imagen_4"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Información</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group" id="div_direccion">
                            <label>DIRECCIÓN *</label>
                            <input type="text" class="form-control"
                                   placeholder="Digite la dirección de la residencia..." id="direccion"
                                   name="direccion">
                            <span class="help-block" id="error_direccion"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="div_barrio">
                            <label>BARRIO *</label>
                            <input type="text" class="form-control" placeholder="Digite el barrio..." id="barrio"
                                   name="barrio">
                            <span class="help-block" id="error_barrio"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="div_valor_arriendo">
                            <label>VALOR ARRIENDO *</label>
                            <input type="number" class="form-control" placeholder="Digite el valor del arriendo..."
                                   id="valor_arriendo" name="valor_arriendo">
                            <span class="help-block" id="error_valor_arriendo"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="div_valor_condominio">
                            <label>VALOR CONDOMINIO *</label>
                            <input type="number" class="form-control" placeholder="Digite el valor del condominio..."
                                   id="valor_condominio" name="valor_condominio">
                            <span class="help-block" id="error_valor_condominio"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="div_area">
                            <label>ÁREA *</label>
                            <input type="text" class="form-control" placeholder="Digite el valor del área..." id="area"
                                   name="area">
                            <span class="help-block" id="error_area"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="div_numero_escritura">
                            <label>NÚMERO ESCRITURA </label>
                            <input type="number" class="form-control" placeholder="Digite el número de la escritura..."
                                   id="numero_escritura" name="numero_escritura">
                            <span class="help-block" id="error_numero_escritura"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="div_estrato">
                            <label>ESTRATO *</label>
                            <input type="number" class="form-control" placeholder="Digite el estrato..." id="estrato"
                                   name="estrato">
                            <span class="help-block" id="error_estrato"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" id="div_tipo_propiedad_id">
                            <label>TIPO DE PROPIEDAD *</label>
                            @if(count($tipos_propiedad) > 0)
                                <select class="form-control" name="tipo_propiedad_id" id="tipo_propiedad_id">
                                    <option value="x">Seleccione una opción...</option>
                                    @foreach($tipos_propiedad as $tp)
                                        <option value="{{$tp->id}}">{{$tp->nombre}}</option>
                                    @endforeach
                                </select>
                                <span class="help-block" id="error_tipo_propiedad_id"></span>
                            @else
                                <br>
                                No se han registrado tipos de propiedad, registrelos dando clic <a
                                        href="{{URL::to('propiedades/tipos_propiedades')}}">aquí</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="div_proposito">
                            <label>PROPOSITO: *</label>
                            <select class="form-control" name="proposito" id="proposito">
                                <option value="x">Seleccione una opción...</option>
                                <option value="Arrienda">Arrienda</option>
                                <option value="Vende">Vende</option>
                            </select>
                            <span class="help-block" id="error_proposito"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="div_descripcion">
                            <label>DESCRIPCION: *</label>
                            <textarea name="descripcion" class="form-control" id="descripcion"></textarea>
                            <span class="help-block" id="error_descripcion"></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Información Propietario</h3>
            </div>
            <!-- /.box-header -->
            <input type="hidden" id="id_propietario" name="id_propietario" value="">

            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>NIT/CÉDULA *</label>

                        <div class="input-group input-group-sm" id="div_nit">
                            <input type="text" class="form-control" placeholder="Digite el Nit..." id="nit" name="nit">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-flat" id="verifica_nit"
                                  onclick="existeNit('{{URL::to('/')}}')">
                              <i class="fa fa-eye"></i> Verificar
                          </button>
                            <button type="button" class="btn btn-danger btn-flat" id="borra_nit"
                                    onclick="reiniciar()" disabled>
                                <i class="fa  fa-retweet"></i> Reiniciar
                            </button>
                        </span>
                        </div>
                        <span class="help-block" id="error_nit"></span>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_nombres">
                            <label>NOMBRES *</label>
                            <input type="text" class="form-control" placeholder="Digite los Nombres..." id="nombres"
                                   name="nombres" readonly>
                            <span class="help-block" id="error_nombres"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_apellidos">
                            <label>Apellidos *</label>
                            <input type="text" class="form-control" placeholder="Digite los Apellidos..." id="apellidos"
                                   name="apellidos" readonly>
                            <span class="help-block" id="error_apellidos"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono">
                            <label>TELÉFONO *</label>
                            <input type="tel" class="form-control" placeholder="Digite el teléfono..." id="telefono"
                                   name="telefono" readonly>
                            <span class="help-block" id="error_telefono"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_email">
                            <label>EMAIL *</label>
                            <input type="email" class="form-control" placeholder="Digite el email..." id="email"
                                   name="email" required="true" readonly>
                            <span class="help-block" id="error_email"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_profesion">
                            <label>PROFESIÓN *</label>
                            <input type="text" class="form-control" placeholder="Digite la profesión..." id="profesion"
                                   name="profesion" readonly>
                            <span class="help-block" id="error_profesion"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_labora_en">
                            <label>LABORA EN *</label>
                            <input type="text" class="form-control" placeholder="Digite donde labora..." id="labora_en"
                                   name="labora_en" readonly>
                            <span class="help-block" id="error_labora_en"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_direccion_labora">
                            <label>DIRECCIÓN DONDE LABORA *</label>
                            <input type="text" class="form-control" placeholder="Digite la dirección de donde labora..."
                                   id="direccion_labora" name="direccion_labora" readonly>
                            <span class="help-block" id="error_direccion_labora"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="div_telefono_labora">
                            <label>TELEFONO DONDE LABORA *</label>
                            <input type="tel" class="form-control" placeholder="Digite el telefono de donde labora..."
                                   id="telefono_labora" name="telefono_labora" readonly>
                            <span class="help-block" id="error_telefono_labora"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="div_direccion_residencia">
                            <label>DIRECCIÓN DE RESIDENCIA *</label>
                            <input type="text" class="form-control" placeholder="Digite la dirección de residencia..."
                                   id="direccion_residencia" name="direccion_residencia" readonly>
                            <span class="help-block" id="error_direccion_residencia"></span>
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
            <a href="{{URL::to('propiedades')}}" class="btn btn-danger" id="cancelar"><i class="fa fa-close"></i>
                Cancelar</a>
            <button type="button" class="btn btn-success pull-right" id="crear" onclick="validar()"><i
                        class="fa fa-check"></i> Crear
            </button>
        </div>
        {!! Form::close() !!}

                <!-- /.box -->
        </div>
        <!-- /.row -->

    </section>

    <script>
        function existeNit(url) {
            var nit = $("#nit").val();

            $("#verifica_nit").attr({disabled: "true"});
            $("#borra_nit").removeAttr("disabled");
            if (nit) {
                var url_acceso = url + "/personas/buscar/" + nit;
                $.ajax({
                    url: url_acceso,
                    method: 'GET'
                }).done(function (data) {
                    $("#nit").attr({readonly: "true"});
                    var res = JSON.parse(data);
                    if (res.mensaje == "ok") {
                        $("#nombres").val(res.nombres);
                        $("#nombres").attr({readonly: "true"});
                        $("#apellidos").val(res.apellidos);
                        $("#apellidos").attr({readonly: "true"});
                        $("#telefono").val(res.telefono);
                        $("#telefono").attr({readonly: "true"});
                        $("#email").val(res.email);
                        $("#email").attr({readonly: "true"});
                        $("#profesion").val(res.profesion);
                        $("#profesion").attr({readonly: "true"});
                        $("#labora_en").val(res.labora_en);
                        $("#labora_en").attr({readonly: "true"});
                        $("#direccion_labora").val(res.direccion_labora);
                        $("#direccion_labora").attr({readonly: "true"});
                        $("#telefono_labora").val(res.telefono_labora);
                        $("#telefono_labora").attr({readonly: "true"});
                        $("#direccion_residencia").val(res.direccion_residencia);
                        $("#direccion_residencia").attr({readonly: "true"});
                    } else if (res.mensaje == "fail") {
                        alert("Debe digitar un nit para realizar la verificación.");
                        $("#nit").removeAttr("readonly");
                    } else if (res.mensaje == "fail_p") {
                        $("#nombres").val(res.nombres);
                        $("#nombres").removeAttr('readonly');
                        $("#apellidos").val(res.apellidos);
                        $("#apellidos").removeAttr('readonly');
                        $("#telefono").val(res.telefono);
                        $("#telefono").removeAttr('readonly');
                        $("#email").val(res.email);
                        $("#email").removeAttr('readonly');
                        $("#profesion").val(res.profesion);
                        $("#profesion").removeAttr('readonly');
                        $("#labora_en").val(res.labora_en);
                        $("#labora_en").removeAttr('readonly');
                        $("#direccion_labora").val(res.direccion_labora);
                        $("#direccion_labora").removeAttr('readonly');
                        $("#telefono_labora").val(res.telefono_labora);
                        $("#telefono_labora").removeAttr('readonly');
                        $("#direccion_residencia").val(res.direccion_residencia);
                        $("#direccion_residencia").removeAttr('readonly');
                    }
                }).error(function (xhr, ajaxOptions, thrownError) {
                    $("#nit").removeAttr("readonly");
                    alert('Ha ocurrido un error, verifique su conexión a internet.');
                });
            } else {
                alert('Debe digitar el nit, para realizar la verificación.');
            }
        }

        function reiniciar() {
            if (confirm("¿Está segur@ que desea reinciar los campos del formulario? Si se realiza este proceso se perderán los datos diligenciados en el formulario.")) {
                $("#nit").removeAttr("readonly");
                $("#nit").val("");
                $("#verifica_nit").removeAttr("disabled");
                $("#borra_nit").attr({disabled: "true"});

                $("#nombres").val("");
                $("#nombres").attr({readonly: "true"});
                $("#apellidos").val("");
                $("#apellidos").attr({readonly: "true"});
                $("#telefono").val("");
                $("#telefono").attr({readonly: "true"});
                $("#email").val("");
                $("#email").attr({readonly: "true"});
                $("#profesion").val("");
                $("#profesion").attr({readonly: "true"});
                $("#labora_en").val("");
                $("#labora_en").attr({readonly: "true"});
                $("#direccion_labora").val("");
                $("#direccion_labora").attr({readonly: "true"});
                $("#telefono_labora").val("");
                $("#telefono_labora").attr({readonly: "true"});
                $("#direccion_residencia").val("");
                $("#direccion_residencia").attr({readonly: "true"});
            }
        }

        function validar() {
            $("#crear").attr({disabled: "true"});
            $("#cancelar").attr({disabled: "true"});
            var validacion = 0;
            //VALIDO LAS IMAGENES
            if ($("#imagen_principal").val().length < 1) {
                validacion++;
                $("#div_imagen_principal").addClass('has-error');
                $("#error_imagen_principal").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_imagen_principal").removeClass('has-error');
            }
            if ($("#imagen_1").val().length < 1) {
                validacion++;
                $("#div_imagen_1").addClass('has-error');
                $("#error_imagen_1").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_imagen_1").removeClass('has-error');
            }
            if ($("#imagen_2").val().length < 1) {
                validacion++;
                $("#div_imagen_2").addClass('has-error');
                $("#error_imagen_2").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_imagen_2").removeClass('has-error');
            }
            if ($("#imagen_3").val().length < 1) {
                validacion++;
                $("#div_imagen_3").addClass('has-error');
                $("#error_imagen_3").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_imagen_3").removeClass('has-error');
            }
            if ($("#imagen_4").val().length < 1) {
                validacion++;
                $("#div_imagen_4").addClass('has-error');
                $("#error_imagen_4").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_imagen_4").removeClass('has-error');
            }

            //VALIDO INFORMACIÓN
            if ($("#direccion").val().length < 1) {
                validacion++;
                $("#div_direccion").addClass('has-error');
                $("#error_direccion").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_direccion").removeClass('has-error');
            }
            if ($("#barrio").val().length < 1) {
                validacion++;
                $("#div_barrio").addClass('has-error');
                $("#error_barrio").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_barrio").removeClass('has-error');
            }
            if ($("#valor_arriendo").val().length < 1) {
                validacion++;
                $("#div_valor_arriendo").addClass('has-error');
                $("#error_valor_arriendo").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_valor_arriendo").removeClass('has-error');
            }
            if ($("#valor_condominio").val().length < 1) {
                validacion++;
                $("#div_valor_condominio").addClass('has-error');
                $("#error_valor_condominio").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_valor_condominio").removeClass('has-error');
            }
            if ($("#area").val().length < 1) {
                validacion++;
                $("#div_area").addClass('has-error');
                $("#error_area").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_area").removeClass('has-error');
            }
            
            if ($("#estrato").val().length < 1) {
                validacion++;
                $("#div_estrato").addClass('has-error');
                $("#error_estrato").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_estrato").removeClass('has-error');
            }
            if ($("#tipo_propiedad_id").val() == "x") {
                validacion++;
                $("#div_tipo_propiedad_id").addClass('has-error');
                $("#error_tipo_propiedad_id").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_tipo_propiedad_id").removeClass('has-error');
            }
            if ($("#proposito").val() == "x") {
                validacion++;
                $("#div_proposito").addClass('has-error');
                $("#error_proposito").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_proposito").removeClass('has-error');
            }
            if ($("#descripcion").val().length < 1) {
                validacion++;
                $("#div_descripcion").addClass('has-error');
                $("#error_descripcion").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_descripcion").removeClass('has-error');
            }

            //VALIDO PROPIETARIO
            if ($("#nit").val().length < 1) {
                validacion++;
                $("#div_nit").addClass('has-error');
                $("#error_nit").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_nit").removeClass('has-error');
            }
            if ($("#nombres").val().length < 1) {
                validacion++;
                $("#div_nombres").addClass('has-error');
                $("#error_nombres").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_nombres").removeClass('has-error');
            }
            if ($("#apellidos").val().length < 1) {
                validacion++;
                $("#div_apellidos").addClass('has-error');
                $("#error_apellidos").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_apellidos").removeClass('has-error');
            }
            if ($("#telefono").val().length < 1) {
                validacion++;
                $("#div_telefono").addClass('has-error');
                $("#error_telefono").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_telefono").removeClass('has-error');
            }
            if ($("#email").val().length < 1) {
                validacion++;
                $("#div_email").addClass('has-error');
                $("#error_email").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_email").removeClass('has-error');
            }
            if ($("#profesion").val().length < 1) {
                validacion++;
                $("#div_profesion").addClass('has-error');
                $("#error_profesion").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_profesion").removeClass('has-error');
            }
            if ($("#labora_en").val().length < 1) {
                validacion++;
                $("#div_labora_en").addClass('has-error');
                $("#error_labora_en").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_labora_en").removeClass('has-error');
            }
            if ($("#direccion_labora").val().length < 1) {
                validacion++;
                $("#div_direccion_labora").addClass('has-error');
                $("#error_direccion_labora").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_direccion_labora").removeClass('has-error');
            }
            if ($("#telefono_labora").val().length < 1) {
                validacion++;
                $("#div_telefono_labora").addClass('has-error');
                $("#error_telefono_labora").text('Debe llenar este campo').show().fadeOut(8000);
            } else {
                $("#div_telefono_labora").removeClass('has-error');
            }
            /*if ($("#direccion_residencia").val().length < 1) {
             validacion++;
             $("#div_direccion_residencia").addClass('has-error');
             $("#error_direccion_residencia").text('Debe llenar este campo').show().fadeOut(8000);
             } else {
             $("#div_direccion_residencia").removeClass('has-error');
             }*/

            /**
             * FINAL DE LA VALIDACIÓN
             */
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


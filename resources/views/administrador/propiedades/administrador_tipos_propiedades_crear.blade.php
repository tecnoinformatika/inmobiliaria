@extends('administrador_index')

@section('content')
<section class="content-header">
    <h1>
        Nuevo Tipo de Propiedad en el Sistema
        <small> - Formulario de registro - </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::to('propiedades/tipos_propiedades')}}"><i class="fa fa-dashboard"></i> Tipos de Propiedad</a></li>
    </ol>
</section>

<section class="content">

    {!! Form::open(array('url' => 'propiedades/tipo_propiedad/crear_tipo_propiedad', 'method' => 'post', 'id' => 'formulario')) !!}
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Imágenes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">          
                <div class="col-md-12">
                    <div class="form-group" id="div_nombre">
                        <label>Nombre *</label>
                        <input type="text" class="form-control" placeholder="Digite nombre..." id="nombre" name="nombre" value="{{$nombre}}">
                        <span class="help-block" id="error_nombre"></span>
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
            <button type="button" class="btn btn-success pull-right" onclick="validar()" id="crear"><i class="fa fa-check"></i> Crear</button>
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
        if ($("#nombre").val().length < 1) {
            validacion++;
            $("#div_nombre").addClass('has-error');
            $("#error_nombre").text('Debe llenar este campo').show().fadeOut(8000);
        } else {
            $("#div_nombre").removeClass('has-error');
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


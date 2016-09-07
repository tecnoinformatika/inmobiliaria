@extends('administrador_index')

@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Tipos de Propiedades Registradas en el Sistema</h3>

            <div class="box-tools pull-right">      
                <a href="{{URL::to('propiedades')}}"><i class="fa fa-dashboard"></i> Propiedades</a>
                <a href="{{URL::to('propiedades/tipo_propiedad/crear')}}" class="btn btn-box-tool" ><i class="fa fa-building-o"></i> Nuevo Tipo de Propiedad</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            @if(count($tipos_propiedades) > 0)
            <table class="table table-hover">
                <thead>
                <th>NORMBE</th>
                <th>OPCIONES</th>
                </thead>
                <tbody>
                    @foreach($tipos_propiedades as $p)
                    <tr>
                        <td>{{$p->nombre}}</td>
                        <td>
                            <a class="btn btn-default" href="{{URL::to('propiedades/tipo_propiedad/editar/'.$p->id)}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="confirmar('{{$p->id}}', '0', '{{$p->nombre}}')"><i class="fa fa-close"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
            {!! Form::open(array('url' => 'propiedades/tipo_propiedad/eliminar_tipo_propiedad', 'class' => 'form-horizontal', 'method' => 'post')) !!}
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


<script>
            function confirmar(id_p, id_a, user) {
            $("#user").html(user);
                    $("#id").val(id_a);
                    $("#id_p").val(id_p);
            }
</script>
@endsection
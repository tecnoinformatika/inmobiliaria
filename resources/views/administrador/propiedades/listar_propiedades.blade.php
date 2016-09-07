@extends('administrador_index')

@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de arriendos Registrados en el Sistema</h3>
            
        </div>
        <!-- /.box-header -->
        <div class="box">
                  <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        @if(count($arriendos) > 0)
                        <tr>
                            <th>FECHA DE INICIO</th>
                            <th>FECHA DE FIN</th>
                            <th>VALOR ARRIENDO</th>
                            <th>TELEFONO</th>
                            <th>EMAIL</th>
                            <th colspan="3">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arriendos as $value)
                        <tr>
                            <td>{{ $value->fecha_inicio }}</td>
                            <td>{{ $value->fecha_fin }}</td>
                            <td>{{ $value->valor_arriendo }}</td>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->comision }}</td>
                            <td><a class="btn btn-success" href="{{URL::to('listado_facturas/'.$value->id)}}"><i class="fa fa-money"></i></a></td>                          
                            
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>FECHA DE INICIO</th>
                            <th>FECHA DE FIN</th>
                            <th>VALOR ARRIENDO</th>
                            <th>TELEFONO</th>
                            <th>EMAIL</th>
                            <th colspan="3">OPCIONES</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box-body -->
       
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


@endsection

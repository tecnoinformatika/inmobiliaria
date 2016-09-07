@extends('administrador_index')

@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-default">
        <div class="box-header with-border">
            
            <h3 class="box-title">Listado de facturas generadas para el arriendo a consultar</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        @if(count($facturas) > 0)
                        <tr>
                            <th>CONSECUTIVO</th>
                            <th>FECHA</th>
                            <th>CONCEPTO</th>
                            <th>VALOR ARRIENDO</th>
                            <th>ARRENDADOR</th>}
                            <th>ESTADO</th>
                            <th colspan="3">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $value)
                        <tr>
                            <td>{{ $value->codigo }}</td>
                            <td>{{ $value->fecha }}</td>
                            <td>{{ $value->concepto }}</td>
                            <td>{{ $value->valorarriendo }}</td>
                            <td>{{ $value->nombre }} {{    $value->apellido }}</td>
                            <td>{{ $value->estado }}</td>
                            <td><a class="btn btn-default" href="{{    URL::to('imprimir_factura/'.$value->codigo)}}"><i class="fa fa-print"></i></a></td>

                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>CONSECUTIVO</th>
                            <th>FECHA</th>
                            <th>CONCEPTO</th>
                            <th>VALOR ARRIENDO</th>
                            <th>ARRENDADOR</th>
                            <th>ESTADO</th>
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

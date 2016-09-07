<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 21/04/2016
 * Time: 11:24 PM
 */
?>

@extends('administrador_index')

@section('content')
    <div class="col-md-12" id="muestra">
        <!-- USERS LIST -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Generar Comrpobante de Ingreso</h3>

                <div class="box-tools pull-right">
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive no-padding">
                {!! Form::open(array('url'=>'print_comprobante_ingreso_traer', 'method' => 'post', 'id' => 'formulario','enctype'=>'multipart/form-data'))!!}
                
               
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th colspan="4">
                            <center>INMOBILIARIA LA SEGURIDAD S.A.S<br>NIT. 807.002.2369-9<br>REGIMEN COMÚN</center>
                        </th>
                        <th>
                            <center>COMPROBANTE DE INGRESO<br>No.<input type="number" class="form-control" name="numero_comprobante"></center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="5">
                            <center>Av. 0 # 11-69 Ofic. 109. Edif. Cantabria - Teléfono: 5715049 - 5715770</center>
                        </td>
                    </tr>
                    <tr>
                                            
                                                            @foreach ($arrendatario as $arredata)    
                        <td colspan="4">
                            Ciudad y Fecha: <input type="text" class="form form-control" name="cantidad_fecha"><br>
                        Recibido De: <input type="text" class="form form-control" name="recibido_de" value="{{$arredata->nombre}} {{$arredata->apellido}}"><br>
                            <input type="text" class="form form-control" name="otro" value="">
                        </td>@endforeach
                        <td>
                            <textarea style="margin: 0px; width: 307px; height: 182px;" name="total"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">La Suma De: <input type="text" class="form form-control" name="la_suma_de" value="{{$valorletra}} Pesos M/cte"></td>
                    </tr>
                    <tr>
                        <td colspan="5">Por Concepto de: <input type="text" class="form form-control"
                                                                name="concepto_de" value="CANCELACIÓN ARRIENDO CORRESPONDIENTE AL MES DE  DE  = ${{$arriendo->valor_arriendo}}"></td>
                    </tr>
                    <tr>
                        <td>Cheque No. <input type="text" name="cheque_no"></td>
                        <td>Banco. <input type="text" name="banco"></td>
                        <td>Sucursal: <input type="text" name="sucursal"></td>
                        <td>Efectivo <input type="text" name="efectivo"></td>
                        <td></td>
                    </tr>

                    </tbody>
                    <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>CUENTA</th>
                        <th>DÉBITOS</th>
                        <th>CRÉDITOS</th>
                        <th>FIRMA Y SELLO</th>
                    </tr>
                    </thead>
                    <tbody id="campos">
                    <tr>
                        <td><input type="text" class="form form-control" name="codigo"></td>
                        <td><input type="text" class="form form-control" name="cuenta"></td>
                        <td><input type="text" class="form form-control" name="debitos"></td>
                        <td><input type="text" class="form form-control" name="creditos"></td>
                        <td> </td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="AgregarCampos();"><i
                                        class="fa fa-plus"></i></button>
                        </td>
                    </tr>
                    </tbody>

                </table>
                <input type="hidden" value="0" name="cantidad_inputs" id="cantidad_inputs">
                <button type="submit"><i class="fa fa-eye"></i> Vista Previa</button>
                
                
                {!! Form::close() !!}
            </div>


        </div>
    </div>

    <script type="text/javascript">
        var nextinput = 0;
        function AgregarCampos() {
            nextinput++;
            //campo = '<li id="rut'+nextinput+'">Campo:<input type="text" size="20" id="campo' + nextinput + '"&nbsp; name="campo' + nextinput + '"&nbsp; /></li>';

            var campo = '<tr id="' + nextinput + '"><td><input type="text" class="form form-control" name="codigo_'+nextinput+'"></td>' +
                    '<td><input type="text" class="form form-control" name="cuenta_'+nextinput+'"></td>' +
                    '<td><input type="text" class="form form-control" name="debitos_'+nextinput+'"></td>' +
                    '<td><input type="text" class="form form-control" name="creditos_'+nextinput+'"></td>' +
                    '<td><button type="button" class="btn btn-danger" onclick="quitarCampos(' + nextinput + ')"><i class="fa fa-close"></i> </button></td></tr>';
            $("#campos").append(campo);
            $("#cantidad_inputs").val(nextinput);
        }

        function quitarCampos(id) {
            nextinput--;
            $("#" + id).remove();
            $("#cantidad_inputs").val(nextinput);
        }
    </script>
@endsection

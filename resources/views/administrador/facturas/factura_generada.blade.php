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
            <h3 class="box-title">Generar Comrpobante Factura de venta</h3>

            <div class="box-tools pull-right"></div>
        </div>
        <!-- /.box-header -->

        <div class="box-body table-responsive no-padding">
            {!! Form::open(array('url'=>'print_comprobante_ingreso_traer', 'method' => 'post', 'id' => 'formulario','enctype'=>'multipart/form-data'))!!}


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="5">
                            <center>
                                INMOBILIARIA LA SEGURIDAD S.A.S
                                <br />NIT. 807.002.2369-9
                                <br />REGIMEN COMUN
                                <br />Resolucipon DIAN No. 070000058151 del 16/05/2007
                                <br />Num. Autorizada del 00001 al 9999
                                <br />Av. 0 # 11-69 Ofic. 109. Edif. Cantabria - Telefono: 5715049 - 5715770
                            </center>
                        </th>
                        <th>@foreach ($facturas as $factura) 
                            <center>
                                FACTURA DE VENTA
                                <br />No.
                            <input type="text" class="form-control" disabled name="numero_comprobante" value="{{$factura->codigo}}" style="text-align: center;"/>
                            
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">
                            <center></center>
                        </td>
                    </tr>
                    <tr>
                                       
                        <td colspan="5">
                            Señores:
                            <input type="text" class="form form-control" name="recibido_de" value="{{$factura->nombre}} {{$factura->apellido}}" disabled />
                            <br />
                            Nit:
                            <input type="text" class="form form-control" name="nit" value="{{$factura->nit}}" disabled/>
                            <br />
                            Dirección:
                            <input type="text" class="form form-control" name="direccion" value="{{$factura->direccion}}" disabled/ />
                            <br />                           
                            
                            
                        </td>@endforeach
                        <td>
                            Fecha: {{$factura->fecha}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <center>CONCEPTO</center>
                            <input type="text" class="form form-control" name="la_suma_de" value="{{$factura->concepto}}" />
                        </td>
                        <tH colspan="5">
                            <center>Vr Total</center>
                            <input type="text" class="form form-control" name="la_suma_de" value="{{$factura->valorarriendo}}" />
                        </tH>

                    </tr>
                    <tr>
                        <td colspan="5">
                            Comisiones:
                        <th colspan="5">
                            <input type="text" class="form form-control"
                                   name="concepto_de" value="{{$factura->valorcomision}}" />
                        </th>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            IVA comisiones:
                            <th colspan="5">
                                <input type="text" class="form form-control"
                                    name="concepto_de" value="" />
                            </th>


                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="5">
                            IVA : {{$factura->iva}}
                            <th colspan="5">
                                <input type="text" class="form form-control"
                                    name="concepto_de" value="{{$factura->valoriva}}" />
                            </th>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            &nbsp;
                            <th colspan="5">
                                <h2>TOTAL: ${{$factura->totalf}}</h2>

                            </th>
                       
                        </td>

                    </tr>
                    <tr>
                        <td colspan="5">
                            <h3>
                                {{$valorletra}} PESOS  M/CTE.
                            </h3>
                        </td>
                    </tr>


                        

            </table>
            <input type="hidden" value="0" name="cantidad_inputs" id="cantidad_inputs" />
            <button type="submit">
                <i class="fa fa-eye"></i>Vista Previa
            </button>


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

{!! Html::style("AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css") !!}
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- jvectormap -->
{!! Html::style("AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.css") !!}
<!-- Theme style -->
{!! Html::style("AdminLTE-2.3.0/dist/css/AdminLTE.min.css") !!}
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
{!! Html::style("AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css") !!}
<div id="muestra">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="4">
        <center>INMOBILIARIA LA SEGURIDAD S.A.S<br>NIT. 807.002.2369-9<br>REGIMEN COMÚN</center>
        </th>
        <th>
        <center>COMPROBANTE DE EGRESO<br>No.{{$numero_comprobante}}</center>
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
            <td colspan="5">
                CIUDAD Y FECHA: {{$cantidad_fecha}}<br>
                PAGADO A: {{$recibido_de}}<br>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                POR CONCEPTO DE: {{$concepto_de}}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                ARRENDATARIO: {{$arrendatario}}
            </td>
            <td>
                ${{$valor_arrendatario}}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                MENOS: {{$comision}}
            </td>
            <td>
                ${{$valor_comision}}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                MENOS: {{$iva}}
            </td>
            <td>
                ${{$valor_iva}}
            </td>
        </tr>
        <tr>
            <td colspan="4">
        <center><b>TOTAL:</b></center>
        </td>
        <td>
            ${{$total}}
        </td>
        </tr>
        <tr>
            <td>Cheque No. {{$cheque_no}}</td>
            <td>Banco. {{$banco}}</td>
            <td>Sucursal: {{$sucursal}}</td>
            <td>Efectivo {{$efectivo}}</td>
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
        <tr>
            <td>{{$codigo}}</td>
            <td>{{$cuenta}}</td>
            <td>{{$debitos}}</td>
            <td>{{$creditos}}</td>
            <td> </td>
        </tr>
        @if($cantidad_inputs > 0)
        @foreach($cantidad_inputs as $p)
        <tr>
            <td>{{$p['codigo']}}</td>
            <td>{{$p['cuenta']}}</td>
            <td>{{$p['debitos']}}</td>
            <td>{{$p['creditos']}}</td>
            <td> </td>
        </tr>
        @endforeach
        @endif

    </table>
</div>

<a href="#" onclick="javascript:window.print();" class="btn btn-info" id="print"><i class="fa fa-print"></i> Imprimir</a>
<a href="{{URL::to('comprobante_egreso')}}" class="btn btn-warning" id="print"><i class="fa fa-mail-reply"></i> Nuevo Comprobante</a>

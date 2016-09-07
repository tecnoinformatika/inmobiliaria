<!DOCTYPE  html>
<!--cargamos nuestro modulo en la etiqueta html con ng-app-->
<html lang="es" ng-app="app">
    <head>
        <meta charset="UTF-8" />
        <title>InmobiliariaLaSeguridad</title>
        {!! Html::style('AdminLTE-2.3.0/dist/css/AdminLTE.css') !!}
        {!! Html::style('AdminLTE-2.3.0/bootstrap/css/bootstrap.css') !!}
        {!! Html::script('AdminLTE-2.3.0/dist/js/jquery-1.11.3.min.js') !!}
        {!! Html::script('AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js') !!}
    </head>
    <body class="hold-transition login-page">

        <div class="col-md-3">
            @if (!empty(session('error')))
            <div class="alert alert-danger alert-dismissable" id="error">
                <i class="fa fa-ban"></i>
                <button type="button" onclick="ocultar()" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>Alert!</b> {!! session('error') !!}
            </div>
            @endif
            @if (!empty(session('mensaje')))
            <div class="alert alert-success alert-dismissable" id="error">
                <i class="fa fa-check"></i>
                <button type="button" onclick="ocultar()" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>Alert!</b> {!! session('mensaje') !!}
            </div>
            @endif
        </div>
        <div class="login-box">
            <center>{!! Html::image('img/logo.png', 'Icono') !!}</center>
            <div class="login-logo">
                <a href="{{URL::to('/')}}"><b>Inmobiliaria</b><br>La Seguridad</a>
            </div>
            <!-- /.login-logo -->            
            <div class="login-box-body">
                <p class="login-box-msg">Iniciar Sesión</p>

                {!! Form::open(array('url' => 'inicio_sesion', 'method' => 'post')) !!}
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="pass">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
                    </div>
                    <!-- /.col -->
                </div>
                {!!Form::close()!!}



            </div>
            <!-- /.login-box-body -->
        </div>

    </body>
    <script>
        function ocultar() {
            $("#error").hide();
        }
    </script>
</html>
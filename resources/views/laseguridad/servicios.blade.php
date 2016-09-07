<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Inmobiliaria La Seguridad | Servicios</title>
    {!! Html::style("laseguridad/css/bootstrap.css") !!}
            <!--<link href="../../../public/laseguridad/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {!! Html::script('laseguridad/js/jquery.min.js') !!}
            <!--<script src="../../../public/laseguridad/js/jquery.min.js"></script>-->
    <!-- Custom Theme files -->
    <!--menu-->
    {!! Html::script('laseguridad/js/scripts.js') !!}
            <!--<script src="../../../public/laseguridad/js/scripts.js"></script>-->
    {!! Html::style("laseguridad/css/styles.css") !!}
            <!--<link href="../../../public/laseguridad/css/styles.css" rel="stylesheet">-->
    <!--//menu-->
    <!--theme-style-->
    {!! Html::style("laseguridad/css/style.css") !!}
            <!--<link href="../../../public/laseguridad/css/style.css" rel="stylesheet" type="text/css" media="all" />-->
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Real Home Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- slide -->
    {!! Html::script('laseguridad/js/responsiveslides.min.js') !!}
            <!--<script src="js/responsiveslides.min.js"></script>-->
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
</head>
<body>
<!--header-->
<div class="navigation">
    <div class="container-fluid">
        <nav class="pull">
            <ul>
                <li><a href="{{URL::to('/')}}">Inicio</a></li>
                <li><a href="{{URL::to('nosotros')}}">Nosotros</a></li>
                <li><a href="{{URL::to('arriendos')}}">Arriendos</a></li>
                <li><a href="{{URL::to('ventas')}}">Ventas</a></li>
                <li><a href="{{URL::to('equipo')}}">Equipo</a></li>
                <li><a href="{{URL::to('servicios')}}">Servicios</a></li>
                <li><a href="{{URL::to('contacto')}}">Contacto</a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="header">
    <div class="container">
        <!--logo-->
        <div class="logo col-md-6">
            <h1><a href="{{URL::to('/')}}"><img src="{{URL::to('laseguridad/images/logo.png')}}" class="img-responsive"></a></h1>
        </div>
        <!--//logo-->
        <div class="top-nav col-md-6">
            <ul class="right-icons">
                <li><span><i class="glyphicon glyphicon-phone"> </i>Tel. 5943387 Fax 5715409</span></li>


            </ul>
            <div class="nav-icon">
                <div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
                    <a href="#"><h4 style="color:white"></h4><i class="glyphicon glyphicon-menu-hamburger"></i> </a>
                </div>
                <!---
                <a href="#" class="right_bt" id="activator"><i class="glyphicon glyphicon-menu-hamburger"></i>  </a>
            --->
            </div>
            <div class="clearfix"></div>
            <!---pop-up-box---->

            <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
            <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
            <!---//pop-up-box---->
            <div id="small-dialog" class="mfp-hide">
                <!----- tabs-box ---->

            </div>
            <script>
                $(document).ready(function () {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                });
            </script>


        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class=" banner-buying">
    <div class=" container">
        <h3><span>Servi</span>cios</h3>
        <!---->

        <div class="clearfix"></div>
        <!--initiate accordion-->
        <script type="text/javascript">
            $(function () {
                var menu_ul = $('.menu > li > ul'),
                        menu_a = $('.menu > li > a');
                menu_ul.hide();
                menu_a.click(function (e) {
                    e.preventDefault();
                    if (!$(this).hasClass('active')) {
                        me
                    }
                    nu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true, true).slideDown('normal');
                }
                else
                {
                    $(this).removeClass('active');
                    $(this).next().stop(true, true).slideUp('normal');
                }
            });

            })
            ;
        </script>

    </div>
</div>
<!--//header-->
<!--contact-->
<div class="terms">
    <div class="container">
        <h3>Servicios</h3>
        <a href="{{URL::to('requisitos.pdf')}}" target="_blank"><h4 class="jumbotron">Requisitos para administración del inmueble en
                arriendo</h4></a>
        <h4>Avaluos</h4>

        <p>Realizamos avalúos de finca raíz urbana y rural, para las personas que desean saber el valor de un inmueble
            para una posterior comercialización.</p>
        <h4>Consultoria Inmobiliaria</h4>

        <p>Expertas Consultoras y Asesores en la Región Fronteriza estamos a su disposición para orientarlo en la
            solución de cualquier inquietud sobre la toma de decisiones en la compra venta, arriendo , administración
            avalúos y gerencia de proyectos inmobiliarios EN LA INMOBILIARIA LA SEGURIDAD S.A.S Usted siempre encuentra
            la solución más pronta y acertada . Manejamos el más completo portafolio de opciones inmobiliarias de la
            Zona de Frontera, para venta o arriendo de: <br>
            - Casas <br>
            - Oficinas <br>
            - Bodegas <br>
            - Fincas <br>
            - Apartamentos <br>
            - Locales Comerciales <br>
            - Lotes <br>
            - Otros </p>
        <h4>Administración de Inmuebles</h4>

        <p>Con INMOBILIARIA SEGURIDAD S.AS deleguemos la tranquilamente de nuestros modernos servicios inmobiliarios
            <br>
            - Estudio cuidadoso de solicitudes para la selección del mejor arrendatario <br>
            - Promoción y gestión comercial de su inmueble en diferentes medios publicitarios <br>
            - Garantía del pago oportuno de su arriendos, mientras el inmueble se encuentra arrendado ( sujeto a
            restricciones ) <br>
            - Puntualidad en sus pagos a través de cheques, consignaciones, transferencias bancarias etc. para seguridad
            de nuestros clientes. <br>
            - Realizamos las reparaciones que sus inmuebles requieran en el tiempo oportuno para evitar pérdidas por
            lucro cesante. <br>
            - Asesoría en todo lo relacionado con requisitos, fijación y actualización del canon de arrendamiento.
            trámites legales certificados tributarios etc. <br>
            - Suministramos detallado estado de cuentas mensuales para su archivo y control de los inmuebles. <br>
            - Departamento especializado en cobranzas y asesoría jurídica </p>
        <h4>Afiliaciones</h4>

        <p>
            - CIFIN <br>
            - Matricula Inmobiliaria</p>

    </div>
</div>
<!--//contact-->
<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-top-at">
            <div class="col-md-5 amet-sed">
                <h4>Siguenos</h4>
                <ul class="social">
                    <li><a href="#"><i class="facebook"> </i></a></li>
                    <li><a href="#"><i class="twitter"> </i></a></li>
                </ul>
            </div>

            <div class="col-md-7 amet-sed">
                <h4>Información de contacto</h4>

                <p>Av. 0 No 11-71 </p>

                <p>Edif. Cantabria Of. 109. Cúcuta</p>

                <p>Tel. 5943387 Fax 5715409</p>

                <p>laseguridad-2@hotmail.com</p>

            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">

            <div class="col-md-12 footer-class">
                <p>© Inmobiliaria La Seguridad S.A.S, NIT No 807.002.369-9 Reg. Común, Registro Arrendador N°013
                    Creada por <a href="http://fabianbustamanteweb.com/" target="_blank">Fabian Bustamante Web. </a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//footer-->
</body>
</html>
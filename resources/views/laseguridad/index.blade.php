<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Inmobiliaria La Seguridad | Inicio</title>
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

            {!! Html::style('laseguridad/css/popuo-box.css') !!}
                    <!--<link href="../../../public/laseguridad/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>-->
            {!! Html::script('laseguridad/js/jquery.magnific-popup.js') !!}
                    <!--<script src="../../../public/laseguridad/js/jquery.magnific-popup.js" type="text/javascript"></script>-->
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
<!--//-->
<div class=" header-right">
    <div class=" banner">
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    <li>
                        <div class="banner1">
                            <div class="caption">
                                <h3><span>ARRIENDOS</span></h3>

                                <p>Las mejores ofertas de la ciudad.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="banner2">
                            <div class="caption">
                                <h3><span>VENTAS</span></h3>

                                <p>con procesos agiles y seguros.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="banner3">
                            <div class="caption">
                                <h3><span>AVALÚOS</span></h3>

                                <p>hecho por profesionales altamente capacitados.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--header-bottom-->
<div class="banner-bottom-top">
    <div class="container">
        <div class="bottom-header">
            <div class="header-bottom">
                <div class=" bottom-head">
                    <a href="{{URL::to('/')}}">
                        <div class="buy-media">
                            <h6>Inicio</h6>
                        </div>
                    </a>
                </div>
                <div class=" bottom-head">
                    <a href="{{URL::to('nosotros')}}">
                        <div class="buy-media">
                            <h6>Nosotros</h6>
                        </div>
                    </a>
                </div>
                <div class=" bottom-head">
                    <a href="{{URL::to('arriendos')}}">
                        <div class="buy-media">
                            <h6>Arriendos</h6>
                        </div>
                    </a>
                </div>
                <div class=" bottom-head">
                    <a href="{{URL::to('ventas')}}">
                        <div class="buy-media">
                            <h6>Ventas</h6>
                        </div>
                    </a>
                </div>
                <div class=" bottom-head">
                    <a href="{{URL::to('equipo')}}">
                        <div class="buy-media">
                            <h6>Equipo</h6>
                        </div>
                    </a>
                </div>
                <div class=" bottom-head">
                    <a href="{{URL::to('servicios')}}">
                        <div class="buy-media">

                            <h6>Servicios</h6>
                        </div>
                    </a>
                </div>
                <div class=" bottom-head">
                    <a href="{{URL::to('contacto')}}">
                        <div class="buy-media">
                            <h6>Contacto</h6>
                        </div>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--//-->

<!--//header-bottom-->


<!--//header-->
<!--content-->
<div class="content">
    <div class="content-grid">
        <div class="container">
            <h3>Ventas</h3>
            @if(count($propiedades_vender) > 0)
                @foreach($propiedades_vender as $pv)
                    <div class="col-md-4 box_2">
                        <a href="{{URL::to('informacion/'.$pv->id)}}" class="mask">
                            <img class="img-responsive zoom-img" src="{{URL::to($pv->imagen_principal)}}" alt="">
                            <span class="four">Se {{$pv->proposito}}</span>
                        </a>

                        <div class="most-1">
                            <h5><a href="{{URL::to('informacion/'.$pv->id)}}">{{$pv->direccion}}</a></h5>

                            <p>{{$pv->barrio}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="container">
            <h3>Arrendar</h3>
            @if(count($propiedades_arrendar) > 0)
                @foreach($propiedades_arrendar as $pa)
                    <div class="col-md-4 box_2">
                        <a href="{{URL::to('informacion/'.$pa->id)}}" class="mask">
                            <img class="img-responsive zoom-img" src="{{URL::to($pa->imagen_principal)}}" alt="">
                            <span class="four">Se {{$pa->proposito}}</span>
                        </a>

                        <div class="most-1">
                            <h5><a href="{{URL::to('informacion/'.$pa->id)}}">{{$pa->direccion}}</a></h5>

                            <p>{{$pa->barrio}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
    <!--service-->
    <div class="services">
        <div class="container">
            <div class="service-top">
                <h3>Servicios</h3>

            </div>
            <div class="services-grid">
                <div class="col-md-6 service-top1">
                    <div class=" ser-grid">
                        <a href="#" class="hi-icon hi-icon-archive glyphicon glyphicon-user"> </a>
                    </div>
                    <div class="ser-top">
                        <h4>Avaluos</h4>

                        <p>Realizamos avalúos de finca raíz urbana y rural, para las personas que desean saber el valor
                            de un inmueble para una posterior comercialización. </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 service-top1">
                    <div class=" ser-grid">
                        <a href="#" class="hi-icon hi-icon-archive glyphicon glyphicon-leaf"> </a>
                    </div>
                    <div class="ser-top">
                        <h4>Consultoria Inmobiliaria</h4>

                        <p>Expertas Consultoras y Asesores en la Región Fronteriza estamos a su disposición para
                            orientarlo en la solución de cualquier inquietud ... </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="services-grid">
                <div class="col-md-6 service-top1">
                    <div class=" ser-grid">
                        <a href="#" class="hi-icon hi-icon-archive glyphicon glyphicon-cog"> </a>
                    </div>
                    <div class="ser-top">
                        <h4>Administración de Inmuebles</h4>

                        <p>Con INMOBILIARIA SEGURIDAD S.AS deleguemosla tranquilamente de nuestros modernos servicios
                            inmobiliarios. </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 service-top1">
                    <div class=" ser-grid">
                        <a href="#" class="hi-icon hi-icon-archive glyphicon glyphicon-file"> </a>
                    </div>
                    <div class="ser-top">
                        <h4>Afiliaciones</h4>

                        <p>CIFIN <br> Matricula Inmobiliaria</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--//services-->
    <!--features-->
    <div class="content-middle">
        <div class="container">
            <div class="mid-content">
                <h3 style="font-size:36px;">Inmobiliaria la seguridad</h3>

                <p>LA EMPRESA INMOBILIARIA LA SEGURIDAD es una aliada y amiga de nuestros clientes que nos han venido
                    delegando todo lo relacionado con la administración, consultoría , compra, venta , avalúos y
                    proyectos de construcción de sus inmuebles.

                </p>
                <a class="hvr-sweep-to-right more-in" href="single.html">Read More</a>
            </div>
        </div>
    </div>
    <!--//features-->


    <!--partners-->
    <div class="content-bottom1">
        <h3>Zona de descargas</h3>

        <div class="container">
            <div class="col-md-12">
                <a href="{{URL::to('requisitos.pdf')}}" target="_blank"><img style="width: 10%;"
                                                              src="{{URL::to('laseguridad/images/pdf.png')}}"
                                                              class="img-responsive">

                    <h2>Requisitos para administración del inmueble en arriendo</h2>
                </a>
            </div>

        </div>

        <!--//partners-->
    </div>
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
                        Creada por <a href="http://fabianbustamanteweb.com/" target="_blank">Fabian Bustamante Web. </a>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--//footer-->
</body>
</html>
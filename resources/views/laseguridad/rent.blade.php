<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Inmobiliaria La Seguridad | Comprar</title>
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
<div class=" banner-buying">
    <div class=" container">

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
                        menu_a.removeClass('active');
                        menu_ul.filter(':visible').slideUp('normal');
                        $(this).addClass('active').next().stop(true, true).slideDown('normal');
                    } else {
                        $(this).removeClass('active');
                        $(this).next().stop(true, true).slideUp('normal');
                    }
                });

            });
        </script>

    </div>
</div>
<!--//header-->
<div>

    <!--price-->
   <!-- <div class="price">
        <div class="price-grid">
            <div class="col-md-3 price-top">
                <h4>Barrio</h4>
                <select class="in-drop">
                    <option>Select City</option>
                    <option>Bangkok</option>
                    <option>Tokyo</option>
                    <option>London</option>
                    <option>Paris</option>
                    <option>Dhubai</option>
                    <option>New Jerrsey</option>
                    <option>Hongkong</option>
                    <option>New York</option>
                    <option>Rome</option>
                    <option>Sydney</option>
                    <option>Florence</option>
                    <option>Istanbul</option>
                    <option>Brezil</option>
                    <option>Canda</option>
                    <option>Malaysia</option>
                    <option>Singapore</option>
                    <option>Taiwan</option>
                    <option>Spain</option>
                    <option>More</option>
                </select>
            </div>
            <div class="col-md-3 price-top">
                <h4>Tipo de Inmueble</h4>
                <select class="in-drop">
                    <option>Select City</option>
                    <option>Bangkok</option>
                    <option>Tokyo</option>
                    <option>London</option>
                    <option>Paris</option>
                    <option>Dhubai</option>
                    <option>New Jerrsey</option>
                    <option>Hongkong</option>
                    <option>New York</option>
                    <option>Rome</option>
                    <option>Sydney</option>
                    <option>Florence</option>
                    <option>Istanbul</option>
                    <option>Brezil</option>
                    <option>Canda</option>
                    <option>Malaysia</option>
                    <option>Singapore</option>
                    <option>Taiwan</option>
                    <option>Spain</option>
                    <option>More</option>
                </select>
            </div>

            <div class="col-md-6 price-top1">
                <h4>Rango de Precio</h4>
                <ul>
                    <li>
                        <select class="in-drop">
                            <option>Price From</option>
                            <option>0</option>
                            <option>5 Lacs</option>
                            <option>10 Lacs</option>
                            <option>15 Lacs</option>
                            <option>20 Lacs</option>
                            <option>25 Lacs</option>
                            <option>30 Lacs</option>
                            <option>35 Lacs</option>
                            <option>40 Lacs</option>
                            <option>45 Lacs</option>
                            <option>50 Lacs</option>
                            <option>55 Lacs</option>
                            <option>60 Lacs</option>
                            <option>65 Lacs</option>
                            <option>70 Lacs</option>
                            <option>75 Lacs</option>
                            <option>80 Lacs</option>
                            <option>85 Lacs</option>
                            <option>90 Lacs</option>
                            <option>95 Lacs</option>
                        </select>
                    </li>
                    <span>-</span>
                    <li>
                        <select class="in-drop">
                            <option>Price To</option>
                            <option>5 Lacs</option>
                            <option>10 Lacs</option>
                            <option>15 Lacs</option>
                            <option>20 Lacs</option>
                            <option>25 Lacs</option>
                            <option>30 Lacs</option>
                            <option>35 Lacs</option>
                            <option>40 Lacs</option>
                            <option>45 Lacs</option>
                            <option>50 Lacs</option>
                            <option>55 Lacs</option>
                            <option>60 Lacs</option>
                            <option>65 Lacs</option>
                            <option>70 Lacs</option>
                            <option>75 Lacs</option>
                            <option>80 Lacs</option>
                            <option>85 Lacs</option>
                            <option>90 Lacs</option>
                            <option>95 Lacs</option>
                            <option>100 Cr</option>
                        </select>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>

    </div>-->
</div>
<!---->

<div class="content-grid">
    <div class="container">
        <h3>Arriendos</h3>
        @if(count($propiedades) > 0)
            @foreach($propiedades as $p)
                <div class="col-md-4 box_2">
                    <a href="{{URL::to('informacion/'.$p->id)}}" class="mask">
                        <img class="img-responsive zoom-img" src="{{$p->imagen_principal}}" alt="">
                        <span class="four">$ {{$p->valor_arriendo}}</span>
                    </a>

                    <div class="most-1">
                        <h5><a href="{{URL::to('informacion/'.$p->id)}}">{{$p->direccion}}</a></h5>

                        <p>{{$p->barrio }}</p>
                    </div>
                </div>

            @endforeach
            <div class="clearfix"></div>
        @else
            No hay...
        @endif
    </div>
</div>



<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-top-at">
            <div class="col-md-5 amet-sed">
                <h4>Siguenos</h4>
                <ul  class="social">
                    <li><a href="#"><i class="facebook"> </i></a></li>
                    <li><a href="#"><i class="twitter"> </i></a></li>
                </ul>
            </div>

            <div class="col-md-7 amet-sed">
                <h4>Información de contacto</h4>
                <p>Av. 0 No 11-71  </p>
                <p>Edif. Cantabria Of. 109.  Cúcuta</p>
                <p>Tel. 5943387 Fax 5715409</p>
                <p>laseguridad-2@hotmail.com</p>

            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">

            <div class="col-md-12 footer-class">
                <p >© Inmobiliaria La Seguridad S.A.S, NIT No 807.002.369-9 Reg. Común, Registro Arrendador N°013
                    Creada por  <a href="http://fabianbustamanteweb.com/" target="_blank">Fabian Bustamante Web. </a> </p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//footer-->
</body>
</html>
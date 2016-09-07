<!DOCTYPE html>
<html>
<head>
    <title>Inmobiliaria La Seguridad | Contacto</title>
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
<!--//-->
<div class=" banner-buying">
    <div class=" container">
        <h3><span>Cont</span>act</h3>
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
<!--contact-->
<div class="contact">
    <div class="container">
        <h3>Contactenos</h3>

        <div class="contact-top">
            <div class="col-md-6 contact-top1">

                <div class="contact-address">
                    <div class="col-md-6 contact-address1">
                        <h5>Dirección</h5>

                        <p><b>Inmobiliaria La Seguridad S.A.S.</b></p>

                        <p>Avenida 0 N° 11-71 Oficina 109 Edificio cantabria</p>

                        <p>Cúcuta, Colombia.</p>
                    </div>
                    <div class="col-md-6 contact-address1">
                        <h5>Email Address </h5>

                        <p>General :laseguridad-2@hotmail.com</p>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="contact-address">
                    <div class="col-md-6 contact-address1">
                        <h5>Teléfono </h5>

                        <p>Tel. 5943387 </p>

                        <p>Fax 5715409</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 contact-right">

                <form method="post" action="assets/booking.php">
                    <input type="text" placeholder="Nombre" required name="nombre">
                    <input type="text" placeholder="Email" required name="email">
                    <input type="text" placeholder="Asunto" required name="asunto">
                    <textarea placeholder="Mensaje" cols="40" rows="6" required name="mensaje"></textarea>
                    <label class="hvr-sweep-to-right">
                        <input type="submit" value="Enviar Mensaje">
                    </label>
                </form>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0960870153635!2d-72.49979157065859!3d7.8850152495949075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e66459f94609e53%3A0x5d3768d69845ad85!2sAv.+0+%2311-235%2C+C%C3%BAcuta%2C+Norte+de+Santander%2C+Colombia!5e0!3m2!1ses-419!2sit!4v1461878765226"
                width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
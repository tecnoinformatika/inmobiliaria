
<!DOCTYPE html>
<html>
<head>
<title>Inmobiliaria La Seguridad | Nosotros</title>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Real Home Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<body >
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
				<li><span ><i class="glyphicon glyphicon-phone"> </i>Tel. 5943387 Fax 5715409</span></li>
				
				
			</ul>
			<div class="nav-icon">
				<div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
						<a href="#"><h4 style="color:white"></h4><i class="glyphicon glyphicon-menu-hamburger"></i> </a>
					</div>	
				<!---
				<a href="#" class="right_bt" id="activator"><i class="glyphicon glyphicon-menu-hamburger"></i>  </a>
			--->
			</div>
		<div class="clearfix"> </div>
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
						$(document).ready(function() {
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
		<div class="clearfix"> </div>
		</div>	
</div>
<!--//-->	
<div class=" banner-buying">
	<div class=" container">
	<h3><span>Noso</span>tros</h3> 
	<!---->

	<div class="clearfix"> </div>
		<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
      		
	</div>
</div>
<!--//header-->
<div class="about">	
	<div class="about-head">
		<div class="container">
			<h3>Nuestra empresa</h3>
				<div class="about-in">
					<a href="blog_single.html"><img src="{{URL::to('laseguridad/images/at.jpg')}}" alt="image" class="img-responsive ">	</a>
					<h6 >Quienes somos</h6>
					<p>LA EMPRESA INMOBILIARIA LA SEGURIDAD, Fue fundada según escritura pública No 4112 el 09 de Diciembre de 1997 para ser una aliada y amiga de nuestros clientes. Hemos venido incursionando desde el primer día de nuestra inauguración en ser los más amables con nuestra clientela generando confianza entre los numerosos clientes que nos han venido delegando todo lo relacionado con la administración, consultoría , compra, venta , avalúos y proyectos de construcción de sus inmuebles . Nuestra eficiencia, amabilidad y calidad en el servicio, logrados a través de una visión empresarial acorde a las nuevas dinámicas del sector , nos ha permitido irnos consolidando cada día como una de las más utilizadas en este importante mercado del oriente colombiano.</p>
				</div>
		</div>
	</div>
	<!---->
	<div class="about-middle">
		<div class="container">		
			<div class="col-md-8 about-mid">
				<h4>Misión</h4>
				<p>Satisfacer las necesidades en materia inmobiliaria , mediante prestación de un servicio integral en forma eficiente, amable, oportuna y eficaz, garantizando seguridad a los bienes consignados de nuestros clientes.</p>
				<h4>Visión</h4>
				<p>Somos un grupo de personas dinámicas , ágiles y líderes en el sector superando las expectativas y necesidades de nuestros clientes con servicios y soluciones rápidas generando riqueza para sus accionistas , empleados y comunidad en general . Nos proyectamos como una empresa , solida , prenda de garantía en el mercado inmobiliario , constituyéndonos como una de las primeras en su género para la zona de la frontera con Venezuela.</p>
			</div>
			<div class="col-md-4 about-mid1">
				<p>Somos la mejor opción para manejar con garantía tus inmuebles</p>
				<a href="blog_single.html" class="hvr-sweep-to-right more-in">Contactanos</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!---->
	<!---->
	
	<!---->
	<!---->
	<div class="about-bottom">
		<div class="container">	

				<div class="col-md-12 bottom-about">
			
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0960870153635!2d-72.49979157065859!3d7.8850152495949075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e66459f94609e53%3A0x5d3768d69845ad85!2sAv.+0+%2311-235%2C+C%C3%BAcuta%2C+Norte+de+Santander%2C+Colombia!5e0!3m2!1ses-419!2sit!4v1461878765226" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!---->
		<div class="choose-us">
		<div class="container">
			<h3>Nuestros Valores</h3>
			<div class="us-choose">
				<div class="col-md-6 why-choose">
					<div class="  ser-grid ">
						<i class="hi-icon hi-icon-archive glyphicon glyphicon-pencil"> </i>
					</div>
				
 

					<div class="ser-top beautiful"> 
						<h5>Equidad</h5>
						<p>Con nuestro alto criterio sobre equidad generamos a cada uno de nuestros clientes el mejor servicio en lo que les corresponde.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 why-choose">
					<div class=" ser-grid">
						<i class="hi-icon hi-icon-archive glyphicon glyphicon-time"> </i>
					</div>
					<div class="ser-top beautiful"> 
						<h5>Servicio</h5>
						
						<p>En el camino de la superación somos apasionados por la conquista de logros y prestamos oportunamente el mejor servicio.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="us-choose">
				<div class="col-md-6 why-choose">
					<div class=" ser-grid">
						<i class="hi-icon hi-icon-archive glyphicon glyphicon-cog"> </i>
					</div>
					<div class="ser-top beautiful"> 
						<h5>Creatividad</h5>
						
						<p>Satisfacemos plenamente a nuestros clientes con nuestra inteligencia y creatividad.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 why-choose">
					<div class=" ser-grid">
						<i class="hi-icon hi-icon-archive glyphicon glyphicon-file"> </i>
					</div>
					<div class="ser-top beautiful"> 
						<h5>Confiabilidad</h5>
						<p>La experiencia que hemos adquirido es prenda de garantía para generar los resultados esperados por nuestros clientes.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				
				
				<div class="clearfix"> </div>
			</div>
				
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
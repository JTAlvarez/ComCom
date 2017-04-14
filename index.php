<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>ComCom</title>
	<link rel="icon" type="image/png" sizes "66 x 47" href="img/icono.png">
	<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">

</head>

<body>


	<div class="container-index">

		<!-- header -->
		<?php include_once "header.php"; ?>

		<!-- banner -->
		<section class="banner">
			<img src="img/bannerppal.jpg" alt="banner">
			<div class="banner-content">
				<h1>Compras Comunitarias</h1>
			</div>
		</section>

		<!-- categorias -->
		<section class="categories">
			<a href="#" class="toggle-cat">Categorías&nbsp;
				<span class="ion-ios-more"></span>
			</a>

			<div class="cat">
				<ul>
					<li><a href="#">Computación</a></li>
					<li><a href="#">Ropa y Accesorios</a></li>
					<li><a href="#">Deportes y Fitness</a></li>
					<li><a href="#">Cámaras</a></li>
					<li><a href="#">Audio / Video</a></li>
					<li><a href="#">Ver Todo</a></li>
				</ul>
			</div>
		</section>

		<!-- Promocion -->
		<section class="promo">
			<h2><span class="ion-minus"></span>&nbsp;¡Ahorrá reservando el tuyo!&nbsp;<span class="ion-minus"></span></h2>
		</section>

		<!-- productos -->
		<section class="vip-products">
			<article class="product">
				<img src="img/1.png" alt="producto 01">
				<h2>Reloj Swatch Minimalistic</h2>
				<h3>40% OFF</h3>
			</article>

			<article class="product">
				<img src="img/2.png" alt="producto 02">
				<h2>Sennheiser Momentum</h2>
				<h3>25% OFF</h3>
			</article>

			<article class="product">
				<img src="img/3.png" alt="producto 03">
				<h2>Botas Timberland SuperBoot Limited</h2>
				<h3>20% OFF</h3>
			</article>

			<article class="product">
				<img src="img/4.png" alt="producto 04">
				<h2>Billetera Mont Blanc</h2>
				<h3>30% OFF</h3>
			</article>
		</section>

		<section class="button">
			<a href="#">VER MÁS</a>
		</section>



	</div>

	<!-- footer -->
	<?php include "footer.php"; ?>

	<!-- Scrip Para la version  -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script>
		$('.toggle-cat').click(function() {
			$('.cat ul').slideToggle('medium')
		})
	</script>

</body>
</html>

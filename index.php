<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>NoLe</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="card.css">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<link rel="stylesheet" type="text/css" href="arrows.css">
	<link rel="stylesheet" type="text/css" href="adv-search.css">
	<link rel="stylesheet" type="text/css" href="prod-styles.css">
	<link rel="stylesheet" type="text/css" href="popup-style.css">
	<link rel="stylesheet" type="text/css" href="perfil-style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<script type="text/javascript" src="javascript.js"></script>
</head>
<body>

	<?php require_once("include/comun/cabecera.php"); ?>

	<?php if (!isset($_GET["nom"]) and !isset($_GET["cat"])) {
	?>
	<div class="hero-banner">
		<img src="hero/colec3.jpeg">
		<form action="procesarBusqueda.php" class="formulario buscNombre" method="POST">
			<h1>¿Quieres completar tu colección?</h1>
			<p>Encuentra tu producto con nosotros</p>
			<!--<input name="buscNom" type="text" placeholder="Búscalo aquí">
			<button type="submit">Buscar</button>-->
		</form>
	</div>
	<?php }

	require_once("include/comun/menu.php");

	?>

	<div class="slider">
		<img src="error/no-image.png">
	</div>
	<div class="container">
		<?php
		/*AQUÍ VA EL SA DE ULTIMOS PRODUCTOS*/
			// require_once("include/BusquedaSA.php");
			// $sa = new BusquedaSA();
			// $prod = $sa->getProducto("");
			require_once("include/productoOfreSA.php");
			$tmp = new productoOfreSA();
			$ultimosProds = $tmp->getLastProducts(10);
		?>
			<h1>Últimos productos</h1>

			<?php

		    for ($i=0; $i < sizeof($ultimosProds); $i++) {
		    ?>
			  <div class="card">
			  <?php echo '<div class="thumbnail"><img class="leftImg" src="img/'.$ultimosProds[$i]->getId().'.png"/></div>'; ?>
			  <div class="details">
			    <?php
				    $path = 'product.php?id='.$ultimosProds[$i]->getId().'';
				    echo"<h1>".$ultimosProds[$i]->getNombre()."</h1>"; ?>
				    <div class="author">
				    	<img src="pica.jpg"/> <!-- Imagen que habra que cambiar cuando se tengan fotos del usuario -->
				      	<h2><?php echo $ultimosProds[$i]->getOwner() ?></h2>
				    </div>
				    <div class="category">
				      	<h2><?php echo $ultimosProds[$i]->getCategoria() ?></h2>
				    </div>
				    <div class="separator"></div>
				    <p><?php echo $ultimosProds[$i]->getDescripcionCorta() ?></p>
				    <?php echo '<a class="seemore" href='.$path.'><i class="right"></i><p>Ir al producto</p></a>'?>

			  </div>
			</div>
			<?php }
			    ?>
	</div>
	<div class="footer">
		<p>Javier Picatoste - Rodrigo - Álvaro - Manu - Alex - Marcos - Dani - Alberto</p>
	</div>
</body>
</html>
<!DOCTYPE html>
<head>
	<meta charset = "utf-8"/>
	<title>Supervinos</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
</head>
<body>
	<div data-role = "page" id = "inicio" data-add-back-btn="true" data-back-btn-text="Atrás">
		<div data-role = "header">
			<h1>Supervinos</h1>
		</div>
		
		<div data-role = "content">
			<?php // Obtener el id del vino pasado como parámetro
			$idVino = $_GET['idVino'];

			// Incluir archivos necesarios
			include_once ("datosConexion.php");
			include_once ("MySQL.php");

			// Crear objeto de base de datos y realizar conexión
			$miBD = new MySQL();
			$miBD -> conectar(HOST, USER, PASSWORD, BD);

			// Preparar la consulta y ejecutarla
			// La consulta recupera los datos de un vino
			$cadenaSQL = "SELECT * FROM vinos WHERE idVino = '$idVino'";
			 
			$resultado = $miBD -> consultar($cadenaSQL);

			// Recuperar la fila del vino
			$fila = mysqli_fetch_object($resultado);

			// Inicializar valores de vino e imagen del vino
			$vino = $fila -> vino;
			$imagenVino = "imagenes/" . $idVino . "_thu_1.jpg";
			?>

			<!-- Crear un grid de dos columnas -->
			<div class='ui-grid-a'>
				<!-- Primera columna para la imagen -->
				<div class='ui-block-a'>
					<img src = '<?php echo $imagenVino; ?>'>
				</div>
				<!-- Segunda columna para el nombre del vino -->
				<div class='ui-block-b'>
					<h3><?php echo $fila -> vino; ?></h3>
				</div>
			</div>

			<!-- Listview para mostrar los comentarios -->
			<ul data-role = "listview" data-inset = "true">
				<li data-role = "list-divider">Comentarios</li>
				<?php // Obtener los comentarios del vino en orden de valoración descendente
					$cadenaSQL = "SELECT * FROM comentarios WHERE idVino = '$idVino' ORDER BY valoracion DESC";
					
					$resultado = $miBD -> consultar($cadenaSQL);

					// Mostrar las valoraciones
					while ($fila = mysqli_fetch_object($resultado)) {
						echo "<li><p>Valoración: $fila->valoracion / 5. $fila->comentario</p></li>";
					}

					// Cerrar la conexión con la base de datos
					$miBD -> cerrar();
				?>
			</ul>
			
			<!-- Botón añadir nuevo comentario -->
			<a href = "formularioComentarios.php?idVino=<?php echo $idVino; ?>" data-role = "button" data-transition = "slide">Añadir comentario</a>
			
		</div>
		
		<!-- Incluir el pie -->
		<?php
		include_once ("Pie.php");
		?>
	</div>
</body>

</html>

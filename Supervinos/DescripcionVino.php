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
	<div data-role = "page" id = "page1" data-add-back-btn="true" data-back-btn-text="Atrás">
		<div data-role = "header">
			<h1>Supervinos</h1>
		</div>
		
		<div data-role = "content">
				<?php 
				// Obtener el id del vino pasado como parámetro
				$idVino = $_GET["idVino"];

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
				$vino = $fila->vino;
				$imagen = "imagenes/" . $fila->idVino . "_thu_1.jpg";

				// Crear un grid de dos columnas
				echo "<div class='ui-grid-a'>";
				// Primera columna para la imagen
					echo "<div class = 'ui-block-a'>" . "<img src = '$imagen'>" . "</div>";
				//Segunda columna para el nombre del vino
					echo "<div class = 'ui-block-b'>" . "<h3>$vino</h3>" . "</div>";
				echo "</div>";
				 
				// Crear una list view para mostrar precio y tipo del vino
				echo "<ul data-role = 'listview' data-inset = 'true'>";
					echo "<li data-role = 'list-divider'>Información</li>";
					echo "<li> Precio: " . $fila->precioVino . " EUR</li>";
					echo "<li> Tipo: " . $fila->tipoVino . "</li>";
				echo "</ul>";

				// Crear una listview para otros detalles del vino
				echo "<ul data-role = 'listview' data-inset = 'true'>";
					echo "<li data-role = 'list-divider'>Detalles</li>";
					echo "<li> D.O.: " . $fila->DOVino . "</li>";
					echo "<li> País: " . $fila->paisVino . "</li>";
					echo "<li> Bodega: " . $fila->productorVino . "</li>";
					echo "<li> Uva: " . $fila->uvasVino . "</li>";
				echo "</ul>";
				 
				// Cerrar la conexión con la base de datos
				$miBD -> cerrar();
				?>
				
			<!-- Botón para añadir comentarios -->
			<a href = "formularioComentarios.php?idVino=<?php echo $fila->idVino; ?>" data-role = "button">Añadir comentario</a>

		</div>

		<!-- Incluir el pie -->
		<?php
			include_once("Pie.php");
		?>
	</div>
</body>

</html>

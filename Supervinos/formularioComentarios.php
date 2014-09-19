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
			$idVino = $_GET['idVino'];

			// Incluir archivos necesarios
			include_once ("datosConexion.php");
			include_once ("MySQL.php");

			// Crear objeto de base de datos y realizar conexión
			$miBD = new MySQL();
			$miBD -> conectar(HOST, USER, PASSWORD, BD);

			// Preparar la consulta y ejecutarla
			// La consulta recupera los datos de un vino
			$cadenaSQL = "select * from vinos where idVino = '$idVino'";
			$resultado = $miBD -> consultar($cadenaSQL);

			// Recuperar la fila del vino
			$fila = mysqli_fetch_object($resultado);

			// Inicializar valores de vino e imagen del vino
			$vino = $fila -> vino;
			$imagenVino = "imagenes/" . $fila -> idVino . "_thu_1.jpg";

			// Cerrar la conexión con la base de datos
			$miBD -> cerrar();
				?>

			<!-- Crear un grid de dos columnas -->
			<div class='ui-grid-a'>
				<!-- Primera columna para la imagen -->
				<div class='ui-block-a'>
					<img src = '<?php echo $imagenVino; ?>'>
				</div>				
				<!-- Segunda columna para el nombre del vino -->
				<div class='ui-block-b'>
					<h3><?php echo $vino; ?></h3>
				</div>
			</div>

			<!-- Crear un formulario para los datos del comentario -->
	 		<form method = "post" action = "GuardarComentario.php" data-rel = "dialog" data-transition = "pop">	 			
				<ul data-role = 'listview' data-inset = 'true'>	
					<!-- Cabecera "Deja tu opinión" -->
					<li data-role = "list-divider">Deja tu opinión</li>				
					
					<!-- INPUT oculto para idVino -->
					<input type = 'hidden' name = 'idVino' value = "<?php echo $fila->idVino; ?>"
					
					<!-- INPUT para valoración -->
					<div data-role = "fieldcontain">
						<label for = "valoracion">Valoración: </label>
						<input type = "range" name = "valoracion" value = "0" min = "0" max = "5" data-highlight = "true">
					</div>
					
					<!-- INPUT para comentario -->
					<input type = "text" name = "comentario" placeholder = "Comentario ...">						
				</ul>
				
					<!-- Botones Cancelar y Enviar comentario --> 
					<a href = "descripcionVino.php?idVino=<?php echo $fila->idVino; ?>" data-role = "button">Cancelar</a>
					<input type = "submit" data-theme = "b" value = "Enviar">
	 		</form>
		</div>

		<!-- Incluir el pie -->
		<?php
		include_once ("Pie.php");
		?>
	</div>
</body>
</html>

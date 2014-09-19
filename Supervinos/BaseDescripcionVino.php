<!DOCTYPE html>
<head>
	<meta charset = "utf-8"/>
	<title>Supervinos</title>
	<link rel="stylesheet" href = "jquery.mobile-1.2.0.min.css" type="text/css"/>
	<script src="jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="jquery.mobile-1.2.0.min.js" type="text/javascript"></script>
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
				/****
				 * TU CODIGO AQUI
				 ****/

				// Incluir archivos necesarios
				include_once ("datosConexion.php");
				include_once ("MySQL.php");

				// Crear objeto de base de datos y realizar conexión
				$miBD = new MySQL();
				$miBD -> conectar(HOST, USER, PASSWORD, BD);

				// Preparar la consulta y ejecutarla
				// La consulta recupera los datos de un vino
				/****
				 * TU CODIGO AQUI
				 ****/
				$resultado = $miBD -> consultar($cadenaSQL);

				// Recuperar la fila del vino
				/****
				 * TU CODIGO AQUI
				 ****/

				// Inicializar valores de vino e imagen del vino
				/****
				 * TU CODIGO AQUI
				 ****/

				// Crear un grid de dos columnas
				/****
				 * TU CODIGO AQUI
				 ****/
				// Primera columna para la imagen
				/****
				 * TU CODIGO AQUI
				 ****/
				//Segunda columna para el nombre del vino
				/****
				 * TU CODIGO AQUI
				 ****/

				// Crear una list view para mostrar precio y tipo del vino
				/****
				 * TU CODIGO AQUI
				 ****/

				// Crear una listview para otros detalles del vino
				/****
				 * TU CODIGO AQUI
				 ****/
				 
				// Cerrar la conexión con la base de datos
				$miBD -> cerrar();
				?>
				
			<!-- Botón para añadir comentarios -->
			<!-- /****
				 * TU CODIGO AQUI
				 ****/ -->

		</div>

		<!-- Incluir el pie -->
		<?php
		/****
		* TU CODIGO AQUI
		****/
		?>
	</div>
</body>

</html>

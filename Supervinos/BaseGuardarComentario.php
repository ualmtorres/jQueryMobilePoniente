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
            // Obtener los valores pasados desde el formulario
			/*******************
			 * TU CODIGO AQUI
			 ******************/

			// Incluir archivos necesarios
			include_once ("datosConexion.php");
			include_once ("MySQL.php");

			// Crear objeto de base de datos y realizar conexión
			$miBD = new MySQL();
			$miBD -> conectar(HOST, USER, PASSWORD, BD);

			// Preparar la consulta y ejecutarla
			// La consulta inserta los comentarios del vino
			/*******************
			 * TU CODIGO AQUI
			 ******************/
			 
			$resultado = $miBD -> consultar($cadenaSQL);

			// Mostrar información sobre el progreso de la inserción del comentario
			if (mysqli_affected_rows($miBD -> obtenerConexion()) != 0) {
				echo "<h4>Comentario añadido</h4>";
			} else {
				echo "<h4>Ops!! Problemas al añadir comentario</h4>";
			}

			// Botón para volver a la pantalla de información del vino
			/*******************
			 * TU CODIGO AQUI
			 ******************/

			// Cerrar la conexión con la base de datos
			$miBD -> cerrar();
            ?>
        </div>

        <!-- Incluir el pie -->
        <?php
		include_once ("Pie.php");
        ?>
    </div>
</body>

</html>

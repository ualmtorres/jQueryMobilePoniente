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
    <div data-role = "page" id = "inicio">
        <div data-role = "header">
            <h1>Supervinos</h1>
        </div>

        <div data-role = "content">
            <ul data-role = "listview" data-filter = "true" data-filter-placeholder = "Vino ..."     >
                <?php
                // Obtener el tipo del vino pasado como parámetro
                /****
				 * TU CODIGO AQUI
				 ****/
				 
				// Incluir archivo necesarios
				include_once("datosConexion.php");
				include_once("MySQL.php");
				
				// Crear objeto de base de datos y realizar conexión
				$miBD = new MySQL();
				$miBD->conectar(HOST, USER, PASSWORD, BD);
				 
				// Preparar consulta SQL y ejecutarla
				// La consulta muestra los tipos de vino y la cantidad de vinos de cada tipo
				/****
				 * TU CODIGO AQUI
				 ****/
				$resultado = $miBD->consultar($cadenaSQL);
				 
				// Mostrar los resultados como elementos de una listview
				// Cada elemento incluirá un enlace a la página de vinos por tipo
				while ($fila = mysqli_fetch_object($resultado)) {
					/****
				 	* TU CODIGO AQUI
				 	****/
				}

				// Cerrar la conexión con la base de datos
				$miBD->cerrar();
                ?>
            </ul>
        </div>
    </div>
</body>

</html>

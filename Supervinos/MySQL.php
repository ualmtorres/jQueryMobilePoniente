<?php
class MySQL {
	private $conexion;
	
	//Conectar a MySQL y seleccionar la BD
	public function conectar($host, $user, $password, $bd) {
    	$this->conexion = mysqli_connect($host, $user, $password, $bd);	
	}
	
	//Devolver conexión
	public function obtenerConexion() {
		return $this->conexion;
	}
	
	//Consultar
	public function consultar($cadenaSQL) {
		$resultado = mysqli_query($this->conexion, $cadenaSQL);
		if (!$resultado) {
			echo "Error al consultar";
			exit;
		}
		return $resultado;
	}
	
	//Cerrar la conexión
	public function cerrar() {
		mysqli_close($this->conexion);
	}
}
?>
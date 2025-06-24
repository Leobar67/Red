<?php

class BD_PDO {
	function Ejecutar_Instruccion($instruccion_sql){
	$host = "caboose.proxy.rlwy.net";
		$port = 53956;
		$usr  = "root";
		$pwd  = "rUiNQxWUAAfGKqMaBKgvqzHEaYtuzSnO";
		$db   = "gregario-sorpresa";

		try {
			$conexion = new PDO("mysql:host=$host;port=$port;dbname=$db;", $usr, $pwd);
			// $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "✅ Conexión exitosa a Railway";
        }
		catch(PDOException $e){
		      echo "Failed to get DB handle: " . $e->getMessage();
		      exit;    
		    }
		 
		 // Asignando una instruccion sql
		 $query=$conexion->prepare($instruccion_sql);
		 
		if(!$query){
			return "Error al mostrar";
		}else{
			$query->execute();
			while ($result = $query->fetch())
			    {
			        $rows[] = $result;
			    }	
		} return @$rows;
	}
}
?>

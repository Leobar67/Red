<?php
require 'config/conexion.php';

$id = $_GET['id'];

$bd = new BD_PDO();
$sql = "DELETE FROM Sensores WHERE Id_Datos = $id";
$bd->Ejecutar_Instruccion($sql);

echo "✅ Dato eliminado.";
?>

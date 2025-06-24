<?php
require 'config/conexion.php';

$id = $_POST['id'];
$consumo = $_POST['consumo'];
$temperatura = $_POST['temperatura'];
$fechahora = $_POST['fechahora'];

$bd = new BD_PDO();
$sql = "UPDATE Sensores SET Consumo='$consumo', Temperatura='$temperatura', Fechahora='$fechahora' WHERE Id_Datos=$id";
$bd->Ejecutar_Instruccion($sql);

echo "✅ Dato editado.";
?>

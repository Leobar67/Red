<?php
require 'config/conexion.php';

$consumo = $_POST['consumo'];
$temperatura = $_POST['temperatura'];
$fechahora = $_POST['fechahora'];

$bd = new BD_PDO();
$sql = "INSERT INTO Sensores (Consumo, Temperatura, Fechahora) VALUES ('$consumo', '$temperatura', '$fechahora')";
$resultado = $bd->Ejecutar_Instruccion($sql);

echo "✅ Insertado correctamente.";
?>

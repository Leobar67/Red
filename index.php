<?php
require 'config/conexion.php';

$bd = new BD_PDO();
$resultado = $bd->Ejecutar_Instruccion("SELECT * FROM Sensores");

echo "✅ API funcionando.<br>";
echo "<pre>";
print_r($resultado);
echo "</pre>";
?>

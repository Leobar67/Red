<?php
require 'config/conexion.php';

$consumo = $_POST['consumo'];
$temperatura = $_POST['temperatura'];
$fechahora = $_POST['fechahora'];

$sql = "INSERT INTO Sensores (Consumo, Temperatura, Fechahora) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("dds", $consumo, $temperatura, $fechahora);

if ($stmt->execute()) {
    echo "Dato insertado correctamente.";
} else {
    echo "Error al insertar: " . $conn->error;
}
?>

<?php
require 'config/conexion.php';

$id = $_POST['id'];
$consumo = $_POST['consumo'];
$temperatura = $_POST['temperatura'];
$fechahora = $_POST['fechahora'];

$sql = "UPDATE Sensores SET Consumo=?, Temperatura=?, Fechahora=? WHERE Id_Datos=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ddsi", $consumo, $temperatura, $fechahora, $id);

if ($stmt->execute()) {
    echo "Dato actualizado.";
} else {
    echo "Error al editar: " . $conn->error;
}
?>

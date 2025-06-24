<?php
require 'config/conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM Sensores WHERE Id_Datos = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Dato eliminado.";
} else {
    echo "Error al eliminar: " . $conn->error;
}
?>

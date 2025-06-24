<?php
require 'config/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM Tiempo WHERE Id_Datos = $id";
    if (mysqli_query($conexion, $deleteQuery)) {
        header("Location: index.php");  // Redirigir a la página principal
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

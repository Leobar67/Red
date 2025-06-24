<?php
require 'config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consumo = $_POST['consumo'];
    $temperatura = $_POST['temperatura'];
    $fechahora = $_POST['fechahora'];

    $query = "INSERT INTO Tiempo (Consumo, Temperatura, Fechahora) VALUES ('$consumo', '$temperatura', '$fechahora')";
    if (mysqli_query($conexion, $query)) {
        header("Location: index.php");  // Redirigir a la página principal
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<?php
$host = "caboose.proxy.rlwy.net";
$port = 53956;
$usuario = "root";
$contrasena = "rUiNQxWUAAfGKqMaBKgvqzHEaYtuzSnO";
$base_datos = "railway";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos, $port);

if ($conn->connect_error) {
    die("❌ Conexión fallida: " . $conn->connect_error);
}

// echo "✅ Conexión exitosa a MySQL (mysqli)";
?>


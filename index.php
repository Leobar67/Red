<?php
$host = "localhost";
$user = "root";
$password = ""; // O tu contraseña de base de datos si usas MySQL en Render
$dbname = "gregario-sorpresa";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<?php
$host = "localhost";           // Servidor
$baseDeDatos = "mi_base";      // Base de datos
$usuario = "root";             // Usuario
$contrasena = "";              // Contraseña

try {
    $conexion = new PDO("mysql:host=$host;dbname=$baseDeDatos;charset=utf8", $usuario, $contrasena);
    
    // Habilitar excepciones en caso de error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✅ Conexión exitosa";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>



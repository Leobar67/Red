<?php
require 'config/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Tiempo WHERE Id_Datos = $id";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consumo = $_POST['consumo'];
    $temperatura = $_POST['temperatura'];
    $fechahora = $_POST['fechahora'];

    $updateQuery = "UPDATE Tiempo SET Consumo = '$consumo', Temperatura = '$temperatura', Fechahora = '$fechahora' WHERE Id_Datos = $id";
    if (mysqli_query($conexion, $updateQuery)) {
        header("Location: index.php");  // Redirigir a la página principal
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
</head>
<body>

    <h1>Editar Registro</h1>

    <form action="editar.php?id=<?php echo $row['Id_Datos']; ?>" method="post">
        <label for="consumo">Consumo:</label>
        <input type="number" name="consumo" value="<?php echo $row['Consumo']; ?>" step="0.01" required><br>

        <label for="temperatura">Temperatura:</label>
        <input type="number" name="temperatura" value="<?php echo $row['Temperatura']; ?>" step="0.01" required><br>

        <label for="fechahora">Fecha y Hora:</label>
        <input type="datetime-local" name="fechahora" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Fechahora'])); ?>" required><br>

        <button type="submit">Actualizar</button>
    </form>

</body>
</html>

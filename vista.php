<?php
require 'config/conexion.php';
$bd = new BD_PDO();
$datos = $bd->Ejecutar_Instruccion("SELECT * FROM Sensores");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Sensores</title>
</head>
<body>
    <h2>Agregar nuevo dato</h2>
    <form method="POST" action="insertar.php">
        Consumo: <input type="number" name="consumo" step="0.01" required><br>
        Temperatura: <input type="number" name="temperatura" step="0.01" required><br>
        Fecha y hora: <input type="datetime-local" name="fechahora" required><br>
        <input type="submit" value="Agregar">
    </form>

    <h2>Datos existentes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Consumo</th>
            <th>Temperatura</th>
            <th>FechaHora</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($datos as $row): ?>
            <tr>
                <td><?= $row['Id_Datos'] ?></td>
                <td><?= $row['Consumo'] ?></td>
                <td><?= $row['Temperatura'] ?></td>
                <td><?= $row['Fechahora'] ?></td>
                <td>
                    <form action='eliminar.php' method='GET' style='display:inline;'>
                        <input type='hidden' name='id' value='<?= $row['Id_Datos'] ?>'>
                        <input type='submit' value='Eliminar'>
                    </form>
                    <form action='editar.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='id' value='<?= $row['Id_Datos'] ?>'>
                        <input type='number' name='consumo' value='<?= $row['Consumo'] ?>' step='0.01' required>
                        <input type='number' name='temperatura' value='<?= $row['Temperatura'] ?>' step='0.01' required>
                        <input type='datetime-local' name='fechahora' value='<?= date('Y-m-d\TH:i', strtotime($row['Fechahora'])) ?>' required>
                        <input type='submit' value='Editar'>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

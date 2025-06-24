<?php
require 'config/conexion.php';

// Mostrar los datos de la tabla
$query = "SELECT * FROM Tiempo";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Datos</title>
</head>
<body>

    <h1>Gestión de Datos</h1>

    <!-- Mostrar datos en tabla -->
    <table border="1">
        <thead>
            <tr>
                <th>Id_Datos</th>
                <th>Consumo</th>
                <th>Temperatura</th>
                <th>Fechahora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['Id_Datos']; ?></td>
                    <td><?php echo $row['Consumo']; ?></td>
                    <td><?php echo $row['Temperatura']; ?></td>
                    <td><?php echo $row['Fechahora']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['Id_Datos']; ?>">Editar</a> | 
                        <a href="eliminar.php?id=<?php echo $row['Id_Datos']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Formulario de Inserción -->
    <h2>Agregar Nuevo Registro</h2>
    <form action="insertar.php" method="post">
        <label for="consumo">Consumo:</label>
        <input type="number" name="consumo" step="0.01" required><br>

        <label for="temperatura">Temperatura:</label>
        <input type="number" name="temperatura" step="0.01" required><br>

        <label for="fechahora">Fecha y Hora:</label>
        <input type="datetime-local" name="fechahora" required><br>

        <button type="submit">Agregar</button>
    </form>

</body>
</html>

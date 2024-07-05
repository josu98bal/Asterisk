<?php
// Establecer los parámetros de conexión
$host = 'localhost';
$usuario = 'comunicaciones';
$contrasena = '1234';
$base_datos = 'sensores';

// Crear una conexión a la base de datos
$bd = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($bd->connect_error) {
    die("Error en la conexión a la base de datos: " . $bd->connect_error);
}

// Consulta SQL para obtener los últimos cuatro datos de la tabla sensor
$sql = "SELECT id, temperatura, humedad, luz, voltaje FROM sensor ORDER BY id DESC LIMIT 3";

// Ejecutar la consulta
$resultado = $bd->query($sql);

// Verificar si se obtuvieron resultados
if ($resultado && $resultado->num_rows > 0) {
    echo "<div class='last-data-container'>";
    echo "<strong> Últimos Tres datos ingresados en la tabla sensor: </strong>";
    echo "<br>";
    echo "<table style='background-color: white; text-align: center; border-collapse: collapse; width: 50%; margin: 20px auto;'>";
    echo "<thead style='background-color: #246355; border-bottom: solid 5px #0F362D; color: white;'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Temperatura</th>";
    echo "<th>Humedad</th>";
    echo "<th>Luz</th>";
    echo "<th>Voltaje</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Iterar sobre los resultados y mostrar cada fila en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$fila['id']}</td>";
        echo "<td>{$fila['temperatura']}</td>";
        echo "<td>{$fila['humedad']}</td>";
        echo "<td>{$fila['luz']}</td>";
        echo "<td>{$fila['voltaje']}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "<br>";
    // Botón para actualizar la tabla de manera dinámica
    echo "<button onclick='updateTable()'>Actualizar Tabla</button>";
    echo "<br>";
} else {
    echo "No se encontraron datos en la tabla sensor.";
}

// Cerrar la conexión a la base de datos
$bd->close();
?>

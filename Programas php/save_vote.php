#!/usr/bin/php -q
<?php
// Obtener los argumentos directamente desde AGI
$cedula = isset($argv[1]) ? $argv[1] : '';
$opcion = isset($argv[2]) ? $argv[2] : '';

// Verificar que se recibieron los argumentos esperados
if (empty($cedula) || empty($opcion)) {
    echo "VERBOSE \"Error: Missing arguments\"\n";
    exit(1);
}

// Conexión a la base de datos
$servername = "localhost";
$username = "comunicaciones";
$password = "1234";
$dbname = "sensores";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    echo "VERBOSE \"Connection failed: " . $conn->connect_error . "\"\n";
    exit(1);
}

// Insertar los datos en la tabla
$sql = "INSERT INTO votaciones (Ncedula, Op) VALUES ('$cedula', '$opcion')";
if ($conn->query($sql) === TRUE) {
    echo "VERBOSE \"New record created successfully\"\n";
} else {
    echo "VERBOSE \"Error: " . $sql . " " . $conn->error . "\"\n";
}

// Cerrar la conexión
$conn->close();
?>

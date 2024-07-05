<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "comunicaciones";
$password = "1234";
$dbname = "sensores";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para insertar datos
function insertarVotacion($conn, $ncedula, $op) {
    $sql = "INSERT INTO votacion (Ncedula, Op) VALUES ('$ncedula', '$op')";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular parámetros
   //  if (!$stmt->bind_param("ss", $ncedula, $op)) {
   //      die("Error en bind_param: " . $stmt->error);
  //   }

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo "Nuevo registro creado exitosamente\n";
    } else {
        echo "Error: " . $stmt->error . "\n";
    }

    $stmt->close();
}

// Obtener datos desde la línea de comandos
if ($argc != 3) {
    die("Uso: php ingreso_bd.php <Ncedula> <Op>\n");
}

$ncedula = $argv[1];
$op = $argv[2];

// Validar datos
if (strlen($ncedula) == 10 && in_array($op, ['1', '2', '3'])) {
    insertarVotacion($conn, $ncedula, $op);
} else {
    echo "Datos inválidos. Asegúrate de que la cédula tenga 10 números y la opción sea 1, 2 o 3.\n";
}

$conn->close();
?>

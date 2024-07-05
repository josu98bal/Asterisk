<?php
// Parámetros de llamada comunes
$callerID = "Alarm System <301>";
$context = "alarma-esp";
$priority = 1;
$timeout = 30;

// Información para la primera llamada (Niveles bajos)
$extension1 = "100";
$audioFile1 = "/var/lib/asterisk/sounds/nivel-alto";
$callFile1 = "/tmp/alarm_bajo.call"; // Archivo temporal para la primera llamada

$content1 = "Channel: PJSIP/$extension1\n";
$content1 .= "Callerid: $callerID\n";
$content1 .= "Context: $context\n";
$content1 .= "Extension: $extension1\n";
$content1 .= "Priority: $priority\n";
$content1 .= "Timeout: $timeout\n";
$content1 .= "Application: Playback\n";
$content1 .= "Data: $audioFile1\n"; // Ruta completa del archivo de audio para niveles bajos

// Crear el archivo de llamada temporalmente para la primera llamada
file_put_contents($callFile1, $content1);

// Cambiar permisos del archivo temporal para la primera llamada
chmod($callFile1, 0777);

// Información para la segunda llamada (Niveles altos)
$extension2 = "101";
$audioFile2 = "/var/lib/asterisk/sounds/nivel-alto";
$callFile2 = "/tmp/alarm_alto.call"; // Archivo temporal para la segunda llamada

$content2 = "Channel: PJSIP/$extension2\n";
$content2 .= "Callerid: $callerID\n";
$content2 .= "Context: $context\n";
$content2 .= "Extension: $extension2\n";
$content2 .= "Priority: $priority\n";
$content2 .= "Timeout: $timeout\n";
$content2 .= "Application: Playback\n";
$content2 .= "Data: $audioFile2\n"; // Ruta completa del archivo de audio para niveles altos

// Crear el archivo de llamada temporalmente para la segunda llamada
file_put_contents($callFile2, $content2);

// Cambiar permisos del archivo temporal para la segunda llamada
chmod($callFile2, 0777);

// Mover los archivos al directorio de Asterisk para iniciar las llamadas
$finalCallFile1 = "/var/spool/asterisk/outgoing/alarm_bajo.call";
$finalCallFile2 = "/var/spool/asterisk/outgoing/alarm_alto.call";

rename($callFile1, $finalCallFile1);
rename($callFile2, $finalCallFile2);

// Crear un archivo JSON con el mensaje
$messageData = [
    'message' => 'Llamadas a Asterisk por niveles altos de sensores realizadas a las extensiones ' . $extension1 . ' y ' . $extension2 . ' con reproducción de audio'
];

// Ruta donde se guardará el archivo JSON
$jsonFilePath = '/var/www/html/message.json';

// Guardar el mensaje en un archivo JSON
file_put_contents($jsonFilePath, json_encode($messageData));




echo "Llamadas a Asterisk por niveles altos de sensores realizadas a las extensiones $extension1 y $extension2 con reproducción de audio\n";
?>

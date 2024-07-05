<?php
//LLAMADA PARA NIVELES ALTOS DE TEMPERATURA 
$extension = "100";
$callerID = " Alarm System <302>";
$context = "alarma-esp";
$priority = 1;
$timeout = 30;

$callFile = "/tmp/alarm3.call"; // Usaremos un archivo temporal

$content = "Channel: PJSIP/$extension\n";
$content .= "Callerid: $callerID\n";
$content .= "Context: $context\n";
$content .= "Extension: $extension\n";
$content .= "Priority: $priority\n";
$content .= "Timeout: $timeout\n";
$content .= "Application: Playback\n";
$content .= "Data: /var/lib/asterisk/sounds/nivel-alto\n"; // Ruta completa del archivo de audio

// Crear el archivo de llamada temporalmente
file_put_contents($callFile, $content);

// Cambiar permisos del archivo temporal
chmod($callFile, 0777);

// Mover el archivo al directorio de Asterisk
$finalCallFile = "/var/spool/asterisk/outgoing/alarm3.call";
rename($callFile, $finalCallFile);

echo "Llamada a Asterisk de alerta alta realizada a $extension con reproducción de audio\n";
?>

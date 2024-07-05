<?php
$extension = "101";
$callerID = "Alarm System <300>";
$context = "default";
$priority = 1;
$timeout = 30;

$callFile = "/var/spool/asterisk/outgoing/alarm.call";

$content = "Channel: PJSIP/$extension\n";
$content .= "Callerid: $callerID\n";
$content .= "Context: $context\n";
$content .= "Extension: $extension\n";
$content .= "Priority: $priority\n";
$content .= "Timeout: $timeout\n";

// Crear el archivo de llamada
file_put_contents($callFile, $content);

// Cambiar permisos del archivo
chmod($callFile, 0777);

echo "Llamada a Asterisk realizada\n";
?>

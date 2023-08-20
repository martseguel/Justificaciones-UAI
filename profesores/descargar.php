<?php
// Obtener el valor seleccionado del dropdown
$asignatura = $_GET['asignatura'];

// Definir el nombre del archivo a descargar
$filename = $asignatura . "_planilla.xlsx";

// Ruta del archivo en el servidor
$file = "ruta/del/archivo/" . $filename;

// Verificar si el archivo existe
if (file_exists($file)) {
    // Configurar las cabeceras para la descarga
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $filename);
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Leer y mostrar el contenido del archivo
    readfile($file);
    exit;
} else {
    echo "El archivo no existe.";
}
?>
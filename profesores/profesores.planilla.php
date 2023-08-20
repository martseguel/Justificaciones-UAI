<?php
session_start();
if ($_SESSION["loggedin"] === false or $_SESSION["tipoUser"] != "Profesor") {
    header("location: ../index.html");
}

require_once "../utils/config.php";

$sql = "SELECT s.*, r.* FROM Secciones as s INNER JOIN Profesores as p ON s.profe_id = p.id INNER JOIN Ramos as r ON s.ramo_id = r.id WHERE p.rut = " . $_SESSION['rut'];
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_execute($stmt);
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>UAI - Justificaciones</title>
    <link rel="stylesheet" type="text/css" href="../utils/style2.css">
    <link rel="stylesheet" type="text/css" href="../utils/styleProfe.css">
</head>

<?php include_once('../utils/plantilla.php'); ?>
<script>
    let divToAppend = document.getElementById('linksToInsert');
    let insert = '<a href="./profesores.zoom.php" class="salir" title="Subir zoom">•Subir zoom•</a>';
    divToAppend.insertAdjacentHTML("afterbegin", insert);
</script>

<div class="container1">
    <div id="contenido" class="dvContentCenterInside">
        <div class="dvIntranetFooter"></div>
        <h1>
            <?php echo $_SESSION["nombre"] ?>
        </h1>
        <h2>Seleccione la planilla que desea descargar</h2>
        <h3>Sus secciones:</h3>

        <form action="" method="get">
            <select name="asignatura">
            <option value="">Seleccionar seccion</option>
                <?php
                foreach ($result as $r) {
                    echo "<option value='".$r['name']."'>".$r['name']." - " . $r['n_sala'] ."</option>";
                }
                ?>
            </select>
            <input type="submit" name="descargar" value="Descargar Planilla">
        </form>

        <?php
        /*
        // Crear el objeto PDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();

        // Título y subtitulo
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Asistencia', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, "Core", 0, 1, 'C');
        $pdf->Cell(0, 10, "Profe 1", 0, 1, 'C');
        $pdf->Cell(0, 10, 'Fecha: ' . date('Y-m-d'), 0, 1, 'C');
        $pdf->Ln(10);

        // Obtener los datos de los alumnos desde la base de datos
        $sql = "SELECT nombre, correo, rut FROM Usuarios";
        $result = $link->query($sql);

        // Tabla con los datos de los alumnos
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Nombre', 1);
        $pdf->Cell(50, 10, 'Apellido', 1);
        $pdf->Cell(40, 10, 'RUT', 1);
        $pdf->Cell(50, 10, 'Firma', 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln();

        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(50, 10, $row['nombre'], 1);
            $pdf->Cell(50, 10, $row['correo'], 1);
            $pdf->Cell(40, 10, $row['rut'], 1);
            $pdf->Cell(50, 10, '', 1);
            $pdf->Ln();
        }

        // Cerrar la conexión a la base de datos
        $link->close();

        // Guardar el archivo PDF en el servidor
        $pdfFilename = 'asistencia.pdf';
        $pdf->Output($pdfFilename, 'F');

        // Descargar el archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $pdfFilename . '"');
        header('Cache-Control: private');

        // Imprimir el PDF
        echo '<script type="text/javascript">';
        echo 'var printWindow = window.open("' . $pdfFilename . '", "_blank");';
        echo 'printWindow.print();';
        echo '</script>';

        readfile($pdfFilename);
        unlink($pdfFilename);

        exit;
         */
        ?>
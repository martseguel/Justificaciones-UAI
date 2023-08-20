<?php
session_start();
require_once('../utils/config.php');
if ($_SESSION["loggedin"] === false or $_SESSION["tipoUser"] != "Alumno") {
    header("location: ../../index.html");
}
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
    let insert = '<a href="alumnos.php" class="salir" title="Inicio">•Inicio•</a> <a href="renuncia.php" class="salir" title="Renuncia">•Renuncia Ramo•</a> <a href="resultadoJust.php" class="salir" title="Resultados">•Resultados•</a>';
    divToAppend.insertAdjacentHTML("afterbegin", insert);
</script>

<style>
    .tablaAsistencia {
        margin-top:50px;
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin-left: 1em;
        padding: 0;
        width: 95%;
        table-layout: fixed;
        font-size: 14px;
    }

    .tablaAsistencia caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    .tablaAsistencia tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    .tablaAsistencia th,
    .tablaAsistencia td {
        padding: .625em;
        text-align: center;
    }

    .tablaAsistencia th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
        background-color: #b2beb5;
        border: 1px solid black;
    }
</style>

<div class="container1">
    <h1>Estado Asistencia</h1>
        <?php
        //inicia segun sesión 
        if (isset($_SESSION['id'])) {
            $nid = $_SESSION['id'];
            $count_sql = "SELECT COUNT(*) as count FROM Asistencia WHERE alumno_id = '$nid'";
            $count_result = $link->query($count_sql);
            $count_row = $count_result->fetch_assoc();
            $count = $count_row['count'];
            $sql = "SELECT Ramos.name, SUM(Asistencia.presente) AS present_sum, COUNT(*) AS total_classes
            FROM Ramos INNER JOIN Asistencia ON Ramos.id = Asistencia.ramo_id INNER JOIN Usuarios ON Asistencia.alumno_id = Usuarios.id WHERE Usuarios.id = '$nid' AND Ramos.req_asistencia = 1 GROUP BY Ramos.name";
            $result = $link->query($sql);
            echo "
            <table class='tablaAsistencia'>
            <thead>
        <tr>
        <th>Ramo</th>
        <th>Asistencia</th>
        <th>Porcentaje Asistencia</th>
        </tr></thead><tbody>";
            while ($row = $result->fetch_assoc()) {
                $present = $row["present_sum"];
                $totalClasses = $row["total_classes"];
                $division = ($present / $totalClasses) * 100;
                $porcentaje = number_format($division, 2) . "%";
                echo "<tr>
            <td>" . $row["name"] . "</td>
            <td>" . $present . "</td>
            <td>" . $porcentaje . "</td>
            </tr>";
            }
            echo "</table></div>";
        } else {
            echo "La variable de sesión no está definida.";
        }
        $link->close();
        ?>
        </tbody>
</div>
</body>

</html>
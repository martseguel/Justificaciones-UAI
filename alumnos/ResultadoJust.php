<?php
session_start();
if ($_SESSION["loggedin"] === false or $_SESSION["tipoUser"] != "Alumno") {
    header("location: ../../index.html");
    exit;
}

require_once "../utils/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>UAI - Justificaciones</title>
    <link rel="stylesheet" type="text/css" href="../utils/styleProfe.css">
    <link rel="stylesheet" type="text/css" href="../utils/style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<?php include_once('../utils/plantilla.php'); ?>
<script>
    let divToAppend = document.getElementById('linksToInsert');
    let insert = '<a href="alumnos.php" class="salir" title="Inicio">•Inicio•</a> <a href="renuncia.php" class="salir" title="Renuncia">•Renuncia Ramo•</a> <a href="estadoAsistencia.php" class="salir" title="Ver Estado Asistencia">•Ver Estado Asistencia•</a>';
    divToAppend.insertAdjacentHTML("afterbegin", insert);
</script>

<style>
    .tableResult {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin-left: 1em;
        padding: 0;
        width: 95%;
        table-layout: fixed;
    }

    .tableResult caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    .tableResult tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    .tableResult th,
    .tableResult td {
        padding: .625em;
        text-align: center;
    }

    .tableResult th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
        background-color: #b2beb5;
        border: 1px solid black;
    }
</style>

<body>
    <div class="container1">
        <h1>Estado de Justificaciones</h1>
        <table style="margin-top:50px" class="colspan=3 tablecenter tableResult">
            <thead>
                <tr>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Resultado </th>

                </tr>
            </thead>
            <tbody>
                <?php
                //inicia segun sesión 
                if (isset($_SESSION['id']))
                    $nid = $_SESSION['id'];
                $sql = 'SELECT * FROM Justificaciones WHERE alumno_id = ' . $_SESSION['id'];
                $result = $link->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                 <td> " . $row["fecha_desde"] . "</td>
                 <td> " . $row["fecha_hasta"] . "</td>
                 <td> " . $row["resultado"] . "</td> 
                 </tr>";
                }
                $link->close();
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>
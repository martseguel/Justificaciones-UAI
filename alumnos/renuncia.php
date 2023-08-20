<?php
session_start();
if ($_SESSION["loggedin"] === false or $_SESSION["tipoUser"] != "Alumno") {
    header("location: ../../index.html");
    exit;
}

require_once "../utils/config.php";

// Procesar la solicitud de eliminar si se ha enviado
if (isset($_POST['id_eliminar'])) {
    $id_eliminar = $_POST['id_eliminar'];
    $nid = $_SESSION['id'];
    // Establecer la conexión con la base de datos
    $sql_inscripciones = "DELETE FROM Inscripciones WHERE alumno_id = '$nid' AND ramo_id = '$id_eliminar'";
    $sql_asistencia = "DELETE FROM Asistencia WHERE alumno_id = '$nid' AND ramo_id = '$id_eliminar'";
    if (mysqli_query($link, $sql_inscripciones) && mysqli_query($link, $sql_asistencia)) {
        // Si las consultas fueron exitosas, redirigir a alguna página
        echo "<script>alert('Desincripcion completada');</script>";
        header("Refresh:0");
    } else {
        // Si ocurrió algún error, mostrar un mensaje de error
        echo "Error al eliminar: ";
    }
    // Cerrar la conexión con la base de datos
    mysqli_close($link);

}

?>
<!DOCTYPE html>
<html>

<head>
    <title>UAI - Justificaciones</title>
    <link rel="stylesheet" type="text/css" href="../utils/styleProfe.css">
    <link rel="stylesheet" type="text/css" href="../utils/style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<?php include_once('../utils/plantilla.php'); ?>
<script>
    let divToAppend = document.getElementById('linksToInsert');
    let insert = '<a href="alumnos.php" class="salir" title="Inicio">•Inicio•</a> <a href="resultadojust.php" class="salir" title="•Resultados•">•Resultados•</a> <a href="resultadoJust.php" class="salir" title="Resultados">•Resultados•</a>';
    divToAppend.insertAdjacentHTML("afterbegin", insert);

</script>

<style>
    .tableRenuncia {
        margin-top:50px;
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin-left: 1em;
        padding: 0;
        width: 95%;
        table-layout: fixed;
        font-size: 14px;
    }

    .tableRenuncia caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    .tableRenuncia tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    .tableRenuncia th,
    .tableRenuncia td {
        padding: .625em;
        text-align: center;
    }

    .tableRenuncia th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
        background-color: #b2beb5;
        border: 1px solid black;
    }
</style>

<div class="container1">
    <?php
    $nid = $_SESSION['id'];
    $sql = "SELECT Ramos.id, Ramos.name FROM Ramos, Asistencia LEFT JOIN Usuarios ON Asistencia.alumno_id = Usuarios.id WHERE Usuarios.id = Asistencia.alumno_id AND Ramos.id = Asistencia.ramo_id AND Ramos.req_asistencia = 1 AND Asistencia.alumno_id = '$nid' GROUP BY Ramos.name";
    $result = $link->query($sql);
    echo "<h1>Renuncia Ramos</h1><table class='tableRenuncia'>
            <tr>
            <th>Ramo</th>
            <th>Seccion</th>
            <th>Confirmar</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                 <td>" . $row["name"] . "</td>
                 <td>" . $row["id"] . "</td>
                 <td>";
        echo "<form enctype='multipart/form-data' action=" . $_SERVER['PHP_SELF'] . "  method='post'>";
        echo "<input type='hidden' name='id_eliminar' value='" . $row["id"] . "'>";
        echo "<select id='opciones'>
        <option value='' selected></option>
        <option value='renunciar'>Renunciar</option>
      </select>
      ";
        echo "<button onclick='this.form.submit()'>Confirmar</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</div>

</body>

</html>
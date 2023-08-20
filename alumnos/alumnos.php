<?php
session_start();
if ($_SESSION["loggedin"] === false or $_SESSION["tipoUser"] != "Alumno") {
    header("location: ../../index.html");
    exit;
}

require_once "../utils/config.php";

$fecha_desde = $fecha_hasta = $motivo = $file = $alumno_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $alumno_id = $_SESSION["id"];
    $fecha_desde = $_POST["fecha_desde"];
    $fecha_hasta = $_POST["fecha_hasta"];
    $motivo = $_POST["motivo"];

    if (isset($_FILES['image'])) {
        $file_tmp = $_FILES['image']['tmp_name'];
        $type = pathinfo($file_tmp, PATHINFO_EXTENSION);

        $data = file_get_contents($file_tmp);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $file = $base64;
    }

    // Prepare an insert statement
    $sql = "INSERT INTO Justificaciones (alumno_id, fecha_desde, fecha_hasta, motivo, image) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "issss", $param_alumno_id, $param_fecha_desde, $param_fecha_hasta, $param_motivo, $param_image);

        // Set parameters
        $param_alumno_id = $alumno_id;
        $param_fecha_desde = $fecha_desde;
        $param_fecha_hasta = $fecha_hasta;
        $param_motivo = $motivo;
        $param_image = $file;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "subido";
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
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
    let insert = '<a href="resultadoJust.php" class="salir" title="Resultados">•Resultados•</a> <a href="renuncia.php" class="salir" title="Renuncia">•Renuncia Ramo•</a> <a href="estadoAsistencia.php" class="salir" title="Ver Estado Asistencia">•Ver Estado Asistencia•</a>';
    divToAppend.insertAdjacentHTML("afterbegin", insert);
</script>

<div class="container1">
    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div id="titleText">
            <span id="title" class="textLogo">Formulario Justificaciones</span>
        </div>

        <div id="datesContaner">
            <div>
                <label for="fecha_desde" id="desde">Desde: </label>
                <input type="date" id="fecha_desde" name="fecha_desde" class="dateInput">
            </div>
            <div>
                <label for="fecha_hasta" id="hasta">Hasta: </label>
                <input type="date" id="fecha_hasta" name="fecha_hasta" class="dateInput">
            </div>
        </div>

        <div id="ramosDiv">

            <div id="listaRamos" class="dropdown-check-list" tabindex="100">
                <span class="anchor">Ramos: </span>
                <ul id="items" class="items">
                    <?php
                    try {
                        $sql = "SELECT r.name FROM Ramos as r INNER JOIN Inscripciones as i ON
							r.id = i.ramo_id AND i.alumno_id = ?";
                        $stmt = mysqli_prepare($link, $sql);
                        mysqli_stmt_bind_param($stmt, 'i', $_SESSION["id"]);
                        mysqli_stmt_execute($stmt);
                        $result = $stmt->get_result();

                        foreach ($result as $r) {
                            $name = $r["name"];
                            echo '<li><input type="checkbox" value="' . $name . '"/>' . $name . '</li>';
                        }
                    } catch (Exception $e) {
                        echo 'Caught exception: ', $e->getMessage(), "\n";
                    }
                    ?>
                </ul>
            </div>

            <script>
                var checkList = document.getElementById('listaRamos');
                var items = document.getElementById('items');
                checkList.getElementsByClassName('anchor')[0].onclick = function (evt) {
                    if (items.classList.contains('visible')) {
                        items.classList.remove('visible');
                        items.style.display = "none";
                    } else {
                        items.classList.add('visible');
                        items.style.display = "block";
                    }
                }

                items.onblur = function (evt) {
                    items.classList.remove('visible');
                }

                $(document).on("click", "input:checkbox:checked", function () {
                    var flags = Array();
                    $("input:checkbox:checked", $(this).parents("ul").first()).each(function () {
                        flags.push($(this).val());
                    });
                });
                    //flags es el array de ramos seleccionados
            </script>

        </div>

        <div id="motivoContainer">
            <label for="motivo" id="motivoLabel">Motivo</label>
            <div>
                <input type="text" id="motivo" name="motivo">
            </div>
        </div>

        <div id="fileContainer">
            <input type="file" id="image" name="image">
        </div>

        <input style="margin-top:10px;" type="submit" value="Enviar">

        <div id="usernameDiv">
            <span id="username">
                <?php
                echo $_SESSION["nombre"];
                ?>
            </span>
        </div>
    </form>
</div>
</div>

</body>

</html>
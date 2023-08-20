<?php
session_start();
if ($_SESSION["loggedin"] === false or $_SESSION["tipoUser"] != "Profesor") {
    header("location: index.html");
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
    let insert = '<a href="./profesores.planilla.php" class="salir" title="Descargar planilla">•Descargar planilla•</a>';
    divToAppend.insertAdjacentHTML("afterbegin", insert);
</script>


<div class="container1">
    <div id="contenido" class="dvContentCenterInside">
        <div class="dvIntranetFooter"></div>
        <h1>
            <?php echo $_SESSION["nombre"] ?>
        </h1>
        <h2>Seleccione seccion para subir el reporte Zoom</h2>
        <h3>Sus secciones:</h3>

        <form action="" method="get">
            <select name="asignatura">
            <option value="">Seleccionar Seccion</option>
                <?php
                foreach ($result as $r) {
                    echo "<option value='".$r['name']."'>".$r['name']." - " . $r['n_sala'] ."</option>";
                }
                ?>
            </select>
            <input type="submit" name="descargar" value="Subir reporte">
        </form>
</body>

</html>
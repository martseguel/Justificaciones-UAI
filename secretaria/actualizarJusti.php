<?php

require_once ('../utils/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected = $_POST["selectStatus"];
    $idToUpdate = $_POST["idToUpdate"];

    if($selected == "Aprobar") {
        $selected = "Aprobado";
    } else if($selected == "Rechazar"){
        $selected = "Rechazado";
    }

    $sql = "UPDATE Justificaciones set resultado = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "si", $param_selectedStatus, $param_idToUpdate);

        // Set parameters
        $param_selectedStatus = $selected;
        $param_idToUpdate = $idToUpdate;
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            header("location: ./secretaria.php");
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

?>
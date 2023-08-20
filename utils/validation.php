<?php
 
// Check if the user is already logged in, if yes then redirect him to welcome page
//if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    header("location: welcome.php");
//    exit;
//}
 
// Include config file
require_once "../utils/config.php";
 
// Define variables and initialize with empty values
$correo = $password = "";
$correo_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if correo is empty
    if(empty(trim($_POST["correo"]))){
        $correo_err = "Please enter correo.";
    } else{
        $correo = trim($_POST["correo"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($correo_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, rut, nombre, correo, contrasena, tipo FROM Usuarios WHERE correo = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_correo);
            
            // Set parameters
            $param_correo = $correo;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if correo exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $rut, $nombre, $correo, $hashed_password, $tipoUser);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["rut"] = $rut;
                            $_SESSION["nombre"] = $nombre;
                            $_SESSION["correo"] = $correo;
                            $_SESSION["tipoUser"] = $tipoUser;
                            
                            if($tipoUser == "Alumno"){
                                header("location: ../alumnos/alumnos.php");
                            }
                            elseif ($tipoUser == "Profesor"){
                                header("location: ../profesores/profesores.planilla.php");
                            }
                            elseif($tipoUser == "Secretaria"){
                                header("location: ../secretaria/secretaria.php");
                            }
                            else {
                                echo "error de tipo";
                            }
                            
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid correo or password.";
                            echo $login_err;
                        }
                    }
                } else{
                    // correo doesn't exist, display a generic error message
                    $login_err = "Invalid correo or password.";
                    echo $login_err;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$rut = $nombre = $correo = $password = $confirm_password = "";
$rut_err = $nombre_err = $correo_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate rut
    if(empty(trim($_POST["rut"]))){
        $rut_err = "Please enter a rut.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["rut"]))){
        $rut_err = "rut can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM Usuarios WHERE rut = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_rut);
            
            // Set parameters
            $param_rut = trim($_POST["rut"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $rut_err = "This rut is already taken.";
                } else{
                    $rut = trim($_POST["rut"]);
                    $correo = trim($_POST["correo"]);
                    $tipoUser = $_POST["tipoUser"];
                    $nombre = trim($_POST["nombre"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($rut_err) && empty($password_err) && empty($confirm_password_err) && empty($nombre_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO Usuarios (rut, nombre, correo, contrasena, tipo) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issss", $param_rut, $param_nombre, $param_correo, $param_password, $param_tipo);
            
            // Set parameters
            $param_rut = $rut;
            $param_nombre = $nombre;
            $param_correo = $correo;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_tipo = $tipoUser;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: register.php");
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
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Rut</label>
                <input type="text" name="rut" class="form-control <?php echo (!empty($rut_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rut; ?>">
                <span class="invalid-feedback"><?php echo $rut_err; ?></span>
            </div>   
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control <?php echo (!empty($nombre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nombre; ?>">
                <span class="invalid-feedback"><?php echo $nombre_err; ?></span>
            </div>   
            <div class="form-group">
                <label>Correo</label>
                <input type="text" name="correo" class="form-control <?php echo (!empty($correo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $correo; ?>">
                <span class="invalid-feedback"><?php echo $correo_err; ?></span>
            </div>     
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Tipo de usuario</label>
                <select name="tipoUser">
                    <option value="Alumno" selected>Alumno</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Secretaria">Secretaria</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
    </div>    
</body>
</html>
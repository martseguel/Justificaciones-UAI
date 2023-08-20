<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '201.148.104.209');
define('DB_USERNAME', 'martsegu_asas');
define('DB_PASSWORD', 'asas');
define('DB_NAME', 'martsegu_asas');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
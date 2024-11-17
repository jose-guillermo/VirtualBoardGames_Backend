<?php 

exit;
require_once "conn.php";



$crearAdmin = "INSERT INTO usuarios VALUES('1', 'admin', 'joseguille.jbc@gmail.com', 0, CURRENT_DATE, '-', 'contraseña hasheada', 'admin')";

$result = pg_query($conn, $crearAdmin);




?>
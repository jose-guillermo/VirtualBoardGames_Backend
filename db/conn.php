<?php

// Comentar a la hora de desplegarlo correctamente
// require_once __DIR__ . '/../vendor/autoload.php'; 
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
// $dotenv->load();

$host= $_ENV["DB_HOST"];
$user= $_ENV["DB_USER"];
$pass= $_ENV["DB_PASS"];
$port= $_ENV["DB_PORT"];
$dbname= $_ENV["DB_NAME"];

$string = "user=$user password=$pass host=$host port=$port dbname=$dbname";

$conn = pg_connect($string);

if (!$conn) {
    echo json_encode([
        "status" => "error", 
        "message" => "Error de conexión a la base de datos."
    ]);
    exit;
}

// $result = pg_query($conn, $query);

// Cerrar la conexión
// pg_close($conn);
?>
<?php

// Borrar a la hora para desplegarlo correctamente
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

$query = "DROP TABLE IF EXISTS usuarios";
$result = pg_query($conn, $query);

// $query = "ALTER TABLE public.usuarios ENABLE ROW LEVEL SECURITY;";

// $result = pg_query($conn, $query);

if ($result) {
    echo "Tabla 'usuarios' creada exitosamente.";
} else {
    echo "Error al crear la tabla: " . pg_last_error($conn);
}

// Cerrar la conexión
// pg_close($conn);
?>
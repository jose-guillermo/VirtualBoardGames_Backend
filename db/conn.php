<?php

$host= $_ENV["DB_HOST"];
$user= $_ENV["DB_USER"];
$pass= $_ENV["DB_PASS"];
$port= $_ENV["DB_PORT"];
$dbname= $_ENV["DB_NAME"];

$string = "user=$user password=$pass host=$host port=$port dbname=$dbname";

echo $string;

$conn = pg_connect($string);

if (!$conn) {
    echo "Error de conexión a la base de datos.";
    exit;
} else {
    echo "Conexión exitosa a la base de datos.<br>";
}

$query = "ALTER TABLE public.usuarios ENABLE ROW LEVEL SECURITY;";

$result = pg_query($conn, $query);

if ($result) {
    echo "Tabla 'usuarios' creada exitosamente.";
} else {
    echo "Error al crear la tabla: " . pg_last_error($conn);
}

// Cerrar la conexión
pg_close($conn);
?>
<?php 
// Comentar al subir al sitio
// require_once __DIR__ . '/vendor/autoload.php'; 
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
// $dotenv->load();

$headers = getallheaders();

header('Content-Type: application/json');
if (isset($headers["Apikey"])){
    if ($headers["Apikey"] !== $_ENV["API_KEY"]) {
        echo json_encode([
            'exito' => false, 
            'mensaje' => 'La apikey no es correcta'
        ]);
        die();
    }
} else {
    echo json_encode([
        'exito' => false,
        'mensaje' => 'No hay apikey'
    ]);
    die();
}

?>
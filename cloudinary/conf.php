<?php 

require_once __DIR__ . '/../vendor/autoload.php'; 
// Comentar a la hora de desplegarlo correctamente
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
// $dotenv->load();

use Cloudinary\Configuration\Configuration;

try {
    Configuration::instance($_ENV["CLOUDINARY_URL"] . "?secure=true");
} catch (Exception $e) {
    echo json_encode([
        "exito" => false,
        "error" => $e->getMessage(),
        "mensaje" => "Error al subir imagen",
    ], JSON_PRETTY_PRINT);
}




?>
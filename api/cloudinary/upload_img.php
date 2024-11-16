<?php
require_once "conf.php";
require_once "../check_api_key.php";

use Cloudinary\Api\Upload\UploadApi;

header('Content-Type: application/json');
try{
    if (!isset($_FILES["image"]) || !isset($_POST["dir"]) || !isset($_POST["id"]) || !isset($_POST["idImage"])) {
        throw new Exception("Faltan datos en la solicitud (imagen, directorio, id o id de imagen)");
    }
    
    $img = $_FILES["image"]["tmp_name"];

    /** 
     * La carpeta donde se guardará, por ejemplo, si es una imagen de perfil se guardará en users
     * @var string $dir 
    */
    $dir = $_POST["dir"];

    /** 
     * El id de la entidad a la que pertenece, por ejemplo, si pertenece a un juego será el id del juego 
     * @var string $id 
    */
    $id = $_POST["id"];

    /** 
     * El nombre que la imagen tendrá en cloudinary
     * @var string $idImage
    */
    $idImage = $_POST["idImage"];

    $upload = new UploadApi();
    $response = $upload->upload($img, [
        'folder' => "$dir/$id",
        'public_id' => $idImage,
        'resource_type' => 'image',
        'overwrite' => true,
    ]);

    echo json_encode([
        "exito" => true,
        "url" => $response["secure_url"],
        "public_id" => $response["public_id"],
    ], JSON_PRETTY_PRINT);
} catch(Exception $e) {

    echo json_encode([
        "exito" => false,
        "error" => $e->getMessage(),
        "mensaje" => "Error al subir imagen",
    ], JSON_PRETTY_PRINT);
    
}

?>
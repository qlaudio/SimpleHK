<?php
require_once('core.php');
require_once('session.php');

$target_dir = "../../swf/c_images/album1584/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Esto no es una imagen .gif. ";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo " Disculpa, la placa con ese nombre ya existe.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 20000) {
    echo " Disculpa, tu archivo es muy grande.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "gif" ) {
    echo " Disculpa, solo se permiten imagenes GIF.\n";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " Tu archivo no se ha subido..\n";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "La imagen ". basename( $_FILES["fileToUpload"]["name"]). " se ha subido. ";
		$usuario=$user_q['username'];
		$porciones = explode(".",basename( $_FILES["fileToUpload"]["name"]));
		$nombrearch=$porciones[0]; 
		$log="Ha subido la placa ".basename( $_FILES["fileToUpload"]["name"]);
		
		$stmtlog = $dbConnection->prepare("INSERT INTO hk_logs (user,log) VALUES (:usuario,:log)");
		$stmtlog->bindParam(":usuario", $usuario);
		$stmtlog->bindParam(":log", $log);
		$stmtlog->execute();
		
		header ("Location: badge_texts_add.php?placa=".$nombrearch);
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
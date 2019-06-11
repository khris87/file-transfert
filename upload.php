<?php 
session_start();

require 'connexion.php';

require 'fonctions.php';

if(!empty($_FILES)) {
    $upload=$_FILES['filename'];
    $thumbnailPath= 'tmp/' .basename($_FILES['filename']['name']);
    $size = $_FILES['filename']['size'];
    $uploadOk=1;

    if(!$_SESSION) {
        $id=1;
    }else {
        $id=$_SESSION['id'];
    } 

    // Check if file already exists
    if (file_exists($thumbnailPath)) {
        echo "Le fichier existe déjà sur notre serveur. ";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk === 0) {
        echo "Le transfert a échoué.";
    // if everything is ok, try to upload file
    } else {
        if (($id!==1 && $size > 7000000) || ($id===1 && $size > 3000000)) {
            echo "votre fichier est trop lourd ! ";
        } else if (move_uploaded_file($_FILES['filename']['tmp_name'], $thumbnailPath)) {
            upLoad($bdd,$upload,$id);
        }
    }
}

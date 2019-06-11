<?php //--la connexion à la bdd

try {
    $bdd=new PDO('mysql:host=localhost; dbname=wetransfer; charset=utf8',
        'root',
        'Eddard87');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}
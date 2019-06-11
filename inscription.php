<?php 
require 'connexion.php';

require 'fonctions.php';

if(!empty($_POST)) {
    $mail=htmlspecialchars($_POST['mail']);
    $mdp1=sha1($_POST['pass']);
    $mdp2=sha1($_POST['confirm_pass']);
    if($mdp1!==$mdp2) {
        echo 'Les mots de passe ne correspondent pas !';
    }else {
        insertUser($bdd,$mail,$mdp1);
    }
}
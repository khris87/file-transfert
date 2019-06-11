<?php session_start();

require 'connexion.php';
require 'fonctions.php';

if(!empty($_POST)) {
    $mail=htmlspecialchars($_POST['mail']);
    $mdp1=sha1($_POST['pass']);
    $getId=connectUser($bdd,$mail,$mdp1);
    $_SESSION['id']=$getId['id'];
    $_SESSION['mail']=$getId['mail'];

    header('location:index.php');
}
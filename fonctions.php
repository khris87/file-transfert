<?php //--les fonctions ICI

function upLoad($bdd,$upload,$id) {
    $statement = $bdd->prepare('INSERT INTO `file` (`name`,`type`,`tmp_name`,`error`,`size`,`user_id`)
        VALUES (:nom,:extension,:tmp_name,:error,:size,:userId)');

    $requete = $statement->execute(array(
        'nom'=>$upload['name'],
        'extension'=>$upload['type'],
        'tmp_name'=>$upload['tmp_name'],
        'error'=>$upload['error'],
        'size'=>$upload['size'],
        'userId'=>$id
    ));

    header('location:index.php?id=' .$id. '&link=' .$upload['tmp_name']);
}

function rechercheBdd($bdd,$link) {
    $reponse=$bdd->query('SELECT * FROM `file` WHERE `tmp_name` ="' .$link. '";');
    $file=$reponse->fetch();
    return $file;
}

function makeUrl($bdd,$link,$id) {
    $reponse=$bdd->query('SELECT `tmp_name`,`date`,`size` FROM `file` WHERE `tmp_name` ="' .$link. '";');
    $prepare=$reponse->fetch();
    $url='http://localhost/transferLike/download.php?link=' .$prepare['tmp_name'];
    return $url;

    header('location:index.php?id=' .$id. '&link=' .$prepare['tmp_name']. '&d=' .$prepare['date']);
}

// fonctions d'inscription et de connexion

function insertUser($bdd,$mail,$mdp1) {
    $statement = $bdd->prepare('INSERT INTO `user` (`mail`,`password`)
        VALUES (:mail,:pass)');

    $requete = $statement->execute(array(
        'mail'=>$mail,
        'pass'=>$mdp1
    ));
    $getId=selectId($bdd,$mail);
    header('location:index.php?id=' .$getId['id']);
}

function selectId($bdd,$mail) {
    $reponse=$bdd->query('SELECT * FROM `user` WHERE `mail` ="' .$mail. '";');
    $file=$reponse->fetch();
    return $file;
}

function connectUser($bdd,$mail,$mdp1) {
    $reponse=$bdd->query('SELECT * FROM `user` WHERE `mail` = "' .$mail. '" AND `password` = "' .$mdp1. '";');
    $file=$reponse->fetch();
    return $file;
}

function showTransferByUser($bdd,$id) {
    $reponse=$bdd->query('SELECT * FROM `file` INNER JOIN `user` ON `file`.`user_id`=`user`.`id` WHERE `user`.`id` =' .$id. ';');
    return $reponse;
}

// Mise à jour de la base de données

function updateFromBdd($bdd) {
    $fileId=$bdd->query('SELECT `user_id`,`name`,`tmp_name` FROM `file`');
    while($file=$fileId->fetch()) {
        $id=$file;     

        if($id['user_id']!=1) {
            $timing=(24*60);
        }else {
            $timing=10;
        }
        $reponse=$bdd->prepare('UPDATE `file` SET `tmp_name`=:tmpName WHERE `user_id` = ' .$id['user_id']. ' AND ADDDATE(`file`.`date`,INTERVAL ' .$timing. ' MINUTE) < NOW()');
        $requete = $reponse->execute(array(
            'tmpName'=>'non valide'
        ));
    }
}

function fichiersNonValide($bdd) {
    $reponse=$bdd->query('SELECT `name` FROM `file` WHERE `tmp_name` = "non valide";');
    return $reponse;
}
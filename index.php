<?php //--index
session_start();

include 'head.php';
require 'connexion.php';
require 'fonctions.php';

if(isset($_GET['link'])) {
    $link=$_GET['link'];
    if(!$_SESSION) {
        $id=1;
    }else {
        $id=$_SESSION['id'];
    } 
    
    $donnees=makeUrl($bdd,$link,$id) ?>

<section id="theLink">
    <div class="container">
        <div class="shadow-lg p-3 bg-white rounded">
            <input type="text" class="form-control" value="<?php echo $donnees ?>" id="myInput">
            <button class="btn btn-primary mt-3" onclick="myFunction()">Copier le lien</button> 
        </div>
    </div>
</section>

<?php }else { ?>

<section id="formUpload" class="animated slideInRight delay-1s">
    <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-3">

            <div class="custom-file d-inline">
                <label class="custom-file-label" for="uploadFile"><h5>Veuillez choisir votre fichier :</h5></label>
                <input type="file" class="custom-file-input" id="uploadFile" name="filename" required>
                <div class="invalid-feedback">Un problème est survenu</div>
            </div>
            <div class="text-center my-2">
                <label for="envoi" class="mt-3"><h5>Obtenez le lien de téléchargement </h5></label>
                <input type="submit" class="btn btn-success" id="envoi" placeholder="Envoyer">
            </div>
    </form>
</section>

<?php } ?>

<div id="historic" class="animated flipInX delay-1s">
<?php if (isset($_SESSION['id'])) {
    $id=$_SESSION['id'];

    $showTransfers=showTransferByUser($bdd,$id);
    $mailUser=$showTransfers->fetch();
    if($mailUser == NULL) { ?>
        <h2><?php echo 'Bienvenue pour votre premier transfert ' .$mailUser['mail'] ?></h2>
    <?php }else { ?>
        <h2><?php echo 'Historique de vos transferts ' .$mailUser['mail']  ?></h2>
        <ul>
            <?php $boucleShow=showTransferByUser($bdd,$id);
            while($show=$boucleShow->fetch()) { ?>
                <li>
                    <strong><?php echo $show['name'] ?></strong> <i class="fas fa-arrow-circle-right"></i> 
                    <?php if($show['tmp_name'] == "non valide") { ?>
                        <span class="text-muted">Le lien n'est plus valide.</span>
                    <?php }else { ?>
                    <a href="download.php">http://localhost/transferLike/download.php?link=<?php echo $show['tmp_name'] ?></a>
                    <?php } ?>
                </li>
            <?php } ?>
            </ul>
    <?php }   
} ?>
</div>

<section id="publicite"></section>


<?php include 'footer.php';
<?php 

require 'connexion.php';

require 'fonctions.php';

include 'head.php';

$link=$_GET['link'];

$down=rechercheBdd($bdd,$link);
$createDate=date_create($down['date'],timezone_open("Europe/Paris"));
$date=date_format($createDate,'D M Y H:i:s');

$timeBddUser1=strtotime($down['date']);
$timenow=strtotime("now"); ?>

<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $down['name'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">fichier déposé le : <?php echo $date ?></h6>
            <p class="card-text">
                <?php echo $date ?>
            </p>
            <?php 
            if($link !== $down['tmp_name']) {
                echo '<a href="#" disabled class="card-link">Votre lien n\'est plus valable</a>';
            }else {
                echo '<a href="tmp/' .$down['name']. '" download class="card-link">Téléchargez le fichier</a>';
            } ?>
        </div>
    </div>
</div>

<?php include 'footer.php';
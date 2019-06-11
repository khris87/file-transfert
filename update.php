<?php //Script des taches Cron !

require 'connexion.php';

require 'fonctions.php';

updateFromBdd($bdd);

$removeFiles=fichiersNonValide($bdd);

while($rm=$removeFiles->fetch()) {
    shell_exec('rm /var/www/transferLike/tmp/' .$rm['name']);
}
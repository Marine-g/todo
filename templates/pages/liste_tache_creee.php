<?php
/*
 * Template de page affichant la liste des tâches créées par un user
 * 
 * Paramètres : $tache : objet tache
 * 
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "templates/fragments/head.php" ?>
        <title><?=htmlentities($tache->titre)?></title>
    </head>
    <body>
       <?php include "templates/fragments/header.php" ?>
        <h1><?=htmlentities($tache->titre)?></h1>
        <?php include "afficher_tache_demandee.php" ?>
        <a href="afficher_tache.php">Retourner à l'accueil</a>
       <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

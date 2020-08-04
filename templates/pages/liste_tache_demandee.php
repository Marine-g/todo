<?php
/*
 * Template de page affichant la liste des tâches demandées à un user
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
        <?php include "afficher_tache_retard.php" ?>
        <?php include "afficher_tache_a_faire.php" ?>
        <?php include "afficher_tache_en_cours.php" ?>
        <?php include "afficher_tache_refusee.php" ?>
        <a href="afficher_tache.php">Retourner à l'accueil</a>
       <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

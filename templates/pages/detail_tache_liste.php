<?php
/*
 * Template de page affichant le détail d'une tâche
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
        <p>Description : <?=htmlentities($tache->description)?></p>
        <p>Date de création : <?=htmlentities($tache->date_crea)?></p>
        <p>Auteur : <?=htmlentities($tache->auteur->prenom)?> <?=htmlentities($tache->auteur->nom)?></p>
        <p>Personne en charge : <?=htmlentities($tache->personne_en_charge->prenom)?> <?=htmlentities($tache->personne_en_charge->nom)?></p>
        <p>Echeance : <?=htmlentities($tache->echeance)?></p>
        <p>Etat : <?=htmlentities($tache->etat)?></p>
        <p>Motif du refus : <?=htmlentities($tache->motif_refus)?></p>
        <a href="afficher_tache.php">Retourner à l'accueil</a>
       <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

<?php

/* 
 * Template de page affichant les fragments de listes des tâches d'un user
 * 
 *
 * 
 * 
 *  
 * 
 */

?>


<!DOCTYPE html>
<html>
    <head>
        <?php include "templates/fragments/head.php" ?>
        <title>Votre tableau de bord</title>
    </head>
    <body>
        <?php include "templates/fragments/header.php" ?>
        <a href="afficher_form_crea_tache.php?id=<?= htmlentities ($_SESSION["id"]) ?>"><b class="creer_tache">Cliquez ici pour créer une nouvelle tâche</b></a>
        <h1>Liste de vos tâches</h1>
        <?php include "afficher_tache_retard.php" ?>
        <?php include "afficher_tache_en_cours.php" ?>
        <?php include "afficher_tache_demandee.php" ?>
        <?php include "afficher_tache_refusee.php" ?>
        <?php include "afficher_tache_a_faire.php" ?>
        <div class="popup" onclick="myFunction()"><?=htmlentities($tache->titre)?>
        <span class="popuptext" id="myPopup"><p>Description : <?=htmlentities($tache->description)?></p>
        <p>Date de création : <?=htmlentities($tache->date_crea)?></p>
        <p>Auteur : <?=htmlentities($tache->auteur->prenom)?> <?=htmlentities($tache->auteur->nom)?></p>
        <p>Personne en charge : <?=htmlentities($tache->personne_en_charge->prenom)?> <?=htmlentities($tache->personne_en_charge->nom)?></p>
        <p>Echeance : <?=htmlentities($tache->echeance)?></p>
        <p>Etat : <?=htmlentities($tache->etat)?></p>
        <?php if ( isset($tache->motif_refus)) {?>
        <?php} else {?>
        <p>Motif du refus : <?=htmlentities($tache->motif_refus)?></p>   
        <?php }?> 
        </span>
        </div> 
        <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

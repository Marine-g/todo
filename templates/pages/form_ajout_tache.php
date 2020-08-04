<?php
/*
 * Template de page qui affiche le formulaire de création (d'ajout) d'une tâche
 * 
 * Paramètres : $tache : objet tache
 * 
 * 
 * 
 */
?>



<!DOCTYPE html>
<html>
    <head>
         <?php include "templates/fragments/head.php" ?>
        <title>Créer une nouvelle tâche</title>
    </head>
    <body>
        <?php include "templates/fragments/header.php" ?>
        <h1>Formulaire pour créer une nouvelle tâche</h1>
        <form method="post" action="traiter_ajout_tache.php">
            <label for="titre">Le titre : </label>
            <input type="text" id="titre" name="titre" required><br>
            <label for="echeance">L'échéance : </label>
            <input type="date" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" value="<?php echo date('Y-m-d H:i:s')?>" name= "echeance" required><br>
            <label for="description">La description : </label>
            <input type="text" id="titre" name="description" required><br>
            <p>Personne en charge :
            <?php include "templates/fragments/liste_select_user.php"; ?>
            <input type="submit" value="Créer cette tâche">
        </form>
        
        <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

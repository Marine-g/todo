<?php
/*
 * Template de page affichant le formulaire de modification d'une tâche
 * 
 * Paramètres : $tache : objet tache à modifier
 * 
 */
?>



<!DOCTYPE html>
<html>
    <head>
         <?php include "templates/fragments/head.php" ?>
        <title>Modifier la tâche <?=htmlentities($tache->titre)?></title>
    </head>
    <body>
        <?php include "templates/fragments/header.php" ?>
        <h1>Modifier la tâche <?=htmlentities($tache->titre)?></h1>
        <form method="post" action="traiter_modif_tache.php?id=<?= htmlentities ($tache->id) ?>" >
            <label for="motif_refus">Motif de refus ( si vous voulez refuser cette tâche) : </label>
            <input type="text" id="motif_refus" name="motif_refus"><br>
            <label for="En cours">En cours </label>
            <input type="radio" id="En cours" name="etat" value="En cours"><br>
            <label for="A faire">A faire </label>
            <input type="radio" id="A faire" name="etat" value="A faire"><br>
            <label for="Faite">Faite </label>
            <input type="radio" id="Faite" name="etat" value="Faite"><br>
            <input type="submit" value="Modifier la tâche">
        </form>
        <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

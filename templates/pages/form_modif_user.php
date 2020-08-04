<?php
/*
 * Template de page affichant le formulaire de modification d'un user (modification possible uniquement sur le password)
 * 
 * Paramètres : $user : objet user à modifier
 * 
 */
?>



<!DOCTYPE html>
<html>
    <head>
         <?php include "templates/fragments/head.php" ?>
        <title>Modifier mon mot de passe</title>
    </head>
    <body>
        <?php include "templates/fragments/header.php" ?>
        <h1>Modifier mon mot de passe</h1>
        <form method="post" action="traiter_modif_compte.php?id=<?= htmlentities ($_SESSION["id"]) ?>" >
            <label for="password">Votre nouveau mot de passe : </label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Changer mon mot de passe">
        </form>
        <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

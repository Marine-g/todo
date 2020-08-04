<?php

/* 
 * Template de page affichant le formulaire de connexion pour un user
 */

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "templates/fragments/head.php" ?>
        <title>Formulaire de connexion au site TODO</title>
    </head>
    <body>
        <?php include "templates/fragments/header.php" ?>
        <h1>Se connecter</h1>
        <h2>Merci de renseigner les informations demandées ci dessous afin de vous connecter.</h2>
        <form method="post" action="connecter.php">
            <label for="nom">Votre nom : </label>
            <input type="text" id="nom" name="nom" required><br>
            <label for="prenom">Votre prenom : </label>
            <input type="text" id="prenom" name="prenom" required><br>
            <label for="email">Votre adresse mail : </label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Votre mot de passe : </label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Me connecter">
        </form>
        <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

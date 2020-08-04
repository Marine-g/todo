<?php
/*
 * Template de page qui affiche lr formulaire de création (d'ajout) d'un nouvel user
 * 
 */
?>



<!DOCTYPE html>
<html>
    <head>
         <?php include "templates/fragments/head.php" ?>
        <title>Formualire pour créer un nouveau compte</title>
    </head>
    <body>
        <?php include "templates/fragments/header.php" ?>
        <h1>Formulaire pour créer un nouveau compte</h1>
        <form  method="post" action="traiter_ajout_compte.php">
            <label for="nom">Le nom : </label>
            <input type="text" id="nom" name="nom" required><br>
            <label for="prenom">Le prénom : </label>
            <input type="text" id="prenom" name="prenom" required><br>
            <label for="email">L'adresse mail : </label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Le mot de passe : </label>
            <input type="password" id="password" name="password" required><br>
            <label for="Collaborateur">Collaborateur </label>
            <input type="radio" id="Collaborateur" name="statut" value="Collaborateur" required><br>
            <label for="Superviseur">Superviseur </label>
            <input type="radio" id="Superviseur" name="statut" value="Superviseur" ><br>
            <input type="submit" value="Créer le compte">
        </form>
        <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

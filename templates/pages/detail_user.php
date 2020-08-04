<?php
/*
 * Template de page affichant le détail d'un user
 * 
 * Paramètres : $user : objet user
 * 
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include "templates/fragments/head.php" ?>
        <title>Détail du compte de <?=htmlentities($user->prenom)?> <?=htmlentities($user->nom)?></title>
    </head>
    <body>
       <?php include "templates/fragments/header.php" ?>
        <h1>Détail du compte de <?=htmlentities($user->prenom)?> <?=htmlentities($user->nom)?></h1>
        <p>Votre adresse mail : <?=htmlentities($user->email)?></p>
        <p>Votre statut : <?=htmlentities($user->statut)?></p>
        <a href="afficher_tache.php">Retourner à l'accueil</a>
       <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

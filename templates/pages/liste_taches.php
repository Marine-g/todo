<?php

/* 
 * Template de page affichant les fragments de listes des tâches d'un user
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
        <h1>Liste de toutes les tâches</h1>
        <?php include "templates/fragments/liste_taches.php" ?>
        <?php include "templates/fragments/footer.php" ?>
    </body>
</html>

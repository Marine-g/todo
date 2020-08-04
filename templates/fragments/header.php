<?php

/* 
 * En tête de page 
 *      Si l'user est connecté, on affiche - modifier mon compte
 *                                         - me deconnecter
 *                                         - les tâches qui m'ont été demandées
 *                                         - les tâches que j'ai créées
 *                                         - créer un nouveau compte ( uniquement si l'user connecté a le statut de Superviseur)
 *                                         - lister toutes les tâches ( uniquement si l'user connecté a le statut de Superviseur)
 *      Si on n'est pas connecté, le header est "vide", juste le logo. En effet, il n'y a pas de fonctionnalité accessible si pas connecté.
 * 
 */
?>

<header>
    <a href="afficher_tache.php">
        <img src="img/logo.png" alt=""/>
    </a>
    <?php if (! empty ($_SESSION["connecte"])) { ?>
        <?php} else {?> 
        <p>Bonjour <?=$_SESSION["prenom"]?> <?=$_SESSION["nom"]?></p>
        <a href="afficher_historique_tache_creee.php?id=<?= $_SESSION['id'] ?>"> Les tâches que j'ai créées</a>
        <a href="afficher_historique_tache_demandee.php?id=<?= $_SESSION['id'] ?>">Les tâches qui m'ont été demandées</a>
        <a href="afficher_form_modif_compte.php?id=<?= $_SESSION['id'] ?>">Modifier mon compte</a>
        <?php if  (($_SESSION["statut"] ==="Superviseur" ) and ($_SESSION["connecte"] ==true) ){?>
        <?php} else {?>
        <a href="afficher_form_crea_user.php">Créer un nouveau compte</a>
        <a href="afficher_all_tache.php">Voir toutes les tâches</a>
         <?php }?> 
        <a href="deconnecter.php">Me deconnecter</a>
       <?php }?> 
        
</header>

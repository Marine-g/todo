<?php

/* 
 * Contrôleur: préparation et affichage de la liste des tâches d'un user
 * 
 * Paramètres : $tache
 * 
 * Resultat final: affichage d'une page complète
 */

//Initialisations
include "lib/init.php";

//Fabriquer la liste
$tache= new tache();
$liste=$tache->lister();


//Afficher la liste
include "templates/pages/liste_tache_all.php";
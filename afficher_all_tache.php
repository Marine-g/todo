<?php

/* 
 * Contrôleur: préparation et affichage de la liste de toutes les tâches ( seulement pour les superviseurs)
 * Pas possible de modifier les tâches
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
include "templates/pages/liste_taches.php";
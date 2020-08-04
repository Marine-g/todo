<?php

/* 
 * Contrôleur: préparation et affichage de la liste des tâches créés par l'user
 * 
 * Paramètres : $tache  $auteur: auteur de la tache
 * 
 * Resultat final: affichage de la page de détail des tâches demandées, créées
 * 
 * La connexion est obligatoire
 */

//Initialisations
include "lib/init.php";



//Recuperation des paramètres
$auteur= $_SESSION["id"];

//Fabriquer la liste
$tache= new tache();
$liste=$tache->listerDemande($auteur);


//Afficher la page
include "templates/pages/liste_tache_creee.php";
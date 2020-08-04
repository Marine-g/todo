<?php

/* 
 * Contrôleur: préparation et affichage de la liste des tâches refusées par un user
 * 
 * Paramètres : $tache  $id: identifiant du user connecté
 * 
 * Resultat final: affichage du fragment liste_tache_refusee
 * 
 * La connexion est obligatoire
 */

//Initialisations
//include "lib/init.php";

//Recuperation des paramètres
$auteur= $_SESSION["id"];

//Fabriquer la liste
$tache= new tache();
$liste=$tache->listerRefus($id);


//Afficher le fragment
include "templates/fragments/liste_tache_refusee.php";
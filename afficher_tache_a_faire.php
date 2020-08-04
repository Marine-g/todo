<?php

/* 
 * Contrôleur: préparation et affichage de la liste des tâches à faire d'un user
 * 
 * Paramètres : $tache  $id: identifiant du user connecté
 * 
 * Resultat final: affichage du fragment liste_tache_a_faire
 * 
 * La connexion est obligatoire
 */

//Initialisations
//include "lib/init.php";

//Récupération des paramètres
$id= $_SESSION["id"];

//Fabriquer la liste
$tache= new tache();
$liste=$tache->listerAFaire($id);


//Afficher le fragment
include "templates/fragments/liste_tache_a_faire.php";
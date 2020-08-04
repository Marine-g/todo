<?php

/* 
 * Contrôleur: préparation et affichage de la liste des tâches en cours d'un user
 * 
 * Paramètres : $tache  $id: identifiant du user connecté
 * 
 * Resultat final: affichage du fragment liste_tache_en_cours
 * 
 * La connexion est obligatoire
 */

//Initialisations
//include "lib/init.php";

//Récupération des paramètres
$id= $_SESSION["id"];

//Fabriquer la liste
$tache= new tache();
$liste=$tache->listerEnCours($id);


//Afficher le fragment
include "templates/fragments/liste_tache_en_cours.php";
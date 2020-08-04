<?php

/* 
 * Contrôleur: préparation et affichage de la liste des tâches demandées par l'user
 * 
 * Paramètres : $tache  $auteur: auteur de la tache
 * 
 * Resultat final: affichage du fragment liste_tache_demandee
 * 
 * La connexion est obligatoire
 */

//Initialisations
//include "lib/init.php";
//Récupération des paramètres
if (isset($_GET["id"])) {
        $id =$_GET["id"];
    }else {
        $id=0;
    }

//Recuperation des paramètres
$auteur= $_SESSION["id"];

//Fabriquer la liste
$tache= new tache($id);
$liste=$tache->listerDemande($auteur);


//Afficher le fragment
include "templates/fragments/liste_tache_demandee.php";
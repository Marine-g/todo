<?php

/* 
 * Contrôleur: préparation et affichage de la liste des tâches qui ont été demandées au user connecté
 * 
 * Paramètres : $tache  
 * 
 * Resultat final: affichage de la page de détail des tâches demandées au user connecté
 * 
 * La connexion est obligatoire
 */

//Initialisations
include "lib/init.php";

//Récupération des paramètres
if (isset($_GET["id"])) {
        $id =$_GET["id"];
    }else {
        $id=0;
    }


//Fabriquer la liste
$tache= new tache();
$liste=$tache->listerTacheUser($id);


//Afficher la page
include "templates/pages/liste_tache_demandee.php";
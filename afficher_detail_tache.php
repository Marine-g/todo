<?php

/* 
 * Contrôleur: lecture et affichage du détail d'une tache
 * 
 * Paramètres GET id: clé de la tâche à afficher
 * 
 * La connexion est obligatoire
 */

//Initialisations
include "lib/init.php";

//Recuperation des paramètres
if (isset($_GET["id"])) {
        $id =$_GET["id"];
    }else {
        $id=0;
    }
    
//Traitement à proprement dit
$tache= new tache($id);

//Affichage de la page de détail du user
include "templates/pages/detail_tache.php";

<?php

/* 
 * Contrôleur: lecture et affichage du détail d'une tache en ajax
 * 
 * Paramètres GET id: clé de la tâche à afficher
 * 
 * La connexion est obligatoire
 */

//Initialisations
//include "lib/init.php";

//Recuperation des paramètres
if (isset($_GET["id"])) {
        $id =$_GET["id"];
    }else {
        $id=0;
    }

  
//Traitement à proprement dit

$tache= new tache($id);
//echo "test";
//var_dump($tache);
//sleep(1);


//Affichage de la page de détail de la tache
include "templates/fragments/detail_tache_ajax.php";

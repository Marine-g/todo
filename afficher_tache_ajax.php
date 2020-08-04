<?php

/* 
 * Contrôleur: préparation et affichage du detail d'une tache en ajax
 * 
 * Paramètres : $tache
 * 
 */

//Initialisations
//include "lib/init.php";

//Recuperation des paramètres
if (isset($_GET["id"])) {
        $id =$_GET["id"];
    }else {
        $id=0;
    }

//Fabriquer la liste
$tache= new tache($id);

sleep(1);  //Générer un temps d'attente


//Afficher le fragment
include "templates/fragments/detail_tache_ajax.php";
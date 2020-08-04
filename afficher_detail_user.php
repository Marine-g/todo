<?php

/* 
 * Contrôleur: lecture et affichage du détail d'un user
 * 
 * Paramètres GET id: clé de l'user à afficher
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
//Charger l'user connecté
$user= new user($id);

//Affichage de la page de détail du user
include "templates/pages/detail_user.php";

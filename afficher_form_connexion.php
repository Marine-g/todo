<?php

/* 
 * Contrôleur: preparation et affichage du formulaire de connexion pour un user
 * 
 * Paramètres : néant
 * 
 * La connexion n'est pas obligatoire 
 */

$noconnection=true; //Ce contrôleur doit marcher sans être connecté

//Initialisations
include "lib/init.php";


//Traitement proprement dit:
$user= new user();

//Affichage du formulaire de connexion
include "templates/pages/form_connexion.php";
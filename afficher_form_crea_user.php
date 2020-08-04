<?php

/* 
 * Contrôleur: preparation et affichage du formulaire d'ajout d'un user (seul les superviseurs peuvent créer un nouvel utilisateur)
 * 
 * Paramètres : néant
 * 
 * La connexion est obligatoire
 * 
 */


//Initialisations
include "lib/init.php";


//Traitement proprement dit
//Créer un objet user par défaut
$user= new user();


//Affichage de la page finale
include "templates/pages/form_ajout_user.php";

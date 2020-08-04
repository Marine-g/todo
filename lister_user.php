<?php

/* 
 * Contrôleur: préparer et afficher la liste des users pour le foreach du select dans le form d'ajout d'une tâche
 * 
 * 
 * La connexion est obligatoire
 */


//Initialisations
include "lib/init.php";


//Construire la liste
$user= new user();
$liste=$user->listerUser();

//Affichage de la page finale
include "templates/fragments/liste_select_user.php";
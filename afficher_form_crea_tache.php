<?php

/* 
 * Contrôleur: preparation et affichage du formulaire d'ajout d'une tâche
 * 
 * Paramètres : néant
 * 
 * La connexion est obligatoire
 * 
 */

//Initialisations
include "lib/init.php";

//Récupération des paramètres
$id= $_SESSION["id"];


//Traitement proprement dit
//Créer un objet tâche par défaut
$tache= new tache();

//Afficher la liste des user pour le select
$user= new user($id);
$liste =$user->listerUser();

//Affichage de la page finale
include "templates/pages/form_ajout_tache.php";

<?php

/* 
 * Contrôleur de traitement de la création (l'ajout) d'une tache
 * 
 * Paramètres: en POST, les attributs d'une tache
 * 
 * La connexion est obligatoire
 */

//Initialisations
include "lib/init.php";

//Récupération des paramètres
$id= $_SESSION["id"];

//Traitement à proprement dit
$tache=new tache();

//Demander à l'objet tache de récupérer les valeurs de ses attributs dans le POST
$tache->loadFromTab($_POST);

//"Forcer" la date, l'etat, l'auteur
$date_crea=date("Y-m-d H:i:s");
$auteur=$_SESSION["id"];
$etat = "A faire";
//$echeance=date("Y-m-d");
//$motif_refus= null;

$tache->date_crea=$date_crea;
$tache->auteur=$auteur;
$tache->etat=$etat;
//$tache->echeance=$echeance;
//$tache->motif_refus=$motif_refus;

//Insérer dans la base de données
$tache->insert();

//print_r($tache);
//Affichage de la page finale
include "templates/pages/liste_tache_all.php";
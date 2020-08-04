<?php

/* 
 * Contrôleur: préparer et afficher la liste des tâches d'un user
 * 
 * 
 * La connexion est obligatoire
 */


//Initialisations
include "lib/init.php";


//Construire la liste
$tache= new tache();
$liste=$tache->lister();

//Affichage de la page finale
include "templates/pages/liste_tache_all.php";
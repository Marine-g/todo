<?php

/* 
 * Contrôleur: préparer et afficher le formulaire de modification d'une tâche
 * 
 * Paramètres : GET id, l'identifiant de la tâche dont on veut modifier le detail
 * 
 * La connexion est obligatoire
 */

//Initialisations
include "lib/init.php";

//Récupération des paramètres
if (isset($_GET["id"])) {
        $id =$_GET["id"];
    }else {
        $id=0;
    }

//Traitement à proprement dit
$tache = new tache($id);

//Affichage de la page de modification
include "templates/pages/form_modif_tache.php";

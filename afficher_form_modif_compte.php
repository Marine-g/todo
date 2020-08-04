<?php

/* 
 * Contrôleur: preparation et affichage du formulaire de modification d'un compte user
 * 
 * Parametres: GET id, identifiant du user dont on veut modifier le mot de passe
 * 
 * La connexion est obligatoire
 * 
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
$user = new user($id);

//Affichage de la page finale
include "templates/pages/form_modif_user.php";

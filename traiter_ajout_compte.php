<?php

/* 
 * Contrôleur de traitement de l'ajout (création) d'un user (seulement les superviseurs ont accés à la création dun nouveau compte)
 * 
 * Paramètres: en POST, les attributs d'un user
 * 
 * La connexion est obligatoire
 */

//Initialisations
include "lib/init.php";


//traitement à proprement dit

$user =new user();
//Lui demander de récupérer les valeurs de ses attributs dans le POST

$user->loadFromTab($_POST);

//Gerer le hash du password
if ( ! empty ($_POST["password"])) {
    $user->hashPassword($_POST["password"]);
} else {
    "";
}

//Insérer dans la base de données
$user->insert();

//Affichage de la page finale
include "templates/pages/liste_tache_all.php";
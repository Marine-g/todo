<?php

/* 
 * Contrôleur: traitement de la modification du mot de passe d'un user
 * 
 * Paramètres:  GET id : identifiant de l'user dont on veut modifier le password
 *              POST: champ modifiable = password
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
//Charger l'user
$user = new user($id);

//Lui demander de récupérer les valeurs de ses attributs dans le POST
$user->loadFromTab($_POST);

//Gerer le hash du password
if ( ! empty ($_POST["password"])) {
    $user->hashPassword($_POST["password"]);
} else {
    "";
}

//Modifier dans la base de données
$user->update();
//print_r($user);
//Affichage de la page finale
include "templates/pages/detail_user.php";
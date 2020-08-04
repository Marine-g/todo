<?php

/* 
 * Toutes les actions d'initialisation des contrôleurs
 * 
 * Paramètres : $noconnection
 *                  true pour ne pas vérifier la connexion
 * 
 */

//Affichage des messages d'erreur
ini_set( 'display_errors', '1');
error_reporting(E_ALL);

//Démarrer la session
session_start();

//Inclure les classes
include "classes/table.php";
include "model/user.php";
include "model/tache.php";


//Ouverture de la base de données
global $bdd;
//Gérer les exceptions avec un message d'erreur
try {
    $bdd=new PDO("mysql:host=localhost;dbname=dbname;charset=UTF8","user","password");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $ex) {
    echo "Problème d'ouverture de la base de données";
    exit;
}

//Si on doit vérifier la connexion
if ( !isset($noconnection)) {
    $noconnection=false;
}
//Si on n'a pas initialiser $noconnection, c'est que l'on vérifier que l'on est connecté
//Si on n'a pas décidé de ne pas vérifier la connexion
if ($noconnection === false) {
    //Si pas de connexion, affichage de la page de formulaire de connexion
    if (! isset ($_SESSION["connecte"]) or $_SESSION["connecte"] === false) {
        include "templates/pages/form_connexion.php";
        //On ne va pas plus loin
        exit;
    }
}
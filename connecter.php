<?php

/* 
 * Contrôleur qui vérifie les codes de connexion pour un user
 * 
 * Paramètres: $email   $password   $nom    $prenom
 * 
 * Pour les contrôleurs qui doivent se lancer sans etre connecté : $noconnexion = true
 * Contrôleur qui doit fonctionner sans etre connecté
 * 
 */

$noconnection=true; //Ce contrôleur doit marcher sans être connecté

//Initialisations
include "lib/init.php";

//Récupération des paramètres
//Vérifier si l'email, le mot de passe, le nom et le prenom sont bons, si l'on trouve un user avec ces informations 
if (isset ($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $email ="";
}
if (isset ($_POST["password"])) {
    $password = $_POST["password"];
} else {
    $password ="";
}
if (isset ($_POST["prenom"])) {
    $prenom = $_POST["prenom"];
} else {
    $prenom ="";
}
if (isset ($_POST["nom"])) {
    $nom = $_POST["nom"];
} else {
    $nom ="";
}

$user = new user();
if ($user->checkLogin($email, $password)) {
    //Connexion réussie
    $_SESSION["connecte"] = true;
    //Indiquer qui est connecté
    //tout sauf le mot de passe
    $_SESSION["id"]=$user->id;
    $_SESSION["nom"]=$user->nom;
    $_SESSION["prenom"]=$user->prenom;
    $_SESSION["email"]=$user->email;
    $_SESSION["statut"]=$user->statut;
    //Redirection sur la page d'accueil
    header ("location:afficher_tache.php");
    //On sort
    exit;
} else {
    //Connexion echouée
    //print_r($_SESSION);
    //print_r($user);
    $_SESSION["connecte"] = false;
    //Réafficher le formulaire de connexion avec un message 
    echo "Veuillez renseignez une adresse mail ainsi qu'un mot de passe valides";
    include "templates/pages/form_connexion.php";
    //On sort
    exit;
}
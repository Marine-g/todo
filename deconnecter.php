<?php

/* 
 * Contrôleur qui permet la deconnexion du user
 * 
 * La connexion est obligatoire
 */

//Initialisations
include "lib/init.php";

session_start();

//Déconnexion
$_SESSION["connecte"]=false;
//Redirection sur le formulaire de connexion
header ("location: index.php");
exit;   

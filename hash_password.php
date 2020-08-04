<?php

/* 
 * Contrôleur qui permet d'obtenir un mot de passe hashé (crypté)
 * 
 * Paramètres :  GET password: mot de passe à hasher
 * 
 */

$password=$_GET["password"];
echo password_hash($password, PASSWORD_DEFAULT);
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Initialisations
include "lib/init.php";

$titre =$_POST["titre"];
$tache=new tache();
$liste=$tache->search();
if($tache->search()==true) {
    include "templates/pages/recherche_tache.php";
}else {
    header ("location:lister_taches.php");
}
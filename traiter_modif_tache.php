<?php

/* 
 * Contrôleur: traitement de la modification d'une tâche
 * 
 * Paramètres:  GET id : identifiant de la tâche dont on veut modifier les infos
 *              POST: champs modifiables 
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
//Charger la tâche
$tache = new tache($id);

//"Forcer" la date
$date_crea=date("Y-m-d H:i:s");

//Lui demander de récupérer les valeurs de ses attributs dans le POST
$tache->loadFromTab($_POST);
        
//Modifier dans la base de données
$tache->date_crea = $date_crea;
$tache->update();

//Affichage de la page finale
include "templates/pages/detail_tache.php";
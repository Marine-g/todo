<?php

/* 
 * Template (fragment) affichant le select pour le choix des personnes en charge pour le formulaire de création d'une tâche
 * Inclue le fragment ligne_select_user (le foreach)
 * 
 */

?>


<select  required name="personne_en_charge">
    <option value="">--choisissez la personne qui sera en charge</option>
    <?php include "templates/fragments/ligne_select_user.php";?>            
</select><br>
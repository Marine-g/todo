<?php

/* 
 * Template (fragment) affichant la liste des tâches à faire d'un user connecté
 */

?>
<h2>Vos tâches à faire</h2>
<table>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date de création</th>
            <th>Auteur</th>
            <th>Echéance</th>
            <th>Etat</th>
            <th>Personne en charge</th>
        </tr>
        <?php
            foreach ($liste as $tache) {
                include "templates/fragments/tr_tache.php";
            }
        ?>
</table>
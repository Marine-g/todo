<?php

/* 
 * Template (fragment) affichant la liste des tâches demandées par l'user connecté
 */

?>
<h2>Les tâches que vous avez demandées</h2>
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
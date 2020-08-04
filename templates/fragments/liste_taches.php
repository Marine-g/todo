<?php

/* 
 * Template (fragment) affichant la liste de toutes les tâches
 */

?>
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
                include "templates/fragments/tr_taches.php";
            }
        ?>
</table>
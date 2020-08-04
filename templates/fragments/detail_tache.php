<?php

/* 
 * Template (fragment) affichant le detail d'une tâche
 * 
 * Paramètres: $tache : objet tâche
 * 
 */
?>

<tr>
    <td><?= htmlentities($tache->titre)?></td>
    <td><?=htmlentities($tache->description)?></td>
    <td><?=htmlentities($tache->date_crea)?></td>
    <td><?=htmlentities($tache->auteur->prenom)?> <?=htmlentities($tache->auteur->nom)?></td>
    <td><?=htmlentities($tache->personne_en_charge->prenom)?> <?=htmlentities($tache->personne_en_charge->nom)?></td>
    <td><?=htmlentities($tache->echeance)?></td>
    <td><?=htmlentities($tache->etat)?></td>
    <td><?=htmlentities($tache->motif_refus)?></td>
</tr>
        
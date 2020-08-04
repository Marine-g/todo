<?php

/* 
 * Template (fragment) affichant un tr dans la table des tâches en ajax
 * 
 * Paramètres: $tache: objet tâche
 * 
 */
?>

<tr data-id="<?=htmlentities ($tache->id)?>">
    <td><a href="afficher_detail_tache.php?id=<?=htmlentities($tache->id)?>"><?= htmlentities($tache->titre)?></a></td>
    <td><?=htmlentities($tache->description)?></td>
    <td><?=htmlentities($tache->date_crea)?></td>
    <td><?=htmlentities($tache->auteur->prenom)?> <?=htmlentities($tache->auteur->nom)?></td>
    <td><?=htmlentities($tache->echeance)?></td>
    <td><?=htmlentities($tache->etat)?></td>
</tr>
        
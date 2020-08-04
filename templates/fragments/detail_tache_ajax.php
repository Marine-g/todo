<?php

/* 
 * Template (fragment) affichant le detail d'une tâche en ajax
 * 
 * Paramètres: $tache : objet tâche
 * 
 */
?>


<td><?= htmlentities($tache->titre)?></td>
<p>Description : <?=htmlentities($tache->description)?></p>
<p>Description : <?=htmlentities($tache->description)?></p>
<p>Date de création : <?=htmlentities($tache->date_crea)?></p>
<p>Auteur : <?=htmlentities($tache->auteur->prenom)?> <?=htmlentities($tache->auteur->nom)?></p>
<p>Personne en charge : <?=htmlentities($tache->personne_en_charge->prenom)?> <?=htmlentities($tache->personne_en_charge->nom)?></p>
<p>Echeance : <?=htmlentities($tache->echeance)?></p>
<p>Etat : <?=htmlentities($tache->etat)?></p>
<?php if ( isset($tache->motif_refus)) {?>
<?php} else {?>
<p>Motif du refus : <?=htmlentities($tache->motif_refus)?></p>   
<?php }?> 

        
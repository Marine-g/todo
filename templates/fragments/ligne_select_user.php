<?php

/* 
 * Template (fragment) affichant le foreach et les options pour choisir la personne en charge du formulaire de création d'une tâche
 * 
 */
?>

<?php
    foreach ($liste as $user) { ?>
<option value="<?=$user->id ?>"><?= htmlentities($user->prenom)?> <?= htmlentities($user->nom)?> (<?= htmlentities($user->statut)?>)</option>
     <?php } ?>
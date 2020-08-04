<?php

/* 
 * Template (fragment) affichant un tr dans la table des users
 * 
 * Paramètres: $user: objet user
 * 
 */
?>

<tr>
    <td><?=htmlentities($user->prenom)?> <?=htmlentities($user->nom)?></td>
</tr>
        
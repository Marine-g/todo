/* 
 * Fonctions diverses pour afficher le détail d'une tâche à faire dans une popup
 */



function OuvreTache() {
    //Affiche le détail d'une tache en ajax
    //Retour :néant
    //Paramètres: elt : ligne sur laquelle on a les infos
    

  
  $("#detail").show();
    //Appel Ajax
    $.ajax({
        url:"afficher_detail_tache_ajax.php",
        data:{id:id},
        method: "GET",
        dataType:"html",
        succes:afficheDetail(),
         // Fonction appelée quand le serveur répond (si il répond)
        error: erreurAjax 
    });// Fonction appelée en cas d'erreur HTTP
    
    

}

function afficheDetail() {
    //Affichage d'un fragment dans la div #detail
    //Retour: néant
    //Paramètres: data, données envoyées par le serveur (fragment HTML)
    
    $("#detail").html();
}

function fermerPopUp() {
    //Fermer la popup du detail d'une tâche à faire
    //Retour: neant
    //Paramètres: néant
    
    $("#detail").hide();
    return false;
}

function erreurAjax(jqXHR) {
    //Traiter une erreur de réponse Ajax
    //Retour: néant
    //Paramètres: jqXHR, objet requête Ajax
    
    console.error("Erreur Ajax");
}

function init() {
    //Initialisation complète de la page
    //Retour: néant
    //Paramètres: néant
    
    $("#liste").on("click", function() {
        afficheDetail(this);
    })
    
}

$(document).ready(init);

function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
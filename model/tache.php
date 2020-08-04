<?php

/*
 * classe tache
 */

class tache extends table{
    protected $table = "tache";       //Nom de la table dans la base de données
    protected $champs = ["titre", "date_crea", "auteur", "personne_en_charge", "echeance", "description", "motif_refus", "etat"];     //Liste des champs dans la base de données
    protected $liens = ["auteur" => "user", "personne_en_charge" => "user"];        //On indique que le champ "" est un lien vers la table ""
    
    public function search() {
        //Rôle: retourner la liste de toutes les tâches
        //Retour: tableau simple d'objets tache initialisés
        //Paramètres: néant
        
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` ";
        $param = [];
        
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = erreur technique
        if($cr === false) {
             echo "Erreur technique sur la requête : $sql";
            return [];
        }
         //Exploitation pour fabriquer la liste
        return $this->makeListFromReq($req);
    }
    
    public function loadByTache($id) {
        //Rôle: recupérer une tâche à partir de son id
        //Retour: true si on y est arrivé, false sinon
        //Paramètres: $id, valeur de l'id recherché
        
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` WHERE id = :id ";
        $param = [":id" =>$id];
        
         //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
         //Si la requete a echouée, on ne peut pas exploiter son résultat = erreur technique
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return false;
        }
         //Récupérer la première ligne pour initialiser les attributs
        $ligne = $req->fetch (PDO::FETCH_ASSOC);
        //Si $ligne === false, on n'a pas trouvé l'id
        if ($ligne === false) {
            return false;
        }
        //Transféerer les infos de $ligne dans les attributs de $this
        $this->loadFromTab ($ligne);
        $this->id=$id;
        return true;
        
    }
    
     public function listerTacheUser ($id) {
        //Rôle: retourner la liste de toutes les taches demandées à un user
        //Retour: tableau simple d'objets taches initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` WHERE  `personne_en_charge` = :personne_en_charge ";
        $param = [":personne_en_charge" => $id];
        
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = on retourne un tableau vide
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return [];
        }
        //Exploitation pour fabriquer la liste
        return $this->makeListFromReq($req);
    }
    
    public function listerRetard ($id) {
        //Rôle: retourner la liste de toutes les taches d'un user en retard
        //Retour: tableau simple d'objets taches initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` WHERE `echeance` < CURRENT_TIMESTAMP and `personne_en_charge` = :personne_en_charge ";
        $param = [":personne_en_charge" => $id];
        
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = on retourne un tableau vide
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return [];
        }
        //Exploitation pour fabriquer la liste
        return $this->makeListFromReq($req);
    }
    
    public function listerEnCours($id) {
        //Rôle: retourner la liste de toutes les taches d'un user en cours
        //Retour: tableau simple d'objets taches initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` WHERE `etat`= 'En cours' and `personne_en_charge` = :personne_en_charge ORDER BY`echeance` ASC";
        $param = [":personne_en_charge" => $id];
        
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = on retourne un tableau vide
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return [];
        }
        //Exploitation pour fabriquer la liste
        return $this->makeListFromReq($req);
    }
   
    public function listerAFaire($id) {
        //Rôle: retourner la liste de toutes les taches d'un user à faire
        //Retour: tableau simple d'objets taches initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` WHERE `etat`= 'A faire' and `personne_en_charge` = :personne_en_charge ORDER BY`echeance` ASC";
        $param = [":personne_en_charge" => $id];
        
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = on retourne un tableau vide
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return [];
        }
        //Exploitation pour fabriquer la liste
        return $this->makeListFromReq($req);
    } 
    
    public function listerDemande($auteur) {
        //Rôle: retourner la liste de toutes les taches demandées par un user
        //Retour: tableau simple d'objets taches initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` WHERE `auteur`= :auteur ORDER BY `echeance` ASC";
        $param = [":auteur" => $auteur];
        
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = on retourne un tableau vide
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return [];
        }
        //Exploitation pour fabriquer la liste
        return $this->makeListFromReq($req);
    }
    
    public function listerRefus($id) {
        //Rôle: retourner la liste de toutes les taches refusées par un user
        //Retour: tableau simple d'objets taches initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` WHERE `etat`= 'Refusé' and `personne_en_charge` = :personne_en_charge ORDER BY`echeance` ASC";
        $param = [":personne_en_charge" => $id];
        
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = on retourne un tableau vide
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return [];
        }
        //Exploitation pour fabriquer la liste
        return $this->makeListFromReq($req);
    }
    
    public function lister() {
        //Rôle: retourner la liste de toutes les taches refusées par un user
        //Retour: tableau simple d'objets taches initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `tache` ";
        $param = [];
        
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = on retourne un tableau vide
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return [];
        }
        //Exploitation pour fabriquer la liste
        return $this->makeListFromReq($req);
    }
    
    public function makeListFromReq($req) {
        //Rôle: à partir d'une requete executée, fabriquer une liste d'objets user
        //Retour: tableau simple d'objets user initialisé
        //Paramètres: $req, requete executée
        
        //Initialiser un tableau vide pour le retour
        $result= [];
        //Tant qu'il reste une ligne dans la requete, on la transforme en objet user et on l'ajoute au tableau à retourner
        while (($ligne=$req->fetch (PDO::FETCH_ASSOC)) !==false) {
            //Transformer la ligne en objet user
            $tache = new tache();
            $tache->loadFromTab($ligne);
            //Ajouter cet objet au tableau à retourner
            $result[]= $tache;
        }
        //Retourner le résultat
        return $result;
    }
    
    public function insert() {
        //Rôle : insérer dans la table une ligne correspondant à l'objet courant
        //Retour : true si ok, false sinon
        //Paramètres: néant
        
        //Fabrication de la requête et de ses paramètres
        $sql = "INSERT INTO `tache` SET `titre` = :titre, `date_crea` = :date_crea, `auteur` = :auteur, `personne_en_charge` = :personne_en_charge, `echeance` = :echeance, `description` = :description, `motif_refus` = :motif_refus, `etat` = :etat";
        $param = [":titre" => $this->titre ,
           ":date_crea" => $this->date_crea,
            ":auteur" => $this->auteur->id,
            ":personne_en_charge" => $this->personne_en_charge->id,
            ":echeance" => $this->echeance,
            ":description" => $this->description,
            ":motif_refus" => $this->motif_refus,
            ":etat" => $this->etat,
            ];
        
        //Préparation et execution 
        global $bdd;
        $req = $bdd->prepare($sql);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = erreur technique
        if (! $req->execute ($param)) {
            echo "Erreur technique sur la requête : $sql";
            return false;
        }
        //Récuperer l'id
        //Insérer l'objet dans la base de données
        $this->id= $bdd->lastinsertId();
        return true;
    }
      
    
    public function update () {
        //Rôle : mettre à jour dans la table la ligne correspondant à l'objet courant
        //Retour : true si ok, false sinon
        //Paramètres: néant
        
        //Fabrication de la requête et de ses paramètres
        $sql = "UPDATE `tache` SET `titre` = :titre, `date_crea` = :date_crea, `auteur` = :auteur, `personne_en_charge` = :personne_en_charge, `echeance` = :echeance, `description` = :description, `motif_refus` = :motif_refus, `etat` = :etat WHERE `id` = :id";
        $param =[ ":titre" => $this->titre ,
            ":date_crea" => $this->date_crea ,
            ":auteur" => $this->auteur->id ,
            ":personne_en_charge"=> $this->personne_en_charge->id,
            ":echeance"=> $this->echeance,
            ":description"=> $this->description,
            ":motif_refus"=> $this->motif_refus,
            ":etat"=> $this->etat,
            ":id"=> $this->id,
            ];
       
        //Préparation et execution
        global $bdd;
        $req = $bdd->prepare($sql);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = erreur technique
        if (! $req->execute ($param)) {
            echo "Erreur technique sur la requête : $sql";
            return false;
        }  
        return true;
    }
     
    public function delete() {
         //Rôle : supprimer dans la table une ligne correspondant à l'objet courant
        //Retour : true si ok, false sinon
        //Paramètres: néant
        
        //Fabrication de la requête et de ses paramètres
        $sql = "DELETE FROM `tache` SET `titre` = :titre, `date_crea` = :date_crea, `auteur` = :auteur, `personne_en_charge` = :personne_en_charge, `echeance` = :echeance, `description` = :description, `motif_refus` = :motif_refus, `etat` = :etat WHERE `id` = :id";
        $param = [":titre" => $this->titre ,
           ":date_crea" => $this->date_crea,
            ":auteur" => $this->auteur->id,
            ":personne_en_charge" => $this->personne_en_charge->id,
            ":echeance" => $this->echeance,
            ":description" => $this->description,
            ":motif_refus" => $this->motif_refus,
            ":etat" => $this->etat,
            ":id"=> $this->id,
            ];
        
        //Préparation et execution 
        global $bdd;
        $req = $bdd->prepare($sql);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = erreur technique
        if (! $req->execute ($param)) {
            echo "Erreur technique sur la requête : $sql";
            return false;
        }
        //La requête a fonctionné
        return true;
    
    }
    
    public function loadFromPost() {
        //Rôle : chargement des attributs de l'objet à partir des infos passées en POST
        //Retour : true si on a réussi, false sinon
        //Paramètres : néant
        if (isset ($_POST["titre"])) {
            $this->titre = $_POST ["titre"];
        }
        if (isset ($_POST["date_crea "])) {
            $this->date_crea  = $_POST ["date_crea "];
        }
        if (isset ($_POST["auteur"])) {
            $this->auteur = $_POST ["auteur"];
        }
        if (isset ($_POST[" personne_en_charge"])) {
            $this-> personne_en_charge = $_POST [" personne_en_charge"];
        }
        if (isset ($_POST["description "])) {
            $this->description  = $_POST ["description "];
        }
        if (isset ($_POST["motif_refus "])) {
            $this->motif_refus  = $_POST ["motif_refus "];
        }
        if (isset ($_POST["etat "])) {
            $this->etat  = $_POST ["etat "];
        }
        if (isset ($_POST["echeance "])) {
            $this->echeance  = $_POST ["echeance "];
        }
        return true;
    }
}
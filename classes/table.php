<?php

/*
 * Classe décrivant le fonctionnement d'une table du modèle de données
 *  (table dont la clé primaire est ID en auto-incrément)
 * 
 * Faire les accés à la base de données
 * On ne connait pas le nom de la table, ni ses colonnes
 */


class table {                       // Attributs pour cette classe
    protected $table;               // Nom de la table dans la base de données
    protected $champs =[];          // Liste des champs dans la base de données (hors id)
    protected $valeurs =[];         // Liste des valeurs des champs dans l'objet
    protected $liens = [];          // Lien nomChamp->nomObjetLié
    protected $id;                  // Valeur de l'id
    protected $objetsLiens = [];    // Objets pointés par les Liens
    
    //Méthodes spéciales (magiques)
    
    public function __construct($id = null) {
        // Constructeur appelé automatiquement après un new
        // Rôle : Il charge l'objet si on passe un id, initialise les valeurs par défaut
        // Retour : néant
        // Paramètres : $id, id de la ligne à charger (facultatif)
        if (! is_null($id)) {
            $this->loadFromId($id);
        }
    }
    
    public function __isset ($champ) {
        //Méthode invoquée quand on essaie de faire un isset ou un empty sur $objet->champ
        //Retour : Fonctionne si le champ existe
        //Paramètres : $champ
        return !empty ($this->valeurs[$champ]);
    }


    public function __get($champ) {
        //Méthode invoquée quand on essaie d'accéder à un champ $objet->nom
        //Retour: on veut une valeur pour l'attribut virtuel demandé
        //Paramètres : $champ
        return $this->get($champ);

    }
    
    public function __set($champ, $valeur) {
        //Méthode invoquée quand on essaie d'instancier un champ $objet->nom=valeur
        //Retour : On veut la valeur de l'attribut virtuel après chargement 
        //Paramètres : $champ->valeur
        $this->set($champ, $valeur);
        return $this->get($champ);
    }
    
    //Methodes d'accés aux champs de la table getter et setter
    public function get ($champ) {
        //Récuperer le champ $champ
        //Retour : Retourner sa valeur
        //Type "lien"->objet lié
        if (isset ($this->liens[$champ])) {
            return $this->getLiens($champ);
        }
        if ($champ == "id") {
            return $this->id;
        } else if (! in_array ($champ, $this->champs)) {
            echo "Le champ $champ n'existe pas dans la table {$this->table}";
            return "";
        } else if (isset ($this->valeurs [$champ])) {
            return $this->valeurs[$champ];
        } else {
            return "";
        }
    }
    
    public function getLiens($champ) {
        //Retourner l'objet pointé par un champ
        //Retour: l'objet correspondant
        //Paramètres: $champ
        //Si déjà memorisé, le retourner, sinon le fabriquer
        if (isset ($this->objetsLiens[$champ])) {
            return $this->objetsLiens[$champ];
        }
        //Récupérer le nom de la classe et l'id, fabriquer l'objet
        $nomCible = $this->liens [$champ];
        if (isset ($this->valeurs[$champ])) {
            $idCible = $this->valeurs [$champ];
        } else {
            $idCible=null;
        }
        //Mémoriser l'objet fabriqué et chargé et retourner cet objet $cible
        $cible = new $nomCible($idCible);
        $this->objetsLiens[$champ] = $cible;
        return $cible;
        
    }
    
    public function set($champ, $valeur) {
        //Charger la valeur du champ $champ
        //Retour: True si on a réussi, false sinon
        //Paramètres : $champ   $valeur
        if ($champ == "id") {
            $this->id = $valeur;
            return true;
        } else if (!in_array($champ, $this->champs)) {
            echo "Le champ $champ n'existe pas dans la table {$this->table}";
            return false;
        }else {
            $this->valeurs[$champ] = $valeur;
            return true;
        }
        
    }
    
    public function loadFromId($id) {
        //Charger les attributs de l'objet courant avec la ligne de la base de données dont l'id est $id
        //Retour : true si on le trouve, false sinon
        //Paramètres: $id, l'id recherché
        
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `{$this->table}` WHERE `id` = :id";
        $param = [":id" =>$id];
        
        //Préparation et execution 
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = erreur technique
        if (! $req->execute ($param)) {
            echo "Erreur technique sur la requête : $sql";
            return false;
        }
        //Récupérer la première ligne
        $ligne = $req->fetch (PDO::FETCH_ASSOC);
        //On retourne faux si la ligne est vide
        if (empty($ligne)) {
                $this->id=null;
                return false;
        }
        return $this->loadFromTab ($ligne);
    }
    
    public function loadFromTab($tab) {
        //Rôle: Initialiser ou charger les attributs, charger l'objet courant à partir des valeurs des champs stockées dans un tableau
        //Retour: true si ok, false sinon
        //Paramètres: $tab, tableau donnant les valeurs
        
        //Valoriser l'id si dans $tab, mettre à jour $this->id
        if (isset($tab["id"])) {
            $this->id = $tab["id"];
        }
        //Valoriser les autres si dans $tab
        foreach ($this->champs as $nomChamp) {
            if (isset ($tab[$nomChamp])) {
                $this->set($nomChamp, $tab[$nomChamp]);
            }
        }
        return true;
    }
    
   
    
    
}           
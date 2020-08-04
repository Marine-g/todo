<?php

/*
 * Classe user
 * 
 */

class user extends table{
    protected $table = "user";       //Nom de la table dans la base de données
    protected $champs = ["nom", "prenom", "email", "password", "statut"];     //Liste des champs dans la base de données
    protected $liens = [];        //On indique que le champ "" est un lien vers la table ""
    
    
    //Gerer le hashage (cryptage) du mot de passe quand on écrit dans la base de donnée
    //modifier l'attribut $this->password
    //Fonction qui hashe le mot de passe fourni en clair
    public function hashPassword($password) {
        //Rôle : Stocker dans l'attribut password la valeur hashée
        //Retour : néant
        //Paramètres: $password
        $this->valeurs ["password"]= password_hash($password, PASSWORD_DEFAULT);
        
    }
    
    //Fonction de vérification d'un email/password
    //public function checkLogin($email, $password) {
        //Rôle : verifier si il y a un utilisateur correspondant à l'email et mot de passe ( et le charger dans l'objet courant si oui)
        //Retour: true si on y est arrivé, false sinon
        //Paramètres: $email    $password
        
        //On n'a pas trouvé de mail avec ce code
      //  if (!$this->loadByEmail ($email)) {
        //    return false;
        //}
        //On charge l'utilisateur qui a le mail cherché et on verifie le mot de passe
       // if (password_verify($password, $this->valeurs["password"])) {
       //    return true;
        //}
        //Ce n'est pas bon
        //$this->id=0;
        //return false;
    //}
    
    public function checkLogin($email, $password) {
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `user` WHERE `email` = :email";
        $param = [":email" =>$email];
         
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        $cr = $req->execute ($param);
        //Si la requete a echouée, on ne peut pas exploiter son résultat = on retourne faux
        if($cr === false) {
            echo "Erreur technique sur la requête : $sql";
            return FALSE;
        }
         $ligne = $req->fetch (PDO::FETCH_ASSOC);
         if ($ligne === false){
             return false;
         }
        if ( password_verify($password, $this->valeurs["password"])) {
            return true;
        }
         $this->loadFromTab ($ligne);
         $this->id=$ligne["id"];
         return true;
    }


    public function loadByEmail ($email) {
        //Rôle: Charger un utilisateur en connaissant l'email
        //Retour ; true si on a réussi, false sinon
        //Paramètres: $email
        
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `user` WHERE `email` = :email";
        $param = [":email" =>$email];
         
        //Préparation et execution
        global $bdd;        //bdd est une variable globale, objet PDO d'accés à la base de données
        $req = $bdd->prepare($sql);
        if (! $req->execute ($param)) {
            echo "Erreur technique sur la requête : $sql";
            return false;
        }
        //Récupérer la première ligne
        $ligne = $req->fetch (PDO::FETCH_ASSOC);
        if (empty($ligne)) {
            $this->id=null;
            return false;
        }
        return $this->loadFromTab ($ligne);
      
    }
    
    public function loadFromPost() {
        //Rôle : chargement des attributs de l'objet à partir des infos passées en POST
        //Retour : true si on a réussi, false sinon
        //Paramètres : néant
        if (isset ($_POST["email"])) {
            $this->email = $_POST ["email"];
        }
        if (isset ($_POST["password"])) {
            $this->password = $_POST ["password"];
        }
        if (isset ($_POST["nom"])) {
            $this->nom = $_POST ["nom"];
        }
        if (isset ($_POST["prenom"])) {
            $this->prenom = $_POST ["prenom"];
        }
        if (isset ($_POST["statut"])) {
            $this->statut = $_POST ["statut"];
        }
        return true;
    }
    
    public function lister () {
        //Rôle: retourner la liste de tous les utilisateurs
        //Retour: tableau simple d'objets user initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `{$this->table}` ";
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
            $user = new user();
            $user->loadFromTab($ligne);
            //Ajouter cet objet au tableau à retourner
            $result[]= $user;
        }
        //Retourner le résultat
        return $result;
    }
    
    public function listerUser() {
        //Rôle: retourner la liste de toutes les users
        //Retour: tableau simple d'objets users initialisés
        //Paramètres: néant
        
        //Passer la requête qui récupère toutes les lignes
        //Fabrication de la requête et de ses paramètres
        $sql = "SELECT * FROM `user` ";
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
    
    public function update () {
        //Rôle : mettre à jour dans la table la ligne correspondant à l'objet courant
        //Retour : true si ok, false sinon
        //Paramètres: néant
        
        //Fabrication de la requête et de ses paramètres
        $sql = "UPDATE `user` SET `nom` = :nom, `prenom` = :prenom, `email` = :email, `password` = :password, `statut` = :statut WHERE `id` = :id";
        $param =[ ":nom" => $this->nom ,
           ":prenom"=> $this->prenom,
            ":email"=> $this->email,
            ":password"=> $this->password,
            ":statut"=> $this->statut,
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
        
        public function insert() {
        //Rôle : insérer dans la table une ligne correspondant à l'objet courant
        //Retour : true si ok, false sinon
        //Paramètres: néant
        
        //Fabrication de la requête et de ses paramètres
        $sql = "INSERT INTO `user` SET `nom` = :nom, `prenom` = :prenom, `email` = :email, `password` = :password, `statut` = :statut";
        $param = [":nom" => $this->nom ,
            ":prenom"=> $this->prenom,
            ":email"=> $this->email,
            ":password"=> $this->password,
            ":statut"=> $this->statut,
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

    
    
}    


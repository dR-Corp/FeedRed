<?php
/**
 * 
 * class UsersManager
 * Access to the model and manage the database
 */

class UsersManager {

    private $bdd;

    public function __construct() {
        $this->bdd = MyAutoload::dbconnect();
        // $this->bdd = new PDO("mysql:host=167.86.119.239;dbname=feedredcom_feedred;charset=utf8", "feedredcom_feedred", "147feedred159");
    }

    public function findAll() {

        $bdd = $this->bdd;
        $users = [];

        /*** Accès au model */
        $query = "SELECT * FROM users";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $user = new Users();
            $user->setIdUser($row['idUser']);
            $user->setNom($row['nom']);
            $user->setPrenom($row['prenom']);
            $user->setEmail($row['email']);
            $user->setAdresse($row['adresse']);
            $user->setTelephone($row['telephone']);
            $user->setProfil($row['profil']);
            $user->setEtat($row['etat']);
            $user->setCertification($row['certification']);

            $users[] = $user;

        };

        return $users;
    }

    public function findCertifiedUsers($certification) {

        $bdd = $this->bdd;
        $users = [];

        /*** Accès au model */
        $query = "SELECT * FROM users WHERE certification = '$certification'";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $user = new Users();
            $user->setIdUser($row['idUser']);
            $user->setNom($row['nom']);
            $user->setPrenom($row['prenom']);
            $user->setEmail($row['email']);
            $user->setAdresse($row['adresse']);
            $user->setTelephone($row['telephone']);
            $user->setProfil($row['profil']);
            $user->setEtat($row['etat']);
            $user->setCertification($row['certification']);

            $users[] = $user;

        };

        return $users;
    }

    public function find($idUser) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM users WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $user = new Users();
        
        if($row) {
            $user->setIdUser($row['idUser']);
            $user->setNom($row['nom']);
            $user->setPrenom($row['prenom']);
            $user->setEmail($row['email']);
            $user->setAdresse($row['adresse']);
            $user->setTelephone($row['telephone']);
            $user->setProfil($row['profil']);
            $user->setEtat($row['etat']);
            $user->setCertification($row['certification']);
        }

        return $user;

    }

    public function getEmailUser($email) {
        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM users WHERE email= :email";
        $req = $bdd->prepare($query);
        $req->bindValue(':email', $email, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $user = new Users();
        $user->setIdUser($row['idUser']);
        $user->setNom($row['nom']);
        $user->setPrenom($row['prenom']);
        $user->setEmail($row['email']);
        $user->setAdresse($row['adresse']);
        $user->setTelephone($row['telephone']);
        $user->setProfil($row['profil']);
        $user->setEtat($row['etat']);
        $user->setCertification($row['certification']);

        return $user;
    }

    public function getLoginTokken($idUser) {
        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM users WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);

        return $row['login_tokken'];
    }

    public function save($values) {
        //echo '<pre>'; print_r($values); exit;
        $bdd = $this->bdd;

        if(isset($values['idUser'])) {
            if(empty($values['password']))
                $query = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email, adresse= :adresse, telephone = :telephone, profil = :profil WHERE idUser = :idUser";
            else
                $query = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email, adresse= :adresse, telephone = :telephone, profil = :profil, password = :password WHERE idUser = :idUser";
        }
        else {
            $query = "INSERT INTO users (idUser, nom, prenom, email, adresse, telephone, profil, password) VALUES (NULL, :nom, :prenom, :email, :adresse, :telephone, :profil, :password)";
        }
        
        $req = $bdd->prepare($query);

        if(isset($values['idUser'])) $req->bindValue(':idUser', $values['idUser'], PDO::PARAM_INT);
        $req->bindValue(':nom', $values['nom'], PDO::PARAM_STR);
        $req->bindValue(':prenom', $values['prenom'], PDO::PARAM_STR);
        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);
        $req->bindValue(':adresse', $values['adresse'], PDO::PARAM_STR);
        $req->bindValue(':telephone', $values['telephone'], PDO::PARAM_STR);
        $req->bindValue(':profil', $values['profil'], PDO::PARAM_STR);
        if(!empty($values['password'])) {
            $req->bindValue(':password', $values['password'], PDO::PARAM_STR);
        }

        $req->execute();

    }

    public function saveUsersloginTokken($tokken, $idUser) {
        $bdd = $this->bdd;
        $query = "UPDATE users SET login_tokken = :login_tokken WHERE idUser = :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':login_tokken', $tokken, PDO::PARAM_STR);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
    }

    public function showNotif($values) {

        $bdd = $this->bdd;
        $query = "UPDATE notifs SET content = :content, showed = 1 WHERE id = 1";
        $req = $bdd->prepare($query);
        $req->bindValue(':content', $values['notif'], PDO::PARAM_STR);
        $req->execute();

        $_SESSION["showed"]=1;
        $_SESSION["notif"]=$values['notif'];

    }

    public function hideNotif($values) {

        $bdd = $this->bdd;
        $query = "UPDATE notifs SET showed = 0 WHERE id = 1";
        $req = $bdd->prepare($query);
        $req->execute();

        $_SESSION["showed"]=0;
        unset($_SESSION['notif']);

    }

    public function activeUsers($values) {
        //echo '<pre>'; print_r($values); exit;
        $bdd = $this->bdd;
        $query = "UPDATE users SET etat = :etat WHERE idUser = :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':etat', NULL, PDO::PARAM_STR);
        $req->bindValue(':idUser', $values['id'], PDO::PARAM_STR);
        $req->execute();

        $_SESSION['alert'] = "info";
        $_SESSION['alert_message'] = "Compte utilisateur activé !";

    }

    public function certifiedUsers($values) {
        //echo '<pre>'; print_r($values); exit;
        $bdd = $this->bdd;
        $query = "UPDATE users SET certification = :certification WHERE idUser = :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':certification', 1, PDO::PARAM_INT);
        $req->bindValue(':idUser', $values['id'], PDO::PARAM_STR);
        $req->execute();

        $_SESSION['alert'] = "info";
        $_SESSION['alert_message'] = "Compte utilisateur certifié !";

    }

    public function inactiveUsers($values) {
        // echo '<pre>'; print_r($values); exit;
        $bdd = $this->bdd;
        $query = "UPDATE users SET etat = :etat WHERE idUser = :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':etat', 1, PDO::PARAM_STR);
        $req->bindValue(':idUser', $values['id'], PDO::PARAM_STR);
        $req->execute();

        $_SESSION['alert'] = "warning";
        $_SESSION['alert_message'] = "Compte utilisateur désactivé !";

    }

    public function uncertifiedUsers($values) {
        //echo '<pre>'; print_r($values); exit;
        $bdd = $this->bdd;
        $query = "UPDATE users SET certification = :certification WHERE idUser = :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':certification', null, PDO::PARAM_INT);
        $req->bindValue(':idUser', $values['id'], PDO::PARAM_STR);
        $req->execute();

        $_SESSION['alert'] = "info";
        $_SESSION['alert_message'] = "Certifiaction du compte utilisateur retirée !";

    }

    public function delete($idUser) {

        $bdd = $this->bdd;

        $query = "DELETE FROM users WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
       
        //echo '<pre>'; print_r($idUser); exit;

    }

    public function getNotif() {

        $bdd = $this->bdd;
        $notif_req = $bdd->query("SELECT * FROM notifs WHERE id=1 ");
        $notifs=$notif_req->fetch();

        $_SESSION["showed"]=$notifs["showed"];
        if($notifs["showed"] == 1)
            $_SESSION["notif"]=$notifs["content"];
    }

    public function log($values) {

        $bdd = $this->bdd;

        if(isset($values['email']) && !empty($values['email']) && isset($values['password']) && !empty($values['password'])) 
        {
            $res = $bdd->prepare("SELECT * FROM users WHERE email=? AND password=? ");
            $res->execute(array($values['email'], $values['password']));
            $donnees=$res->fetch();

            if (!empty($donnees))
            {
                if($donnees["etat"] != 1) {
                    $_SESSION["idUser"]=$donnees["idUser"];
                    $_SESSION["email"]=$donnees["email"];
                    $_SESSION["nom"]=$donnees["nom"];
                    $_SESSION["prenom"]=$donnees["prenom"];
                    $_SESSION["adresse"]=$donnees["adresse"];
                    $_SESSION["telephone"]=$donnees["telephone"];
                    $_SESSION["profil"]=$donnees["profil"];
                    $_SESSION["certification"]=$donnees["certification"];

                    //Generation on user login tokken

                    //-------------Get the user id
                        $tokken_id = $donnees["idUser"]+0101;
                        //random string generation
                        $tokken = openssl_random_pseudo_bytes($tokken_id);
                        //convert the binary data into hexadecimal representation
                        $tokken = bin2hex($tokken);

                        $tokken = sha1($tokken);

                        //now we save the tokken into the database, for an futur usage
                        (new UsersManager())->saveUsersloginTokken($tokken, $donnees["idUser"]);

                    //-------------end of the generation

                    //setting user login cookies
                        setcookie('users_login_tokken', $tokken, (time() + (60*60*24*30)), '/');
                        setcookie('users_login_email', $donnees["email"], (time() + (60*60*24*30)), '/');
                    //end

                    $this->getNotif();

                    if($donnees["profil"] == 1) {
                        $manager = new AdminManager();
                        $idAdmin = ($manager->read($donnees["idUser"]))->getIdAdmin();
                        $_SESSION["idAdmin"]=$idAdmin;
                    }
                    else if($donnees["profil"] == 2) {
                        $manager = new ModerateurManager();
                        $idModerateur = ($manager->read($donnees["idUser"]))->getIdModerateur();
                        $_SESSION["idModerateur"]=$idModerateur;
                    }
                    else if($donnees["profil"] == 3) {
                        $manager = new RedacteurManager();
                        $idRedacteur = ($manager->read($donnees["idUser"]))->getIdRedacteur();
                        $_SESSION["idRedacteur"]=$idRedacteur;
                    }
                    else if($donnees["profil"] == 4) {
                        $manager = new ClientManager();
                        $idClient = ($manager->read($donnees["idUser"]))->getIdClient();
                        $_SESSION["idClient"]=$idClient;
                    }

                    $_SESSION['alert'] = "success";
                    $_SESSION['alert_message'] = "Bienvenue";
                }
                else {
                    $_SESSION["etat"]=$donnees["etat"];
                }
            }

            else
            {
                $_SESSION["echec"]="echec";
            }
        }
        else {
            $_SESSION["empty"]="empty";
        }

    }

    public function getNbrUsers() {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM users");

		return $select->rowCount();

    }

}
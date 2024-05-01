<?php

/**
 * 
 * class ContactManager
 * Access to the model and manage the database
 */

class ContactManager {

    private $bdd;

    public function __construct() {
        $this->bdd = MyAutoload::dbconnect();
        // $this->bdd = new PDO("mysql:host=167.86.119.239;dbname=feedredcom_feedred;charset=utf8", "feedredcom_feedred", "147feedred159");
    }

    public function findAll() {

        $bdd = $this->bdd;
        $contacts = [];
        /*** Accès au model */
        $query = "SELECT * FROM contact WHERE archive IS NULL ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $contact = new Contact();
            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setMessage($row['message']);
            $contact->setView($row['view']);
            $contact->setArchive($row['archive']);
            $contact->setAnswer($row['answer']);
            $contact->setCreatedAt($row['created_at']);
            $contact->setUpdatedAt($row['updated_at']);

            $contacts[] = $contact;

        };

        return $contacts;
    }

    public function getAllResponse() {
        $bdd = $this->bdd;
        $contacts = [];
        /*** Accès au model */
        $query = "SELECT * FROM contact WHERE archive IS NULL ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $date1 = new DateTime($row['created_at']);
            $date2 = new DateTime($row['updated_at']);

            $etat = NULL;
            if($row['view'] != NULL) $etat = 1;
            if($row['answer'] != NULL) $etat = 2;
            if($row['archive'] != NULL) $etat = 3;

            if($row['message'] == NULL) $withMessage = "non";
            else $withMessage = "oui";

            $contact = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'withMessage' => $withMessage,
                'etat' => $etat,
                'created_at' => $date1->format('d/m/Y à H:i:s'),
                'updated_at' => $date2->format('d/m/Y à H:i:s')
            );
            $contacts[] = $contact;
        };

        return $contacts;
    }

    public function find($id) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM contact WHERE id= :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $contact = new Contact();
        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setMessage($row['message']);
        $contact->setView($row['view']);
        $contact->setArchive($row['archive']);
        $contact->setAnswer($row['answer']);
        $contact->setCreatedAt($row['created_at']);
        $contact->setUpdatedAt($row['updated_at']);

        return $contact;

    }

    public function viewed($id) {

        $bdd = $this->bdd;
        $query = "UPDATE contact SET view = 1 WHERE id = :id ";
        $req = $bdd->prepare($query);
        
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        
        $req->execute();

    }

    public function archived($id) {

        $bdd = $this->bdd;
        $query = "UPDATE contact SET archive = 1 WHERE id = :id ";
        $req = $bdd->prepare($query);
        
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        
        $req->execute();

    }

    public function treated($id) {

        $bdd = $this->bdd;
        $query = "UPDATE contact SET answer = 1 WHERE id = :id ";
        $req = $bdd->prepare($query);
        
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        
        $req->execute();

    }

    public function save($values) {

        // echo '<pre>'; print_r($values); exit;

        $bdd = $this->bdd;
        $query = "INSERT INTO contact (id, name, email, message) VALUES (NULL, :name, :email, :message)";
        $req = $bdd->prepare($query);
        
        if(isset($values['name']))
            $req->bindValue(':name', $values['name'], PDO::PARAM_STR);
        else
            $req->bindValue(':name', NULL, PDO::PARAM_STR);

        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);
        
        if(isset($values['message']))
            $req->bindValue(':message', $values['message'], PDO::PARAM_STR);
        else
            $req->bindValue(':message', NULL, PDO::PARAM_STR);
        
        $req->execute();

    }

    public function delete($id) {

        $bdd = $this->bdd;

        $query = "DELETE FROM contact WHERE id= :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

    }

    public function getNbrContact() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM contact WHERE view IS NULL AND  archive IS NULL");
		return $select->rowCount();
    }

}

?>
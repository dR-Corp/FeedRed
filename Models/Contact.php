<?php

/**
 * class Contact
 * 
 */
class Contact {

    private $id;
    private $name;
    private $email;
    private $message;
    private $view; //Un booléen pour indiquer si le contact a déjà été vu ou non
    private $archive; //si le contact à été archivé
    private $answer; // si on a repondu au contact
    private $created_at;
    private $updated_at;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getMessage() {
        return $this->message;
    }
    public function setMessage($message) {
        $this->message = $message;
    }
    
    public function getView() {
        return $this->view;
    }
    public function setView($view) {
        $this->view = $view;
    }
    
    public function getArchive() {
        return $this->archive;
    }
    public function setArchive($archive) {
        $this->archive = $archive;
    }

    public function getAnswer() {
        return $this->answer;
    }
    public function setAnswer($answer) {
        $this->answer = $answer;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
    public function getUpdatedAt() {
        return $this->updated_at;
    }
    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

}
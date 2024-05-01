<?php

/**
 * class Contact
 * 
 * use to show the home page
 */
class ContactController {

    public function show($params) {

        $manager = new ContactManager();
        $nbContact = $manager->getNbrContact();
        $contacts = $manager->findAll();

        $view = new View('Contact/show');
        $view->render(array(
            "titrePage" => "Contacts",
            'contacts' => $contacts,
            'nbContact' => $nbContact,
        ));
    }

    public function reloadContact($params) {

        $manager = new ContactManager();

        echo json_encode($manager->getAllResponse(), JSON_UNESCAPED_UNICODE);

    }


    public function contacter($params) {
        extract($params);
        
        $manager = new ContactManager();
        $manager->save($values);

        $_SESSION['contact_sended'] = true;
        
        $view = new View();
        $view->redirect('accueil.html');

    }

    public function delete($params) {

        extract($params);
        // $id = $_POST['id'];
        $manager = new ContactManager();
        $manager->delete($id);

    }

    public function voir($params) {

        extract($params);
        $manager = new ContactManager();
        $contact = $manager->find($id);
        //A ce niveau il faut marquer comme vu
        $manager->viewed($id);

        $view = new View('Contact/details');
        $view->render(array(
            "titrePage" => "Détails contact",
            'contact' => $contact,
        ));

    }

    public function archiver($params) {
        extract($params);
        $manager = new ContactManager();
        $contact = $manager->archived($id);
    }

    public function traiter($params) {
        extract($params);
        $manager = new ContactManager();
        $contact = $manager->treated($id);
    }

}

?>
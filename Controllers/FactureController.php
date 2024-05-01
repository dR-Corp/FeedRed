<?php

/**
 * class Redaction
 * 
 * use to show the home page
 */
class FactureController {

    public function haveArticleOff($idRedacteur, $mois) {

        $bdd = MyAutoload::dbconnect();
        $select = $bdd->query("SELECT * FROM articlehl WHERE mois = '$mois' AND idRedacteur = '$idRedacteur' AND nombreMots > 0");
        return $select->rowCount() > 0 ? "true" : "false";

    }

    public function offNombreMots($idRedacteur, $mois) {

        $bdd = MyAutoload::dbconnect();
        $select = $bdd->query("SELECT * FROM articlehl WHERE mois = '$mois' AND idRedacteur = '$idRedacteur' AND nombreMots > 0");
        $nombreMots = $select->fetchAll()[0]['nombreMots'];
        return $nombreMots;

    }

    public function addArticleOff($params) {

        extract($params['values']);

        $nbr = array(
            'redaction' => $totalRedaction,
            'mots' => $totalMots
        );

        //ajout du nombre de mots en bd
        /**
         * mois
         * nombreMots
         * idRedacteur
         */
        $bdd = MyAutoload::dbconnect();
        $query = "INSERT INTO articlehl(id, mois, nombreMots, idRedacteur) VALUES(NULL, :moisFacture, :nombreMots, :idRedacteur)";
        $req = $bdd->prepare($query);

        $req->bindValue(':moisFacture', $moisFacture, PDO::PARAM_STR);
        $req->bindValue(':nombreMots', $nombreMots, PDO::PARAM_STR);
        $req->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);

        $req->execute();

        //fin de l'ajout en base de données

        $manager = new RedactionManager();
        $redactions = $manager->findRedacteurRedactions($idRedacteur, $moisFacture);
        
        $view = new View('Facture/detail');
        $view->render(array(
            "titrePage" => 'Détails du facture',
            'idRedacteur' => $idRedacteur,
            'nomRedacteur' => $nomRedacteur,
            'nbr' => $nbr,
            'redactions' => $redactions,
            'moisFacture' => $moisFacture,
            'moisFactureText' => $moisFactureText
        ));

    }

    public function delArticleOff($params) {

        extract($params);
        // echo '<pre>'; print_r($params); exit;

        $nbr = array(
            'redaction' => $totalRedaction,
            'mots' => $totalMots
        );

        //ajout du nombre de mots en bd
        /**
         * mois
         * nombreMot
         * idRedacteur :
         */
        
        $bdd = MyAutoload::dbconnect();
        $select = $bdd->exec("DELETE FROM articlehl WHERE mois = '$moisFacture' AND idRedacteur = '$idRedacteur'");
        
        //fin de l'ajout en base de données

        $manager = new RedactionManager();
        $redactions = $manager->findRedacteurRedactions($idRedacteur, $moisFacture);

        $view = new View('Facture/detail');
        $view->render(array(
            "titrePage" => 'Détails du facture',
            'idRedacteur' => $idRedacteur,
            'nomRedacteur' => $nomRedacteur,
            'nbr' => $nbr,
            'redactions' => $redactions,
            'moisFacture' => $moisFacture,
            'moisFactureText' => $moisFactureText
        ));

    }

    public function factures($params) {

        $moisFactureRetour = "";
        $mois_facture_select = "";
        if($params)
            extract($params);

        $manager = new UsersManager();
        $users = $manager->findAll();

        $manager = new RedacteurManager();
        $redacteurs = $manager->findAll();

        $manager = new ModerateurManager();
        $moderateurs = $manager->findAll();

        $manager = new RedactionManager();
        $redactions = $manager->findAll();
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        $mois_factures = []; // chaque ligne du tableau contient deux colonnes : 0=debutMois, 1=Mois Annee
        
        $mois_factures[] = array (
            'debutMois' => date('Y-m-01', strtotime(date('Y-m-d'))),
            'moisAnnee' => ucfirst(strftime("%B %Y", strtotime(date('Y-m-d')))),
            'finMois' => date('Y-m-t', strtotime(date('Y-m-d')))
        );
        
        foreach($redactions as $redaction) {
            //On récupère la date de redaction de chaque redaction
            //On la ramène au début du mois
            //On verifie dans le tableau si le débutMois n'y est pas encore, 
            //Au cas où il n'y est pas on le rajoute

            // $dateRedaction = $redaction->getDateRedaction();
            $dateRedaction = $redaction->getDateValidation();
            // $d = new DateTime($dateRedaction);
            $debutMois = date('Y-m-01', strtotime($dateRedaction));
            $finMois = date('Y-m-t', strtotime($dateRedaction));
            $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($dateRedaction)));

            $mois_facture = array (
                'debutMois' => $debutMois,
                'moisAnnee' => $moisAnnee,
                'finMois' => $finMois
            );

            if(!in_array($mois_facture, $mois_factures)) {
                $mois_factures[] = $mois_facture;
            }

        }

        //get all periodes
        $redaction_manager = new RedactionManager();
        $periodes = $redaction_manager->getAllPeriode();

        // echo '<pre>'; print_r($periodes[0][]); exit;
        
        // echo '<pre>', print_r($params); exit;

        $view = new View('Facture/factures');
        $view->render(array(
            "titrePage" => "Factures",
            'users' => $users,
            'redacteurs' => $redacteurs,
            'moderateurs' => $moderateurs,
            'mois_factures' => $mois_factures,
            'moisFactureRetour' => $moisFactureRetour,
            'mois_facture_select' => $mois_facture_select,

            'periodes' => $periodes,
        ));
    }

    public function facturesDetail($params) {

        extract($params); //id, totalRedaction, totalMots et moisFacture

        $nbr = array(
            'redaction' => $totalRedaction,
            'mots' => $totalMots
        );

        $manager = new RedacteurManager();
        $redacteur = $manager->find($id);

        $use = (new UsersManager())->find($redacteur->getIdUser());
        $nom = $use->getNom();
        $prenom = $use->getPrenom();

        $manager = new RedactionManager();
        $redactions = $manager->findRedacteurRedactions($redacteur->getIdRedacteur(), $moisFacture);
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        // $finMois = date('Y-m-t', strtotime($moisFacture));
        $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($moisFacture)));

        $libellePeriode = (new RedactionManager)->getPeriodeByDateDebut($moisFacture)['libelle'];
        // echo '<pre>'; print_r($libellePeriode); exit;

        $nomRedacteur = $nom.' '.$prenom;
        
        $view = new View('Facture/detail');
        $view->render(array(
            "titrePage" => 'Détails du facture',
            'idRedacteur' => $redacteur->getIdRedacteur(),
            'nomRedacteur' => $nomRedacteur,
            'nbr' => $nbr,
            'redactions' => $redactions,
            'moisFacture' => $moisFacture,
            'moisFactureText' => $libellePeriode
        ));
    }

    public function facturesDetail2($params) {

        extract($params); //id, totalRedaction, totalMots et moisFacture

        $nbrValidation = $totalRedaction;

        $manager = new ModerateurManager();
        $moderateur = $manager->find($id);

        $use = (new UsersManager())->find($moderateur->getIdUser());
        $nom = $use->getNom();
        $prenom = $use->getPrenom(); 

        $manager = new RedactionManager();
        $redactions = $manager->findModerateurRedactions($moderateur->getIdModerateur(), $moisFacture);
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        // $finMois = date('Y-m-t', strtotime($moisFacture));
        $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($moisFacture)));

        $libellePeriode = (new RedactionManager)->getPeriodeByDateDebut($moisFacture)['libelle'];

        $nomModerateur = $nom.' '.$prenom;
        
        $view = new View('Facture/detail2');
        $view->render(array(
            "titrePage" => 'Détails du facture',
            'nomModerateur' => $nomModerateur,
            'nbrValidation' => $nbrValidation,
            'redactions' => $redactions,
            'moisFacture' => $moisFacture,
            'moisFactureText' => $libellePeriode
        ));
    }

    public function factureRed($params) {

        // $mois_facture_select = date('Y-m-01', strtotime(date('Y-m-d')));
        $periodeActive = (new RedactionManager)->getActivePeriode();
        $mois_facture_select = (new RedactionManager)->getActivePeriode()['dateDebut'];
        // echo '<pre>'; print_r($mois_facture_select); exit;

        if($params)
            extract($params);

        $manager = new RedactionManager();
        $redac = $manager->findRedacteurNbrMotsRediges($_SESSION['idRedacteur'], $mois_facture_select);
        $nbr = array(
            'redaction' => $redac['nbrRedactions'],
            'mots' => $redac['nbrMots']
        );

        $manager = new RedacteurManager();
        $redacteur = $manager->find($_SESSION['idRedacteur']);

        $use = (new UsersManager())->find($redacteur->getIdUser());
        $nom = $use->getNom();
        $prenom = $use->getPrenom();

        $manager = new RedactionManager();
        $redactions = $manager->findRedacteurRedactions($_SESSION['idRedacteur'], $mois_facture_select);
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        // $finMois = date('Y-m-t', strtotime($mois_facture_select));
        $periodeSelected = (new RedactionManager)->getPeriodeByDateDebut($mois_facture_select);
        $finMois =  $periodeSelected['dateFin'];
        $moisAnnee =  $periodeSelected['libelle'];

        $nomRedacteur = $nom.' '.$prenom;

        $mois_factures = []; // chaque ligne du tableau contient deux colonnes : 0=debutMois, 1=Mois Annee
        
        // $mois_factures[] = array(
        //     'debutMois' => date('Y-m-d', strtotime($mois_facture_select)),
        //     'moisAnnee' => $periodeSelected['libelle'],
        //     'finMois' =>  date('Y-m-d', strtotime($periodeSelected['dateFin']))
        // );
        
        // $redactions_select = $manager->findAll();
        // foreach($redactions_select as $redaction) {
        //     //On récupère la date de redaction de chaque redaction
        //     //On la ramène au début du mois
        //     //On verifie dans le tableau si le débutMois n'y est pas encore, 
        //     //Au cas où il n'y est pas on le rajoute

        //     $dateRedaction = $redaction->getDateRedaction();
        //     $dateRedaction = $redaction->getDateValidation();
        //     // $d = new DateTime($dateRedaction);
        //     $periodeRedaction = (new RedactionManager)->getPeriodeRedaction($dateRedaction);
        //     $debutMois = date('Y-m-d', strtotime($periodeRedaction['dateDebut']));
        //     $finMois = date('Y-m-d', strtotime($periodeRedaction['dateFin']));
        //     $moisAnnee =  $periodeRedaction['libelle'];

        //     $mois_facture = array(
        //         'debutMois' => $debutMois,
        //         'moisAnnee' => $moisAnnee,
        //         'finMois' => $finMois
        //     );

        //     if(!in_array($mois_facture, $mois_factures)) {
        //         $mois_factures[] = $mois_facture;
        //     }

        // }

        //get all periodes
        $redaction_manager = new RedactionManager();
        $periodes = $redaction_manager->getAllPeriode();
                
        $view = new View('Facture/redacteur');
        $view->render(array(
            "titrePage" => 'Facture',
            'idRedacteur' => $_SESSION['idRedacteur'],
            'nomRedacteur' => $nomRedacteur,
            'nbr' => $nbr,
            'redactions' => $redactions,
            'mois_facture_select' => $mois_facture_select,
            'moisFactureText' => $moisAnnee,
            'mois_factures' => $periodes,
            'moisFacture' => $mois_facture_select,
        ));
    }

    public function factureMod($params) {

        //Sélection du mois de la facture
        // $mois_facture_select = date('Y-m-01', strtotime(date('Y-m-d')));
        $periodeActive = (new RedactionManager)->getActivePeriode();
        $mois_facture_select = (new RedactionManager)->getActivePeriode()['dateDebut'];

        if($params)
            extract($params);

        $manager = new RedactionManager();
        $nbrValidation = $manager->findModerateurNbrValidation($_SESSION['idModerateur'], $mois_facture_select);

        $manager = new ModerateurManager();
        $moderateur = $manager->find($_SESSION['idModerateur']);

        $use = (new UsersManager())->find($moderateur->getIdUser());
        $nom = $use->getNom();
        $prenom = $use->getPrenom();

        $manager = new RedactionManager();
        $redactions = $manager->findModerateurRedactions($_SESSION['idModerateur'], $mois_facture_select);
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        // $finMois = date('Y-m-t', strtotime($mois_facture_select));
        // $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($mois_facture_select)));
        $periodeSelected = (new RedactionManager)->getPeriodeByDateDebut($mois_facture_select);
        $finMois =  $periodeSelected['dateFin'];
        $moisAnnee =  $periodeSelected['libelle'];

        $nomModerateur = $nom.' '.$prenom;

        $mois_factures = []; // chaque ligne du tableau contient deux colonnes : 0=debutMois, 1=Mois Annee
        
        // $mois_factures[] = array(
        //     'debutMois' => date('Y-m-01', strtotime(date('Y-m-d'))),
        //     'moisAnnee' => ucfirst(strftime("%B %Y", strtotime(date('Y-m-d')))),
        //     'finMois' => date('Y-m-t', strtotime(date('Y-m-d')))
        // );
        
        // $redactions_select = $manager->findAll();
        // foreach($redactions_select as $redaction) {
        //     //On récupère la date de redaction de chaque redaction
        //     //On la ramène au début du mois
        //     //On verifie dans le tableau si le débutMois n'y est pas encore, 
        //     //Au cas où il n'y est pas on le rajoute

        //     $dateRedaction = $redaction->getDateRedaction();
        //     $dateRedaction = $redaction->getDateValidation();
        //     // $d = new DateTime($dateRedaction);
        //     $debutMois = date('Y-m-01', strtotime($dateRedaction));
        //     $finMois = date('Y-m-t', strtotime($dateRedaction));
        //     $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($dateRedaction)));

        //     $mois_facture = array(
        //         'debutMois' => $debutMois,
        //         'moisAnnee' => $moisAnnee,
        //         'finMois' => $finMois
        //     );

        //     if(!in_array($mois_facture, $mois_factures)) {
        //         $mois_factures[] = $mois_facture;
        //     }

        // }

        //get all periodes
        $redaction_manager = new RedactionManager();
        $periodes = $redaction_manager->getAllPeriode();
        
        $view = new View('Facture/moderateur');
        $view->render(array(
            "titrePage" => 'Facture',
            'nomModerateur' => $nomModerateur,
            'nbrValidation' => $nbrValidation,
            'redactions' => $redactions,
            'mois_facture_select' => $mois_facture_select,
            'moisFactureText' => $moisAnnee,
            'mois_factures' => $periodes
        ));
    }

    

    public function exportFiche($params) {
        if($params) extract($params);
        (new RedactionManager)->exportFiche($periode);
    }

    public function endPeriode($params) {
        (new RedactionManager)->endPeriode($params);
        $request = $redirect = 'factures.html';
        $router = new Router($request);
        $router->redirect($redirect, $request);
    }

    public function validateFacture ($params) {
        (new RedactionManager)->validateFacture($params);
    }

}
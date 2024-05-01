<?php

// require __DIR__.'/vendor/autoload.php';
// require('vendor/autoload.php');
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

/**
 * class Redaction
 * 
 * use to show the home page
 */
class RedactionController {

    public function showRedaction($params) {

        $idRedacteur = $_SESSION['idRedacteur'];
        $manager = new RedactionManager();
        $redactions = $manager->findRedaction($idRedacteur);

        $manager = new RedacteurManager();
        $redacteur = $manager->find($idRedacteur);

        $manager = new ArticleManager();
        

        if($redacteur->getArticle()) {
            $article = $manager->find($redacteur->getArticle());
            //Au cas où l'article n'est pas pris on annule
            if($article->getEtat() != 2 || $article->getRedacteur() != $redacteur->getIdRedacteur())
                $article = $manager->find(0);
        }
        else {
            $article = [];
        }
        
        $view = new View('Redaction/show-red');
        $view->render(array(
            "titrePage" => "Redactions",
            'redactions' => $redactions,
            'article' => $article
        ));
    }

    public function showHistorique($params) {

        $idRedacteur = $_SESSION['idRedacteur'];
        $manager = new RedactionManager();
        $redactions = $manager->findValide($idRedacteur);

        $manager = new RedacteurManager();
        $redacteur = $manager->find($idRedacteur);

        $view = new View('Redaction/historique');
        $view->render(array(
            "titrePage" => "Historique",
            'redactions' => $redactions
        ));
    }

    public function showRedactions($params) {

        $manager = new RedactionManager();
        $redactions = $manager->findAll();
        $nbrTousRedaction = $manager->getNbrTousRedaction();

        $manager = new ArticleManager();
        $articles = $manager->findSetted();

        $view = new View('Redaction/show-ad');
        $view->render(array(
            "titrePage" => "Rédactions",
            'articles' => $articles,
            'redactions' => $redactions,
            'nbrTousRedaction' => $nbrTousRedaction,
        ));
    }

    public function showUrgentRedactions($params) {

        $manager = new RedactionManager();
        $redactions = $manager->findAllUrgent();
        $nbrUrgentRedaction = $manager->getNbrUrgentRedaction();

        $manager = new ArticleManager();
        $articles = $manager->findSetted();

        $view = new View('Redaction/urgent');
        $view->render(array(
            "titrePage" => "Rédactions urgents",
            'articles' => $articles,
            'redactions' => $redactions,
            'nbrUrgentRedaction' => $nbrUrgentRedaction,
        ));
    }

    public function validationRedactions($params) {

        $manager = new RedactionManager();
        $nbrValidableRedaction = $manager->getNbrValidableRedaction();

        $view = new View('Redaction/validations');
        $view->render(array(
            "titrePage" => "Validation de rédactions",
            "nbrValidableRedaction" => $nbrValidableRedaction,
        ));
    }
    public function valideRedactions($params) {

        $manager = new RedactionManager();
        $nbrValideRedaction = $manager->getNbrValideRedaction();

        $view = new View('Redaction/valide');
        $view->render(array(
            "titrePage" => "Rédactions validées",
            "nbrValideRedaction" => $nbrValideRedaction,
        ));
    }
    public function avalideRedactions($params) {

        $manager = new RedactionManager();
        $nbrAvalideRedaction = $manager->getNbrAvalideRedaction();

        $view = new View('Redaction/avalide');
        $view->render(array(
            "titrePage" => "Rédactions à valider",
            "nbrAvalideRedaction" => $nbrAvalideRedaction,
        ));
    }
    public function nonvalideRedactions($params) {

        $manager = new RedactionManager();
        $nbrNonvalideRedaction = $manager->getNbrNonvalideRedaction();

        $view = new View('Redaction/nonvalide');
        $view->render(array(
            "titrePage" => "Rédactions non validées",
            "nbrNonvalideRedaction" => $nbrNonvalideRedaction,
        ));
    }

    public function detailRedaction($params) {

        $manager = new RedactionManager();
        $redaction = $manager->find($params['id']);
        $retour = $params['retour'];

        $view = new View('Redaction/detail');
        $view->render(array(
            "titrePage" => "Détails rédaction",
            "redaction" => $redaction,
            "retour" => $retour,
        ));
    }

    public function detailAdRedaction($params) {

        $manager = new RedactionManager();
        $redaction = $manager->find($params['id']);
        $retour = $params['retour'];

        $view = new View('Redaction/detail-ad');
        $view->render(array(
            "titrePage" => "Détails rédaction",
            "redaction" => $redaction,
            "retour" => $retour,
        ));

    }

    public function refuseRedactions($params) {

        $manager = new RedactionManager();
        $nbrRefuseRedaction = $manager->getNbrRefuseRedaction();

        $view = new View('Redaction/refuse');
        $view->render(array(
            "titrePage" => "Rédactions refusées",
            "nbrRefuseRedaction" => $nbrRefuseRedaction,
        ));
    }

    public function soumettre($params) {

        extract($params);

        $manager = new RedactionManager();
        $larticle = (new ArticleManager())->find($values['idArticle']);
        if($larticle->getEtat()==2 && $larticle->getRedacteur()==$values['idRedacteur']) {
            $manager->save($values);
        }
        else {
            $_SESSION['alert'] = "warning";
            $_SESSION['alert_message'] = "Page expirée. Vous avez déjà laissé cet article, ou celui-ci a déjà été libéré, mais la page était restée ouverte!";
        }

        $view = new View();
        $view->redirect('redaction.html');

    }

    public function resoumettre($params) {

        extract($params);
        
        $manager = new RedactionManager();
        $larticle = (new ArticleManager())->find($values['idArticle']);

        // echo "<pre>"; print_r($larticle);
        // echo "<pre>"; print_r($_SESSION); exit;

        //On vérifie donc si c'est l'utilisateur qui a fait la rédaction
        if($larticle->getEtat()==1 && $larticle->getRedacteur()==$values['idRedacteur']) {
            $manager->save($values);
        }
        else {
            $_SESSION['alert'] = "warning";
            $_SESSION['alert_message'] = "Page expirée. Vous avez déjà laissé cet article, ou celui-ci a déjà été libéré, mais la page était restée ouverte!";
        }

        $view = new View();
        $view->redirect('redaction.html');

    }

    public function afficher($params) {

        extract($params);

        $manager = new RedactionManager();
        $redaction = $manager->find($id);

        $manager = new ArticleManager();
        $article = $manager->find($redaction->getIdArticle());

        $view = new View('Redaction/afficher');
        $view->render(array(
            "titrePage" => "Contenu de la rédaction",
            'article' => $article,
            'redaction' => $redaction
        ));

    }

    public function afficherPdf($params) {
        
        extract($params);

        $manager = new RedactionManager();
        $redaction = $manager->find($id);
        $filename = STORAGE.$redaction->getFichier();

        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        Settings::setPdfRendererPath('.');
        $phpWord = IOFactory::load($filename, 'Word2007');
        $phpWord->save('document.pdf', 'PDF');
        // unlink('document.pdf');

        // $success = Gears\Pdf::convert(
        //     'file_path/file_name.docx',
        //     'file_path/file_name.pdf');

        // require('vendor/autoload.php');
        // $filename = STORAGE.$redaction->getFichier();
        // $wordPdf = \PhpOffice\PhpWord\IOFactory::load($filename);
        // $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordPdf , 'PDF');
        // $pdfWriter->save("aaaa.pdf");
        // unlink($wordPdf);


        // $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
        // $wordPdf = $objReader->load($fileName);

        // $fileName = STORAGE.$redaction->getFichier();
        // $content = '';
        // $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');

        // if($objReader->canRead($fileName)) {

        //     $phpWord = $objReader->load($fileName);

        //     $sections = $phpWord->getSections();
        // }
        // else {
        //     echo "Le nom du fichier n'est pas supporté";
        // }

        // $manager = new ArticleManager();
        // $article = $manager->find($redaction->getIdArticle());

        $view = new View();
        $view->redirect('redactions.html');

    }

    public function reloadRedaction($params) {

        $manager = new RedactionManager(); 
        
        echo json_encode($manager->getAllResponse(), JSON_UNESCAPED_UNICODE);

    }

    public function reloadRedactionCli() {
        $manager = new RedactionManager();
        echo json_encode($manager->getAllResponseCli($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    public function reloadRedactionValideCli() {
        $manager = new RedactionManager();
        echo json_encode($manager->getValideResponseCli($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    public function reloadRedactionAvalideCli() {
        $manager = new RedactionManager();
        echo json_encode($manager->getAvalideResponseCli($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    public function reloadRedactionNonvalideCli() {
        $manager = new RedactionManager();
        echo json_encode($manager->getNonvalideResponseCli($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    
    public function reloadRedactionUrgent($params) {

        $manager = new RedactionManager(); 
        
        echo json_encode($manager->getAllUrgentResponse(), JSON_UNESCAPED_UNICODE);

    }

    public function reloadRedactionValidable($params) {
        $manager = new RedactionManager(); 
        echo json_encode($manager->getValidableResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadRedactionValide($params) {
        $manager = new RedactionManager(); 
        echo json_encode($manager->getValideResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadRedactionAvalide($params) {
        $manager = new RedactionManager();
        echo json_encode($manager->getAvalideResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadRedactionNonvalide($params) {
        $manager = new RedactionManager(); 
        echo json_encode($manager->getNonvalideResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadRedactionRefuse($params) {
        $manager = new RedactionManager();
        echo json_encode($manager->getRefuseResponse(), JSON_UNESCAPED_UNICODE);
    }

    public function valider($params) {

        extract($params);

        $manager = new RedactionManager();
        $manager->valider($params);
        
        if(isset($retour)) {
            
            $_SESSION['alert'] = "success";
            $_SESSION['alert_message'] = "Rédaction validée !";

            $view = new View();
            $view->redirect('detail-ad-redaction.html~id~'.$idRedaction.'~retour~'.$retour);

        }

    }

    public function ajaxRedaction() {

        // $view = new View('Redaction/ajax');
        // $view->render();
        include('Views/Redaction/ajax.php');

    }

    public function corriger($params) {

        extract($params);
        // echo "<pre>"; print_r($params); exit;
        $manager = new RedactionManager();
        $manager->corriger($params);

        if(isset($values)) {
            
            $_SESSION['alert'] = "warning";
            $_SESSION['alert_message'] = "Rédaction invalidée !";

            $view = new View();
            $view->redirect('detail-ad-redaction.html~id~'.$values['idRedaction'].'~retour~'.$values['retour']);

        }
        
    }

    public function correction($params) {

        extract($params);
        // echo "<pre>"; print_r($values); exit;

        $manager = new RedactionManager();
        $manager->correction($values);
        

        if(isset($values['retour'])) {
            
            $_SESSION['alert'] = "warning";
            $_SESSION['alert_message'] = "Rédaction validée !";

            $view = new View();
            $view->redirect('detail-ad-redaction.html~id~'.$values['idRedaction'].'~retour~'.$values['retour']);

        }
        else {
            // echo "<pre>"; print_r($_FILES); exit;
            // $_SESSION['alert'] = "success";
            // $_SESSION['alert_message'] = "Correction soumise avec succès !";
    
            $view = new View();
            $view->redirect('avalide-redactions.html');
        }


    }

    public function refuser($params) {

        extract($params);

        $manager = new RedactionManager();
        $manager->refuser($params);

        if(isset($values)) {

            $redac = $manager->find($params['values']['idRedaction']);
            $idArticle = $redac->getIdArticle();
            $idRedacteur = $redac->getIdRedacteur();
            //Libération de l'article
            $manager = new ArticleManager();
            $manager->freeArticle(array(
                "idArticle" => $idArticle,
                "idRedacteur" => $idRedacteur
            ));
            
            $_SESSION['alert'] = "danger";
            $_SESSION['alert_message'] = "Rédaction refusée !";

            $view = new View();
            $view->redirect('detail-ad-redaction.html~id~'.$values['idRedaction'].'~retour~'.$values['retour']);

        }
        else {
            $redac = $manager->find($params['idRedaction']);
            $idArticle = $redac->getIdArticle();
            $idRedacteur = $redac->getIdRedacteur();
            //Libération de l'article
            $manager = new ArticleManager();
            $manager->freeArticle(array(
                "idArticle" => $idArticle,
                "idRedacteur" => $idRedacteur
            ));
        }

    }

    public function delRedaction($params) {

        extract($params);

        $manager = new RedactionManager();
        $manager->delete($id);

        $view = new View();
        $view->redirect('Redaction/show-ad');

    }

}
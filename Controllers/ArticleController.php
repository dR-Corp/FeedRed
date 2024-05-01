<?php
use PHPMailer\PHPMailer\PHPMailer;

/**
 * class Article
 * 
 * use to show the home page
 */
class ArticleController {

    public function showArticle($params) {

        $manager = new ArticleManager();
        $nbArticle = $manager->getNbrArticle();
        $articles = $manager->findAll();

        $view = new View('Article/show');
        $view->render(array(
            "titrePage" => "Articles",
            'articles' => $articles,
            'nbArticle' => $nbArticle,
        ));
    }

    public function urgentsArticle($params) {

        $manager = new ArticleManager();
        $nbArticle = $manager->getNbrArticleUrgent();
        $articles = $manager->findUrgenceArticle(1);

        $view = new View('Article/urgents');
        $view->render(array(
            "titrePage" => "Articles urgents",
            'articles' => $articles,
            'nbArticle' => $nbArticle,
        ));
    }

    public function ajoutArticle($params) {

        $manager = new ArticleManager();
        $articles = $manager->findLimit();

        $view = new View('Article/ajout');
        $view->render(array(
            "titrePage" => "Ajout d'articles",
            'articles' => $articles
        ));
    }

    public function libresArticle($params) {

        $manager = new ArticleManager();
        $nbArticleLibre = $manager->getNbrArticleLibre();

        $view = new View('Article/libres');
        $view->render(array(
            "titrePage" => "Articles libres",
            'nbArticleLibre' => $nbArticleLibre,
        ));
    }
    public function prisArticle($params) {

        $manager = new ArticleManager();
        $nbArticlePris = $manager->getNbrArticlePris();

        $view = new View('Article/pris');
        $view->render(array(
            "titrePage" => "Articles pris",
            'nbArticlePris' => $nbArticlePris,
        ));
    }
    public function laissesArticle($params) {

        $manager = new ArticleManager();
        $nbArticleLaisses = $manager->getNbrArticleLaisses();

        $view = new View('Article/laisses');
        $view->render(array(
            "titrePage" => "Articles laisses",
            'nbArticleLaisses' => $nbArticleLaisses,
        ));
    }
    public function liberesArticle($params) {

        $manager = new ArticleManager();
        $nbArticleLiberes = $manager->getNbrArticleLiberes();

        $view = new View('Article/liberes');
        $view->render(array(
            "titrePage" => "Articles liberes",
            'nbArticleLiberes' => $nbArticleLiberes,
        ));
    }
    public function redigesArticle($params) {

        $manager = new ArticleManager();
        $nbArticleRediges = $manager->getNbrArticleRediges();

        $view = new View('Article/rediges');
        $view->render(array(
            "titrePage" => "Articles rediges",
            'nbArticleRediges' => $nbArticleRediges,
        ));
    }

    public function articlesUrgents($params) {

        $manager = new ArticleManager();
        $nbArticleUrgentLibre = $manager->getNbrArticleUrgentLibre();

        $view = new View('Article/urgent-libre');
        $view->render(array(
            "titrePage" => "Articles urgents",
            'nbArticleUrgentLibre' => $nbArticleUrgentLibre,
        ));
    }

    public function listArticle($params) {

        $manager = new ArticleManager();
        $articles = $manager->list();

        $view = new View('Article/list');
        $view->render(array(
            "titrePage" => "Articles",
            'articles' => $articles
        ));

    }

    public function detailArticle($params) {

        extract($params);

        if(isset($id)) {

            $manager = new ArticleManager();
            $article = $manager->find($id);
        
        }

        $view = new View('Article/detail');
        $view->render(array(
            "titrePage" => "Detail article",
            'article' => $article,
            'retour' => $retour
        ));

    }
    
    public function detailArticleCli($params) {

        extract($params);

        if(isset($id)) {

            $manager = new ArticleManager();
            $article = $manager->findCli($id);
        
        }

        $view = new View('Article/detail');
        $view->render(array(
            "titrePage" => "Detail article",
            'article' => $article,
            'retour' => $retour
        ));

    }

    public function vueArticle($params) {

        extract($params);

        if(isset($id)) {

            $manager = new ArticleManager();
            $article = $manager->find($id);
        
        }

        $view = new View('Article/vue');
        $view->render(array(
            "titrePage" => "Detail article",
            'article' => $article
        ));

    }

    public function reloadArticle($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getAllResponse(), JSON_UNESCAPED_UNICODE);
    }

    public function reloadLimit($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getResponseLimit(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadArticleLibres($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getArticleLibresResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadArticleUrgentLibres($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getArticleUrgentLibresResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadArticleUrgents($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getArticleUrgentResponse(), JSON_UNESCAPED_UNICODE);
    }

    public function reloadArticlePris($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getArticlePrisResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadArticleLaisses($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getArticleLaissesResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadArticleLiberes($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getArticleLiberesResponse(), JSON_UNESCAPED_UNICODE);
    }
    public function reloadArticleRediges($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getArticleRedigesResponse(), JSON_UNESCAPED_UNICODE);
    }

    public function saveArticle($params) {

        // extract($params);
        if(isset($_POST['idArticle'])) {
            $params = array(
                "idArticle" => $_POST['idArticle'],
                "titre" => $_POST['titre'],
                "description" => $_POST['description'],
                "liens" => $_POST['liens'],
                "delai" => $_POST['delai'],
                "nbrMots" => $_POST['nbrMots'],
                "urgence" => $_POST['urgence']
            );
        }
        else {
            $params = array(
                "titre" => $_POST['titre'],
                "description" => $_POST['description'],
                "liens" => $_POST['liens'],
                "delai" => $_POST['delai'],
                "nbrMots" => $_POST['nbrMots'],
                "urgence" => $_POST['urgence'],
                "idClient" => $_POST['idClient'],
            );
        }
        
        $manager = new ArticleManager();
        $manager->save($params);
        if(isset($_POST['idArticle'])) {
            echo json_encode($manager->getResponse_up($_POST['idArticle']));
        }
        else {
            echo json_encode($manager->getResponse());
        }

    }

    public function saveArticleCli($params) {

        $manager = new ArticleManager();
        $params['idArticle'] = $manager->save($params);

        if(isset($params['idArticle'])) {
            echo json_encode($manager->getResponse_up($params['idArticle']));
        }
        else {
            echo json_encode($manager->getResponse());
        }

        // echo json_encode($params);

    }

    public function saveRedactionCli($params) {

        $red_manager = new RedactionManager();

        $idRedaction = $red_manager->saveCli($params);

        echo json_encode($idRedaction);

    }

    public function saveArticleClient($params) {

        // extract($params);
        if(isset($_POST['idArticle'])) {
            $params = array(
                "idArticle" => $_POST['idArticle'],
                "titre" => $_POST['titre'],
                "description" => $_POST['description'],
                "liens" => $_POST['liens'],
                "delai" => $_POST['delai'],
                "nbrMots" => $_POST['nbrMots'],
                "urgence" => $_POST['urgence']
            );
        }
        else {
            $params = array(
                "titre" => $_POST['titre'],
                "description" => $_POST['description'],
                "liens" => $_POST['liens'],
                "delai" => $_POST['delai'],
                "nbrMots" => $_POST['nbrMots'],
                "urgence" => $_POST['urgence'],
                "idClient" => $_POST['idClient'],
            );
        }
        
        $manager = new ArticleManager();
        $manager->save($params);
        if(isset($_POST['idArticle'])) {
            echo json_encode($manager->getResponse_up($_POST['idArticle']));
        }
        else {
            echo json_encode($manager->getResponse());
        }

    }

    public function delArticle($params) {

        // extract($params);
        $id = $_POST['idArticle'];
        $manager = new ArticleManager();
        $manager->delete($id);

        // $view = new View();
        // $view->redirect('article.html');

    }

    public function setArticle($params) {
        extract($params);

        $manager = new RedacteurManager();
        $redacteur = $manager->find($idRedacteur);
        $manager = new ArticleManager();
        $article = $manager->find($idArticle);

        $monart = $redacteur->getArticle();
        if(!is_null($monart)) $obj_monart = $manager->find($monart);
        if(is_null($monart) || $obj_monart->getEtat() !=2 || $obj_monart->getRedacteur() != $idRedacteur ) {
        // if(is_null($redacteur->getArticle())) {
            //Le rédacteur n'a encore pris aucun article
            //Maintenant il est possible celui ai trafiqué les url afin de prendre un article qui est déjà pris
            //Dans ce cas, il faut vérifier si l'article n'a pas encore été pris avant sa prise
            if($article->getEtat()!=1 && $article->getEtat()!=2) {
                //L'article est libre
                $manager->settedArticle($params);
                $_SESSION['alert'] = "success";
                $_SESSION['alert_message'] = "Vous avez pris l'article : ".$article->getTitre()." !";
            }
            else {
                //L'article est déjà pris, il faut le signaler au rédacteur (Le sale trafiquant)
                $_SESSION['alert'] = "error";
                $_SESSION['alert_message'] = "Cet article n'est pas disponible !";
            }
        }
        else {
            //Le rédacteur a déjà pris un article, il ne peut plus en prendre
            //On envoie une alerte
            $_SESSION['alert'] = "error";
            $_SESSION['alert_message'] = "Vous avez déjà pris un article, vous devez le terminer ou le laisser avant !";
        }

        $view = new View();
        $view->redirect('redaction.html');
    }

    public function relArticle($params) {
        extract($params);
        
        $manager = new RedacteurManager();
        $redacteur = $manager->find($idRedacteur);
        $manager = new ArticleManager();
        $article = $manager->find($idArticle);
        
        $monart = $redacteur->getArticle();
        if(!is_null($monart)) $obj_monart = $manager->find($monart);
        if(!is_null($monart) && $obj_monart->getEtat() ==2 && $obj_monart->getRedacteur() == $idRedacteur ) {
        // if(!is_null($redacteur->getArticle())) {
            //Le rédacteur a un article
            //annulation
            // if(!is_null($article->getEtat()) || $article->getEtat()!=3 || $article->getEtat()!=4) {
            if($article->getEtat()==2) {
                //L'article est pris
                $manager->releaseArticle($params);
                $_SESSION['alert'] = "warning";
                $_SESSION['alert_message'] = "Vous avez laissé l'article : ".$article->getTitre()." !";
            }
            else {
                //L'article est déjà pris, il faut le signaler au rédacteur (Le sale trafiquant)
                $_SESSION['alert'] = "error";
                $_SESSION['alert_message'] = "Cet article n'est pas pris !";
            }
        }
        else {
            //Le rédacteur n'a pas encore pris d'article
            //On envoie une alerte
            $_SESSION['alert'] = "error";
            $_SESSION['alert_message'] = "Vous n'avez encore pris aucun article !";
        }

        $view = new View();
        $view->redirect('redaction.html');
    }

    public function freeArticle($params) {
        extract($params);
        
        $manager = new RedacteurManager();
        $redacteur = $manager->find($idRedacteur);
        $manager = new ArticleManager();
        $article = $manager->find($idArticle);
        
        $monart = $redacteur->getArticle();
        if(!is_null($monart)) $obj_monart = $manager->find($monart);
        if(!is_null($monart) && $obj_monart->getEtat() ==2 && $obj_monart->getRedacteur() == $idRedacteur ) {
        // if(!is_null($redacteur->getArticle())) {
            //Le rédacteur a un article
            //annulation
            if($article->getEtat()==2) {
                //L'article est pris
                $manager->freeArticle($params);
                if($_SESSION['profil'] == 3) {
                    $_SESSION['alert'] = "info";
                    $_SESSION['alert_message'] = "Temps expiré, l'article a été libéré !";
                }
                else {
                    $_SESSION['alert'] = "info";
                    $_SESSION['alert_message'] = "Article(s) libéré(s) !";
                }
            }
            else {
                //L'article n'est pas pris, il faut le signaler au rédacteur (Le sale trafiquant)
                $_SESSION['alert'] = "error";
                $_SESSION['alert_message'] = "Cet article n'est pas pris !";
            }
        }
        else {
            //Le rédacteur n'a pas encore pris d'article
            //On envoie une alerte
            $_SESSION['alert'] = "error";
            $_SESSION['alert_message'] = "Vous n'avez encore pris aucun article !";
        }

        $view = new View();
        $view->redirect('redactions.html');
    }

    public function ajoutTermine() {
        require 'vendor/autoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'rayidjeri2@gmail.com';
        $mail->Password = '147gmail159';
        $mail->setFrom('contact@feed-red.com', 'FeedRed');
        $mail->addReplyTo('support@feed-red.com', 'FeedRed');

        $emailTo = 'rayidjeri@gmail.com';
        if(filter_var($emailTo, FILTER_VALIDATE_EMAIL)) {
            $mail->addAddress($emailTo, 'DJERi Rayid');
        }

        $mail->Subject = 'De nouveaux articles disponible';
        $mail->msgHTML(file_get_contents(VIEW.'Article/email-msg.html'), __DIR__);
        // $mail->Body = 'Ceci est le contenu du message en texte clair';
        //$mail->addAttachment('test.txt');
        
        // if (!$mail->send()) {
        //     echo 'Erreur de Mailer : ' . $mail->ErrorInfo;
        // } else {
        //     echo 'Le message a été envoyé.';
        // }

        if($mail->send()) {
            echo json_encode([
                'state' => 'success',
                'message' => 'Ajout, terminé, des emails ont été envoyés aux rédacteurs !'
            ]);
        }
        else {
            echo json_encode([
                'state' => 'error',
                'message' => 'Envoi échoué, aucun mail n\'a été envoyé, veuillez réessayer !'
            ]);
        }

    }

    // public function ajoutTermine() {

    //     $header = "MIME-Version: 1.0\r\n";
    //     $header.= 'From: "Feed-red.com"<rayidjeri2@gmail.com>'."\r\n";
    //     $header.= 'Content-Type:text/html; charset="utf-8"'."\n";
    //     $header.= 'Content-Transfer-Encoding: 8bit';
        
    //     ob_start();
    //     include(VIEW.'Article/email-message.php');
    //     $message = ob_get_clean();

    //     $users = (new UsersManager)->findAll();
    //     $success = false;
    //     // foreach($users as $user):

    //         // $email = $user->getEmail();
    //         $emailTo = 'rayidjeri@gmail.com';
            
    //         if(filter_var($emailTo, FILTER_VALIDATE_EMAIL)) {
    //             if(mail($email,"De nouveaux articles disponible", $message, $header)) {
    //                 //L'envoi a réussi
    //                 $success = true;
    //             }
    //         }

    //     // endforeach;

    //     if($success) {
    //         echo json_encode([
    //             'state' => 'success',
    //             'message' => 'Ajout, terminé, des emails ont été envoyés aux rédacteurs !'
    //         ]);
    //     }
    //     else {
    //         echo json_encode([
    //             'state' => 'error',
    //             'message' => 'Aucun email envoyé, veuillez réessayer !'
    //         ]);
    //     }

    // }

}
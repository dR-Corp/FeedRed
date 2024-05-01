<?php
use PHPMailer\PHPMailer\PHPMailer;

/**
 * class Article
 * 
 * use to show the home page
 */
class ToolController {

    public function show($params) {

        $view = new View('Tools/show');
        $view->render(array(
            "titrePage" => "Outils"
        ));
    }

}
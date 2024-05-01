<?php


/**
 * class view
 * 
 * use to call views
 */

class Alert {

    private $template;

    public function __construct($template = null) {
        $this->template = $template;
    }

    public function render($params = array()) {

        // foreach($params as $name => $value) {
        //     ${name} = $value;
        // }
        extract($params); //faire une extraction de params

        $template = $this->template;

        ob_start();
        include(VIEW.'_head.php');
        $head = ob_get_clean();
        
        ob_start();
        include(VIEW.'Scripts/script.php');
        $scripts = ob_get_clean();
        
        include_once(VIEW.'Error/suspension.php');

    }

    public function redirect($route) {
        header("Location: ".HOST.$route);
        exit;
    }

}
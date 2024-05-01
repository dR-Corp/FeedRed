<?php


/**
 * class view
 * 
 * use to call views
 */

class PageProduit {

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
        include(VIEW.$template.'.php');

    }

    public function redirect($route) {
        header("Location: ".HOST.$route);
        exit;
    }

}
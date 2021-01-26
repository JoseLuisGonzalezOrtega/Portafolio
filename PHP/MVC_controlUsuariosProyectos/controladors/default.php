<?php

class controldefault {

    function __construct() {
        
        if (!isset($_SESSION['username'])) {
            header('Location: index.php?control=controllogin');
            exit;
        } 
    }
    
    public function index() {
        
        switch($_SESSION['rol'])
        {
               case 0 : include_once 'vistes/normal/templates/header.php';
                        include_once 'vistes/normal/principal.php';
                        include_once 'vistes/normal/templates/footer.php';                 
                        break;
               case 1:  include_once 'vistes/administrador/templates/header.php';
                        include_once 'vistes/administrador/principal.php';
                        include_once 'vistes/administrador/templates/footer.php';           
                        break;
               default: 
        }

        
    }

}

?>

<?php
include_once 'helpers/funcions.php';
include_once 'helpers/Validation.php';

class controlusuaris {

    private $usuaris;
    private $missatge;

    function __construct() {
        
        if (!isset($_SESSION['username'])) {
            header('Location: index.php?control=controllogin');
            exit;
        } 
        
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !=1 ) {
            header('Location: index.php');
            exit;
        } 

        include_once 'models/Usuaris.php';
        $this->usuaris = new Usuaris();
        $this->missatge = "";
    }

    public function index() {
        // $res = $this->usuaris->getAll();
        if(isset($_GET['pagina'])) $numPagina=$_GET['pagina'];
        else $numPagina=1;
 
        $numRegsPag=4;

        
        $res = $this->usuaris->getPagina($numPagina,$numRegsPag);
  
        $total_pags = $this->usuaris->numeroPagines($numRegsPag);

        
        $missatge = $this->missatge;

        include_once 'vistes/templates/header.php';
        include_once 'vistes/usuaris/llistat.php';
        include_once 'vistes/usuaris/links.php';
        include_once 'vistes/templates/footer.php';
    }

    public function delete() {

        if (isset($_GET['codi'])) {
            $codi = $_GET['codi'];
            if ($this->usuaris->get($codi)) {
                $res = $this->usuaris->esborrar($codi);
                if ($res)
                    $this->missatge = "Usuari eliminat";
                else
                    $this->missatge = "Usuari no esborrat!";
            } else
                $this->missatge = "Usuari no existeix";
        }
        $_SESSION['missatge'] = $this->missatge;
        header("Location: index.php?control=controlusuaris");
    }

    public function showformnew() {
        include_once 'vistes/templates/header.php';
        include_once 'vistes/usuaris/formnew.php';
        include_once 'vistes/templates/footer.php';
    }

    public function store() {
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // validar dades
//            $nom = $_POST['nom'];
//            $cognoms = $_POST['cognoms'];
//            $email = $_POST['email'];
//            $username = $_POST['username'];
//            $password = $_POST['password'];
//            $rol = $_POST['rol'];
            $validator = new Validation();                
                    
            $username = obtenir_camp('username');                    
            $validator->name('username')->value($username)->max(20)->required()->notExists("usuaris","username");
            
            $nom = obtenir_camp('nom');                    
            $validator->name('nom')->value($nom)->max(25)->required();

            $cognoms = obtenir_camp('cognoms');                    
            $validator->name('cognoms')->value($cognoms)->max(75)->required();

            $password = obtenir_camp('password');                    
            $validator->name('password')->value($password)->min(6)->max(15)->required();

            $email = obtenir_camp('email');                    
            $validator->name('email')->value($email)->isEmail()->required();

            $opcions=array(0,1);
            $rol = obtenir_camp('rol');                    
            $validator->name('rol')->value($rol)->isOption($opcions)->required();
                           
                    
            if(!$validator->isSuccess()) { 
                $_SESSION['errors'] = $validator->getErrors();
                $_SESSION['dades'] = $validator->getValues();
                header('Location: index.php?control=controlusuaris&operacio=showformnew');
                exit;
            }
            
            
            
            $res = $this->usuaris->afegir($nom, $cognoms, $email, $username, $password,$rol);
            if ($res)
                $this->missatge = "alta correcta";
            else
                $this->missatge = "Alta incorrecta";
        }
        $_SESSION['missatge'] = $this->missatge;
        header("Location: index.php?control=controlusuaris");
    }

    public function showformupdate() {
        if (isset($_GET['codi'])) {
            $codi = $_GET['codi'];
            $usuari = $this->usuaris->get($codi);
            if ($usuari) {
                include_once 'vistes/templates/header.php';
                include_once 'vistes/usuaris/formupdate.php';
                include_once 'vistes/templates/footer.php';
            } else {
                $this->missatge = "usuari no existeix";
                $_SESSION['missatge'] = $this->missatge;

                header("Location: index.php?control=controlusuaris");
            }
        } else {
            $this->missatge = "Falta usuari";
            $_SESSION['missatge'] = $this->missatge;
            header("Location: index.php?control=controlusuaris");
        }
    }

    public function update() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_GET['codi'])) {
                $codi = $_GET['codi'];
                $nom = $_POST['nom'];
                $cognoms = $_POST['cognoms'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $rol = $_POST['rol'];
                $res = $this->usuaris->actualitzar($codi, $nom, $cognoms, $email, $username,$rol);
                if ($res)
                    $this->missatge = "Actualització correcta";
                else
                    $this->missatge = "Actualització incorrecta";
            }
            $_SESSION['missatge'] = $this->missatge;
            header("Location: index.php?control=controlusuaris");
        }
    }

}

?>

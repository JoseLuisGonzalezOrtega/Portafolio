<?php

class controlprojectes {

    private $projectes;
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
        
        include_once 'models/Projectes.php';
        $this->projectes = new Projectes();
        $this->missatge = "";
    }

    public function index() {
        $res = $this->projectes->getAll();
        include_once 'vistes/templates/header.php';
        include_once 'vistes/projectes/llistat.php';
        include_once 'vistes/templates/footer.php';
    }

    public function showformnew() {

        include_once 'vistes/templates/header.php';
        include_once 'vistes/projectes/formnew.php';
        include_once 'vistes/templates/footer.php';
    }

    public function showformupdate() {
        if (isset($_GET['codi'])) {
            $codi = $_GET['codi'];
            $projecte = $this->projectes->get($codi);
            if ($projecte) {
                include_once 'vistes/templates/header.php';
                include_once 'vistes/projectes/formupdate.php';
                include_once 'vistes/templates/footer.php';

                exit;
            } else {
                $this->missatge = "projecte no existeix";
            }
        }
        $_SESSION['missatge'] = $this->missatge;
        header("Location: index.php?control=controlprojectes");
    }

    public function delete() {

        if (isset($_GET['codi'])) {
            $codi = $_GET['codi'];
            if ($this->projectes->get($codi)) {
                $res = $this->projectes->esborrar($codi);
                if ($res)
                    $this->missatge = "Projecte eliminat";
                else
                    $this->missatge = "Projecte no esborrat!";
            } else
                $this->missatge = "Projecte no existeix";
        }
        $_SESSION['missatge'] = $this->missatge;
        header("Location: index.php?control=controlprojectes");
    }

    public function update() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_GET['codi'])) {
                $codi = $_GET['codi'];
                $nom = $_POST['nom'];
                $descripcio = $_POST['descripcio'];
                $dataInici = $_POST['dataInici'];
                $dataFi = $_POST['dataFi'];
                $estat = $_POST['estat'];
                $res = $this->projectes->actualitzar($codi, $nom, $descripcio, $dataInici, $dataFi, $estat);
                if ($res)
                    $this->missatge = "Actualització correcta";
                else
                    $this->missatge = "Actualització incorrecta";
            }
        }
        $_SESSION['missatge'] = $this->missatge;
        header("Location: index.php?control=controlprojectes");
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // falta validar dades
            $nom = $_POST['nom'];
            $descripcio = $_POST['descripcio'];
            $dataInici = $_POST['dataInici'];
            $dataFi = $_POST['dataFi'];
            $estat = $_POST['estat'];

            $res = $this->projectes->afegir($nom, $descripcio, $dataInici, $dataFi, $estat);
            if ($res) {
                $this->missatge = "alta correcta";
            } else {
                $this->missatge = "Alta incorrecta";
            }
        }
        $_SESSION['missatge'] = $this->missatge;
        header("Location: index.php?control=controlprojectes");
    }

}

?>

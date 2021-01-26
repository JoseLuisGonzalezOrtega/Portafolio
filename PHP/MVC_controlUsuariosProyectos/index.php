<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if (isset($_GET['control'])) {
    $control = $_GET['control'];
    if (file_exists('controladors/' . $control . '.php')) {

        include_once 'controladors/' . $control . '.php';
        if (class_exists($control)) {
            $objcontrol = new $control();
            if (isset($_GET['operacio'])) {
                $accio = $_GET['operacio'];

                if (method_exists($objcontrol, $accio)) {
                    $objcontrol->$accio();
                    exit;
                }
            }
            $objcontrol->index();
            exit;
        }
    }
}

include_once 'controladors/default.php';
$objcontrol = new controldefault();
$objcontrol->index();
?>

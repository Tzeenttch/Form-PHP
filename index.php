<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('app/vars.php');
include_once('app/functions.php');


if(!empty($_POST['opciones'])){

    switch ($_POST['opciones']){

        case 'borrar':

            header("Location: app/borrarcsv.php?".http_build_query($_POST['paisesbox']));
            break;
        
        case 'editar':
    
            header('Location: app/editar.php?'.http_build_query($_POST['paisesbox']));
            break;

        case 'anadir':

            header("Location: app/templates/addpaisTemplate.php?".http_build_query($_POST['paisesbox']));
            break;
            
        case 'recuperar':

            header("Location: app/csvBackUp.php?".http_build_query($_POST['paisesbox']));
            break;

        }
    }

$list = unirTablasCsv();
$bodyOutput =  getTableMarkup($list);




include_once('app/templates/template1.php');

?>
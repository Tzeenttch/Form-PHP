<?php
include_once('functions.php');

    $csv = fopen('csv/paises.csv' , "a");
    $paisNuevo =  $_POST['namePais'];


    $cuentaLinea = count(file('csv/paises.csv')); 
    $contador = $cuentaLinea;  

    if ($contador < 0) {
        $contador = 1;
    }

    $paisArray = array($contador, $paisNuevo);

    fputcsv($csv, $paisArray);
    fclose($csv);


    $csvComunidad = fopen('csv/comunidades.csv' , 'a');
    $comuniadNueva = $_POST['nameComunidad'];
    $fkcomunidad = $_POST['fkpais'];

    $cuentaLineaCom = count(file('csv/comunidades.csv')); 
    $contadorC = $cuentaLineaCom;  

    if ($contadorC < 0) {
        $contadorC = 1;
    }

    $arrayComunidad = array($contadorC, $comuniadNueva, $fkcomunidad);
    fputcsv($csvComunidad, $arrayComunidad);
    fclose($csvComunidad);

 header("Location: ../index.php");
 exit();
?>
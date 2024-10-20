<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vars.php');
include_once('functions.php');
if(!empty($_GET)){

    $checkBoxValues = $_GET;
    
    
    $csvPath = fopen('csv/paises.csv', 'r');

//Debe de coger las IDs
    while(($csvInfo = fgetcsv($csvPath)) !== false){
    foreach($checkBoxValues as $value){
        if ($csvInfo[0] === $value[0]) {
          //  print_r($csvInfo);
            $contentsToEdit[] = $csvInfo;
        }

        }
    }
    
    fclose($csvPath);
    $nuevoCsv = [];
    $formOutput = getEditableForm($countryList);



        foreach ($contentsToEdit as $country) {
      
            $countryList = array_merge($countryList, $country);
        }

        $formOutput = getEditableForm($countryList);
        include('templates/editTemplate.php');

}else{

    header('Location: ../index.php');

}


   if (!empty($_POST)) {

    
    //print_r($nuevoNombrePais);
    $csvPath = fopen('csv/paises.csv', 'r');

    $paises = $_POST;

    var_dump($paises);

    while(($csvInfo = fgetcsv($csvPath)) !== false){
        foreach($paises as $value){
            if ($csvInfo[0] === $value['id_pais']) {
                $csvInfo[1] = $value['nuevoPais'];
            }
        }
        $nuevoCsv[] = $csvInfo;

    }
    fclose($csvPath);
    $csvPath = fopen('csv/paises.csv', 'w');

    foreach($nuevoCsv as $data){

        fputcsv($csvPath, $data);
    }
    fclose($csvPath);
    header('Location: ../index.php');
}
?>
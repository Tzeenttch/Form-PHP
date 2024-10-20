<?php
//borrarTodo
 //file_put_contents("csv/paises.csv","id_pais,nombre");
// file_put_contents("csv/comunidades.csv","id_comunidad,nombre_comunidad,id_pais");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!empty($_GET)) {

    $boxValues = $_GET;
    foreach ($boxValues as  $value) {
        
    $csvPath = fopen('csv/paises.csv', 'r');
   // echo "Entre";
    $contentToKeep = [];

      while(($csvLine = fgetcsv($csvPath)) !== false){

          if(!in_array($csvLine[0],$boxValues)){
              $contentToKeep[] = $csvLine;
          }
      }
      fclose($csvPath);

      $csvPath = fopen('csv/paises.csv', 'w');

          foreach($contentToKeep as $content){

              fputcsv($csvPath, $content);
          }
          fclose($csvPath);
    }
}else{
    echo "No hay datos seleccionados";
}

 header("Location: ..");

?>


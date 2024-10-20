 
<?php
function getListFromDB($table){

    $gestor = fopen("/var/www/your_domain/Formulario-PHP/app/csv/" ."$table".".csv" , "r");
    $source = array();

    while(($datos = fgetcsv($gestor)) !== FALSE){

    $source[] = $datos;

    }

    fclose($gestor);
    return($source);
}

function unirTablasCsv() {
    $pais  = getListFromDB("paises");
    $comunidad = getListFromDB("comunidades");
    
    $headerPaises = fgetcsv(fopen("/var/www/your_domain/Formulario-PHP/app/csv/paises.csv", "r"));
    $headerComunidades = fgetcsv(fopen("/var/www/your_domain/Formulario-PHP/app/csv/comunidades.csv", "r"));
    $resultado = array();

    foreach ($pais as $key => $paises) {
        if ($key != 0) {  
            $paisesExtendido = array_combine($headerPaises, $paises); 
            $comunidadesRelacionadas = array();
            foreach ($comunidad as $comunidades) {
                if ($comunidades[2] == $paises[0]) { 
                    $comunidadesExtendidas = array_combine($headerComunidades, $comunidades);
                    $comunidadesRelacionadas[] = $comunidadesExtendidas; 
                }
            }
                foreach ($comunidadesRelacionadas as $comunidadRel) {
                    $nuevoHeader = array_merge($headerPaises, $headerComunidades);
                    $nuevoArray = array_combine($nuevoHeader, array_merge($paises, $comunidadRel));
                    $resultado[] = $nuevoArray;
                }
        }
    }
    return $resultado;
}


function getListMarkup($list){

    return dump($list);
}
function getListMarkupNoDump($list){
    $output='<ul>';

    foreach($list as $value){
        if(is_array($value)){
            $output .=  getListMarkup($value);
        }else{
            $output .= '<li>'.$value.'</li>';
        }
    }
    $output .= '</ul>';
    return $output;
}


function getTableMarkup($list){

    $output = '<table border="1">';
    if(isset($list[0])){

    $headers = array_keys($list[0]);
    $output .= "<tr>";
    foreach ($headers as $header) {
        $output .= "<th>" . $header . "</th>"; 
    }
        $output .= "<th>" . 'Visualizar' . "</th>"; 
        $output .= "<th>" . 'Seleccionar' . "</th>"; 

    $output .= "</tr>";
    foreach ($list as $index => $value){
        $output .= "<tr>";
        foreach ($value as $celda) {
            $output .= "<td>" . $celda. "</td>"; 
        }
        $output .= '<td><a href="app/ver.php?'.http_build_query($value).'">Ver</a></td>';
        $output .= '<td><input type="checkbox" name="paisesbox[]" value="' . $value['id_pais'] . '"></td>'; //Checbox con [] para poder manejar mas de una mediante arrays.
        $output .= "</tr>";
    }
    $output .= "</table>";
    return $output;
}
}



function getEditableForm($arrayPaises){
    $csvPath = fopen('csv/paises.csv', 'r+');
    $output = ''; //templates/editTemplate.php
    $output .= '<form action="editar.php" method="POST">';
    while (($csvInfo = fgetcsv($csvPath)) !== false) {
        foreach ($arrayPaises as $pais) {
            if ($pais[0] == $csvInfo[0]) {
                $output .= '<label for="namePais">Nuevo nombre del pais:</label>';
                $output .= '<input type="text" id="namePais" value="' . $csvInfo[1] . '" name="pais'.$csvInfo[0].'[nuevoPais]" required>'; //usar csvInfo[psocionDelNombre(1)]
                $output.= '<input type="text" name="pais'.$csvInfo[0].'[id_pais]" value="'. $csvInfo[0] .'" style="display:none;">';

            }
        }
    }
    $output .= '<input type="submit" value="Editar">';
    $output .= '<a href="../index.php" class="btn" role="button">Volver</a>';
    $output .= '</form>';
    fclose($csvPath); 
    return $output;
}



function dump($var){
    echo '<pre>'.print_r ($var, true). '</pre>';
}

?>
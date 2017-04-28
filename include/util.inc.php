<?php function search($value, $sel){
    $file=fopen("res/etablissements_denseignement_superieur.csv", "r");
    $flag=false;
    $i=decrypt_sel($sel);
    while(($data=fgetcsv($file, 10000,';'))!= FALSE){
        if (((($i == 3) || ($i == 9)) && (stripos($data[$i], $value)!==FALSE)) || ((strcmp($value,$data[$i])==0))){
            echo '<p>Établissement : <a href="etablissement.php?uai='.$data[0].'">'.$data[3].'</a></p>';
            $flag=true;
        }
    }
    if ($flag==false){
        echo"<p>Établissement non trouvé</p>";
    }
    fclose($file);
} 

function decrypt_sel($sel){
    $i = 0;
    switch($sel){
        case 'uai':
            $i = 0;
            break;
        case 'name':
            $i = 3;
            break;
        case 'adress':
            $i=9;
            break;
        case 'tel':
            $i = 14;
            break;
        default:
            $i = 0;
            break;
    }

    return $i;
}

function detail_etablissement($uai){
    $file=fopen("res/etablissements_denseignement_superieur.csv", "r");
    $flag=false;
    while(($data=fgetcsv($file, 10000,';'))!= FALSE){
        if ((strcmp($uai,$data[0])==0)){
            echo "<p>Établissement : ".$data[3]."</p>\n";
            echo "<p>Adresse : ".$data[9].", ".$data[10]." ".$data[11]."</p>\n";
            echo "<p>Téléphone : ".$data[14]."</p>";
            $flag=true;
        }
    }
    if ($flag==false){
        echo"<p>Établissement non trouvé</p>";
    }
    fclose($file);
}

function affiche(){
    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            $num = count($data);
            echo "<p> $num champs à la ligne $row: <br /></p>\n";
            $row++;
            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
            }
        }
        fclose($handle);
    }
}

function fullTableau(){
    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            echo "<tr>";
            echo "<td>".$data[18]."</td>";
            echo "<td>".$data[17]."</td>";
            echo "<td>".$data[11]."</td>";
            echo "<td>".$data[2]."</td>";
            echo '<td><a href="#">'.$data[3].'</a></t>';
            echo "</tr>";
        }
        fclose($handle);
    }
}

function tableauRegion($region){
    $array = array("Auvergne-Rhône-Alpes", "Bourgogne-Franche-Comté", "Bretagne", "Centre-Val de Loire", "Corse", "Grand Est", "Guadeloupe", "Guyane", "Hauts-de-France", "Île-de-France", "La Réunion", "Martinique", "Normandie", "Nouvelle Aquitaine", "Occitanie", "Pays de la Loire", "Provence-Alpes-Côte d'Azur");

    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {

            if(strcmp($region,$data[18])==0){
                echo "<tr>";
                echo "<td>".$data[18]."</td>";
                echo "<td>".$data[17]."</td>";
                echo "<td>".$data[11]."</td>";
                echo "<td>".$data[2]."</td>";
                echo '<td><a href="#">'.$data[3].'</a></t>';
                echo "</tr>\n";
            }
        }
        fclose($handle);
    }
}

function listeVille(){

    $array = array();

    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            if(in_array($data[11], $array) == false){
                array_push($array, $data[11]);
            }
        }
        fclose($handle);
    }

    array_multisort($array);

    echo '<option value=Toutes les villes>Toutes les villes</option>\n';
    for ($i=0; $i < sizeof($array); $i++) { 
        if($i != 0){
            echo '<option value='.$array[$i].'>'.$array[$i].'</option>\n';
        }
    }
}

function listeAcademie(){
    $array = array();

    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            if(in_array($data[17], $array) == false){
                array_push($array, $data[17]);
            }
        }
        fclose($handle);
    }

    array_multisort($array);

    echo '<option value=Toutes les académies>Toutes les académies</option>\n';
    for ($i=0; $i < sizeof($array); $i++) { 
        if($i != 0){
            echo '<option value='.$array[$i].'>'.$array[$i].'</option>\n';
        }
    }
}

function listeType(){
    $array = array();

    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            if(in_array($data[2], $array) == false){
                array_push($array, $data[2]);
            }
        }
        fclose($handle);
    }

    array_multisort($array);

    echo '<option value=Tout les types>Tout les types</option>\n';
    for ($i=0; $i < sizeof($array); $i++) { 
        if($i != 0){
            echo '<option value='.$array[$i].'>'.$array[$i].'</option>\n';
        }
    }
}

function listeRegion(){
    $array = array();

    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            if(in_array($data[18], $array) == false){
                array_push($array, $data[18]);
            }
        }
        fclose($handle);
    }

    array_multisort($array);

    echo '<option value=Toutes les régions>Toutes les régions</option>\n';
    for ($i=0; $i < sizeof($array); $i++) { 
        if($i != 0){
            echo '<option value='.$array[$i].'>'.$array[$i].'</option>\n';
        }
    }
}

?>
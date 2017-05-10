<?php 

function search($value, $sel){
    $file=fopen("res/etablissements_denseignement_superieur.csv", "r");
    $flag=false;
    $i=decrypt_sel($sel);
    while(($data=fgetcsv($file, 10000,';'))!= FALSE){
        if (((($i == 3) || ($i == 9)) && (stripos($data[$i], $value)!==FALSE)) || ((strcmp($value,$data[$i])==0))){
            echo '<p>Établissement : <a href="etablissement.php?uai='.$data[0].'&tel='.$data[14].'">'.$data[3].'</a></p>';
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

function detail_etablissement($uai, $tel, $sel = 0){
    $file=fopen("res/etablissements_denseignement_superieur.csv", "r");
    $flag=false;
    while(($data=fgetcsv($file, 10000,';'))!= FALSE){
        if ((strcmp($uai,$data[0])==0) && (strcmp($tel,$data[14])==0)){
            if ($sel == 1){
                echo $data[3];
                $flag = true;
            }
            if ($sel == 2){
                echo $data[21].', '.$data[20];
                $flag = true;
            }
            else if($sel == 0){
                echo "<table>";
                echo '<div class="partie"><tr><th colspan="2">Détails</th></tr></div>';
                echo "<tr><th>Établissement</th><td>".$data[3]."</td></tr>\n";
                echo "<tr><th>Type</th><td>".$data[2]."</td></tr>";
                if ($data[1] != "")
                    echo "<tr><th>SIRET</th><td>".$data[1]."</td></tr>";
                if ($data[4] != "")
                    echo "<tr><th>Sigle</th><td>".$data[4]."</td></tr>";
                echo "<tr><th>Statut</th><td>".$data[5]."</td></tr>";
                if ($data[6] != "")
                    echo "<tr><th>Tutelle</th><td>".$data[6]."</td></tr>";
                echo '<div class="partie"><tr><th colspan="2">Contact</th></tr></div>';
                echo "<tr><th>Adresse</th><td>".$data[9].", ".$data[10]." ".$data[11]."</td></tr>\n";
                echo "<tr><th>Région</th><td>".$data[18]."</td></tr>";
                echo "<tr><th>Téléphone</th><td>".$data[14]."</td></tr>";
                echo "<tr><th>Onisep</th><td><a href=".$data[25].">".$data[25]."</a></td></tr>";
                if(!empty($data[22]) && !empty($data[23])){
                    echo '<div class="partie"><tr><th colspan="2">Infos pratiques</th></tr></div>';
                    echo "<tr><th>Porte ourverte </th>"."<td>du ".$data[22]." au ".$data[23];
                    if(!empty($data[24])){
                        echo "<br>Infos pratiques : ".$data[24]."</td></tr>";
                    }
                    else{
                        echo "</td></tr>";
                    }
                }
                echo "</table>";
                echo '<div id="carte" style="width:1000px; height:300px"></div>';
                $flag=true;
            }
        }
    }
    if ($flag==false){
        echo"<p>Établissement non trouvé</p>";
    }
    fclose($file);
}

function fullTableau(){
    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            echo "<tr>";
            echo "<td>".$data[18]."</td>";
            echo "<td>".$data[17]."</td>";
            echo "<td>".$data[11]."</td>";
            echo "<td>".$data[2]."</td>";
            echo '<td><a href="etablissement.php?uai='.$data[0].'&tel='.$data[14].'">'.$data[3].'</a></td>';
            echo "</tr>\n";
        }
        fclose($handle);
    }
}

function option_liste($ind){
    $array = array();

    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            if(in_array($data[$ind], $array) == false){
                array_push($array, $data[$ind]);
            }
        }
        fclose($handle);
    }

    array_multisort($array);

    switch($ind){
        case 2:
            echo '<option value="Tous les types">Tous les types</option>\n';
            break;
        case 11:
            echo '<option value="Toutes les villes">Tous les villes</option>\n';
            break;
        case 17:
            echo '<option value="Toutes les académies">Tous les académies</option>\n';
            break;
        case 18:
            echo '<option value="Toutes les régions">Tous les régions</option>\n';
            break;
        default:
            break;
    }

    for ($i=0; $i < sizeof($array); $i++) { 
        if($i != 0){
            echo '<option value="'.$array[$i].'">'.$array[$i].'</option>\n';
        }
    }
}

function tableau_etablissement($region, $acad, $ville, $type){
    $ind = array(
        2 => $type,
        11 => $ville,
        17 => $acad,
        18 => $region
    );
    foreach ($ind as $i => $param) {
        if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
                if(strcmp($param,$data[$i])==0){
                    echo "<tr>";
                    echo "<td>".$data[18]."</td>";
                    echo "<td>".$data[17]."</td>";
                    echo "<td>".$data[11]."</td>";
                    echo "<td>".$data[2]."</td>";
                    echo '<td><a href="etablissement.php?uai='.$data[0].'&tel='.$data[14].'">'.$data[3].'</a></td>';
                    echo "</tr>\n";
                }
            }
            fclose($handle);
        }
    }
    unset($i);
}

function createData($ind){

    $listeNom = array();

    if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
            if(in_array($data[$ind], $listeNom) == false){
                $listeNom[$data[$ind]] = 0;
            }
            else{
                $listeNom[$data[$ind]] ++;
            }
        }
        fclose($handle);
    }

    foreach ($listeNom as &$value) {
        echo "<p>".key($listeNom)."->".$value."</p>\n";
    }


} 

?>
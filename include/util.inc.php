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
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        echo "<p> $num champs à la ligne $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}
}?>
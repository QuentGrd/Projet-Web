<?php function uai_search($uai){
    $file=fopen("res/etablissements_denseignement_superieur.csv", "r");
    $flag=false;
    $i=0;
    while(($data=fgetcsv($file, 10000,';'))!= FALSE){
        if ((strcmp($uai,$data[0])==0)){
            echo "<p>Établissement : ".$data[3]."</p>";
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
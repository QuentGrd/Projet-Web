<?php function search($value, $sel){
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
                echo '<tr><th class="partie" colspan="2">Détails</th></tr>'."\n";
                echo "<tr><th>Établissement</th><td>".$data[3]."</td></tr>\n";
                echo "<tr><th>Type</th><td>".$data[2]."</td></tr>\n";
                if ($data[1] != "")
                    echo "<tr><th>SIRET</th><td>".$data[1]."</td></tr>\n";
                if ($data[4] != "")
                    echo "<tr><th>Sigle</th><td>".$data[4]."</td></tr>\n";
                echo "<tr><th>Statut</th><td>".$data[5]."</td></tr>\n";
                if ($data[6] != "")
                    echo "<tr><th>Tutelle</th><td>".$data[6]."</td></tr>\n";
                echo '<tr><th class="partie" colspan="2">Contact</th></tr>'."\n";
                echo "<tr><th>Adresse</th><td>".$data[9].", ".$data[10]." ".$data[11]."</td></tr>\n";
                echo "<tr><th>Région</th><td>".$data[18]."</td></tr>\n";
                echo "<tr><th>Téléphone</th><td>".$data[14]."</td></tr>\n";
                echo "<tr><th>Onisep</th><td><a href=".$data[25].">".$data[25]."</a></td></tr>\n";
                if(!empty($data[22]) && !empty($data[23])){
                    echo '<tr><th class="partie" colspan="2">Infos pratiques</th></tr>'."\n";
                    echo "<tr><th>Porte ourverte </th>"."<td>du ".$data[22]." au ".$data[23];
                    if(!empty($data[24])){
                        echo "<br>Infos pratiques : ".$data[24]."</td></tr>\n";
                    }
                    else{
                        echo "</td></tr>\n";
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

function etablissement_info($uai, $tel, $sel = 0){
    $file=fopen("res/etablissements_denseignement_superieur.csv", "r");
    $flag=false;
    while(($data=fgetcsv($file, 10000,';'))!= FALSE){
        if ((strcmp($uai,$data[0])==0) && (strcmp($tel,$data[14])==0)){
            if ($sel == 0){
                return $data[3];
                $flag = true;
            }
        }
    }
    if ($flag==false){
        return "Établissement non trouvé";
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
			echo '<option value="Toutes les villes">Toutes les villes</option>\n';
			break;
		case 17:
			echo '<option value="Toutes les académies">Toutes les académies</option>\n';
			break;
		case 18:
			echo '<option value="Toutes les régions">Toutes les régions</option>\n';
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
    // $ind = array(
    //     2 => $type,
    //     11 => $ville,
    //     17 => $acad,
    //     18 => $region
    // );
    //foreach ($ind as $i => $param) {
        $ville_t = "Toutes les villes";
        $region_t = "Toutes les régions";
        $acad_t = "Toutes les académies";
        $type_t = "Tous les types";
        if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
                if(((strcmp($type,$data[2])==0) || (strcmp($type,$type_t)==0)) && ((strcmp($ville,$data[11])==0) || (strcmp($ville,$ville_t)==0)) && ((strcmp($acad,$data[17])==0) || (strcmp($acad,$acad_t)==0)) && ((strcmp($region,$data[18])==0) || (strcmp($region,$region_t)==0))){
                    echo "<tr>";
                    echo "<td>".$data[18]."</td>";
                    echo "<td>".$data[17]."</td>";
                    echo "<td>".$data[11]."</td>";
                    echo "<td>".$data[2]."</td>";
                    echo '<td><a href="etablissement.php?uai='.$data[0].'&amp;'.'tel='.$data[14].'">'.$data[3].'</a></td>';
                    echo "</tr>\n";
                }
            }
            fclose($handle);
        }
    //}
    //unset($i);
}

function createData_s($ind){

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

function decrypt_ind($ind){
	switch($ind){
		case "Type d'établissement":
		return 2;
		case "Académie":
		return 17;
		case "Statut":
		return 5;
		default:
		return 2;
	}
}


function createGraph($ind){
	$ind = decrypt_ind($ind);

	$listeNom = array();
	$nombre = array();

	if (($handle = fopen("res/etablissements_denseignement_superieur.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
			if(in_array($data[$ind], $listeNom) == false){
				array_push($listeNom, $data[$ind]);
				array_push($nombre, 1);
			}
			else{
				$nombre[array_search($data[$ind], $listeNom)] += 1;
			}
		}
		fclose($handle);
	}

	$majorTick = array();
	$minorTick = array();
	for ($i = 0; $i<max($nombre); $i = $i+50){
		array_push($majorTick, $i);
		if (($i + 25) < max($nombre)){
			array_push($minorTick, $i + 25);
		}
	}

    $width = 1000;
	if ($ind == 17){
		$height = max($nombre)*(3/2);

        // Create the graph. These two calls are always required
        $graph = new Graph($width,$height,'auto');
        $graph->SetScale("textlin");

		// Create the bar plots
		$b1plot = new BarPlot($nombre);

		// ...and add it to the graPH
		$graph->Add($b1plot);


		$b1plot->SetColor("white");
		//$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
		$b1plot->SetWidth(10);
		$graph->title->Set("Académie");
        $graph->xaxis->SetLabelAngle(50);
	}
    else if ($ind == 5){
        $total = array_sum($nombre);
        foreach ($nombre as $i => $value){
            $nombre[$i] = ($value*100)/$total;
        }

        unset($value);

        $majorTick = array(0,20,40,60,80,100);
        $minorTick = array(10,30,50,70,90);

        $height = count($nombre)*30;

        // Create the graph. These two calls are always required
        $graph = new Graph($width,$height);
        $graph->SetScale("textlin");

        $graph->Set90AndMargin(120,10,50,30);

        // Create the bar plots
        $b1plot = new BarPlot($nombre);
        // ...and add it to the graPH
        $graph->Add($b1plot);
        $b1plot->SetColor("white");
        //$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
        $b1plot->SetWidth(18);
        $graph->title->Set("Statut");
    }
    else{
        $height = count($nombre)*30;

        // Create the graph. These two calls are always required
        $graph = new Graph($width,$height,'auto');
        $graph->SetScale("textlin");

        $graph->Set90AndMargin(300,10,50,30);

        // Create the bar plots
        $b1plot = new BarPlot($nombre);
        // ...and add it to the graPH
        $graph->Add($b1plot);
        $b1plot->SetColor("white");
        //$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
        $b1plot->SetWidth(18);
        $graph->title->Set("Type d'établissement");
    }

    // set major and minor tick positions manually
    $graph->yaxis->SetTickPositions($majorTick, $minorTick);
    $graph->SetBox(false);

    //$graph->ygrid->SetColor('gray');
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels($listeNom);
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false,false);

	// Display the graph
	$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
	$fileName = "res/graph.png";
	$graph->img->Stream($fileName);
}
?>
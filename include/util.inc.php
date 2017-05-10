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
				echo "<p>Établissement: ".$data[3]."</p>\n";
				echo "<p>Type: ".$data[2]."</p>";
				if ($data[1] != "")
					echo "<p>SIRET: ".$data[1]."</p>";
				if ($data[4] != "")
					echo "<p>Sigle: ".$data[4]."</p>";
				echo "<p>Statut: ".$data[5]."</p>";
				if ($data[6] != "")
					echo "<p>Tutelle: ".$data[6]."</p>";
				echo "<p>Adresse: ".$data[9].", ".$data[10]." ".$data[11]."</p>\n";
				echo "<p>Région: ".$data[18]."</p>";
				echo "<p>Téléphone: ".$data[14]."</p>";
				echo "<p>Onisep: <a href=".$data[25].">".$data[25]."</a></p>";
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
			echo '<td><a href="etablissement.php?uai='.$data[0].'&tel='.$data[14].'">'.$data[3].'</a></t>';
			echo "</tr>";
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
					echo '<td><a href="etablissement.php?uai='.$data[0].'&tel='.$data[14].'">'.$data[3].'</a></t>';
					echo "</tr>\n";
				}
			}
			fclose($handle);
		}
	}
	unset($i);
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

	for ($i=0; $i < count($listeNom)-1; $i++) { 
		//echo("<p>".$listeNom[$i]."->".$nombre[$i]."</p>");
	}

	$majorTick = array();
	$minorTick = array();
	for ($i = 0; $i<max($nombre); $i = $i+50){
		array_push($majorTick, $i);
		if (($i + 25) < max($nombre)){
			array_push($minorTick, $i + 25);
		}
	}


	echo count($nombre), "\n";
	echo max($nombre);

	if ($ind == 17){
		$width = count($nombre)*21;
		$height = max($nombre)*(3/2);


		// Create the graph. These two calls are always required
		$graph = new Graph($width,$height,'auto');
		$graph->SetScale("textlin");

		 // set major and minor tick positions manually
		$graph->yaxis->SetTickPositions($majorTick, $minorTick);
		$graph->SetBox(false);

		//$graph->ygrid->SetColor('gray');
		$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels($listeNom);
		$graph->xaxis->SetLabelAngle(50);
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

		// Create the bar plots
		$b1plot = new BarPlot($nombre);

		// ...and add it to the graPH
		$graph->Add($b1plot);


		$b1plot->SetColor("white");
		//$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
		$b1plot->SetWidth(10);
		$graph->title->Set("Bar Gradient(Left reflection)");
	}

    else{
        $width = max($nombre)*(3/2);
        $height = count($nombre)*30;


        // Create the graph. These two calls are always required
        $graph = new Graph($width,$height,'auto');
        $graph->SetScale("textlin");
        $graph->Set90AndMargin(50,20,50,30);

         // set major and minor tick positions manually
        $graph->yaxis->SetTickPositions($majorTick, $minorTick);
        $graph->SetBox(false);

        //$graph->ygrid->SetColor('gray');
        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels($listeNom);
        $graph->xaxis->SetLabelAngle(50);
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false,false);

        // Create the bar plots
        $b1plot = new BarPlot($nombre);

        // ...and add it to the graPH
        $graph->Add($b1plot);


        $b1plot->SetColor("white");
        //$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
        $b1plot->SetWidth(18);
        $graph->title->Set("Bar Gradient(Left reflection)");
    }

	// Display the graph
	//$graph->Stroke();
	//$graph->Stroke();
	$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
	$fileName = "graph.png";
	$graph->img->Stream($fileName);
}
?>
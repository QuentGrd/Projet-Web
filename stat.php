<?php include("include/util.inc.php"); 
include('./lib/jpgraph/src/jpgraph.php');
include('./lib/jpgraph/src/jpgraph_bar.php');?>

<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Tri</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/new_style2.css">
		<?php include('include/script.inc.php'); ?>
	</head>

	<body>
		<?php include("include/header.inc.php"); ?>
		<section>
			<h2>Statistique</h2>
			<article>
				<h3>Resultat</h3>
				<p>
					<?php
						$datay=array(62,105,85,50);


					    // Create the graph. These two calls are always required
					    $graph = new Graph(350,220,'auto');
					    $graph->SetScale("textlin");

					    //$theme_class="DefaultTheme";
					    //$graph->SetTheme(new $theme_class());

					    // set major and minor tick positions manually
					    $graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
					    $graph->SetBox(false);

					    //$graph->ygrid->SetColor('gray');
					    $graph->ygrid->SetFill(false);
					    $graph->xaxis->SetTickLabels(array('A','B','C','D'));
					    $graph->yaxis->HideLine(false);
					    $graph->yaxis->HideTicks(false,false);

					    // Create the bar plots
					    $b1plot = new BarPlot($datay);

					    // ...and add it to the graPH
					    $graph->Add($b1plot);


					    $b1plot->SetColor("white");
					    $b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
					    $b1plot->SetWidth(45);
					    $graph->title->Set("Bar Gradient(Left reflection)");

					    // Display the graph
					    //$graph->Stroke();
					    $gdImgHandler = $graph->Stroke(_IMG_HANDLER);
					    $fileName = "graph.png";
					    $graph->img->Stream($fileName);
					?>
					<img src="graph.png">
				</p>
			</article>
		</section>
		<?php include('include/footer.inc.php'); ?>
	</body>
</html>
<?php include("include/util.inc.php"); 
include('lib/jpgraph/src/jpgraph.php');
include('lib/jpgraph/src/jpgraph_bar.php');
if (isset($_GET['sel'])){
	createGraph($_GET['sel']);
}?>

<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Stats</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/new_style2.css">
		<?php include('include/script.inc.php'); ?>
	</head>

	<body>
		<?php include("include/header.inc.php"); ?>
		<aside>
			<form method="get" action="stat.php">
				<input type="submit" name="sel" value="Type d'établissement">
				<input type="submit" name="sel" value="Académie">
				<input type="submit" name="sel" value="Statut">
			</form>
		</aside>
		<section>
			<h2>Statistique</h2>
			<article>
				<h3>Resultat</h3>
				<p>
					<img src="graph.png" alt="graph" id="graph">
				</p>
			</article>
		</section>
		<?php include('include/footer.inc.php'); ?>
	</body>
</html>
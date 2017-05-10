<?php include("./include/util.inc.php") ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/new_style2.css">
		<?php include('include/script.inc.php'); ?>
	</head>

	<body>
		<?php include("./include/header.inc.php"); ?>

		<section>
			<h2>Présentation du projet</h2>
			<article>
				<p>Ce projet recense les données publiques des établissements d’enseignement supérieur en France recensés par l’ONISEP (métropole et outre-mer)</p>
				<figure>
					<img  class="imageMoi" src="./img/ministere.jpg" alt="">
				</figure>
				<p>Il permet de faire des recherches et des tries dans ces données.</p>
				<p>Pour cela, visitez les onglets Tries et Recherches !</p>
				<figure>
					<img  class="imageMoi" src="./img/batiment.jpg" alt="">
					<figcaption>Photo de l'Université de Tours</figcaption>
				</figure>
			</article>
		</section>

		<?php include('include/footer.inc.php'); ?>
	</body>
</html>
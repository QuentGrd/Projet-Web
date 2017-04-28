<?php include("./include/util.inc.php") ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Tri</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<?php 
			include("./include/header.inc.php");
		?>

		<aside>
			<form method="post" action="trie.php">
				<p>
					<select name="optionRegion" id="optionRegion">
						<?php
							listeRegion();
						?>
					</select>
					<input type="submit" name="region" value="Région">
				</p>
				<p>
					<select name="optionAcademie" id="optionAcademie">
						<?php
							listeAcademie();
						?>
					</select>
					<input type="button" name="academie" value="Académie">
				</p>
				<p>
					<select name="optionVille" id="optionVille">
						<?php
							listeVille();
						?>
					</select>
					<input type="submit" name="ville" value="Ville">
				</p>
				<p>
					<select name="optionType" id="optionType">
						<?php
							listeType();
						?>
					</select>
					<input type="button" name="type" value="Type">
				</p>
			</form>
		</aside>

		<section>
			<h2>Tri</h2>
			<article>
				<h3>Resultat</h3>
				<table>
					<tr>
						<th>Région</th>
						<th>Académie</th>
						<th>Ville</th>
						<th>Type</th>
						<th>Nom</th>
					</tr>
					<?php
						if(isset($_POST['region']) && isset($_POST['optionRegion']) && (strcmp($_POST['optionRegion'], "Toutes les régions")==0)){
							echo "COUCOU 1";
							fullTableau();
						}
						elseif(isset($_POST['regionRegion']) && isset($_POST['optionRegion'])){
							echo "COUCOU 2 ";
							tableauRegion($_POST['optionRegion']);
						}
						else{
							echo "COUCOU 3";
							fullTableau();
						}
					?>
				</table>
			</article>
		</section>

		<footer>
			<p>Projet réalisé par Matthieu Vilain & Quentin Gerard</p>
		</footer>
	</body>
</html>
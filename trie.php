<?php include("./include/util.inc.php") ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Tri</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/new_style2.css">
	</head>

	<body>
		<?php include("./include/header.inc.php"); ?>
		<aside>
			<form method="post" action="trie.php">
				<p>
					<select name="optionRegion" id="optionRegion">
						<?php option_liste(18); ?>
					</select>
					<select name="optionAcademie" id="optionAcademie">
						<?php option_liste(17); ?>
					</select>
					<select name="optionVille" id="optionVille">
						<?php option_liste(11); ?>
					</select>
					<select name="optionType" id="optionType">
						<?php option_liste(2); ?>
					</select>
					<input type="submit" name="ok" value="Trier">
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
						if(isset($_POST['ok']))
							tableau_etablissement($_POST['optionRegion'], $_POST['optionAcademie'], $_POST['optionVille'], $_POST['optionType']);
						else{
							//echo "COUCOU 3";
							fullTableau();
						}
					?>
				</table>
			</article>
		</section>
		<?php include('include/footer.inc.php'); ?>
	</body>
</html>
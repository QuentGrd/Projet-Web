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
			<form>
				<ul>
					<li>
						<p>
						<input type="button" name="region" value="Région">
						<select name="option" id="option">
							<option value="uai">Centre</option>
							<option value="name">Ile de France</option>
							<option value="adress">Auvergne</option>
							<option value="tel">Corse</option>
						</select>
						</p>
					</li>
					<li><input type="button" name="academie" value="Académie"></li>
					<li><input type="button" name="ville" value="Ville"></li>
					<li><input type="button" name="type" value="Type"></li>
				</ul>
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
						fullTableau();
					?>
				</table>
			</article>
		</section>

		<footer>
			<p>Projet réalisé par Matthieu Vilain & Quentin Gerard</p>
		</footer>
	</body>
</html>
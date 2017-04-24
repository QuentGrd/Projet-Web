<?php include("include/util.inc.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Recherche</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
	<?php include('include/header.inc.php'); ?>
		<aside>
			<form method="post" action="recherche.php">
				<p><input type="text" name="entre"></p>
				<p><select name="option" id="option">
					<option value="uai">UAI</option>
					<option value="name">Nom</option>
					<option value="adress">Adresse</option>
					<option value="tel">Tel.</option>
				</select></p>
				<p><input type="submit" name="valid" value="Recherche"></p>
			</form>
		</aside>

		<section>
			<h2>Recherche</h2>
			<article>
				<h3>Resultat</h3>
				<?php if (isset($_POST['entre']) && isset($_POST['option'])){
					search($_POST['entre'], $_POST['option']);
					}
					else{
						echo "<p>Veuillez renseigné tous les champs de recherche</p>\n";
						}?>
			</article>
		</section>

		<footer>
			<p>Projet réalisé par Matthieu Vilain & Quentin Gerard</p>
		</footer>
	</body>
</html>
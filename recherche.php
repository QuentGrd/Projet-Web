<?php include("include/util.inc.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Recherche</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/new_style2.css">
		<?php include('include/script.inc.php'); ?>
	</head>

	<body>
	<?php include('include/header.inc.php'); ?>
		<aside>
			<form method="post" action="recherche.php">
				<input type="text" name="entre">
				<select name="option" id="option">
					<option value="uai">UAI</option>
					<option value="name">Nom</option>
					<option value="adress">Adresse</option>
					<option value="tel">Tel.</option>
				</select>
				<input type="submit" name="valid" value="Recherche">
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
		<?php include('include/footer.inc.php'); ?>
	</body>
</html>
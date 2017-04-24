<?php include("include/util.inc.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Établissement</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
	<?php include('include/header.inc.php'); ?>
		<section>
			<h2>Établissement</h2>
			<article>
				<h3>Fiche</h3>
				<?php if (isset($_GET['uai']))
					detail_etablissement($_GET['uai']);
				else
					echo '<p>Etablissement non trouvé</p>';
				?>
			</article>
		</section>

		<footer>
			<p>Projet réalisé par Matthieu Vilain & Quentin Gerard</p>
		</footer>
	</body>
</html>
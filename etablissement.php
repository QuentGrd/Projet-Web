<?php include("include/util.inc.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Établissement</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/new_style.css">
	</head>

	<body>
	<?php include('include/header.inc.php'); ?>
		<section>
			<h2><?php detail_etablissement($_GET['uai'], $_GET['tel'], 1)?></h2>
			<article>
				<h3>Fiche</h3>
				<?php if (isset($_GET['uai']) && isset($_GET['tel']))
					detail_etablissement($_GET['uai'], $_GET['tel']);
				else
					echo '<p>Etablissement non trouvé</p>';
				?>
			</article>
		</section>
		<?php include('include/footer.inc.php'); ?>
	</body>
</html>
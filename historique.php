<?php include("include/util.inc.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Historique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/new_style2.css">
		<?php include('include/script.inc.php'); ?>
	</head>

	<body>
	<?php include('include/header.inc.php'); ?>
		<section>
			<h2>Historique</h2>
			<article>
				<h3>Vos derniers etablissement consulté:</h3>
				<?php
				if (isset($_COOKIE['historique'])){
					$historique = unserialize($_COOKIE['historique']);
					foreach ($historique as $value) {
						$values = explode(";", $value);
						$name = etablissement_info($values[0], $values[1]);
						echo '<p><a href="etablissement.php?uai='.$values[0].'&tel='.$values[1].'">'.$name.'</a></p>';
					}
				}
				?>
			</article>
		</section>
		<?php include('include/footer.inc.php'); ?>
	</body>
</html>
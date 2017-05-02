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


		<section>
			<h2>Statistique</h2>
			<article>
				<h3>Resultat</h3>
				<p>
					<?php
						createData(18);
					?>
				</p>	
			</article>
		</section>
		<?php include('include/footer.inc.php'); ?>
	</body>
</html>
<?php include("include/util.inc.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Recherche</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<header>
			<h1>Projet Web</h1>
			<nav>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="recherche.php">Recherche</a></li>
					<li><a href="trie.php">Trie</a></li>
					<li><a href="#">A Propos</a></li>
				</ul>
			</nav>
		</header>

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
				<?php if (isset($_POST['entre'])){
					uai_search($_POST['entre']);
					}
					else{
						//affiche();
						}?>
			</article>
		</section>

		<footer>
			<p>Projet réalisé par Matthieu Vilain & Quentin Gerard</p>
		</footer>
	</body>
</html>
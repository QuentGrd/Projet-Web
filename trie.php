<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Tri</title>
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
			<form>
				<ul>
					<li><input type="button" name="region" value="Région"></li>
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
					<tr>
						<td>Ile-de-France</td>
						<td>Versailles</td>
						<td>Cergy-Pontoise</td>
						<td>Université</td>
						<td><a href="#">Université de Cergy-Pontoise</a></td>
					</tr>
					<tr>
						<td>...</td>
						<td>...</td>
						<td>...</td>
						<td>...</td>
						<td><a href="#">...</a></td>
					</tr>
				</table>
			</article>
		</section>

		<footer>
			<p>Projet réalisé par Matthieu Vilain & Quentin Gerard</p>
		</footer>
	</body>
</html>
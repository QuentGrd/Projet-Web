<?php include("include/util.inc.php");
if (isset($_GET['uai']) && isset($_GET['tel'])){
	if(isset($_COOKIE['historique'])){
		$historique = unserialize($_COOKIE['historique']);
		$str = $_GET['uai'].";".$_GET['tel'];
		if (count($historique) == 5)
			array_pop($historique);
		array_push($historique, $str);
		setcookie('historique', serialize($historique), time()+60*60*24*30, null, null, false, true);
	}
	else{
		$historique = array();
		$str = $_GET['uai'].";".$_GET['tel'];
		array_push($historique, $str);
		setcookie('historique', serialize($historique), time()+60*60*24*30, null, null, false, true);
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Projet Web - Établissement</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/new_style2.css">
		<?php include('include/script.inc.php'); ?>
	</head>

	<body <?php if (isset($_GET['uai']) && isset($_GET['tel'])){echo 'onload="insertMap(', detail_etablissement($_GET['uai'], $_GET['tel'], 2), ')"';} ?> >
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
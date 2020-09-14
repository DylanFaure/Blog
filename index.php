<!DOCTYPE html>
<html>
	<head>
		<title>Les billets !</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style_blog.css">
	</head>
	<body>
		<h1>Mon super blog !</h1>
		<div>Derniers billets du blog :</div>
		<?php
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$bdd->exec('SET NAMES utf8');
		$reponse = $bdd->query('SELECT id, auteur, titre, contenu, DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS annee, HOUR(date_creation) AS heure, MINUTE(date_creation) AS minute, SECOND(date_creation) AS seconde FROM billets');
		while ($donnees = $reponse->fetch())
		{
			echo '<h3>' . htmlspecialchars($donnees['auteur']) . ' : ' . htmlspecialchars($donnees['titre']) . ' - Le ' . $donnees['jour'] . '/' . $donnees['mois'] . '/' . $donnees['annee'] . ' à ' . $donnees['heure'] . 'h' . $donnees['minute'] . 'min' . $donnees['seconde'] . 's</h3><p>' . htmlspecialchars($donnees['contenu']) . '</p>';
			echo '<p><strong><em>' . '<a href="commentaires.php?id=' . $donnees['id'] . '">Commentaires</a></em></strong></p><br />';
		}
		?>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Les commentaires du billet sélectionné !</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style_blog.css">
	</head>
	<body>
		<strong><a href="index.php">Retour à la liste des billets</a></strong>
		<?php
		if (isset($_GET['id'])) {
			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$bdd->exec('SET NAMES utf8');
			$reponse = $bdd->prepare('SELECT auteur, titre, contenu, DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS annee, HOUR(date_creation) AS heure, MINUTE(date_creation) AS minute, SECOND(date_creation) AS seconde FROM billets WHERE id = ?');
			$reponse->execute(array($_GET['id']));
			while ($donnees = $reponse->fetch()) 
			{
				echo '<h3>' . htmlspecialchars($donnees['auteur']) . ' : ' . htmlspecialchars($donnees['titre']) . ' - Le ' .
				$donnees['jour'] . '/' . $donnees['mois'] . '/' . $donnees['annee'] . ' à ' . $donnees['heure'] . 'h' . $donnees['minute'] . 'min' . $donnees['seconde'] . 's' . '</h3>' . '<p>' . htmlspecialchars($donnees['contenu']) . '</p>';
			}
			echo '<h2>Commentaires</h2>';
			$reponse = $bdd->query('SELECT id_billet, auteur, commentaire, DAY(date_commentaire) AS jour, MONTH(date_commentaire) AS mois, YEAR(date_commentaire) AS annee, HOUR(date_commentaire) AS heure, MINUTE(date_commentaire) AS minute, SECOND(date_commentaire) AS seconde FROM commentaires ORDER BY date_commentaire DESC');
			while ($donnees = $reponse->fetch()) 
				{
				if ($donnees['id_billet'] == $_GET['id']) {
					echo '<strong><div>' . htmlspecialchars($donnees['auteur']) . '</strong> le ' . $donnees['jour'] . '/' . $donnees['mois'] . '/' . $donnees['annee'] . ' à ' . $donnees['heure'] . 'h' . $donnees['minute'] . 'min' . $donnees['seconde'] . 's' . '</div><br />';
					echo '<div>' . htmlspecialchars($donnees['commentaire']) . '</div><br />';
				}
			}
		}
		?>
	</body>
</html>
<!DOCTYPE html>
<html>

	<head>
		<title>Mes Infos</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/x-icon" href="../Contenu/images/logo.png"/>
		<link rel="stylesheet" href="../CSS/style.css">
	</head>
	
	<body>
		<?php
		$serverName = $_SERVER['SERVER_NAME'];
		$serverPath = $_SERVER['SCRIPT_FILENAME'];
		$phpDocLink = "http://www.php.net/manual/fr/";
		echo "<h2>Informations serveur :</h2>";
		echo "Mon serveur est: ", $serverName ,"</br>";
		echo "Le chemin du serveur est: ", $serverPath  ,"</br>";
		echo "<a href=", $phpDocLink ,">Documentation PHP</a></br>";
		var_dump($phpDocLink);

		var_dump($_SERVER);
		phpinfo();
		?>



		<footer>
		<a href="mailto:l.druckes@ludus-academie.fr">Contact</a> 
		</footer>
	</body>

</html>
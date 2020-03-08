<!DOCTYPE html>
<html>
<head>
	<title>Virtualhost Exemple</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
<header class="hdr" id="hdr">
	<span class="hdr-span">Utilisation du PDO (PHP Data Objects) pour se connecter à une BDD</span><br>
	<span class="hdr-span">Connexion à la base Commerce_cours</span><br>
</header>

<?php require('connect.php'); ?>
<?php connect("localhost","root","","commerce_cours"); ?>

</body>
</html>
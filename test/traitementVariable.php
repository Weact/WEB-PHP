<!DOCTYPE html>
<html>

	<head>
		<title>Traitements des variables</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/x-icon" href="../Contenu/images/logo.png"/>
		<link rel="stylesheet" href="../CSS/style.css">
	</head>
	
	<body>
		<?php

		$title = "Traitements des variables";
		$name = "Lucas";
		$_GLOBAL['pseudo'] = "Weact";
		$_GLOBAL['age'] = 20;
		$_GLOBAL['city'] = "Strasbourg";
		define("constVar", 17);

		echo $title;
		var_dump($title);
		echo gettype($title);
		echo isset($toto), "<br>";
		if(isset($toto)){ //si la variable toto existe
			echo "Variable définie </br>"; //la variable est définie
			unset($toto); //on la supprime
		}
		else{ //si la variable toto n'existe pas
			echo "Variable non définie </br>"; //on affiche
			$toto = "yoyo"; //on la créée
		}

		if(!isset($toto)){ //si elle n'existe toujours pas après les premières conditions
			echo "Variable supprimée </br>"; //elle est supprimée
		}

		#echo empty($var)

		if(empty($name)){
			echo "La variable est vide </br>";
		}else{
			echo "La variable n'est pas vide. Son contenu est: ", $name, " </br>";
		}

		if(empty($pseudo)){
			echo "La variable est vide </br>";
		}else{
			echo "La variable n'est pas vide. Son contenu est: ", $name, " </br>";
		}

		echo $_GLOBAL['pseudo'], " ", $_GLOBAL['age'], " ", $_GLOBAL['city'];
		var_dump($_GLOBAL);

		echo constVar, "<br>";

		#récupérer le répertoire courrant
		echo dirname(__FILE__), "<br>";

		#longueur d'une chaîne de caractère avec strlen
		echo "Longueur du titre: ", strlen($title), " caractères. <br>";
		echo "Premier caractère du titre: ", $title[0], "<br>";
		#echo $title[strlen($title)]; commet une erreur
		echo "Titre en Majuscule: ", strtoupper($title), "<br>";
		echo "Titre en Miniscule: ", strtolower($title), "<br>";
		echo "Premier caractère en Majuscule: ", ucfirst($title), "<br>";
		echo "Première lettre de chaque mot: ", ucwords($title), "<br>";

		#echo(split($title));
		$AGENT=$_SERVER['HTTP_USER_AGENT'];
		echo 'Votre chaîne est : ', $AGENT, "<br>"	;
		echo("\n<P>");
		if (stristr($AGENT,"MSIE")){
		echo "Vous semblez utiliser Internet Explorer !</br>";}
		elseif (preg_match("/Firefox/i",$AGENT)){
		echo "Vous semblez utiliser Firefox !</br>";}
		elseif (preg_match("/Chrome/",$AGENT)){
		echo "Vous semblez utiliser Chrome !</br>";}


		#commentaire ligne
		//commentaire ligne
		/* commentaire
		* block
		*/

		$a = 23;
		$b = 58.0;
		$somme = $a + $b;
		echo "La somme de ", $a ," + ", $b ," est: ", $somme ,".</br>";

		function somme()
		{
			$a = 23;
			$b = 58.0;
			$somme = $a + $b;
			echo "La somme de ", $a ," + ", $b ," est: ", $somme ,".</br>";
		}

		function somme2($a2, $b2)
		{
			$somme2 = $a2 + $b2;
			echo "La somme de ", $a2 ," + ", $b2 ," est: ", $somme2 ,".</br>";
		}


		$GLOBALS['aGlobal'] = 23;
		$GLOBALS['bGlobal'] = 51.0;
		$GLOBALS['sGlobal'] = $GLOBALS['aGlobal'] + $GLOBALS['bGlobal'];
		//ATTENTION, LA FONCTION SOMME3 NE MARCHERA PAS EN PHP CAR LES DECLARER EN GLOBAL NE VEUT PAS DIRE QU'ELLES SONT ACCESSIBLES PAR TOUTES LES FONCTIONS. > $_GLOBAL != $GLOBAL
		var_dump($_GLOBAL);
		function somme3()
		{
			echo "La somme de ", $GLOBALS['aGlobal'] ," + ", $GLOBALS['bGlobal'] ," est: ", $GLOBALS['sGlobal'] ,".</br>";
		}

		function somme5()
		{
			echo "La somme de ", $GLOBALS['a'] ," + ", $GLOBALS['b'] ," est: ", $GLOBALS['somme'] ,".</br>";
		}

		somme();
		somme2(23,41.0);
		somme3();
		somme5();
//UNE VARIABLE DECLAREE AU SEIN D'UNE FONCTION PRECEDEE DU MOT CLEF 'global' SERA ACCESSIBLE PARTOUT.

		function moyenne($integerA, $integerB)
		{
			return ($integerA + $integerB) / 2;
		}

		echo "La moyenne est: ", moyenne(10,5);
		var_dump(moyenne(10,5));
		if(is_float(moyenne(10,5))){
			echo "C'est un float !<br/>";
		}else{
			echo "C'est un: ", gettype(moyenne(10,5)), "</br>";
		}

		function test($email)
		{
			//prenom format : Lucas
			//nom format : DRUCKES
			$service = explode("@", $email);
			$infos = explode(".", $service[0]);
			$fournisseur = explode(".", $service[1]);

			var_dump($service);
			var_dump($infos);
			var_dump($fournisseur);

			$prenom = ucfirst($infos[0]);
			$nom = strtoupper($infos[1]);
			$mail = ucfirst($fournisseur[0]);

			echo "Bonjour, ", $prenom, " " ,$nom, ".</br> Vous êtes chez: ", $mail ,".</br>";
		}

		test("lucas.druckes@numericable.fr");
		?>

		<?php #BOOLEEN ET ARRAY
		echo "</br></br>";
		#TESTBOOLEEN
		$chaine1 = "PHP";
		$chaine2 = "php";
		$bool1 = $chaine1 === $chaine2;

		if($bool1)
		{
			echo "C'est la même chaîne</br>";
		}else
		{
			echo "Ce n'est pas la même chaîne</br>";
		}

		$a = 3;
		$b = 3.0;
		$bool2 = $a === $b; # == sera true, === sera false. Le premier vérifie la valeur. Le deuxième vérifie la valeur ET le type.

		if($bool2)
		{
			echo "C'est la même valeur</br>";
		}else
		{
			echo "Ce n'est pas la même valeur</br>";
		}

		$myArray = array(
			1,
			2,
			10,
			20,
			40,
			"Salut à tous",
			"Ludus Academie",
			array(1,2,3),
			array(4,5,6),
			array(7,8,9)
		);
		$myMorpion = array(
			array(0.14,0.0,0.0),
			array(0.00,0.001549,0.00),
			array(0.000,0.000,0.00018)
		);

		var_dump($myArray);
		var_dump($myMorpion);
		?>

		<?php #OBJET EN PHP
		echo "<h2> LES OBJETS EN PHP </h2></br>";

		#OBJET VEHICULE
		class vehicule{
			#CONSTRUCTEUR
			function vehicule()
			{
				$this->type = "voiture";
				$this->couleur = "vert";
			}
		}

		$maVoiture = new vehicule();

		var_dump($maVoiture);
		echo $maVoiture->type;
		echo $maVoiture->couleur;
		?>

		<footer>
		</br>
			<a href="mailto:l.druckes@ludus-academie.fr">Contact</a> 
		</footer>
	</body>

</html>
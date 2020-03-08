<!DOCTYPE html>
<html>
<head>
	<title>Introduction Tableaux PHP</title>
	<meta charset="utf-8">
	<style type="text/css">
		h1:hover, h2:hover, h3:hover, h4:hover, h5:hover, h6:hover{
			transition: 0.5s;
			font-size: 20px;
			color: darkblue;
		}
		.day_container{
			padding: 50px;

			border: 10px solid cyan;
			width: fit-content;
		}
		.keypair{
			font-weight: bolder;
			color: blue;
			transition: 1s;
		}
		.keypair:hover{
			width: fit-content;
			padding: 10px;
			
			border: 5px green dotted;
			border-radius: 30px;

			font-size: 30px;
			color: black;
		}
		.keyimpair{
			font-style: italic;
			color: red;
			transition: 1s;
		}
		.keyimpair:hover{
			width: fit-content;
			padding: 10px;

			border: 5px black solid;
			border-radius: 30px;

			font-size: 30px;
			color: purple;
		}
	</style>
</head>
<body>
	<h1>Introduction tableaux php</h1>
	<?php
	echo ('<h3><u>Tableau non associatif des jours de la semaine</u></h3>');

	#Déclaration d'un tableau
	$tableau = array(
		"Lundi",
		"Mardi",
		"Mercredi",
		"Jeudi",
		"Vendredi",
		"Samedi",
		"Dimanche"
		);
	var_dump($tableau);
	print_r($tableau);

	echo ('<h3><u>Lecture du tableau non associatif avec for each</u></h3>');
	echo ('<h4>Affichage des valeurs uniquement</h4>');

	foreach ($tableau as $jour) {
		echo $jour , '</br>';
	}

	echo ('<h3><u>Affichage des couples clés-valeurs</u></h3>');

	foreach ($tableau as $key => $val) {
		echo 'Valeur N°', $key , ' => ' , $val , '<br>';
	}

	echo ('<h3><u>Lecture du tableau non associatif avec for</u></h3>');
	echo 'Taille tableau : ' , count($tableau) , '<br>'; #Retourne le nombre d'élément d'un tableau ([...])
	echo 'Taille tableau : ' , sizeof($tableau) , '<br>';
	echo '<br>';
	for ($i=0; $i < count($tableau); $i++) { 
		echo $tableau[$i], '<br>';
	}

	echo ('<h3><u>Lecture du tableau non associatif avec while</u></h3>');
	$j = 0;
	echo '<div class="day_container">';
	while ($j < count($tableau)) {
		if($j % 2)
		{
			echo '<span class="keypair">Valeur N°: ',$j,' => ',$tableau[$j],'</span>', '<br><br>';
		}else{
			echo '<span class="keyimpair">Valeur N°: ',$j,' => ',$tableau[$j],'</span>', '<br><br>';
		}
		$j++;
	}
	echo '</div>';

	echo ('<h3><u>Tableaux associatifs</u></h3>');
	$tabdays = array(
		"Lun" => "Lundi",
		"Mar" => "Mardi",
		"Mer" => "Mercredi",
		"Jeu" => "Jeudi",
		"Ven" => "Vendredi",
		"Sam" => "Samedi",
		"Dim" => "Dimanche"
		);
	#var_dump($tabdays[2]); Inccorect
	#var_dump($tabdays["Mar"]); #Correct

	echo ('<h4> Afficher les jours terminant par "DI"</h4>');
	$term = "di";
	foreach ($tabdays as $days) {
		if(strpos($days, "di") == strlen($days)-2){
			echo($days), '<br>';
		}
	}

	#Déclarer un tableau de genre musicaux
	$tabmusic = array(
		"Pop",
		"Rap",
		"Classique",
		"RnB",
		"Electro",
		"Dubstep"
		);

	echo '<br><br>';

	echo '<form method="GET" action="#">';
	echo '<select name="select_genre_musical">';
	echo '<option value="none" selected>Selectionnez un genre musical</option>';
	foreach ($tabmusic as $genre) {
		echo '<option value="',$genre,'">',$genre,'</option>';
	}
	echo '</select>';
	echo '<br><br><input type="submit"></input>';
	echo '<p id="changeselectgenre"></p>';
	echo '</form>';

	/* CREER UN TABLEAU DE TABLEAUX => CONTIENT DES CLIENTS
	*		LE NOM DES CLIENTS SERA CONSTITUE DE : Prenom Nom
	*		CLIENT => TABLEAU ASSOCIATIF => [1] : Nom ; [2] : Ville ; [3] : EMail => CREER n CLIENT
	*		TABCLIENT => TABLEAU CONTENANT LES CLIENTS
	*	VAR_DUMP DES CLIENTS
	* 	AFFICHAGE DES CLIENTS => POUR CHACUN DES CLIENTS, AFFICHER LEURS VALEURS
	*	AFFICHER UNIQUEMENT LE NOM DES CLIENTS
	*/

	echo '<br><br>';

	echo '<h2>Tableaux de client, affichage des clients.</h2><br>';
	$client0 = array();
	$client0 ['Nom'] = 'DRUCKES';
	$client0 ['Prenom'] = 'Lucas';
	$client0 ['Nom Complet'] = $client0['Nom'] . ' ' . $client0['Prenom'];
	$client0 ['Ville'] = 'Erstein';
	$client0 ['EMail'] = 'lucas.druckes@numericable.fr';

	$client1 = array();
	$client1 ['Nom'] = 'BARETTE';
	$client1 ['Prenom'] = 'Hugo';
	$client1 ['Nom Complet'] = $client1['Nom'] . ' ' . $client1['Prenom'];
	$client1 ['Ville'] = 'Strasbourg';
	$client1 ['EMail'] = 'hugo.barette@sfr.fr';

	$client2 = array();
	$client2 ['Nom'] = 'FORET';
	$client2 ['Prenom'] = 'Jack';
	$client2 ['Nom Complet'] = $client2['Nom'] . ' ' . $client2['Prenom'];
	$client2 ['Ville'] = 'Lille';
	$client2 ['EMail'] = 'jack.foret@orange.fr';

	$liste_client = array($client0, $client1, $client2);

	foreach ($liste_client as $client) {
		foreach ($client as $element => $idclient) {
			echo $element. ' - ' . $idclient.' <br>';
		}
		echo '<br>';
	}

	echo '<h2>Tableaux de client, affichage des clients mais uniquement de leur nom complet</h2>';
	foreach ($liste_client as $client) {
		foreach ($client as $element => $idclient) {
			if($element == 'Nom Complet')
				echo $element. ' - ' .$idclient.'<br>';
		}
	}

	echo'<h3>VAR DUMP des clients</h3>';
	echo'<h5>VAR DUMP du tableau liste_client => il contient les clients</h5>';
	var_dump($liste_client);
	echo'<h5>VAR DUMP d un client, ici : le deuxième.</h5>';
	var_dump($liste_client[1]);
	echo'<h5>VAR DUMP d un client sur un champ précis. Ici : le deuxième client, sur son champ : "Nom Complet"</h5>';
	var_dump($client2['Nom Complet']);

?>
<script type="text/javascript">
	let url = location; //récupère l'URL de la page
  	let params = new URLSearchParams(url.search.slice(1)); //récupère le contenu de l'url après le '?' (inclus) et le sépare

  	var genre = params.get('select_genre_musical');

  	if(genre != "null"){
  		var p = document.getElementById('changeselectgenre').innerHTML = params.get('select_genre_musical');
  		//alert(params.get('select_genre_musical'));
  	}else{
  		alert('abcde');
  	}
</script>

</body>
</html>
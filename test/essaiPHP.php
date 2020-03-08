<!DOCTYPE html>
<html>

	<head>
		<title>PHP Page</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/x-icon" href="../Contenu/images/logo.png"/>
		<link rel="stylesheet" href="../CSS/style.css">
	</head>
	
	<body>
		<?php
			echo('Bonjour');
			//print('DRUCKES Lucas'); //print fait la même chose que echo mais préférerons echo à print.

			echo('<h2>Composants de WampServer</h2>');
			echo('
				<ul style="font-style: italic">
					<li>Serveur Apache</li>
					<li>PHP</li>
				</ul>
				');

		?>

		<header>

		</header>



		<footer>
		<p style="display: inline">Nous sommes le: </p>
			<?php
				echo date('
					d/m/Y h:i:s
				');
			?>
		</br>
		<a href="mailto:l.druckes@ludus-academie.fr">Contact</a> 
		</footer>
	</body>

</html>
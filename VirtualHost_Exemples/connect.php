<?php
	//define('SERVERNAME', 'localhost');
	//define('USERNAME', 'root');
	//define('PASSWORD', '');
	//define('DATABASE', 'commerce_cours');
	
	/*
		Requête :

		$sql = "
		DROP TABLE IF EXISTS Magasin;
		CREATE TABLE IF NOT EXISTS Magasin(
		id INT(6) COLLATE latin1_general_cs NOT NULL,
		nomMagasin VARCHAR(50) COLLATE latin1_general_cs NULL,
		nomProprietaire VARCHAR(50) COLLATE latin1_general_cs NULL,
		dateOuverture DATE COLLATE latin1_general_cs NULL,
		PRIMARY KEY(id))";

		$conn->exec($sql);
		echo "<span style='color: green; font-weight: bolder; font-size: 32px;'>Table Magasin a ete creee avec succes</span><br>";
		echo "<br>";
	*/

	function connect($servername, $username, $password, $db)
	{
		try{
			//Create connection
			$conn = new PDO("mysql:host=".$servername.";dbname=".$db, $username, $password);
			//set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			echo "<span style='color: green; font-weight: bolder; font-size: 32px;'>Connected successfully</span><br>";

			//prepare sql and bind parameters
			$stmt = $conn->prepare(select_req("INSERT INTO client (NUM_CLIENT, NOM, LOCALITE, VILLE, CATEGORIE_CLIENT, SOLDE_CLIENT)
				VALUES (:NUM_CLIENT, :NOM, :LOCALITE, :VILLE, :CATEGORIE_CLIENT, :SOLDE_CLIENT)"));

			//Use this function to insert a client
			//Parameters orders : stmt, num_client, nom, localite, ville,
			//categorie_client, solde_client
			//insert_client($stmt, "F047", "MARTINE", "13 Rue du Chat", "Strasbourg", "G9", "7300");

			echo "<span style='color: green; font-weight: bolder; font-size: 32px;'>New records created successfully</span><br>";

			//Select * from client
			select($conn);
		}
		catch(PDOException $e)
		{
			echo "<span style='color: red; font-weight: bolder; font-size: 32px;'>Connection failed: " . $e->getMessage() . "</span><br><br>";
			echo "<span style='color: red; font-weight: bolder; font-size: 24px;'>" . $sql . "<br>" . $e->getMessage() . "</span><br><br>";
		}

		if(isset($conn))
		{

		}else{
			echo ('Conn n existe pas');	
		}

		return $conn;
	}

	function select($conn)
	{
		$stmt_clients = $conn->prepare(select_req("SELECT * FROM CLIENT"));
		$stmt_clients->execute();

			echo "<div id='table-container-div' class='table-client-container'>";
			echo "<br><table id='tableClient' class='tab'>";
			echo "<thead>";
				echo "<caption>INFORMATIONS DES CLIENTS</caption>";
				echo "<tr>";
					echo "<th>NUMERO</th>";
					echo "<th>NOM</th>";
					echo "<th>LOCALITE</th>";
					echo "<th>VILLE</th>";
					echo "<th>CATEGORIE</th>";
					echo "<th>SOLDE</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			foreach ($stmt_clients as $client) {
				echo "<tr>";
						echo "<td>".$client["NUM_CLIENT"]."</td>";
						echo "<td>".$client["NOM"]."</td>";
						echo "<td>".$client["LOCALITE"]."</td>";
						echo "<td>".$client["VILLE"]."</td>";
						echo "<td>".$client["CATEGORIE_CLIENT"]."</td>";
						echo "<td>".$client["SOLDE_CLIENT"]."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
				echo "<div id='btn-c-id' class='btn-container'>";
					echo "<input type='button' id='btn-zoom-table' class='btn' name='btnzoomtable' onclick='zoomTable()' value='ZOOOM'>";
				echo "</div>";
			echo "</div>";

		$stmt_clients->execute();
		$nbClient = $stmt_clients->rowcount();

		echo "<div style='display: flex; justify-content: center; margin: 10px; padding: 10px; width: 300px; background-color: darkgrey; border: 5px black solid; border-radius: 20px;'><span style='color: green; font-size: 25px;'>Nombre de client: ". $nbClient ."</div></span>";
		echo "<div style='display: flex; justify-content: center; margin: 10px; padding: 10px; width: 300px; background-color: darkgrey; border: 5px black solid; border-radius: 50px; letter-spacing: 5px;'>";
		foreach ($stmt_clients as $client) {
			echo "<span style='color: red; font-size: 20px; font-weight: bolder'>".$client["NUM_CLIENT"]."<br>";
		}
		echo "</div>";
	}

	function insert_client($stmtHost, $numClient, $nomClient, $localiteClient, $villeClient, $categorieClient, $soldeClient)
	{
		$stmtHost->bindParam(':NUM_CLIENT', $num_client);
		$stmtHost->bindParam(':NOM', $nom);
		$stmtHost->bindParam(':LOCALITE', $localite);
		$stmtHost->bindParam(':VILLE', $ville);
		$stmtHost->bindParam(':CATEGORIE_CLIENT', $categorie_client);
		$stmtHost->bindParam(':SOLDE_CLIENT', $solde_client);

		$num_client = $numClient;
		$nom = $nomClient;
		$localite = $localiteClient;
		$ville = $villeClient;
		$categorie_client = $categorieClient;
		$solde_client = $soldeClient;
		$stmtHost->execute();
	}

	function select_req($req)
	{
		return $req;
	}
?>
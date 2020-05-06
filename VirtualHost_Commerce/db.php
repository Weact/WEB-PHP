<?php
/*                          *
*      LUDUS  ACADEMIE      *
*    OWNER : DRUCKES Lucas  *
*      WEACT     2020       *
*   PHP FILE FOR  INDEX.PHP *
*          YAPADKASS        *
*                           */
include_once 'req.php';

define('SERVERNAME', 'localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','commerce_cours');

//connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);

function db_connect()
{
  try{
    //Create connection
    $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE, USERNAME, PASSWORD);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "<span style='color: green; font-weight: bolder; font-size: 32px;'>Connected successfully</span><br>";
    echo "<script> console.log('Connected successfully'); </script>";
  }
  catch(PDOException $e)
  {
    echo "<span class='conn_failed'>Connection failed: " . $e->getMessage() . "</span><br><br>";
  }

  if(isset($conn))
  {

  }else{
    echo "<script> console.log('La connexion n\'existe pas.') </script>";
    //echo "<span style='color: red; font-weight: bolder; font-size: 24px;'>La connexion  n'existe pas.</span><br><br>";
  }

  return $conn;
}

function select_client($conn)
{
  $stmt = $conn -> prepare(query_select("client","*"));
  $stmt -> execute();

  echo "<div id='table-container-div' class='table-client-container'>";
  echo "<br><table id='tableClient' class='tab'>";
  echo "<thead>";
    echo "<caption>INFORMATIONS DES CLIENTS</caption>";
    echo "<tr>";
      echo "<th>NUM_CLIENT</th>";
      echo "<th>NOM</th>";
      echo "<th>LOCALITE</th>";
      echo "<th>VILLE</th>";
      echo "<th>CATEGORIE_CLIENT</th>";
      echo "<th>SOLDE_CLIENT</th>";

    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($stmt as $client) {
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
  echo "</div>";
  echo "</div>";
}

function insert($conn, $table, $num_client, $nom_client, $localite_client, $ville_client, $categorie_client, $solde_client)
{
  $insert_array = array("NUM_CLIENT" => $num_client,  "NOM" => $nom_client, "LOCALITE" => $localite_client, "VILLE" => $ville_client, "CATEGORIE_CLIENT" => $categorie_client, "SOLDE_CLIENT" => $solde_client);
  $stmt = $conn->prepare(query_insert($table, $insert_array));
  $stmt -> execute();
}
?>

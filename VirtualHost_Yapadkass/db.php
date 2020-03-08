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
define('DATABASE','yapadkass');

connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);

function connect($servername, $username, $password, $db)
{
  try{
    //Create connection
    $conn = new PDO("mysql:host=".$servername.";dbname=".$db, $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "<span style='color: green; font-weight: bolder; font-size: 32px;'>Connected successfully</span><br>";
    echo "<script> console.log('Connected successfully'); </script>";
    $can_insert = 0;

    select_client($conn);

    if($can_insert == 1)
    {
      $req = "INSERT INTO `client_profil`(`username`, `password`) VALUES ('NZ','E*-9dd4qxx')";
      $stmt = $conn->prepare($req);
      $stmt->execute();
    }

    select_client_profil($conn);



    //insert($conn, "client_profil", "Weact", "Weact67");
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
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($stmt as $client) {
    echo "<tr>";
        echo "<td>".$client["NUM_CLIENT"]."</td>";
        echo "<td>".$client["NOM"]."</td>";
        echo "<td>".$client["ADRESSE"]."</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  echo "</div>";
}
function select_client_profil($conn)
{
  $stmt = $conn -> prepare(query_select("client_profil","*"));
  $stmt -> execute();

  echo "<div id='table-container-div' class='table-client-container'>";
  echo "<br><table id='tableClient' class='tab'>";
  echo "<thead>";
    echo "<caption>INFORMATIONS DES PROFILS</caption>";
    echo "<tr>";
      echo "<th>ID_CLIENT</th>";
      echo "<th>USERNAME</th>";
      echo "<th>PASSWORD</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($stmt as $client) {
    echo "<tr>";
        echo "<td>".$client["id_client"]."</td>";
        echo "<td>".$client["username"]."</td>";
        echo "<td>".md5($client["password"])."</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  echo "</div>";
}

function insert($conn, $table, $username, $password)
{
  $insert_array = array("username" => $username,  "password" => $password);
  $stmt = $conn->prepare(query_insert($table, $insert_array));
  $stmt -> execute();
}
?>

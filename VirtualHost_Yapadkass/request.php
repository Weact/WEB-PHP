<?php
/*                          *
*      LUDUS  ACADEMIE      *
*    OWNER : DRUCKES Lucas  *
*      WEACT     2020       *
*   PHP FILE FOR  INDEX.PHP *
*          YAPADKASS        *
*                           */

require('reqlib.php');

function select_client($conn)
{
  $stmt = $conn -> prepare(query_select("client","*"));
  $stmt -> execute();

  $keyVal = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<div id='table-container-div' class='table-client-container'>";
  echo "<br><table id='tableClient' class='tab'>";
  echo "<thead>";
  echo "<caption>INFORMATIONS DES PROFILS</caption>";
  echo "<tr>";
  foreach ($keyVal[0] as $key => $value) {
    echo "<th>".$key."</th>";
  }
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

  foreach ($keyVal as $array_client) {
    echo "<tr>";
    foreach ($array_client as $key => $value) {
      if($key == "password" && $value != NULL)
      {
        echo "<td>" . md5($value) . "</td>";
      }else{
        echo "<td>" . $value . "</td>";
      }
    }
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  echo "</div>";
}


function insert_client($conn, $name, $adresse, $username, $password, $sign_date, $email, $admin)
{
  if($admin == "TRUE"){
    $req = "INSERT INTO client(NOM, ADRESSE, username, password, date_creation, email, is_admin) VALUES ('".$name."', '".$adresse."', '".$username."', '".$password."', CONVERT('".$sign_date."', DATE), '".$email."', 'VRAI') ON DUPLICATE KEY UPDATE username = VALUES(username)";
    $stmt = $conn->prepare($req);
    $stmt->execute();
  }else{
    $req = "INSERT INTO client(NOM, ADRESSE, username, password, date_creation, email, is_admin) VALUES ('".$name."', '".$adresse."', '".$username."', '".$password."', '".$sign_date."', '".$email."', 'FAUX') ON DUPLICATE KEY UPDATE username = VALUES(username)";
    $stmt = $conn->prepare($req);
    $stmt->execute();
  }
}

?>

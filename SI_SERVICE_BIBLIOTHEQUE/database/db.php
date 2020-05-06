<?php
/*                          *
*      LUDUS  ACADEMIE      *
*    OWNER : DRUCKES Lucas  *
*      WEACT     2020       *
*   PHP FILE FOR  INDEX.PHP *
*          YAPADKASS        *
*                           */

define('SERVERNAME', 'localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','SI_SERVICE_BIBLIOTHEQUE');

function db_connect()
{
  try{
    $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<script> console.log('Connected successfully'); </script>";

    //select_client($conn);
    //insert_client_profil($conn, 'ZELP', 'forfivesieneight');
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
?>

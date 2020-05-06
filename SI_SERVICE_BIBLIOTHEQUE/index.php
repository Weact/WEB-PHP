<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SI_SERVICE_BIBLIOTHEQUE</title>
    <link rel="stylesheet" href="/style/style.css">
    <script type="text/javascript" src="/script/script.js"></script>
  </head>
  <body>

<?php
        require('database/db.php');
        require('lib/SQL_QUERIES.php');
        $conn = db_connect();
?>
<header> <!-- Website's Header => It will contains Title and main informations -->
  <span>SI_SERVICE_BIBLIOTHEQUE</span><br>
  <!--
  //<input type="button" class="btn_con_db" name="btn-con-db" value="Database Connection">
  //<input class="btn-close" type="button" name="" value="" onclick="alert('you deleted');">
  //<input class="btn-edit" type="button" name="" value="" onclick="alert('you edited');">
  //<input class="btn-add" type="button" name="" value="" onclick="alert('you added');">
  -->
</header>

<?php
  $table_name_array = query_select_and_fetch($conn, 'information_schema.tables', 'table_name', array('table_schema' => 'SI_SERVICE_BIBLIOTHEQUE'), '=');

  user_delete_from_table($conn, $table_name_array);

  print_every_table($conn, $table_name_array);
?>

  </body>
</html>

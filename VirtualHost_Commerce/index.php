<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Commerce</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>

  <body>
    <?php require('db.php'); ?>

    <header> <!-- Website's Header => It will contains Title and main informations -->
      <span>COMMERCE</span>
    </header>

    <nav> <!-- Website's navigation bar => It will contains link to log in, log out, [...] -->
      <div class="db_connect">
        <?php
          echo "<label for='database_select'>Base de donnée : </label>";
          echo "<select name='database_select'>";
            echo "<option value='commerce_cours'>Commerce Cours</option>";
            echo "<option value='0'>...</option>";
          echo "</select>";
          echo "<input type='button' value='Connect' class='connect_db_button'>";
        ?>
      </div>
      <div class="log">
        <a href="#">Sign In</a>
        <a href="#">Log In</a>
      </div>
    </nav>
<center>
    <div class="form_container">
      <form class="form_select_db" id="form_database" action="#" method="get">
        <fieldset name="DB_FSet">

          <legend>Commerce</legend>
          <fieldset>
            <legend>Selection des Information(s) Client</legend>

            <?php
            $conn = db_connect();
              echo "<select name='nom_client'>";
                echo "<option value=''>Nom Client</option>";
                $req = query_select("client", "NOM");
                foreach ($conn->query($req) as $row) {
                  echo "<option value='".$row['NOM']."'>".$row['NOM']."</option>";
                }
              echo "</select>";

              echo "<select name='localite_client'>";
                echo "<option value=''>Localite Client</option>";
                $req = query_select("client", "LOCALITE");
                foreach ($conn->query($req) as $row) {
                  echo "<option value='".$row['LOCALITE']."'>".$row['LOCALITE']."</option>";
                }
              echo "</select>";

              echo "<select name='date_com'>";
              echo "<option value=''>Date Commande</option>";
                $req = query_select("commande", "DDC");
                foreach ($conn->query($req) as $row) {
                  echo "<option value='".$row['DDC']."'>".$row['DDC']."</option>";
                }
              echo "</select>";

              echo "<select name='produit'>";
                echo "<option value=''>Designation Produit</option>";
                $req = query_select("produit", "DESIGNATION");
                foreach ($conn->query($req) as $row) {
                  echo "<option value='".$row['DESIGNATION']."'>".$row['DESIGNATION']."</option>";
                }
              echo "</select>";
            ?>
          </fieldset>
          <div class="form_buttons">
            <input type="reset" name="c_reset" value="reset">
            <input type="submit" name="c_submit"  value="submit">
          </div>
        </fieldset>
      </form>
    </div>

    <?php
    if(isset($conn))
    {
      if(!empty($_GET['nom_client']))
      {
        $req = "SELECT * FROM client WHERE NOM='".$_GET['nom_client']."'";
        $stmt = $conn -> prepare($req);
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
      if(!empty($_GET['localite_client']))
      {
        $req = "SELECT * FROM client WHERE LOCALITE='".$_GET['localite_client']."'";
        $stmt = $conn -> prepare($req);
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
      if(!empty($_GET['date_com']))
      {
        $req = "SELECT * FROM commande WHERE DDC='".$_GET['date_com']."'";
        $stmt = $conn -> prepare($req);
        $stmt -> execute();

        echo "<div id='table-container-div' class='table-client-container'>";
        echo "<br><table id='tableClient' class='tab'>";
        echo "<thead>";
        echo "<caption>INFORMATIONS DES CLIENTS</caption>";
        echo "<tr>";
        echo "<th>NUMERO COMMANDE</th>";
        echo "<th>NUMERO CLIENT</th>";
        echo "<th>DATE DE COMMANDE</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($stmt as $comm) {
            echo "<tr>";
            echo "<td>".$comm["NUM_COMMANDE"]."</td>";
            echo "<td>".$comm["NUM_CLIENT"]."</td>";
            echo "<td>".$comm["DDC"]."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
      }
      if(!empty($_GET['produit']))
      {
        $req = "SELECT * FROM produit WHERE DESIGNATION='".$_GET['produit']."'";
        $stmt = $conn -> prepare($req);
        $stmt -> execute();
        echo "<div id='table-container-div' class='table-client-container'>";
        echo "<br><table id='tableClient' class='tab'>";
        echo "<thead>";
        echo "<caption>INFORMATIONS DES CLIENTS</caption>";
        echo "<tr>";
        echo "<th>NUMERO PRODUIT</th>";
        echo "<th>DESIGNATION</th>";
        echo "<th>PRIX_UHT</th>";
        echo "<th>QUANTITE EN STOCK</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
          foreach ($stmt as $produit) {
           echo "<tr>";
            echo "<td>".$produit["NUM_PRODUIT"]."</td>";
            echo "<td>".$produit["DESIGNATION"]."</td>";
            echo "<td>".$produit["PRIX_UHT"]."</td>";
            echo "<td>".$produit["QUANTITIE_STOCK"]."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
      }

      if(empty($_GET['nom_client']) && empty($_GET['localite_client']) && empty($_GET['date_com']) && empty($_GET['produit']))
      {
        $req = "SELECT * FROM commande";
        $stmt = $conn -> prepare($req);
        $stmt -> execute();
        echo "<div id='table-container-div' class='table-client-container'>";
        echo "<br><table id='tableClient' class='tab'>";
        echo "<thead>";
        echo "<caption>INFORMATIONS DES CLIENTS</caption>";
        echo "<tr>";
        echo "<th>NUMERO COMMANDE</th>";
        echo "<th>NUMERO CLIENT</th>";
        echo "<th>DATE DE COMMANDE</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($stmt as $comm) {
            echo "<tr>";
            echo "<td>".$comm["NUM_COMMANDE"]."</td>";
            echo "<td>".$comm["NUM_CLIENT"]."</td>";
            echo "<td>".$comm["DDC"]."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
      }
    }
    ?>

</center>
    <footer> <!-- Website's footer => It will contains all the informations about the website's owner and contact, policy etc.. -->
    </footer>

  </body>
</html>

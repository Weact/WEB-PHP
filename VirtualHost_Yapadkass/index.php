<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Commerce</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>

  <body>
    <header> <!-- Website's Header => It will contains Title and main informations -->
      <span>COMMERCE</span>
    </header>

    <nav> <!-- Website's navigation bar => It will contains link to log in, log out, [...] -->
      <div class="log">
        <a href="#">Sign In</a>
        <a href="#">Log In</a>
      </div>
    </nav>

    <div class="form_container">
      <form class="form_select_db" id="form_database" action="action.php" method="get">
        <fieldset name="DB_FSet">

          <legend>Commerce</legend>
          <fieldset>
            <legend>Selection des Information(s) Client</legend>
            <label for="s_nom">Selectionner Nom</label><br>
              <input type="checkbox" name="s_nom" value="nomSelected" id="cb_nom">
              <br>
            <label for="s_localite">Selectionner Localite</label><br>
              <input type="checkbox" name="s_localite" value="localiteSelected" id="cb_loc">
              <br>
            <label for="s_ddn">Selectionner Date de Naissance</label><br>
              <input type="checkbox" name="s_ddn" value="ddnSelected" id="cb_ddn">
              <br>
            <label for="s_prod">Selectionner Produit</label><br>
              <input type="checkbox" name="s_prod" value="produitSelected" id="cb_prod">
              <br>
          </fieldset>
          <div class="form_buttons">
            <input type="reset" name="c_reset" value="reset">
            <input type="button" name="c_submit"  value="submit" onclick="verif();">
          </div>
        </fieldset>
      </form>
    </div>
<?php require('db.php'); ?>
    <footer> <!-- Website's footer => It will contains all the informations about the website's owner and contact, policy etc.. -->
    </footer>

  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
    <script defer type="text/javascript" src="script.js"></script>
  </head>
  <body onload="init();">

    <div class="header" id="header">
      <h1>WebForm</h1>
    </div>
    <div class="form-box" id="display_user_info" style="width: 1000px;">
      <div class="form-box">
        <p id="p_username"></p>
      </div>
      <div class="form-box">
        <p id="p_password"></p>
      </div>
      <div class="form-box">
        <p id="p_name"></p>
      </div>
      <div class="form-box">
        <p id="p_fname"></p>
      </div>
      <div class="form-box">
        <p id="p_email"></p>
      </div>
      <div class="form-box">
        <p id="p_age"></p>
      </div>
      <div class="form-box">
        <p id="p_gender"></p>
      </div>
      <div class="form-box">
        <p id="p_size"></p>
      </div>
      <div class="form-box">
        <p id="p_weight"></p>
      </div>
      <div class="form-box">
        <p id="p_music"></p>
      </div>
    </div>
    <form name="user_informations" id="myForm" class="user_infos" method="get" action="#">
      <div class="form-box">
        <label for="username">Nom de compte:</label>
        <input type="text" name="username" id="user_username" placeholder="Entrez votre nom de compte*" maxlength="30">
      </div>
      <div class="form-box">
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="user_password" placeholder="Entrez votre mot de passe*" maxlength="16">
      </div>
      <div class="form-box">
        <label for="user_name">Prenom: </label>
        <input type="text" name="user_name" id="user_name" placeholder="Entrez votre prénom*" maxlength="16">
      </div>
      <div class="form-box">
        <label for="user_firstname">Nom: </label>
        <input type="text" name="user_firstname" id="user_firstname" placeholder="Entrez votre nom*" maxlength="32">
      </div>
      <div class="form-box">
        <label for="user_birthdate">Date de naissance: </label>
        <input type="date" name="user_birthdate" id="user_birthdate">
      </div>
      <div class="form-box">
        <label for="user_gender">Genre: </label>
        <select name="user_gender" id="user_gender">
          <option value="H">Homme</option>
          <option value="F">Femme</option>
          <option value="A">Autre</option>
          <option value="~" selected>Selectionnez un genre</option>
        </select>
      </div>
      <div class="form-box">
        <label for="size">Taille (cm):</label>
        <input type="number" name="size" id="user_size" placeholder="180*" required>
      </div>
      <div class="form-box">
        <label for="weight">Poids (kg):</label>
        <input type="number" name="weight" id="user_weight" placeholder="80*" required>
      </div>
      <div class="form-box">
        <label for="user_email">Email: </label>
        <input type="email" name="user_email" id="user_email" placeholder="votre.email@service.domaine*">
      </div>
      <div class="form-box">
        <label for="song-gend-select">Genre de Musique recherché :</label>
        <select id="song_gender_selection" class="song-gend-select" name="song-gend-select" onChange="inform_user_select_menu();">
          <option value="pop">Pop</option>
          <option value="kpop">K-Pop</option>
          <option value="jpop">J-Pop</option>
          <option value="rap">Rap</option>
          <option value="classique">Classique</option>
          <option value="dubstep">Dubstep</option>
          <option value="electro">Electro</option>
          <option value="autre" selected>Autre</option>
        </select>
      </div>
        <div class="form-box" id="checkbox-selector">
        <!-- WARNING: DO NOT MODIFY THE CLASS CHECKBOX-SELECT NAME OR JS WONT WORK -->
        <label>Sports pratiqué(s) :</label><br>
          <label for="Basketball">Basketball</label>
            <input class="CHECKBOX-SELECT" type="checkbox" name="Basketball" value="Basketball"><br>
          <label for="Football">Football</label>
            <input class="CHECKBOX-SELECT" type="checkbox" name="Football" value="Football"><br>
          <label for="Handball">Handball</label>
            <input class="CHECKBOX-SELECT" type="checkbox" name="Handball" value="Handball"><br>
          <label for="Natation">Natation</label>
            <input class="CHECKBOX-SELECT" type="checkbox" name="Natation" value="Natation"><br>
          <label for="Rugby">Rugby</label>
            <input class="CHECKBOX-SELECT" type="checkbox" name="Rugby" value="Rugby"><br>
      </div>
      <div class="form-box">
        <input id="sbmbutton" type="button" value="Envoyer" onclick="validate_form();"><br><br>
        <input id="rstbutton" type="reset" value="Réinitialiser"><br>
      </div>
    </form>
    <footer>
      <a href="forms.php" class="footer-link">Reset page</a>
    </footer>

  </body>
</html>

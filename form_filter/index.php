<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
    <script defer type="text/javascript" src="script.js"></script>
  </head>
  <body>

    <div class="header" id="header">
      <h1>WebForm</h1>
    </div>
    <form name="user_informations" id="myForm" class="user_infos" method="get" action="traitement.php">
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
        <input type="hidden" name="user_age" id="user_age" value="0">
      </div>
      <div class="form-box">
        <label for="user_gender">Genre: </label><br>
        <span>Homme</span>
        <input type="radio" name="user_gender" id="user_gender_homme" value="Homme">
        <span>Femme</span>
        <input type="radio" name="user_gender" id="user_gender_femme" value="Femme">
        <span>Autre</span>
        <input type="radio" name="user_gender" id="user_gender_autre" value="Autre">
      </div>
      <div class="form-box">
        <label for="user_email">Email: </label>
        <input type="email" name="user_email" id="user_email" placeholder="votre.email@service.domaine*">
      </div>
      <div class="form-box">
        <label for="song-gend-select">Genre de Musique recherché :</label>
        <br><br><span id="current_selection_displayer" class="selection_displayer"></span><br><br>
        <select id="song_gender_selection" class="song-gend-select" name="song_gend_select[]" multiple onChange="inform_user_songGender();">
          <option value="pop">Pop</option>
          <option value="kpop">K-Pop</option>
          <option value="jpop">J-Pop</option>
          <option value="autre" selected>Autre</option>
        </select>
      </div>
      <div class="form-box">
        <label for="user_sport">Sport(s) déjà pratiqué(s): </label><br>
        <br><br><span id="current_sports_displayer" class="selection_displayer"></span><br><br>
        <br><span>Basketball</span><input type="checkbox" name="user_sport[]" value="Basketball" onchange="inform_user_sportSelected('user_sport')"><br>
        <br><span>Football</span><input type="checkbox" name="user_sport[]" value="Football" onchange="inform_user_sportSelected('user_sport')"><br>
        <br><span>Handball</span><input type="checkbox" name="user_sport[]" value="Handball" onchange="inform_user_sportSelected('user_sport')"><br>
        <br><span>Natation</span><input type="checkbox" name="user_sport[]" value="Natation" onchange="inform_user_sportSelected('user_sport')"><br>
        <br><span>Tennis</span><input type="checkbox" name="user_sport[]" value="Tennis" onchange="inform_user_sportSelected('user_sport')"><br>
      </div>
      <div class="form-box">
        <label for="user_weburl">Site: </label>
        <input type="text" name="user_url" id="user_url" placeholder="http(s)://www.votreurl.domaine">
      </div>
      <div class="form-box">
        <input id="hiddenInput" type="hidden" value="1" name="FormSubmitted">
        <input id="sbmbutton" type="button" value="Envoyer" onclick="validate_form();"><br><br>
        <input id="rstbutton" type="reset" value="Réinitialiser"><br>
      </div>
    </form>
    <footer>
      <a href="index.php" class="footer-link">Reset page</a>
    </footer>

  </body>
</html>

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

    <?php
      if(isset($_GET['FormSubmitted'])){

        // $username = htmlspecialchars($_GET['username']);
        // $password = htmlspecialchars($_GET['password']);
        // $user_name = htmlspecialchars($_GET['user_name']);
        // $user_firstname = htmlspecialchars($_GET['user_firstname']);
        // $user_email = htmlspecialchars($_GET['user_email']);
        // $user_birthdate = htmlspecialchars($_GET['user_birthdate']);
        // $user_age = htmlspecialchars($_GET['user_age']);
        // $user_gender = htmlspecialchars($_GET['user_gender']);
        // $user_songselect = htmlspecialchars(strtoupper($_GET['song-gend-select']));

        echo "SUCCESS<br>";
        if(filter_input(INPUT_GET,'user_email',FILTER_VALIDATE_EMAIL)){
          echo "EMAIL RIGHT";
        }else{
          echo "EMAIL WRONG";
        }
        $filter_username = filter_input(INPUT_GET,htmlspecialchars('username'),FILTER_SANITIZE_SPECIAL_CHARS);
        $filter_password = filter_input(INPUT_GET,htmlspecialchars('password'),FILTER_SANITIZE_SPECIAL_CHARS);
        $filter_name = filter_input(INPUT_GET,htmlspecialchars('user_name'),FILTER_SANITIZE_SPECIAL_CHARS);
        $filter_firstname = filter_input(INPUT_GET,htmlspecialchars('user_firstname'),FILTER_SANITIZE_SPECIAL_CHARS);
        $filter_birthday = filter_input(INPUT_GET,htmlspecialchars('user_birthdate'),FILTER_SANITIZE_NUMBER_INT);
        $filter_age = filter_input(INPUT_GET,htmlspecialchars('user_age'),FILTER_SANITIZE_NUMBER_INT);
        $filter_email = filter_input(INPUT_GET,htmlspecialchars('user_email'),FILTER_VALIDATE_EMAIL);
        $filter_email_post = filter_input(INPUT_POST,htmlspecialchars('user_email'),FILTER_VALIDATE_EMAIL);
        $filter_music= filter_input(INPUT_GET,htmlspecialchars('song_gend_select'),FILTER_SANITIZE_SPECIAL_CHARS);
        $filter_gender = filter_input(INPUT_GET,htmlspecialchars('user_gender'),FILTER_SANITIZE_SPECIAL_CHARS);

        //PARTIE 'REPONSE' PDF
        echo "<center><div class='answer_question'>";
        echo '<br><b>Extract($_GET): '.extract($_GET).'</b><br><br>';
        echo "<br>L'extract permet de pouvoir utiliser les variables récupérés par le \$_GET sans devoir y passer.";
        echo "<br>C'est à dire qu'on extrait les variables présentes dans un tableau.";
        echo "<br><br><strong class='warning_extract'>ATTENTION: A ne pas utiliser sur des variables entrées utilisateurs comme \$_GET \$_POST ou encore \$_FILES</strong><br><br>";
        echo "Si le formulaire est en <em>GET</em> ou <em>POST</em> et qu'on utilise un INPUT_GET ou INPUT_POST qui ne correspond pas à cette méthode, il ne va rien afficher.<br>";
        echo "Si votre email n'apparaît pas avant <em>(INPUT_GET)</em>, c'est que votre adresse est invalide -> Grace aux filtres<br><br>";
        echo "<em>filter_input</em> sera préférable a <em>filter_var</em> car <em>filter_input</em> peut automatiquement gérer si un champ est vide ou set.<br>";
        echo "Avec <em>filter_var</em>, il faudrait ajouter <em>if(isset(...))</em> si l'on voulait le faire correctement.";
        echo "</div></center>";

        echo  '<div class="form-box" id="display_user_info" style="width: 1000px;">';
        echo  '<div class="form-box">';
        echo  '<p id="p_username">Votre pseudo: '.$filter_username.'</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_password">Votre mot de passe est: '.$filter_password.'</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_name">Votre prénom est: '.$filter_name.'</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_fname">Votre nom est: '.$filter_firstname.'</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_email">Votre email est: '.$filter_email.'(INPUT_GET) et '.$filter_email_post.'(INPUT_POST)</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_age">Ta date d\'anniversaire:(AAAA/MM/JJ) '.$filter_birthday.'. Tu as: '.$filter_age.' ans</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_gender">Tu t\'es reconnu(e) en tant que: '.$filter_gender.'</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_music">Tu as choisi: '.$filter_music.' comme style de musique préféré</p>';
        echo  '</div>';
        echo  '</div>';
      }else{
        echo "Form datas have not been received";
      }
     ?>

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
        <input type="hidden" name="user_age" id="user_age" value="0">
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
        <label for="user_email">Email: </label>
        <input type="email" name="user_email" id="user_email" placeholder="votre.email@service.domaine*">
      </div>
      <div class="form-box">
        <label for="song-gend-select">Genre de Musique recherché :</label>
        <select id="song_gender_selection" class="song-gend-select" name="song_gend_select" onChange="inform_user_select_menu();">
          <option value="pop">Pop</option>
          <option value="kpop">K-Pop</option>
          <option value="jpop">J-Pop</option>
          <option value="autre" selected>Autre</option>
        </select>
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

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
  $filter_username = filter_input(INPUT_GET,htmlspecialchars('username'),FILTER_SANITIZE_SPECIAL_CHARS);
  $filter_password = filter_input(INPUT_GET,htmlspecialchars('password'),FILTER_SANITIZE_SPECIAL_CHARS);
  $filter_name = filter_input(INPUT_GET,htmlspecialchars('user_name'),FILTER_SANITIZE_SPECIAL_CHARS);
  $filter_firstname = filter_input(INPUT_GET,htmlspecialchars('user_firstname'),FILTER_SANITIZE_SPECIAL_CHARS);
  $filter_birthday = filter_input(INPUT_GET,htmlspecialchars('user_birthdate'),FILTER_SANITIZE_NUMBER_INT);
  $filter_age = filter_input(INPUT_GET,htmlspecialchars('user_age'),FILTER_SANITIZE_NUMBER_INT);
  $filter_email = filter_input(INPUT_GET,htmlspecialchars('user_email'),FILTER_VALIDATE_EMAIL);
  $filter_email_post = filter_input(INPUT_POST,htmlspecialchars('user_email'),FILTER_VALIDATE_EMAIL);
  $filter_url = filter_input(INPUT_GET,htmlspecialchars('user_url'),FILTER_VALIDATE_URL);
  $filter_gender = filter_input(INPUT_GET,htmlspecialchars('user_gender'),FILTER_SANITIZE_SPECIAL_CHARS);
 ?>
  <head>
    <meta charset="utf-8">
    <title><?php echo $filter_username ?></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      if(isset($_GET['FormSubmitted'])){
        echo "SUCCESS<br>";

        if($filter_email)
        echo "EMAIL RIGHT<br>";
        else echo "EMAIL WRONG<br>";

        if($filter_url)
        echo "URL RIGHT<br>";
        else echo "URL WRONG<br>";

        $STRING_userSongGenders = "Tu as choisi: ";
        if(isset($_GET['song_gend_select'])){
          foreach ($_GET['song_gend_select'] as $songGender) {
            $STRING_userSongGenders = $STRING_userSongGenders . " " . $songGender;
          }
        }else{
          $STRING_userSongGenders = "Nous n'avons pas pu déterminer vo(s)tre style(s) de musique préféré(s)";
        }

        $STRING_userSportSelection = "Vous avez pratiqué: ";
        if(isset($_GET['user_sport'])){
          foreach ($_GET['user_sport'] as $sport) {
            $STRING_userSportSelection = $STRING_userSportSelection . " " . $sport;
          }
        }else{
          $STRING_userSportSelection = "Nous n'avons pas pu déterminer le(s) sport(s) pratiqué(s)";
        }

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
        echo  '<p id="p_uurl">L\'URL de votre site est: '.$filter_url.'</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_age">Ta date d\'anniversaire:(AAAA/MM/JJ) '.$filter_birthday.'. Tu as: '.$filter_age.' ans</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_gender">Tu t\'es reconnu(e) en tant que: '.$filter_gender.'</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_music">'.htmlspecialchars($STRING_userSongGenders).'</p>';
        echo  '</div>';
        echo  '<div class="form-box">';
        echo  '<p id="p_sport">'.htmlspecialchars($STRING_userSportSelection).'</p>';
        echo  '</div>';
      }else{
        echo "Form datas have not been received";
      }
     ?>
  </body>
</html>

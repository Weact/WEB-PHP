<!DOCTYPE html>

<html lang = "fr">
    <head>
        <meta charset= "utf-8">
        <title>Utilisateur</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
  <body>
    <?php
      if(isset($_GET['form_submit'])){

        if(isset($_GET['U_Prenom']) && isset($_GET['U_Nom']) && isset($_GET['U_Email']) && isset($_GET['U_DDN']) && isset($_GET['U_Poids']) && isset($_GET['U_Taille']))
        {
            // Retrieve the form data by using the element's name attributes value as key
            $firstname = $_GET['U_Prenom'];
            $lastname = $_GET['U_Nom'];
            $email = $_GET['U_Email'];
            $DDN = $_GET['U_DDN'];
            $poids = $_GET['U_Poids'];
            $taille = $_GET['U_Taille'];
            $imc = $poids / ( ($taille / 100) * ($taille / 100) );

            // Display the results
            echo('<div>Votre nom est '.$lastname.' '.$firstname.'</div>');
            echo('<div>Votre email est '.$email.'</div>');
            echo('<div>Votre date de naissance est: '.$DDN.'</div>');
            echo('<div>Votre taille : '.($taille / 100).'m. Votre Poids : '.$poids.'kg. </div>');
            echo('<div>Votre IMC :'.$imc.'.</div>');
            exit;
        }

      }
    ?>
  </body>
</html>

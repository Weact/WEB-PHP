<?php
/*                          *
*      LUDUS  ACADEMIE      *
*    OWNER : DRUCKES Lucas  *
*      WEACT     2020       *
*   PHP FILE FOR  INDEX.PHP *
*          YAPADKASS        *
*                           */
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In - YAPADKASS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signup.css">
  </head>
  <body>
        <?php
        require('db.php');
        $conn = db_connect();
        ?>

        <header> <!-- Website's Header => It will contains Title and main informations -->
        </header>
        <div class="login-container">
          <form class="login_form" action="index.php" method="GET">
            <h1>Log In</h1>
            <div class="textbox">
              <img class="i-icon i-uname" src="user-tie-solid.svg" alt="user-tie" title="Username">
              <input type="text" class="txtuser" placeholder="Username" name="client-username" value="">
            </div>
            <div class="textbox">
              <img class="i-icon i-psw" src="key-solid.svg" alt="key" title="Password">
              <input type="password" class="txtuser" placeholder="Password" name="client-password" value="">
            </div>
            <input type="checkbox" class="checkbox" name="admin-switch" value="admin" title="Admin?">
            <input class="btn" type="submit" name="login-btn" value="Log Up">
          </form>
        </div>

        <footer> <!-- Website's footer => It will contains all the informations about the website's owner and contact, policy etc.. -->
          <table>
            <tr>
              <td>Email Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></td>
            </tr>
            <tr>
              <td>Confirm Password Icon made by <a href="https://www.flaticon.com/authors/those-iconse" title="Those Icons">Those Icons</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></td>
            </tr>
          </table>
        </footer>

  </body>
</html>

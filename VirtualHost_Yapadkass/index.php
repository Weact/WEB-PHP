<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YAPADKASS</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>

  <body>
  <?php
      require('db.php');
      require('request.php');
      $conn = db_connect();

      if(isset($_GET['signup-btn']))
      {
          $u_name = $_GET['client-name'];
          $u_username = $_GET['client-username'];
          $u_email = $_GET['client-email'];
          $u_pwd = $_GET['client-password'];
          $u_pwdconf = $_GET['client-confirm'];
          $u_adresse = $_GET['client-adresse'];
          $u_adm = (isset($_GET['admin-switch'])) ? $u_adm = "TRUE" : $u_adm = "FALSE" ;

          $u_date = date("Y-m-d");
          echo $u_date;
          echo gettype($u_date);

          if(empty($u_name) || empty($u_email) || empty($u_pwd) || empty($u_pwdconf) || empty($u_adresse))
          {
            header("location:signup.php?");
          }
          else if($u_pwd != $u_pwdconf){
            header("location:signup.php?");
          }else{
            insert_client($conn, $u_name, $u_adresse, $u_username, $u_pwd, $u_date, $u_email, $u_adm);
          }
      }
?>

    <header> <!-- Website's Header => It will contains Title and main informations -->
      <span>YAPADKASS</span><br>
      <!--<input type="button" class="btn_con_db" name="btn-con-db" value="Database Connection">-->
      <?php
      if(isset($u_name))
      {
        echo "<span class='welcome-msg'>WELCOME " .$u_name. " !</span>";
      }
      ?>
    </header>

    <nav> <!-- Website's navigation bar => It will contains link to log in, log out, [...] -->
      <div class="log">
        <a href="signup.php">Sign Up</a>
        <a href="login.php">Log In</a>
        <?php
          if(isset($u_name)){
            echo "<a href='index.php?'>Log Out</a>";
          }
        ?>
      </div>
    </nav>

    <div class="client-container">
      <?php select_client($conn); ?>
    </div>

    <footer> <!-- Website's footer => It will contains all the informations about the website's owner and contact, policy etc.. -->
      <a href="index.php?" class="ftr-reset-page">Reset</a>
    </footer>

  </body>
</html>

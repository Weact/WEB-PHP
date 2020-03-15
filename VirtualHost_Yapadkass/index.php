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
      $conn = db_connect();

      if(isset($_POST['signup-btn']))
      {
        if($_POST['has_submited'] == 0)
        {
          $u_name = $_POST['client-username'];
          $u_email = $_POST['client-email'];
          $u_pwd = $_POST['client-password'];
          $u_pwdconf = $_POST['client-confirm'];

          if(empty($u_name) || empty($u_email) || empty($u_pwd) || empty($u_pwdconf))
          {
            header("location:signup.php?");
          }
          else if($u_pwd != $u_pwdconf){
            header("location:signup.php?");
          }else{
          $_POST['has_submited'] = 1;
          insert_client_profil($conn, $u_name, $u_pwd);
          }
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
        <a href="#">Log In</a>
        <?php
          if(isset($u_name)){
            echo "<a href='index.php?'>Log Out</a>";
          }
        ?>
      </div>
    </nav>

    <div class="client-container">
      <?php select_client_profil($conn); ?>
    </div>

    <footer> <!-- Website's footer => It will contains all the informations about the website's owner and contact, policy etc.. -->
      <a href="index.php?" class="ftr-reset-page">Reset</a>
    </footer>

  </body>
</html>

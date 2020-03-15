<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YAPADKASS</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>

  <body>
    <?php require('db.php'); ?>

    <header> <!-- Website's Header => It will contains Title and main informations -->
      <span>YAPADKASS</span>
      <input type="button" name="btn-con-db">
    </header>

    <nav> <!-- Website's navigation bar => It will contains link to log in, log out, [...] -->
      <div class="log">
        <a href="#">Sign In</a>
        <a href="#">Log In</a>
      </div>
    </nav>
    
    <footer> <!-- Website's footer => It will contains all the informations about the website's owner and contact, policy etc.. -->
    </footer>

  </body>
</html>

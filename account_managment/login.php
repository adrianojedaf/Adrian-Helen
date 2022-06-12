<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: http://localhost/HHS%20Projekt%20-%20Adrian%20und%20Helen/');
  }
  
  require 'db.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    echo $results;
    
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header('location: http://localhost/HHS%20Projekt%20-%20Adrian%20und%20Helen/');
    } else {
      $message = 'Es tut uns leid. Benutzername oder Passwort nicht gefunden.';
    }
  }

?>


<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <!--Page Titel-->
    <title>COOTER Einloggen</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!--Page Favicon--> 
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <!--CSS Dateien-->
    <link href="../styles/general.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/variables.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/anmeldung.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/typography.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/footer.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/content-wrap.css" rel="stylesheet" type="text/css"/>
  </head>
  
  <body>
    <div class="anmeldung-container">
      <div class="anmeldung">

        <?php if(!empty($message)): ?>
            <center><p> <?= $message ?></p></center>
        <?php endif; ?>

        <h2>Xcooter</h2>
        <center>oder <a href="register.php">Registrieren</a></center>

        <form action="login.php" method="post">
          <label for="email">Email:</label>
          <input class="feld" type="email" name="email">

          <label for="password">Passwort:</label>
          <input class="feld" type="password" name="password" required>

          <input class="button" type="submit" value="Send"><br>
        </form>
          
          <a class="link-to-page" href="../index.php">Homepage</a>
      </div>
    </div>
  </body>
</html>
  
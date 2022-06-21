<?php
  // php-Fehlermeldung entfernen, um zu verhindern, dass html-Speicherplatz belegt wird
  error_reporting(E_ERROR | E_PARSE);

  require 'db.php';

  $messageError = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      require 'login.php';
    } else {
      $messageError = 'Es tut uns leid. Bei der Registrierung ist ein Fehler aufgetreten.';
    }
  }
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <!--Page Titel-->
    <title>COOTER Registrierung</title>
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

        <?php  if(!empty($messageError)): ?>
          <center><p><?= $messageError ?></p></center>
        <?php endif; ?>

        <h2>Xcooter</h2>
        <h4>Registrieren</h4>
        <center>oder <a href="login.php">Einloggen</a></center>

        <form action="register.php" method="post">
          <label for="username">Username:</label>
          <input class="feld" type="text" name="username">
      
          <label for="email">Email:</label>
          <input class="feld" type="email" name="email" required>

          <label for="password">Passwort:</label>
          <input class="feld" type="password" name="password" required>

          <input class="button" type="submit" value="Profil jetzt erstellen"><br>
        </form>
          
          <a class="link-to-page" href="../index.php">Homepage</a>
      </div>
    </div>

  </body>
</html>
  
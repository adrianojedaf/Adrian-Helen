<?php
  // php-Fehlermeldung entfernen, um zu verhindern, dass html-Speicherplatz belegt wird
  error_reporting(E_ERROR | E_PARSE);

  $scooter_name = $_POST['scooter'];
  $startzeit = $_POST['startzeit'];
  $endzeit = $_POST['endzeit'];
  
  session_start();
  require 'db.php';
  
  if (isset($_SESSION['user_id'])) {
      $records = $conn->prepare('SELECT id, username, email, password FROM users WHERE id = :id');
      $records->bindParam(':id', $_SESSION['user_id']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);
      
      $user = null;
      
      if (count($results) > 0) {
          $user = $results;
        }
    } else {
        header('location: http://localhost/xcooter/account_managment/login.php');
    }
    
    $user_email = $user['email'];
    
    if (!empty($scooter_name)) {
        $sql = "INSERT INTO reservierungen (user_email, modell, startzeit, endzeit) VALUES (:email, :modell, :startzeit, :endzeit)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $user_email);
        $stmt->bindParam(':modell', $scooter_name);
        $stmt->bindParam(':startzeit', $startzeit);
        $stmt->bindParam(':endzeit', $endzeit);
        $stmt->execute();
    }
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <!--Meta Tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Scooterverleih in Karlsruhe">
    <!--Page Titel-->
    <title>COOTER</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!--Page Favicon-->
    <link rel="icon" type="../image/x-icon" href="/images/favicon.png">
    <!--CSS Dateien-->
    <link href="../styles/content-wrap.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/general.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/navigation.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/typography.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/variables.css" rel="stylesheet" type="text/css"/>
    <link href="../styles/footer.css" rel="stylesheet" type="text/css"/>
  </head>
  
  <body>
    <header>
        <nav>
            <div class="content-wrap content-wrap-max">
            <a href="../index.php"><image src="../images/logo.png" class="logo" alt="logo"></a>
            <ul>
                <?php if(!empty($user)): ?>
                    <li><a class="anmelden" href="logout.php"><span>logout</span><img src="../images/icons/login.png" class="logout-icon" alt="Anmelden icon"></a></li>
                <?php else: ?>
                    <li><a class="anmelden" href="register.php"><span>Anmelden</span><img src="../images/icons/login.png" class="login-icon" alt="Anmelden icon"></a></li>
                <?php endif; ?>  
            </ul>

            </div>
        </nav>
    </header>

    <main>
        <?php if (!empty($scooter_name) && !empty($startzeit) && !empty($endzeit)): ?>
            <div class="content-wrap content-wrap-max">
                <div class="reservierungsdaten">
                    <?php echo '<h3>Ihre Buchungsdaten:</h3> <br>'?>
                    <?php echo 'Nutzer: ' . $user_email . '. <br><br>' ?>
                    <?php echo 'Sie haben erfolgreich den E-Scooter: ' . '<strong>' . $scooter_name . '</strong>' . ' gebucht. <br>' ?>    
                    <?php echo 'Buchung <strong>von</strong>: ' . $startzeit . '. ' . '<strong>bis</strong>: ' . $endzeit . '.<br><br>'?> 
                    <a class="link-to-page" href="../index.php">Homepage</a>    
                </div>
            <div>
        <?php else: ?>
            <div class="content-wrap content-wrap-max">
                <div class="reservierungsdaten">
                    <?php echo 'Sie haben keinen E-Scooter oder Buchungszeit ausgewählt. Bitte wählen Sie zunächst einen E-Scooter und den Buchungszeitraum aus, um eine Buchung vorzunehmen. <br><br>'?>
                    <a class="link-to-page" href="../index.php">Homepage</a>  
                </div>
            <div>
        <?php endif; ?>
    </main>

    <!--FOOTER-->
    <footer>
      <div class="content-wrap content-wrap-max">
        <div class="footer-wrap">
          <ul class="kontakt">
            <li>Kontakt</li>
            <li><img src="../images/icons/viber.png"  alt="Telefon icon">+49 05226 10 00 51</li>
            <li><img src="../images/icons/email.png"  alt="email icon"><a href="mailto:xcooter@gmail.com" target="_blank">xcooter@gmail.com</a></li>
            <li><img src="../images/icons/time.png"  alt="Uhr icon">Mo-Sa von 9:00-20:00 Uhr</li>
          </ul>
          <ul class="Kundenkonto">
            <li>kundenkonto</li>
            <li><a href="register.php">Anmelden</a></li>
          </ul>
          <ul class="informationen">
            <li>Informationen</li>
            <li><a href="../impressum.php">Impressum</a></li>
          </ul>
          <ul class="payment">
            <li>Sichere Zahlung</li>
            <li><img src="../images/payment.png" alt="zahlung möglichkeiten"></li>
          </ul>
        </div>
      </div>
    </footer>
    
  </body>
</html>

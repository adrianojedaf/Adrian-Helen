<?php
  session_start();

  require 'account_managment/db.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, username, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <!--Page Titel-->
    <title>COOTER Impressum</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!--Page Favicon--> 
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <!--CSS Dateien-->
    <link href="styles/content-wrap.css" rel="stylesheet" type="text/css"/>
    <link href="styles/general.css" rel="stylesheet" type="text/css"/>
    <link href="styles/navigation.css" rel="stylesheet" type="text/css"/>
    <link href="styles/typography.css" rel="stylesheet" type="text/css"/>
    <link href="styles/variables.css" rel="stylesheet" type="text/css"/>
    <link href="styles/footer.css" rel="stylesheet" type="text/css"/>
  </head>

  <body>

    <header>
        <nav>
            <div class="content-wrap content-wrap-max">
            <a href="index.php"><image src="images/logo.png" class="logo" alt="logo"></a>
            <ul>
                <?php if(!empty($user)): ?>
                <li><a class="anmelden" href="account_managment/logout.php"><span>logout</span><img src="images/icons/login.png" class="logout-icon" alt="Anmelden icon"></a></li>
                <?php else: ?>
                <li><a class="anmelden" href="account_managment/login.php"><span>Anmelden</span><img src="images/icons/login.png" class="login-icon" alt="Anmelden icon"></a></li>
                <?php endif; ?>  
            </ul>

            </div>
        </nav>
    </header>
    
    <!-- IMPRESSUM -->
    <main class="impressum">
      <div class="content-wrap content-wrap-max">
        <div>
        <h2>Impressum</h2>     
        <p> <b>Xcooter GmbH ??? Scooterverleih </b> <br> Scooterstrasse 7, 76133 Karlsruhe, tel: +49 555-5666-77 </br> <a href="mailto:xcooter@gmail.com"> xcooter@gmail.com </a> </p>
  
        <p> Vertretungsberechtigte Gesch??ftsf??hrer: Adri??n Ojeda Firgau, Helen Finherman.</p>
        
        <p> Registergericht: Amtsgericht Karlsruhe
        Registernummer: AH506743 Umsatzsteuer-Identifikationsnummer gem???? ?? 27 a Umsatzsteuergesetz: DE1045888
        Inhaltlich Verantwortlicher gem???? ?? 55 Abs. 2 RStV: Adri??n Ojeda Firgau, Helen Finherman (Anschrift wie oben)</p>

        <a class="link-to-page" href="index.php">Homepage</a>
        </div>
      </div>
    </main>

    <!--FOOTER-->
    <footer>
      <div class="content-wrap content-wrap-max">
        <div class="footer-wrap">
          <ul class="kontakt">
            <li>Kontakt</li>
            <li><img src="images/icons/viber.png">+49 05226 10 00 51</li>
            <li><img src="images/icons/email.png"><a href="mailto:xcooter@gmail.com" target="_blank">xcooter@gmail.com</a></li>
            <li><img src="images/icons/time.png">Mo-Sa von 9:00-20:00 Uhr</li>
          </ul>
          <ul class="Kundenkonto">
            <li>kundenkonto</li>
            <li><a href="account_managment/login.php">Anmelden</a></li>
          </ul>
          <ul class="informationen">
            <li>Informationen</li>
            <li><a href="impressum.php">Impressum</a></li>
          </ul>
          <ul class="payment">
            <li>Sichere Zahlung</li>
            <li><img src="images/payment.png" alt=""></li>
          </ul>
        </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scroll-down.js"></script>
    <script src="js/side-widget.js"></script>
  </body>
</html>

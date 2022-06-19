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
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <!--CSS Dateien-->
    <link href="styles/content-wrap.css" rel="stylesheet" type="text/css"/>
    <link href="styles/general.css" rel="stylesheet" type="text/css"/>
    <link href="styles/navigation.css" rel="stylesheet" type="text/css"/>
    <link href="styles/typography.css" rel="stylesheet" type="text/css"/>
    <link href="styles/variables.css" rel="stylesheet" type="text/css"/>
    <link href="styles/stage.css" rel="stylesheet" type="text/css"/>
    <link href="styles/side-widgets.css" rel="stylesheet" type="text/css"/>
    <link href="styles/footer.css" rel="stylesheet" type="text/css"/>
    <link href="styles/sponsor.css" rel="stylesheet" type="text/css"/>
    <link href="styles/ueber-uns.css" rel="stylesheet" type="text/css"/>
    <link href="styles/products.css" rel="stylesheet" type="text/css"/>
    <link href="styles/weather.css" rel="stylesheet" type="text/css"/>
  </head>
  
  <body>

    <header>
      <nav>
        <div class="content-wrap content-wrap-max">
          <a href="index.php"><image src="images/logo.png" class="logo" alt="logo"></a>
          <ul>
            <?php if(!empty($user)): ?>
              <li><a class="ueber-uns" href="#about"><span>Über uns</span><img src="images/icons/ueberuns.png" class="about-icon" alt="über uns icon"></a></li>
              <li><a class="produkte" href="#products"><span>Produkte</span><img src="images/icons/shopping.png" class="shopping-icon" alt="Produkte icon"></a></li>
              <li><a class="anmelden" href="account_managment/logout.php"><span>logout</span><img src="images/icons/login.png" class="logout-icon" alt="Anmelden icon"></a></li>
            <?php else: ?>
              <li><a class="ueber-uns" href="#about"><span>Über uns</span><img src="images/icons/ueberuns.png" class="about-icon" alt="über uns icon"></a></li>
              <li><a class="produkte" href="#products"><span>Produkte</span><img src="images/icons/shopping.png" class="shopping-icon" alt="Produkte icon"></a></li>
              <li><a class="anmelden" href="account_managment/register.php"><span>Mein Konto</span><img src="images/icons/login.png" class="login-icon" alt="Anmelden icon"></a></li>
            <?php endif; ?>  
          </ul>

        </div>
      </nav>
      
      <div class="stage">
        <?php if(!empty($user)): ?>
          <br><p class="welcome-user">Herzlich Willkommen, <span><?= $user['username'] ?></span> <img src="images/icons/welcome.png" alt="welcome icon"></p>
        <?php endif; ?> 
                
        <video autoplay muted loop>
          <source src="videos/stage.mp4" type="video/mp4">
        </video>

        <div class="content-wrap content-wrap-medium text">
          <h1>Schonen Sie die <span>Umwelt</span>, genießen Sie die <span>Geschwindigkeit</span> und den  <span>Komfort</span>.</h1>
        </div>
          <button class="stage-button">Mehr erfahren <img src="images/icons/chevron-down.png" alt="Abwärtspfeil icon"></button>
      </div>
    </header>
    
    <main>
      <!-- SIDE-WIDGETS -->
      <div class="social-media-bar">
        <a href="https://www.instagram.com" target="_blank"><img src="images/icons/instagram.png" alt="instagram icon"></a>
        <a href="https://www.facebook.com" target="_blank"><img src="images/icons/facebook.png" alt="facebook icon"></a>
        <a href="https://twitter.com" target="_blank"><img src="images/icons/twitter.png" alt="twitter icon"></a>
      </div>

      <!--UEBER UNS-->
      <div class="content-wrap content-wrap-medium">
        <div class="ueber-uns" id="about">
          <h2>Wir sind <span>Xcooter</span>!</h2>
          <p>Seit 2020 sind wir für Sie da!<br>
          Jetzt können Sie die besten Scooter auf dem heutigen Markt mieten und nutzen. Genießen Sie den besten Service zum besten Preis. Darüber hinaus ist sehr einfach, mit der Nutzung unserer Scooter-Services zu beninnen!</p>
        </div>
      </div>

      <!--UEBER UNS THUMBNAILS-->
      <div class="content-wrap content-wrap-max grid">
        <div class="ueber-uns-items">
          <h3>warum unsere Produkte die besten sind?</h3>

          <div class="items-wrapper">
            <div class="item">
              <div class="image-wrapper">
                <img src="images/ueber-uns-items/price.png" alt="Dollar symbol">
              </div>
              <p class="description">Bester Service zum besten Preis!<br>
                15 Euro pro Tag</p>
            </div>
  
            <div class="item">
              <div class="image-wrapper">
                <img src="images/ueber-uns-items/easy.png" alt="Hand">
              </div>
              <p class="description">Einfach zu mieten und zu benutzen</p>
            </div>
  
            <div class="item">
              <div class="image-wrapper">
                <img src="images/ueber-uns-items/nature.png" alt="Bäume">
              </div>
              <p class="description">Ökologisch und umweltfreundlich.</p>
            </div>

            <div class="item">
              <div class="image-wrapper">
                <img src="images/ueber-uns-items/clock.png" alt="Uhr">
              </div>
              <p class="description">Miete von 1 Tag bis zu einer Woche!</p>
            </div>

          </div>
        </div>
      </div>

      <!---PRODUCTS---->
      <div class="content-wrap content-wrap-max">
        <div class="produkt-container" id="products">
          <h2>UNSERE <span>Xcooter</span>!</h2>
          <div class="produkt-container-wrapper">

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter1.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Stylus</span><br>
                <input type="radio" name="scooter" value="Stylus" id="scooter1">
                <label for="scooter1">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter2.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Heuschrecken</span><br>
                <input type="radio" name="scooter" value="Heuschrecken" id="scooter2">
                <label for="scooter2">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter3.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Bergsteiger</span><br>
                <input type="radio" name="scooter" value="Bergsteiger" id="scooter3">
                <label for="scooter3">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter4.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Fanta Speed</span><br>
                <input type="radio" name="scooter" value="Fanta Speed" id="scooter4">
                <label for="scooter4">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter5.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Delphine</span><br>
                <input type="radio" name="scooter" value="Delphine" id="scooter5">
                <label for="scooter5">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter6.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Stylus evo</span><br>
                <input type="radio" name="scooter" value="Stylus evo" id="scooter6">
                <label for="scooter6">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter7.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Apollo</span><br>
                <input type="radio" name="scooter" value="Apollo" id="scooter7">
                <label for="scooter7">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter8.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Maxsteel</span><br>
                <input type="radio" name="scooter" value="Maxsteel" id="scooter8">
                <label for="scooter8">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter9.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>bad boy</span><br>
                <input type="radio" name="scooter" value="bad boy" id="scooter9">
                <label for="scooter9">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter10.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Blue bird</span><br>
                <input type="radio" name="scooter" value="Blue bird" id="scooter10">
                <label for="scooter10">Escooter auswählen</label>
              </div>
            </div>
    
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter11.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>danger 100</span><br>
                <input type="radio" name="scooter" value="danger 100" id="scooter11">
                <label for="scooter11">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter12.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>vacummix</span><br>
                <input type="radio" name="scooter" value="vacummix" id="scooter12">
                <label for="scooter12">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter13.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Karl Toffel</span><br>
                <input type="radio" name="scooter" value="Karl Toffel" id="scooter13">
                <label for="scooter13">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter14.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>yiiahoo</span><br>
                <input type="radio" name="scooter" value="yiiahoo" id="scooter14">
                <label for="scooter14">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter15.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Clown</span><br>
                <input type="radio" name="scooter" value="Clown" id="scooter15">
                <label for="scooter15">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter16.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Jack</span><br>
                <input type="radio" name="scooter" value="Jack" id="scooter16">
                <label for="scooter16">Escooter auswählen</label>
              </div>
            </div>
            
            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter17.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>sparrow</span><br>
                <input type="radio" name="scooter" value="sparrow" id="scooter17">
                <label for="scooter17">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter18.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>nuggeti</span><br>
                <input type="radio" name="scooter" value="nuggeti" id="scooter18">
                <label for="scooter18">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter19.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>delieberoo</span><br>
                <input type="radio" name="scooter" value="delieberoo" id="scooter19">
                <label for="scooter19">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter20.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>novalue 2000</span><br>
                <input type="radio" name="scooter" value="novalue 2000" id="scooter20">
                <label for="scooter20">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter21.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Black Cosmos</span><br>
                <input type="radio" name="scooter" value="Black Cosmos" id="scooter21">
                <label for="scooter21">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter22.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Blue Cosmos</span><br>
                <input type="radio" name="scooter" value="Blue Cosmos" id="scooter22">
                <label for="scooter22">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter23.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Yoga 1</span><br>
                <input type="radio" name="scooter" value="Yoga 1" id="scooter23">
                <label for="scooter23">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter24.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Pinkachu</span><br>
                <input type="radio" name="scooter" value="Pinkachu" id="scooter24">
                <label for="scooter24">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter25.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Toad</span><br>
                <input type="radio" name="scooter" value="Toad" id="scooter25">
                <label for="scooter25">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter26.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>iamspeed</span><br>
                <input type="radio" name="scooter" value="iamspeed" id="scooter26">
                <label for="scooter26">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter27.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Grandma-ster</span><br>
                <input type="radio" name="scooter" value="Grandma-ster" id="scooter27">
                <label for="scooter27">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter28.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>King boo</span><br>
                <input type="radio" name="scooter" value="King boo" id="scooter28">
                <label for="scooter28">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter29.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Yoga 2</span><br>
                <input type="radio" name="scooter" value="Yoga 2" id="scooter29">
                <label for="scooter29">Escooter auswählen</label>
              </div>
            </div>

            <div class="produkt">
              <div class="image-wrapper">
                <img src="images/scooters/scooter30.jpg" alt="Scooter">
              </div>
              <div class="description">
                <span>Molly</span><br>
                <input type="radio" name="scooter" value="Molly" id="scooter30">
                <label for="scooter30">Escooter auswählen</label>
              </div>
            </div>

            <input type="submit" value="Klicken Sie hier zum Mieten" class="submit">
            
          </div>
        </div>
      </div>

      <!--SOCIAL MEDIA MOBILE-->
      <div class="content-wrap content-wrap-small">
        <div class="social-media-bar-mobile">
          <h4>Folgen Sie uns</h4>
          <div class="links">
            <a href="https://www.instagram.com" target="_blank"><img src="images/icons/instagram.png" alt="instagram icon"></a>
            <a href="https://www.facebook.com" target="_blank"><img src="images/icons/facebook.png" alt="facebook icon"></a>
            <a href="https://twitter.com" target="_blank"><img src="images/icons/twitter.png" alt="twitter icon"></a>
          </div>
        </div>
      </div>

      <!--AKTUELLE TEMPERATUR-->
      <div class="content-wrap content-wrap-small">
        <div class="weather">
          <h3>Aktuelle Temperatur in Karlsruhe</h3>
          <div id="feed"></div>
          <div id="note"></div>
        </div>
      </div>

      <!--SPONSOREN-->
      <div class="sponsor-container">
        <div class="content-wrap content-wrap-small sponsor">
          <h3>Unsere Sponsoren</h3>
          <ul class="top">
            <li><img src="images/sponsor/benz.png" alt="mercedes benz logo"></li>
            <li><img src="images/sponsor/edeka.png" alt=""></li>
            <li><img src="images/sponsor/ferrari.png"  alt=""></li>
            <li><img src="images/sponsor/intel.png"  alt=""></li>
            <li><img src="images/sponsor/ksc.png"  alt=""></li>
          </ul>
          <ul class="bottom">
            <li><img src="images/sponsor/ryanair.png"  alt="ryanair logo"></li>
            <li><img src="images/sponsor/nasa.png"  alt="Nasa logo"></li>
            <li><img src="images/sponsor/samsung.png"  alt="samsung logo"></li>
            <li><img src="images/sponsor/tesla.png"  alt="tesla logo"></li>
            <li><img src="images/sponsor/tinder.png"  alt="tinder logo"></li>
          </ul>
        </div>
      </div>
    </main>

    <!--FOOTER-->
    <footer>
      <div class="content-wrap content-wrap-max">
        <div class="footer-wrap">
          <ul class="kontakt">
            <li>Kontakt</li>
            <li><img src="images/icons/viber.png"  alt="Telefon icon">+49 05226 10 00 51</li>
            <li><img src="images/icons/email.png"  alt="email icon"><a href="mailto:xcooter@gmail.com" target="_blank">xcooter@gmail.com</a></li>
            <li><img src="images/icons/time.png"  alt="Uhr icon">Mo-Sa von 9:00-20:00 Uhr</li>
          </ul>
          <ul class="Kundenkonto">
            <li>kundenkonto</li>
            <li><a href="account_managment/register.php">Anmelden</a></li>
          </ul>
          <ul class="informationen">
            <li>Informationen</li>
            <li><a href="impressum.php">Impressum</a></li>
          </ul>
          <ul class="payment">
            <li>Sichere Zahlung</li>
            <li><img src="images/payment.png" alt="zahlung möglichkeiten"></li>
          </ul>
        </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scroll-down.js"></script>
    <script src="js/side-widget.js"></script>
    <script src="js/weather.js"></script>
  </body>
</html>

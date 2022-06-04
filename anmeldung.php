<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <!--Page Titel-->
    <title>COOTER Anmeldung</title>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!--Page Favicon--> 
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <!--CSS Dateien-->
    <link href="styles/general.css" rel="stylesheet" type="text/css"/>
    <link href="styles/variables.css" rel="stylesheet" type="text/css"/>
    <link href="styles/anmeldung.css" rel="stylesheet" type="text/css"/>
    <link href="styles/typography.css" rel="stylesheet" type="text/css"/>
    <link href="styles/footer.css" rel="stylesheet" type="text/css"/>
    <link href="styles/content-wrap.css" rel="stylesheet" type="text/css"/>
  </head>
  
  <body>
    <div class="anmeldung-container">
      <div class="anmeldung">
        <h2>Xcooter</h2>
        <form action="anmeldung" method="POST">
          <label for="vorname">Vorname:</label>
          <input class="feld" type="text" id="vorname">
      
          <label for="nachname">Nachname:</label>
          <input class="feld" type="text" id="nachname">
      
          <label for="email">Email:</label>
          <input class="feld" type="email" id="email" required>

          <label for="email">Passwort:</label>
          <input class="feld" type="password" id="password" required>
        </form>
          
          <input class="button" type="submit" value="Anmelden"><br>
          <a class="link-to-page" href="index.html">Homepage</a>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
<?php
// Wachtwoord = geheim
// Alle error reports 

if ($_GET['error'] == "nouser") {
    echo '<p class="message-board">Er is geen account gevonden.</p>';
}
if ($_GET['error'] == "nietingevult") {
    echo '<p class="message-board">Het wachtwoord of gebruikersnaam is niet goed ingevult.</p>';
}
if ($_GET['error'] == "submit") {
    echo '<p class="message-board">Er is iets mis gegaan met het inloggen.</p>';
}

?>
<h1>Inloggen</h1>
<form id="inlogForm" action="login.php" method="post">

<label for="username">Gebruiker:</label>
<input type="text" name="username" id="username" placeholder="Gebruikersnaam" required="required"><br>
<label for="password">Wachtwoord:</label>
<input type="password" name="password" id="password" placeholder="Wachtwoord" required="required"><br><br>
<input type="submit" name="submit" id="submit" value="Inloggen">
</form>
</body>
</html>
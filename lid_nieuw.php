<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lid toevoegen</title>
</head>
<body>
<?php 
require_once 'session.inc.php';
?>
<!-- Formulier om leden toe te voegen -->
<p>
    <form action="lid_nieuw_verwerk.php" method="post">
    <label><input type="radio" name="gender" id="gender_m" value="M" checked="checked">Man</label>
    <br>
    <label><input type="radio" name="gender" id="gender_f" value="F">Vrouw</label>
    <br>
    <label for="first_name">Voornaam:</label><input type="text" name="first_name" id="first_name" required="required">
    <br>
    <label for="last_name">Achternaam:</label><input type="text" name="last_name" id="last_name" required="required">
    <br>
    <label for="birth_date">Geboortedatum:</label><input type="date" name="birth_date" id="birth_date" required="required">
    <br>
    <label for="member_since">Lid sinds:</label><input type="date" name="member_since" id="member_since" required="required">
    <br><br>
    <input type="submit" name="submit" id="submit" value="Opslaan">
    <button onclick="history.back();return false;">Annuleren</button>
</p>
    </form>
</body>
</html>
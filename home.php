<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back herhaling opdracht</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 

require_once 'session.inc.php';
// Melding geven van activiteit
?>
<p>Welkom <?php echo $_SESSION['username']; ?>, als je wilt uitloggen klik dan op <a href="logout.php">uitloggen</a></p><br>
<a href="lid_nieuw.php">Lid toevoegen</a>

<?php

// Alle error/succes reports 

if ($_GET['succes'] == "bewerkt") {
    echo '<p class="message-boardp">Het lid is bewerkt!</p>';
}
if ($_GET['succes'] == "verwijderd") {
    echo '<p class="message-boardp">Het lid is verwijderd!</p>';
}
if ($_GET['succes'] == "toegevoegt") {
    echo '<p class="message-boardp">Het lid is toegevoegd!</p>';
}
if ($_GET['error'] == "toegevoegt") {
    echo '<p class="message-boardn">Er is iets fouts gegaan bij het toevoegen.</p>';
}
if ($_GET['error'] == "bewerkt") {
    echo '<p class="message-boardn">Er is iets fouts gegaan bij het bewerken.</p>';
}
if ($_GET['error'] == "datum") {
    echo '<p class="message-boardn">Datum is niet geldig.</p>';
}
if ($_GET['error'] == "empty") {
    echo '<p class="message-boardn">Niet alle velden zijn ingevuld.</p>';
}
if ($_GET['error'] == "submit") {
    echo '<p class="message-boardn">Er is niet op de opslaan knop gedrukt.</p>';
}


// Database selecteren en bij achternaam sorteren

require 'config.inc.php';
$query = "SELECT * FROM back2_leden ORDER BY last_name";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($resultaat);

echo "<div class='table'>";
echo "<table class='content-table'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Geslacht</th>";
echo "<th>Voornaam</th>";
echo "<th>Achternaam</th>";
echo "<th>Geboortedatum</th>";
echo "<th>Lid sinds</th>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
echo "</thead>";

// De rijen uitlezen

while ($row = mysqli_fetch_array($result)) {

echo "<tbody>";
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['first_name'] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "<td>" . $row['birth_date'] . "</td>";
echo "<td>" . $row['member_since'] . "</td>";
echo "<td><a href='lid_bewerk.php?id=". $row['id'] . "'>Bewerk</a></td>";
echo "<td><a href='lid_verwijder.php?id=". $row['id'] . "'>Verwijder</a></td>";
echo "<td><a href='foto.php?id=". $row['id'] . "'>Foto</a></td>";
echo "</tr>";
echo "</tbody>";
echo "</table";
echo "</div>";
}
echo "<br><br>";
?>
</body>
</html>
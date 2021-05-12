<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lid verwijderen</title>
</head>
<body>
<?php
    require_once 'session.inc.php';
    // Connectie met database 
    require_once 'config.inc.php';
    // ID uitlezen uit de URL
    $id = $_GET['id'];
    // Is het ID een getal? Zoja check dan of hij wat vind
    if (is_numeric($id)) {
        $result = mysqli_query($mysqli, "SELECT * FROM back2_leden WHERE id = $id");

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
        } else {
            echo "Geen lid gevonden.";
            exit;
        }
    } else {
        echo "Het ID klopt niet";
    }
?>
    <p>Weet je zeker dat je het lid<strong> <?php echo $row['first_name'] . " " . $row['last_name']; ?></strong> wilt verwijderen?</p><br>
    <a href="lid_verwijder_verwerk.php?id=<?php echo $id; ?>">Ja, verwijderen</a> / <a href="home.php">Nee, terug</a>
</body>
</html>
<?php 

require_once 'config.inc.php';

// Checken of er überhaupt op de verzend knop is gedrukt

if (isset($_POST['submit'])) { 

// Checken of er een error zit bij het uploaden

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

    // Checken of de bestandstype wel een afbeelding is

    if ($_FILES['foto']['type'] == "image/jpg" || $_FILES['foto']['type'] == "image/jpeg" || $_FILES['foto']['type'] == "image/png") {
        // Locatie geven
        $map = __DIR__ . "/uploads/";

        // Bestandsnaam aanmaken
        $bestand = $_POST['id'] . '.jpg';
        // Send to foto pagina
        move_uploaded_file($_FILES['foto']['tmp_name'], $map . $bestand);
        header("Location:foto.php?id=". $_POST['id']);

    } else {
        echo "Bestand is het verkeerde type.";
    }
} else {
    echo "Er ging iets fout bij het uploaden.";
}

} else {
    echo "Er is niet op de upload knop gedrukt";
}


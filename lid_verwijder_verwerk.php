<?php

// Connectie met de database

require_once 'config.inc.php';


// Lees URL

$id = $_GET['id'];

// Check of het ID een getal is, zoja check of de query is uitgevoerd

if (is_numeric($id)) {
    $result = mysqli_query($mysqli, "DELETE FROM back2_leden WHERE id = $id");

    if ($result) {
        header("Location:home.php?succes=verwijderd");
        exit;
    } else {
        echo "Er is iets mis gegaan met het verwijderen.";
    }
} else {
    echo "ID klopt niet.";
}
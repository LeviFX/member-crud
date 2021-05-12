<?php 
session_start();
// Checken of er iets staat in de username session, zo niet stuur dan terug naar de inlogpagina
if (!isset($_SESSION['username']) || strlen($_SESSION['username']) == 0) {
    header("Location:index.php");
    exit;
}
?>
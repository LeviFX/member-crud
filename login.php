<?php 

// Checken of er op de submit knop is gedrukt

if (isset($_POST['submit'])) {

    // Database connectie

    require_once 'config.inc.php';
    // Posts ophalen
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Checken of de username en password zijn ingevuld
    if (strlen($username) > 0 && strlen($password) > 0) {

        // Password hashen
        $password = md5($password);
        // User selecteren en checken of het bestaat
        $query = "SELECT * FROM back2_users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($result) == 1) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location:home.php");
        } else {
            header("Location:index.php?error=nouser");
            exit;
        }
    } else {
        header("Location:index.php?error=nietingevult");
        exit;
    }
    
} else {
    header("Location:index.php?error=submit");
    exit;
}

?>
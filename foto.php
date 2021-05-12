<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once 'session.inc.php';
    // Connectie met database 
    require_once 'config.inc.php';
    // ID uitlezen uit de URL
    $id = $_GET['id'];
    ?>
    <form action="foto_verwerk.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>"> <br/>
    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto" required="required"><br><br>
    <input type="submit" name="submit" id="submit" value="Uploaden">
    <button onclick="history.back();return false;">Annuleren</button>
    </form>
    <?php
    // Checken of er een bestand is met het ID als naam met een .jpg erachter, zoja dan uitlezen als img src
    if (file_exists(__DIR__ . '/uploads/' . $id . '.jpg')) {
        echo "<p><img src='uploads/" . $id . ".jpg' alt='foto'></p>";
    }

    ?>
    <a href="home.php">Terug gaan</a>
</body>
</html>
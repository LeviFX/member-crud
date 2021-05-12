<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lid bewerken</title>
</head>
<body>
    <?php
    require_once 'session.inc.php';
    // Connectie met database 
    require_once 'config.inc.php';
    // ID uitlezen uit de URL
    $id = $_GET['id'];
    // Checken of het ID een nummer is
    if (is_numeric($id)) {
        $result = mysqli_query($mysqli, "SELECT * FROM back2_leden WHERE id = $id");
        // Checken of hij een lid heeft gevonden
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
    <p>
    <form action="lid_bewerk_verwerk.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> <br/>
    <label><input type="radio" name="gender" id="gender_m" value="M" <?php if ($row['gender'] == 'M') echo 'checked="checked"'; ?>>Man</label>
    <br>
    <label><input type="radio" name="gender" id="gender_f" value="F" <?php if ($row['gender'] == 'F') echo 'checked="checked"'; ?>>Vrouw</label>
    <br>
    <label for="first_name">Voornaam:</label><input type="text" name="first_name" id="first_name" required="required" value="<?php echo $row['first_name']; ?>">
    <br>
    <label for="last_name">Achternaam:</label><input type="text" name="last_name" id="last_name" required="required" value="<?php echo $row['last_name']; ?>">
    <br>
    <label for="birth_date">Geboortedatum:</label><input type="date" name="birth_date" id="birth_date" required="required" value="<?php echo $row['birth_date']; ?>">
    <br>
    <label for="member_since">Lid sinds:</label><input type="date" name="member_since" id="member_since" required="required" value="<?php echo $row['member_since']; ?>">
    <br><br>
    <input type="submit" name="submit" id="submit" value="Opslaan">
    <button onclick="history.back();return false;">Annuleren</button>
</p>
    </form>
</body>
</html>
<?php 

require_once 'config.inc.php';

// Checken of er überhaupt op de verzend knop is gedrukt

if (isset($_POST['submit'])) { 

// Lees formuliervelden

$id = $_POST['id'];
$gender = $_POST['gender'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$birth_date = $_POST['birth_date'];
$member_since = $_POST['member_since'];

// Check of de formuliervelden zijn ingevuld

if (strlen($first_name) > 0 && strlen($last_name) > 0 && strlen($birth_date) > 0 && strlen($member_since) > 0 && strlen($gender) > 0) {

    // Datums checken
    
        $check1 = strtotime($birth_date);
        $check2 = strtotime($member_since);

        if (date('Y-m-d', $check1) == $birth_date && date('Y-m-d', $check2) === $member_since) {
            // De gegevens bewerken
            $query = "UPDATE back2_leden SET gender = '$gender', first_name = '$first_name', last_name = '$last_name', birth_date = '$birth_date', member_since = '$member_since' WHERE id = $id";
            $result = mysqli_query($mysqli, $query);

            if ($result) {
                // Testen of hij is verstuurd
                header("Location:home.php?succes=bewerkt");
                exit;
            } else {
                header("Location:home.php?error=bewerkt");
                exit;
            }
        } else {
            header("Location:home.php?error=datum");
            exit;
        }
    } else {
        header("Location:home.php?error=empty");
        exit;
    }

} else {
    header("Location:home.php?error=submit");
    exit;
}



?>
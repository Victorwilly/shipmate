<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$ademail = $_SESSION['email'];

require_once('connection.php');
require_once('functions.php');

// === CREATE SHIPMENT ===
if (isset($_POST['cshipment'])) {
    $suffix = "DX-";
    $trackid = "";
    for ($i = 0; $i < 7; $i++) {
        $trackid .= rand(0, 9);
    }
    $trackcode = mysql_prep($connect, $suffix . $trackid);

    // Get and sanitize form data
    function get_input($name, $conn) {
        return mysql_prep($conn, trimData($_POST[$name] ?? ''));
    }

    $sname = get_input('sname', $connect);
    $saddress = get_input('saddress', $connect);
    $semail = get_input('semail', $connect);
    $sphone = get_input('sphone', $connect);

    $rname = get_input('rname', $connect);
    $raddress = get_input('raddress', $connect);
    $remail = get_input('remail', $connect);
    $rphone = get_input('rphone', $connect);

    $description = get_input('description', $connect);
    $tax = get_input('tax', $connect);
    $currency = get_input('currency', $connect);

    $cod = get_input('cod', $connect);
    $dod = get_input('dod', $connect);
    $edoa = get_input('edoa', $connect);
    $cl = get_input('cl', $connect);
    $ds = get_input('ds', $connect);
    $amt = get_input('amt', $connect);
    $destination = get_input('destination', $connect);

    // Insert into ship
    $sql = "INSERT INTO ship(trackcode, addemail, sname, saddress, semail, sphone, rname, raddress, remail, rphone, descriptions, tax, currency, cod, dod, edoa, cl, ds, amt, destination)
            VALUES('$trackcode', '$ademail', '$sname', '$saddress', '$semail', '$sphone', '$rname', '$raddress', '$remail', '$rphone', '$description', '$tax', '$currency', '$cod', '$dod', '$edoa', '$cl', '$ds', '$amt', '$destination')";

    $sql2 = "INSERT INTO history(trackcode, city, ddpt, darive, location, status, amount, destination)
             VALUES('$trackcode', '$cod', '$dod', '$edoa', '$cl', '$ds', '$amt', '$destination')";

    $result = mysqli_query($connect, $sql);
    $result2 = mysqli_query($connect, $sql2);

    if ($result && $result2) {
        $success = "New Shipment Created";
        header("Location: ../admin/newshipment.php?success=" . urlencode($success));
        exit;
    } else {
        $failed = "Error Creating Shipment: " . mysqli_error($connect);
        header("Location: ../admin/newshipment.php?error=" . urlencode($failed));
        exit;
    }
}

// === UPDATE SHIPMENT ===
if (isset($_POST['shipupdate'])) {
    function get_input($name, $conn) {
        return mysql_prep($conn, trimData($_POST[$name] ?? ''));
    }

    $id = $_POST['id'];
    $track = $_POST['track']; // Correctly using posted track code

    $sname = get_input('sname', $connect);
    $saddress = get_input('saddress', $connect);
    $semail = get_input('semail', $connect);
    $sphone = get_input('sphone', $connect);

    $rname = get_input('rname', $connect);
    $raddress = get_input('raddress', $connect);
    $remail = get_input('remail', $connect);
    $rphone = get_input('rphone', $connect);

    $description = get_input('description', $connect);
    $tax = get_input('tax', $connect);
    $currency = get_input('currency', $connect);

    $cod = get_input('cod', $connect);
    $dod = get_input('dod', $connect);
    $edoa = get_input('edoa', $connect);
    $cl = get_input('cl', $connect);
    $ds = get_input('ds', $connect);
    $amt = get_input('amt', $connect);
    $destination = get_input('destination', $connect);

    $sql = "UPDATE ship SET 
                sname = '$sname', saddress = '$saddress', semail = '$semail', sphone = '$sphone',
                rname = '$rname', raddress = '$raddress', remail = '$remail', rphone = '$rphone',
                descriptions = '$description', tax = '$tax', currency = '$currency',
                cod = '$cod', dod = '$dod', edoa = '$edoa', cl = '$cl', ds = '$ds', amt = '$amt', destination = '$destination'
            WHERE id = '$id'";

    $sql2 = "INSERT INTO history(trackcode, city, ddpt, darive, location, status, amount, destination)
             VALUES('$track', '$cod', '$dod', '$edoa', '$cl', '$ds', '$amt', '$destination')";

    $result = mysqli_query($connect, $sql);
    $result2 = mysqli_query($connect, $sql2);

    if ($result && $result2) {
        $success = "Shipment Updated";
        header("Location: ../admin/editshipment.php?success=" . urlencode($success) . "&id=" . base64_encode($id));
        exit;
    } else {
        $failed = "Error Updating Shipment: " . mysqli_error($connect);
        header("Location: ../admin/editshipment.php?error=" . urlencode($failed) . "&id=" . base64_encode($id));
        exit;
    }
}
?>

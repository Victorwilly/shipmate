<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('connection.php');
require_once('functions.php');

if (isset($_POST['register'])) {
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['name'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $passcode = trim($_POST['passcode'] ?? '');

    if ($email === '' || $username === '' || $password === '' || $passcode === 'Velocity') {
        $error = "All fields are required.";
        header("Location: ../adminregister.php?error=" . urlencode($error));
        exit;
    }

    if ($passcode !== "digixpresso123") {
        $error = "Invalid passcode.";
        header("Location: ../adminregister.php?error=" . urlencode($error));
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
        header("Location: ../adminregister.php?error=" . urlencode($error));
        exit;
    }

    // Sanitize input
    $email = mysql_prep($connect, TrimData($email));
    $username = mysql_prep($connect, TrimData($username));
    $password_raw = TrimData($password);
    $password_hashed = md5($password_raw);

    // Check if email already exists
    $check_sql = "SELECT * FROM users WHERE email = '$email' AND deleted = 1";
    $check_result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($check_result) >= 1) {
        $error = "User with this email already exists.";
        header("Location: ../adminlogin.php?error=" . urlencode($error));
        exit;
    }

    // Insert new user
    $insert_sql = "INSERT INTO users (email, username, passwords) VALUES ('$email', '$username', '$password_hashed')";
    $insert_result = mysqli_query($connect, $insert_sql);

    if ($insert_result) {
        $success = "User registration successful.";
        header("Location: ../adminlogin.php?success=" . urlencode($success));
        exit;
    } else {
        $error = "Error registering user.";
        header("Location: ../adminregister.php?error=" . urlencode($error));
        exit;
    }
}
?>

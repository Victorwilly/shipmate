<?php


require_once('connection.php');
require_once('functions.php');

$error = array();

if (isset($_POST['login'])) {
    $email = isset($_POST['email'])?trim($_POST['email']): '';
    $password = isset($_POST['password'])?trim($_POST['password']): '';

    if ($email == '' || $password == '') {
        $error[] = urlencode("ALL FIELDS ARE REQUIRED");
    }

    if (empty($error)) {
        $email = mysql_prep($connect, $email);
        $password = mysql_prep($connect, $password);
        // compare encrypted password in database with login password
        $new_pass = md5($password);
        $sql = "SELECT * FROM users WHERE email = '$email' AND passwords = '$new_pass'";

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $username = $_SESSION['username'];

                if (isset($_SESSION['email'])) {
                    $success = "Welcome ". $username;
                    header('location: ../admin/dashboard.php?success='.$success);
                }else{
                    $errors = "Email or Password is empty";
                    header('location: ../adminlogin.php?error='.$errors);
                }
            }	

        }else{
            $errors = "Email or Password does not match";
            header('location: ../adminlogin.php?error='.$errors);
        }
    }else{
        header('location: ../adminlogin.php?error='.join($error, urlencode('<br>')));
    }
}


?>
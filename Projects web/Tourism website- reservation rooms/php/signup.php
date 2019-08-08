<?php
    include_once('dbcon.php');

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "INSERT INTO users(first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$password')";
    $result = $con->query($sql);
    
    $char = "?";
    $referer = $_SERVER["HTTP_REFERER"];
    if (strpos($referer, "?") !== false) {
        $char = "&";
    }
    if ($result) {
        header("Location: $referer" . $char . "sign_up_success=true");
    } else {
        header("Location: $referer" . $char . "sign_up_error=true");
    }
    exit();
?>
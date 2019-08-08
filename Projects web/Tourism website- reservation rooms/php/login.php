<?php
    session_start();
    include_once('dbcon.php');

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $con->query($sql);
    
    $char = "?";
    $referer = $_SERVER["HTTP_REFERER"];
    if (strpos($referer, "?") !== false) {
        $char = "&";
    }
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $_SESSION["user"] = $id;   
        header("Location: $referer" . $char . "login_success=true");
    } else {
        header("Location: $referer" . $char . "login_error=true");
    }
    exit();
?>
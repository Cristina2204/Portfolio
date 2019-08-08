<?php
    session_start();

    $_SESSION["user"] = array();
    header("Location: /index.php");

    exit();
?>
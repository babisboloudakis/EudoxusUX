<?php
    require("session.php");
    if ( isset($_SESSION['email']) && isset($_SESSION['pass']) ) {
        // authenticated
    } else {
        // need to login first
        // $_SESSION['came_from'] = $_SERVER['REQUEST_URI'];
        header("Location: /login.php");
    }
?>
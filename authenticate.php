<?php
    require("session.php");
    if ( isset($_SESSION['user']) && isset($_SESSION['pass']) ) {
        // authenticated
    } else {
        // need to login first
        header("Location: /login.php");
    }
?>
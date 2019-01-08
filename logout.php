<?php
    // Destroy current user session
    session_start();
    session_destroy();
    header("Location: /index.php")
?>
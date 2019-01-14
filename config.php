<?php
    // Config like with options required in most files
    $server = "localhost:3307";
    $db = "sdi1500103";
    $db_user = "root";
    $db_password = "";
    // Connect to the database
    $mysqli = new mysqli($server,$db_user, $db_password, $db);
    if ( $mysqli->connect_error ) die($mysqli->connect_error);
    // $mysqli = mysqli_connect()
?>
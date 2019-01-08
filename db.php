<?php
    include("config.php");
    // Create user table
    if ( $mysqli->query("CREATE TABLE `users` (
    `id` int(4) NOT NULL auto_increment,
    `username` varchar(65) NOT NULL default '',
    `password` varchar(65) NOT NULL default '',
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Table created!";
    } else {
        echo "Table creation failed!";
    }

    echo "Now creating dummy data..";
    if ( $mysqli->query("INSERT INTO `users` ('username','password') VALUES ('admin', 'admin123')" ) )  {
        echo "Dummy data inserted successfully!";
    } else {
        echo "Failed to insert dummy data";
    }
?>
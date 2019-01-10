<?php
    include("config.php");
    // Create user table
    if ( $mysqli->query("CREATE TABLE `users` (
    `id` int(4) NOT NULL auto_increment,
    `username` varchar(65) NOT NULL default '',
    `password` varchar(65) NOT NULL default '',
    `telephone` varchar(65) default'',
    `type` varchar(65) default 'student',
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Users Table created!";
    } else {
        echo "Users Table creation failed!";
    }

    if ( $mysqli->query("CREATE TABLE `students` (
    `id` int(4) NOT NULL auto_increment,
    `username` varchar(65) NOT NULL default '',
    `password` varchar(65) NOT NULL default '',
    `telephone` varchar(65) default'',
    `type` varchar(65) default 'student',
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Users Table created!";
    } else {
        echo "Users Table creation failed!";
    }

    if ( $mysqli->query("CREATE TABLE `publishers` (
    `id` int(4) NOT NULL auto_increment,
    `username` varchar(65) NOT NULL default '',
    `password` varchar(65) NOT NULL default '',
    `telephone` varchar(65) default'',
    `type` varchar(65) default 'student',
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Users Table created!";
    } else {
        echo "Users Table creation failed!";
    }

    // Create books table
    if ( $mysqli->query("CREATE TABLE `books` (
    `id` int(4) NOT NULL auto_increment,
    `name` varchar(65) NOT NULL default '',
    `author` varchar(65) NOT NULL default '',
    `image` varchar(65) default'',
    `description` varchar(65) default'',
    `category` varchar(65),
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Books Table created!";
    } else {
        echo "Books Table creation failed!";
    }

    // echo "Now creating dummy data..";
    // if ( $mysqli->query("INSERT INTO `users` ('username','password') VALUES ('admin', 'admin123')" ) )  {
    //     echo "Dummy data inserted successfully!";
    // } else {
    //     echo "Failed to insert dummy data";
    // }

    if ( $mysqli->query("INSERT INTO books (name,author) VALUES ('EAM','Roussou')") ) {
        echo "Dummy data inserted successfully!";
    } else {
        echo "Dummy data failed..";
    }
    if ( $mysqli->query("INSERT INTO books (name,author) VALUES ('EAM2','Rossu')") ) {
        echo "Dummy data inserted successfully!";
    } else {
        echo "Dummy data failed..";
    }
    if ( $mysqli->query("INSERT INTO books (name,author) VALUES ('EAM3','ussou')") ) {
        echo "Dummy data inserted successfully!";
    } else {
        echo "Dummy data failed..";
    }
    if ( $mysqli->query("INSERT INTO books (name,author) VALUES ('EAM4','Rosou')") ) {
        echo "Dummy data inserted successfully!";
    } else {
        echo "Dummy data failed..";
    }
    if ( $mysqli->query("INSERT INTO books (name,author) VALUES ('EAM5','Rous')") ) {
        echo "Dummy data inserted successfully!";
    } else {
        echo "Dummy data failed..";
    }
?> 
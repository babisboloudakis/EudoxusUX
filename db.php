<?php
    include("config.php");
    // Create user table
    if ( $mysqli->query("CREATE TABLE `users` (
    `id` int(4) NOT NULL auto_increment,
    `email` varchar(65) not NULL default '',
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
    `id` int(4) NOT NULL,
    `university` varchar(65) NOT NULL default '',
    `semester` varchar(65) NOT NULL default '',
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Students Table created!";
    } else {
        echo "Students Table creation failed!";
    }

    if ( $mysqli->query("CREATE TABLE `publishers` (
    `id` int(4) NOT NULL ,
    `vat` varchar(65) NOT NULL default '',
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Publishers Table created!";
    } else {
        echo "Publishers Table creation failed!";
    }

    // Create books table
    if ( $mysqli->query("CREATE TABLE `books` (
    `id` int(4) NOT NULL auto_increment,
    `name` varchar(65) NOT NULL default '',
    `author` varchar(65) NOT NULL default '',
    `image` varchar(65) default'',
    `description` varchar(600) default'',
    `category` varchar(65),
    `pid` int(4) NOT NULL default -1,
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Books Table created!";
    } else {
        echo "Books Table creation failed!";
    }

    if ( $mysqli->query("CREATE TABLE `books_universities` (
    `id` int(4) NOT NULL,
    `university` varchar(65) NOT NULL default '',
    PRIMARY KEY (`id`,`university`)
    )" ) ) {
        echo "Books university Table created!";
    } else {
        echo "Books Table university creation failed!";
    }

    if ( $mysqli->query("CREATE TABLE `announcements` (
    `id` int(4) NOT NULL auto_increment,
    `title` varchar(65) NOT NULL default '',
    `text` varchar(600) NOT NULL default '',
    `img` varchar(65) NOT NULL default '',
    PRIMARY KEY (`id`)
    )" ) ) {
        echo "Announcement Table created!";
    } else {
        echo "Announcement creation failed!";
    }

    if ( $mysqli->query("CREATE TABLE `eudoxus`.`reservations` ( `bid` INT NOT NULL , `sid` INT NOT NULL ) ENGINE = MyISAM;" ) ) {
        echo "RESERVE Table created!";
    } else {
        echo "RESERVE creation failed!";
    }


    // echo "Now creating dummy data..";
    // if ( $mysqli->query("INSERT INTO `users` ('username','password') VALUES ('admin', 'admin123')" ) )  {
    //     echo "Dummy data inserted successfully!";
    // } else {
    //     echo "Failed to insert dummy data";
    // }









    // INSERT A COUPLE OF BOOKS
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('Intro to C++','Stoustrup','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Programming','img/uploads/1.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('Java for dummies','John Doe','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Programming','img/uploads/2.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('Basic Accounting','Nick Doe','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Economics','img/uploads/3.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('Intro to Python3','Linus','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Programming','img/uploads/4.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('UI/UX Design','Nielsen','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Design','img/uploads/5.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('Multi-variable Calculus','Gauss','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Math','img/uploads/6.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('Linear Algebra','Strang','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Math','img/uploads/7.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('Photoshop for Dummies','For Dummies','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Design','img/uploads/8.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    if ( $mysqli->query("INSERT INTO books (name,author,description,category,image) VALUES ('Object Oriented Programming','Stoustrup','Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus totam quasi, sit cumque unde ab minus numquam nostrum commodi doloribus!','Programming','img/uploads/9.jpeg')") ) {
        echo "Dummy book inserted successfully..\n";
    } else {
        echo "Dummy data failed..\n";
    }
    

    // INSERT A COUPLE ANNOUNCEMENTS
    if( $mysqli->query("INSERT INTO announcements (title,text,img) VALUES ('Αλλαγή Πλατφόρμας','Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium architecto beatae, molestiae deserunt distinctio alias tempore obcaecati repellendus deleniti animi vel quam cupiditate, harum aliquid ipsa nemo voluptates quidem rerum explicabo optio facilis voluptatem mollitia repudiandae veniam! Ipsam, rerum voluptates!','img/ann/1.jpeg')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO announcements (title,text,img) VALUES ('Έναρξη Δηλώσεων','Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium architecto beatae, molestiae deserunt distinctio alias tempore obcaecati repellendus deleniti animi vel quam cupiditate, harum aliquid ipsa nemo voluptates quidem rerum explicabo optio facilis voluptatem mollitia repudiandae veniam! Ipsam, rerum voluptates!','img/ann/2.jpeg')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO announcements (title,text,img) VALUES ('Λήξη Δηλώσεων','Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium architecto beatae, molestiae deserunt distinctio alias tempore obcaecati repellendus deleniti animi vel quam cupiditate, harum aliquid ipsa nemo voluptates quidem rerum explicabo optio facilis voluptatem mollitia repudiandae veniam! Ipsam, rerum voluptates!','img/ann/3.jpeg')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO announcements (title,text,img) VALUES ('Παράταση στην Δήλωση Συγγραμάτων','Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium architecto beatae, molestiae deserunt distinctio alias tempore obcaecati repellendus deleniti animi vel quam cupiditate, harum aliquid ipsa nemo voluptates quidem rerum explicabo optio facilis voluptatem mollitia repudiandae veniam! Ipsam, rerum voluptates!','img/ann/4.jpeg')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }


    // INSERT A COUPLE DUMMY BOOK UNIVERSITIES
     if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('1','emp')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('1','ekpa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('1','papi')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('2','emp')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('3','emp')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('4','ekpa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('5','ekpa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('4','papi')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('5','opa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('6','emp')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('6','ekpa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('7','opa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('8','papi')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('7','papi')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('8','opa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('9','emp')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('9','ekpa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('9','opa')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    if( $mysqli->query("INSERT INTO books_universities (id,university) VALUES ('9','papi')") ) {
        echo "Dummy announcement inserted successfully..\n";
    } else {
        echo "Dummy announcement failed..\n";
    }
    
?> 
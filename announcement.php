<?php

require("header.php");
require("config.php");

// Get itemid from URL
$id = $_GET['id'];
// Find book with that id in db
$results = $mysqli->query("SELECT * FROM announcements WHERE id=$id");
// Load any required Data
$row = $results->fetch_assoc();
$img = $row['img'];
$title = $row['title'];
$text = $row['text'];


?>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
            <li class="breadcrumb-item"><a href="announcements.php">Ανακοινώσεις</a></li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>
    </nav>

    <div class="row mt-5">

    <img src="<?php echo $img; ?>" alt="" style="max-width:300px; max-height:300px;">
    <br>
    <br>
    <h4 class="display-4"><?php echo $title; ?></h4>
    <hr>
    <p><?php echo $text ?></p>

    </div>
</div>
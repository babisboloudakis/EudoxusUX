<?php
// Page for a single announcement

require("config.php");
require("header.php");

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

<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
            <li class="breadcrumb-item"><a href="announcements.php">Ανακοινώσεις</a></li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>
    </nav>

    <div class="row mt-5">

    <header style="background-image: url('<?php echo $img; ?>');
    background-attachment: fixed;
    background-size: cover;
    background-position: center; padding: 100px 0px 100px 0px; width:100%;"> </header>
    <!-- <img src="<?php echo $img; ?>" alt="" style="max-width:300px; max-height:300px;"> -->
    <br>
    <div class="col-md-8 offset-md-2">
    <h4 class="display-4"><?php echo $title; ?></h4>
    <hr>
    <p><?php echo $text ?></p>
</div>

<?php echo file_get_contents("html/footer.html"); ?>
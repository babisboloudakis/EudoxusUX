<?php

require("header.php");
require("config.php");

// Get itemid from URL
$itemid = $_GET['itemid'];
// Find book with that id in db
$results = $mysqli->query("SELECT * FROM books WHERE id=$itemid");
// Load any required Data
$row = $results->fetch_assoc();
$bname = $row['name'];
$bauthor = $row['author'];
$bdesc = $row['description'];
$bimg = $row['image'];

// When the add button is clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( !in_array($itemid,$_SESSION['cart']) ) {
        // Don't add a book multiple times in array
        array_push( $_SESSION['cart'], $itemid );
    } else {
        $_SESSION['cart'] = array_diff( $_SESSION['cart'], array($itemid) );
    }
    // print_r($_SESSION['cart']); // for debug
}

?>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
            <li class="breadcrumb-item"><a href="browse.php">Εξερεύνηση Συγγραμάτων</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $bname;  ?></li>
        </ol>
    </nav>

    <div class="row my-5">

        <div class="litem col-md-4">
            <img src="<?php echo $bimg ?>" alt="IMg here" style="max-width:300px; height:400px;">
        </div>

        <div class="ritem col-md-8">
            <h2 class="display-3"> <?php echo $bname ?></h2>
            <p class="text-muted"> <?php echo $bauthor ?></p>
            <hr>
            <p><?php echo $bdesc ?></p>
            <?php 
            if ( !in_array($itemid,$_SESSION['cart']) ) {
                echo '<form action="" method="post">
                        <input type="submit" value="Δήλωση Συγγράματος" class="btn btn-primary">
                      </form>';
            } else {
                echo '<form action="" method="post">
                        <input type="submit" value="Αφαίρεση Συγγράματος" class="btn btn-warning">
                      </form>';
            }
            
            ?>
        </div>

    </div>
</div>
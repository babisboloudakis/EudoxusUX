<?php

require("header.php");
require("config.php");

$itemid = $_GET['itemid'];

$results = $mysqli->query("SELECT * FROM books WHERE id=$itemid");

$row = $results->fetch_assoc();
$bname = $row['name'];
$bauthor = $row['author'];
$bdesc = $row['description'];
$bimg = $row['image'];

?>

<div class="container">
    <div class="row mt-5">

        <div class="litem col-md-6">
            <img src="" alt="IMg here">
        </div>

        <div class="ritem col-md6">
            <h2 class="display-3"> <?php echo $bname ?></h2>
            <p class="text-muted"> <?php echo $bauthor ?></p>
            <hr>
            <p><?php echo $bdesc ?></p>
            <form action="" method="post">
                <input type="button" value="Δήλωση Συγγράματος" class="btn btn-primary">
            </form>
        </div>

    </div>
</div>
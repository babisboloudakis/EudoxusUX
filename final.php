<?php

require("header.php");
require("config.php");
require("authenticate.php");

?>

<div class="container">

<div class="row justify-content-center my-4">
    <h5 >Το PIN σας είναι:</h5>
    <hr class="col-md-12">
    <div id="pin"><?php echo rand(1000,9999); ?></div>
    <hr class="col-md-12">
</div>



<div class="row justify-content-center my-4">
    <h5 >Μπορείτε να παραλάβετε τα συγγράματα σας στα εξής σημεία διανομής:</h5>
        <hr class="col-md-12">

    <?php

    $results = $mysqli->query("SELECT * FROM reservations, books  WHERE reservations.bid = books.id AND reservations.sid = '". $_SESSION['id'] ."' ");
    if ( $results->num_rows > 0 ) {
        for ($i=0; $i < $results->num_rows; $i++) { 
            $index = $i + 1;
            $row = $results->fetch_assoc();
            $title = $row['name'];
            $author = $row['author'];
            // Display single book
            echo "
            <p class='col-md-2 mt-5'>$index.</p>
            <p class='col-md-2 mt-5'>$title</p>
            <p class='col-md-2 mt-5 ' >$author</p>
            <p class='col-md-3 mt-5 ' >Lorem ipsum dolor 10</p>
            <img src='img/map.png' class='col-md-3' style='max-height:190px;'>
            <hr class='col-md-12'>
            ";

        }
    } else {
        if ( !$results ) {
            echo $mysqli->error;
        }
        echo "Δεν υπάρχουν Συγγράματα!";
    }
    

    ?>
</div>

</div>

<?php echo file_get_contents("html/footer.html"); ?>
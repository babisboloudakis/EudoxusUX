<?php

require("header.php");
require("config.php");
require("authenticate.php");

?>

<div class="container">

<div class="row justify-content-center mt-4">
    <h5 >Το PIN σας είναι:</h5>
    <hr class="col-md-12">
    <div id="pin"><?php echo rand(1000,9999); ?></div>
    <hr class="col-md-12">
</div>



<div class="row justify-content-center mt-4">
    <h5 >Μπορείτε να παραλάβετε τα συγγράματα σας στα εξής σημεία διανομής:</h5>
        <hr class="col-md-12">

    <?php

    $results = $mysqli->query("SELECT * FROM reservations, books  WHERE reservations.bid = books.id AND reservations.sid = '". $_SESSION['id'] ."' ");
    if ( $results->num_rows > 0 ) {
        for ($i=0; $i < $results->num_rows; $i++) { 
    
            $row = $results->fetch_assoc();
            $title = $row['name'];
            $author = $row['author'];
            // Display single book
            echo "
            <p class='col-md-3'>$title</p>
            <p class='col-md-3'>$author</p>
                <p class='col-md-3'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit consequatur eligendi aliquam sequi magnam deserunt?</p>
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
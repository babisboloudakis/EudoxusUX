<?php
require("config.php");

require("header.php");
?>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-10 pt-5">

    <h3 class="display-4">Τρέχουσα Δήλωση</h3>
    <hr>
    <form action="" method="post">
        <input type="submit" class="btn btn-primary" value="Τελική Υποβολή">
    </form>
    <hr>

    <?php

foreach ( $_SESSION['cart'] as $book ) {
    $result = $mysqli->query("SELECT * FROM books WHERE id=$book");
    if ( $result->num_rows == 0 ) {
        echo '<p>Το καλάθι είναι άδειο</p>';
    } else {
        $row = $result->fetch_assoc();
        echo '<div class="row">
            <div class="col-md-2">'.$row['name'].'</div>
        </div>';
        
    }
}

?>




</div>
</div>  
</div>

<?php
echo file_get_contents("html/footer.html");
?>
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
        <input type="submit" class="btn btn-primary" name="final" value="Τελική Υποβολή">
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
            <img src="'.$row["image"].'" alt="image" style="height:80px; width:80px;" class="col-md-2"></img>
            <div class="col-md-2 offset-md-1 mt-4">'.$row['name'].'</div>
            <div class="col-md-2 offset-md-1 mt-4">'.$row['author'].'</div>
            <input type="submit" style="width:10px; border-radius:100px;" class="btn btn-danger btn-sm col-md-1 offset-md-2 mt-2" value="Χ">
        </div><hr>';
        
    }
}

?>




</div>
</div>  
</div>

<?php
echo file_get_contents("html/footer.html");
?>
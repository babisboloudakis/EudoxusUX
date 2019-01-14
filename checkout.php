<?php
require("config.php");
require("session.php");
// If the user has already a submitted application, redirect him
// on final.php page where he can see the submitted books
require("authenticate.php");
$sessionid = $_SESSION['id'];
$already = $mysqli->query("SELECT * FROM reservations WHERE sid=$sessionid ");
if ( $already->num_rows > 0 ) {
    header("Location: /final.php");
}

// If user submits the reservations
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    foreach ( $_SESSION['cart'] as $r ) {
        // Insert each reservation into the database
        $id = $_SESSION['id'];
        if ( !$mysqli->query("INSERT INTO reservations (`bid`,`sid`) VALUES ('$r','$id')" ) ) {
            
        } 
    }

    header("Refresh:0");
}

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

    if ( sizeof( $_SESSION['cart']) == 0 ) {
        echo "<p class='my-5'>Δεν υπάρχουν επιλεγμένα συγγράματα, <a href='browse.php'>Δείτε τα συγγράματα μας!</a></p>";
    } else {
        // User has already products
        foreach ( $_SESSION['cart'] as $book ) {
            $result = $mysqli->query("SELECT * FROM books WHERE id=$book");
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
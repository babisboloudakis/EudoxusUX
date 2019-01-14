<?php
require("config.php");
require("authenticate.php");    
require("header.php");
?>



<div class="container">
<div class="row justify-content-center">
<div class="col-md-10 pt-5">

    <h3 class="display-5">Διαχείρηση Συγγραμάτων</h3>
    
    <?php
    $result = $mysqli->query("SELECT * FROM books WHERE pid=$_SESSION[id]");
    if ( $result->num_rows == 0 ) {
        echo "<p class='my-5'>Δεν υπάρχουν καταχωρημένα συγγράματα</p>";
    } else {
        // User has already products
        for ( $i = 0; $i < $result->num_rows; $i++ ) {
            
            $row = $result->fetch_assoc();
            echo '<div class="row">
            <img src="'.$row["image"].'" alt="image" style="height:80px; width:80px;" class="col-md-2"></img>
            <!-- <a href="item.php?itemid='.$row['id'].'"> -->
                <div class="col-md-2 offset-md-1 mt-4">'.$row['name'].'</div>
            <!-- </a> -->
            <div class="col-md-2 offset-md-1 mt-4">'.$row['author'].'</div>
            <input type="submit" style="width:10px; border-radius:100px;" class="btn btn-primary btn-sm col-md-1 offset-md-1 mt-3" value="Edit">
            </div><hr>';
        }
    }
        
?>
    
    <hr>
        <a href='publish.php'>Προσθήκη Συγγράματος</a>
    <hr>

    




</div>
</div>  
</div>

<?php
echo file_get_contents("html/footer.html");
?>
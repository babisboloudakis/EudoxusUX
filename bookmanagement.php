<?php
require("config.php");
require("authenticate.php");    

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $bid = $_POST['selectedId'];
    $mysqli->query("DELETE FROM books WHERE id=$bid");
}

require("header.php");


?>



<div class="container">
<div class="row justify-content-center">
<div class="col-md-10 pt-5">

    <h3 class="display-5">Διαχείρηση Συγγραμάτων</h3>
    <hr>
    
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
            <a href="item.php?itemid='.$row['id'].'">
                <div class="col-md-2 offset-md-1 mt-4">'.$row['name'].'</div>
            </a>
            <div class="col-md-2 offset-md-1 mt-4">'.$row['author'].'</div>
            <form action="" method="post">
                    <input type="hidden" name="selectedId" value="'. $row["id"] .'"/>
                    <input type="submit" value="Διαγραφή Συγγράματος" name="add" class="btn btn-danger mt-4">
                </form>
            </div><hr>';
        }
    }
        
?>
    
        <a href='publish.php' class="btn btn-success">Προσθήκη Συγγράματος</a>
    <hr>

    




</div>
</div>  
</div>

<?php
echo file_get_contents("html/footer.html");
?>
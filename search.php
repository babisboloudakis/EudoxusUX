<?php
require("header.php");
require("config.php");

// Get info from URL
$search_term = $_GET['term'];
// Execute SQL Query
$results = $mysqli->query("SELECT * FROM books WHERE name LIKE '%" .$search_term. "%' OR author LIKE '%" .$search_term. "%' ");

?>

<!-- HTML TEMPLATE -->
<div class="container">
    <div class="row">
        <h5 class="col-md-12 mt-5">Αποτελέσματα Αναζήτησης:</h5>
        <p class="text-muted col-md-12">Συνολικός αριθμός αποτελεσμάτων: <?php echo $results->num_rows; ?></p>
        <hr class="col-md-12">
        <?php
        // Print search results
            if ( $results->num_rows > 0 ) {
                for ( $i = 0; $i < $results->num_rows; $i++ ) {
                
                    $row = $results->fetch_assoc();
                    echo '
                    <img src="'.$row["image"].'" alt="image" style="height:80px; width:80px;" class="col-md-2">
                    <a href="item.php?itemid='.$row['id'].'">
                    <div class="col-md-3">'.$row['name'].'</div>    
                    </a>
                    <div class="col-md-3">'.$row['author'].'</div>
                    <hr class="col-md-12">';
                    
                }
            } else {
                echo "<p class='my-5'>Δεν βρέθηκαν αποτελέσματα αναζήτησης</p>";
            }
                
        ?>
    </div>
</div>


<!-- FOOTER -->
<?php echo file_get_contents("html/footer.html"); ?>
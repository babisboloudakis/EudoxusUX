<?php

require("header.php");
require("config.php");

$results = $mysqli->query("SELECT * FROM books");

echo '<div class="container-fluid"><div class="row">';

// Display product grid
for ($i=0; $i < $results->num_rows; $i++) { 
    
    $row = $results->fetch_assoc();
    // Display single book
    echo '<div class="card col-md-4 mt-3 p-2" >';
    echo    "<a href='item.php?itemid=" .$row['id'] . "'>";
    echo    '<img src="" class="card-img-top" alt="..." style="height:250px;">';
    echo        '<div class="card-body">'; 
    echo            '<h5 class="card-title">'. $row["name"] .'</h5>';
    echo        '<p class="card-text text-muted">' . $row["author"] . '</p>';
    echo        '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>';
    echo        '<a href="#" class="btn btn-primary">Go somewhere</a>';
    echo        '</div>';
    echo    "</a>";
    echo    '</div>';

}

echo '</div></div>';

?>






<?php echo file_get_contents("html/footer.html"); ?>
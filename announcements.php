<?php

require("header.php");
require("config.php");



?>



<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ανακοινώσεις</li>
    </ol>
</nav>


<div class="container">
<div class="row">

<?php

$results = $mysqli->query("SELECT * FROM announcements ORDER BY id DESC");

// Display product grid
for ($i=0; $i < $results->num_rows; $i++) { 
    
    $row = $results->fetch_assoc();
    // Display single book
    echo '<div class="card col-md-6 m-4" >';
    echo    '<img src="'. $row['img'] .'" class="card-img-top" alt="..." style="height:200px; width:200px;">';
    echo        '<div class="card-body">'; 
    echo            '<a href="announcement.php?id='.$row["id"].'"<h5 class="card-title">'. $row["title"] .'</h5></a>';
    echo        '<p class="card-text text-muted">' . substr($row["text"],0,80) . '</p>';
    echo        '</div>';
    echo    '</div>';

}

?>


</div>
</div>








<?php

echo file_get_contents("html/footer.html");


?>
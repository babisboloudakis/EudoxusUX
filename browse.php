<?php

require("header.php");
require("config.php");

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Αρχική</a></li>
        <li class="breadcrumb-item active" aria-current="page">Εξερεύνηση Συγγραμάτων</li>
    </ol>
</nav>

<?php


echo '<div class="container-fluid"><div class="row">';

echo '	<div class="col-md-12 mt-3 justify-content-center bg-light">
            <form method="post" action="">
            <h5>Φιλτράρισμα</h5>
            <hr>
            <div class="form-row">
            <div class="col-md-4 pt-3">
                <div class="form-group ">
                <label>Κατηγορία</label>
                    <select id="inputState " name="categ" class="form-control">
                    <option value="any" selected>Όλες</option>
                    <option value="Programming" >Programming</option>
                    <option value="Math" >Math</option>
                    <option value="Design" >Design</option>
                    <option value="Economics" >Economics</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 pt-3">
                <div class="form-group">
                <label>Σχολή</label>
                <select id="inputState" name="univ" class="form-control">
                    <option value="any" selected>Όλες</option>
                    <option value="ekpa" >ΕΚΠΑ</option>
                    <option value="emp">ΕΜΠ</option>
                    <option value="opa">ΟΠΑ</option>
                    <option value="papi">ΠΑΠΠΕΙ</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="form-group">
                <input type="submit" value="Αναζήτηση" class="btn btn-primary">
                </div>
            </div>
            </div>
            </form>
        </div>';


$results = $mysqli->query("SELECT * FROM books");
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $selectedcat = $_POST['categ'];
    $selecteduniv = $_POST['univ'];
    if ( $selectedcat != "any" &&  $selecteduniv != "any" ) {
        $results = $mysqli->query("SELECT * FROM books, books_universities WHERE books_universities.id = books.id and category='$selectedcat' and books_universities.university='$selecteduniv'  ");
    }
    else if ( $selectedcat != "any" ) {
        $results = $mysqli->query("SELECT * FROM books WHERE category='$selectedcat' ");
    }
    else if ( $selecteduniv != "any" ) {
        $results = $mysqli->query("SELECT * FROM books, books_universities WHERE books_universities.id = books.id and books_universities.university='$selecteduniv'  ");
    }
}

if ( $results->num_rows > 0 ) {

    // Display product grid
    for ($i=0; $i < $results->num_rows; $i++) { 
        
        $row = $results->fetch_assoc();
        // Display single book
        echo '<div class="card col-md-3 m-5" >';
        echo    "<a href='item.php?itemid=" .$row['id'] . "'>";
        echo    '<img src="" class="card-img-top" alt="..." style="height:250px;">';
        echo        '<div class="card-body">'; 
        echo            '<h5 class="card-title">'. $row["name"] .'</h5>';
        echo        '<p class="card-text text-muted">' . $row["author"] . '</p> <hr>';
        echo        '<a href="#" class="btn btn-primary">Δήλωση Συγγράματος</a>';
        echo        '</div>';
        echo    "</a>";
        echo    '</div>';
        
    }

} else {
    echo "Δεν βρέθηκαν αποτελέσματα με τα κριτήρια αναζήτησης που επιλέξατε.";
}

echo '</div></div>';

?>






<?php echo file_get_contents("html/footer.html"); ?>

<?php require("header.php"); require("config.php") ?>

        <!-- header -->
        <header class="header">
            <div class="overlay">
                <div class="container">
                    <div class="headertext">
                        <h1 class="text-white">Καλωςήρθατε στον Εύδοξο!</h1>
                        <p class="text-light">Πρώτοι στα συγγράματα</p>
                        <a href="browse.php"><button class="btn btn-primary">Δείτε τα συγγράμματα μας!</button></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="announcements">
            <h4>Ανακοινώσεις</h4>
            <hr>
            <div class="container">
                <div class="row justify-content-center">
                    <?php
                    // Print 3 latest announcements
                    $results = $mysqli->query("SELECT * FROM announcements ORDER BY id DESC LIMIT 3");
                    // Display grid
                    for ($i=0; $i < $results->num_rows; $i++) { 
                        
                        $row = $results->fetch_assoc();
                        // Display single book
                        echo '<div class="card col-md-3 m-4" >';
                        echo    '<img src="'. $row['img'] .'" class="card-img-top" alt="..." style="height:200px; width:100%;">';
                        echo        '<div class="card-body">'; 
                        echo            '<a href="announcement.php?id='.$row["id"].'"<h5 class="card-title">'. $row["title"] .'</h5></a>';
                        echo        '<p class="card-text text-muted">' . substr($row["text"],0,80) . '</p>';
                        echo        '</div>';
                        echo    '</div>';

                    }

                    ?>
                </div>
            </div>
        </div>

<?php echo file_get_contents("html/footer.html"); ?>
 
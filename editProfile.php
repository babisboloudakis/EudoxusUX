<?php
    require("authenticate.php");
    include("header.php");
    // Edit profile Script
    include("config.php");

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

        // Retrieve form data
        $email = $_POST['femail'];
        $password1 = $_POST['fpass1'];
        $password1 = md5($password1);
        $password2 = $_POST['fpass2'];
        $password3 = $_POST['fpass3'];
        $phone = $_POST['fphone'];

        
        // Update email
        if ( !empty($email) ) {
            if ( $mysqli->query("UPDATE `users` SET `email` = '$email' WHERE  `id` = {$_SESSION['id']} ") == TRUE ) {
                $message = "<div class='alert alert-success'>Changes saved.</div>";
            } else {
                $message = "<div class='alert alert-danger'>Changes not saved.</div>";
            }
        
        }
        // Update password
        if ( !empty($password1) && !empty($password2) && !empty($password3) ) {
            $temp = $_SESSION['user'];
            $results = $mysqli->query("SELECT * FROM users WHERE username='$temp' AND password='$password1' ");
            if ( $results->num_rows > 0 ) {
                // If the old password is correct
                if ( $password2 == $password3 ) {

                    $password2 = md5($password3);
                    if ( $mysqli->query("UPDATE `users` SET `password` = '$password2' WHERE  `id` = {$_SESSION['id']} ") == TRUE ) {
                        $message = "<div class='alert alert-success'>Changes saved.</div>";
                    } else {
                        $message = "<div class='alert alert-danger'>Changes not saved.</div>";
                    }
                }
            } else {
                $message = "<div class='alert alert-danger'>Wrong password.</div>";
            }
        
        }
        // Update telephone
        if ( !empty($phone) ) {
            if ( $mysqli->query("UPDATE `users` SET `telephone` = '$phone' WHERE  `id` = {$_SESSION['id']} ") == TRUE ) {
                $message = "<div class='alert alert-success'>Changes saved.</div>";
            } else {
                $message = "<div class='alert alert-danger'>Phone not saved.</div>";
            }
        
        }

        if ( $_SESSION['type'] == 'publisher' ) {
            $vat = $_POST['fvat'];
            if ( !empty($vat)) {
                if ( $mysqli->query("UPDATE `publishers` SET `vat` = '$vat' WHERE  `id` = {$_SESSION['id']} ")  ) {
                    $message = "<div class='alert alert-success'>Changes saved.</div>";
                } else {
                    $message = "<div class='alert alert-danger'>Vat not saved.</div>";
                }
            }
        } else if ( $_SESSION['type'] == 'student' ) {
            $uni = $_POST['funi'];
            if ( !empty($uni)) {
                if ( $mysqli->query("UPDATE `students` SET `university` = '$uni' WHERE  `id` = {$_SESSION['id']} ")  ) {
                    $message = "<div class='alert alert-success'>Changes saved.</div>";
                } else {
                    $message = "<div class='alert alert-danger'>University not saved.</div>";
                }
            }
        }
        
 
        // Update data on database
        

    }

?>

<div class="bg-white container">

    <form method="post" action="" class="row">

        <div class="form-group col-md-12 pt-2" id="errorLogin" >
            <?php 
                if(isset($message)){
                    echo $message;
                }
            ?>
        </div>

        <div class="col-md-6">

            <div class="form-group">
                <h5 class="mb-2">Διεύθηνση E-mail</h5>
                <label >Email </label>
                <input type="text" id="user" name="femail" class="form-control mb-2" placeholder="Καίνούρια Διεύθηνση">    
            </div>
            <div class="form-group">
                <h5 class="mb-2">Κωδικός Πρόσβασης</h5>
                <label >Κωδικός </label>
                <input type="text" id="user" name="fpass1" class="form-control mb-2" placeholder="Παλιός Κωδικός">    
                <label >Καινούριος Κωδικός </label>
                <input type="text" id="user" name="fpass2" class="form-control mb-2" placeholder="Καινούριος Κωδικός">
                <label >Επιβεβαίωση Κωδικού </label>
                <input type="text" id="user" name="fpass3" class="form-control mb-2" placeholder="Καινούριος Κωδικός">      
            </div>
            <div class="form-group">
                <h5 class="mb-2">Τηλέφωνο</h5>
                <label >Καινούριο Τηλέφωνο </label>
                <input type="text" id="user" name="fphone" class="form-control mb-2" placeholder="Καινούριο Τηλέφωνο">     
            </div>

            <?php
                if ( $_SESSION['type'] == 'publisher' ) {
                    echo ' <div class="form-group">
                        <h5 class="mb-2">Στοιχεία Εκδότη</h5>
                        <label > ΑΦΜ </label>
                        <input type="text" name="fvat" class="form-control mb-2" placeholder="ΑΦΜ">     
                    </div> ';
                } else if ( $_SESSION['type'] == 'student' ) {
                    echo ' <div class="form-group">
                        <h5 class="mb-2">Στοιχεία Φοιτητή</h5>
                        <label > Πανεπιστήμιο </label>
                        <input type="text" name="funi" class="form-control mb-2" placeholder="Πανεπιστήμιο">     
                    </div> ';
                }
            ?>
            

        </div>
        <!-- button col -->
        <div class="col-md-6 mt-5">
            
            <p> 
                Συμπληρώστε τα πεδία τα οποία θέλετε να αλλάξετε, αφήνοντας κενά
                τα υπόλοιπα. Στην συνέχεια πατήστε το κουμπί Αποθήκευση.
            </p>
            <input type="submit" name="edit" value="edit" class="btn btn-primary">
            
            <h5 class="mt-5">Στοιχεία Χρήστη:</h5>
            <hr>
            <?php 
            
            $userid = $_SESSION['id'];
            if ( $_SESSION['type'] == 'publisher' ) {
                
                $results = $mysqli->query("SELECT * FROM users , publishers WHERE users.id = publishers.id AND users.id = '$userid' ");
                $row = $results->fetch_assoc();
                echo "<p> <em>E-mail: </em> ".$row['email']."</p>
                <p> <em>Τηλεφώνο:</em> ".$row['telephone']."</p>
                <p> <em>Τύπος Χρήστη:</em> ".$row['type']."</p>
                <p> <em>ΑΦΜ:</em> ".$row['vat']."</p>";

            } else if ( $_SESSION['type'] == 'student' ) {
                
                $results = $mysqli->query("SELECT * FROM users , students WHERE users.id = students.id AND users.id = '$userid' ");
                $row = $results->fetch_assoc();
                echo "<p> <em>E-mail: </em> ".$row['email']."</p>
                <p> <em>Τηλεφώνο:</em> ".$row['telephone']."</p>
                <p> <em>Τύπος Χρήστη:</em> ".$row['type']."</p>
                <p> <em>Πανεπιστήμιο:</em> ".$row['university']."</p>";

            }

            ?>

        </div>

    </form>

</div>

<?php echo file_get_contents("html/footer.html"); ?>
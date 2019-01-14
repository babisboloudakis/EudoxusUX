<?php
    include("header.php");
?>    

<?php

    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

        $femail = $_POST['email'];
        $fpassword = $_POST['password'];
        // Filter username and password for SQL injection
        $femail = mysqli_real_escape_string($mysqli,$femail);
        $fpassword = mysqli_real_escape_string($mysqli,$fpassword);
        // Confirm password field
        $fpassword2 = $_POST['password2'];
        $type = $_POST['types'];

        // Make sure, user doesn't exist
        $results = $mysqli->query("SELECT id FROM users WHERE email='$femail'");
        if ( $results->num_rows > 0 ) {
            
        } else {
            // user doesn't exist
            // Confirm password
            if ( $fpassword == $fpassword2 ) {
                $fpassword = md5($fpassword);
                if ( $mysqli->query("INSERT INTO users (email,password,type) VALUES ('$femail','$fpassword','$type')" ) ) {
                    $typ = $type . "s"; 
                    // After inserting on type table
                    $results = $mysqli->query("SELECT * FROM users WHERE email='$femail' AND password='$fpassword' ");
                    if ( $results->num_rows > 0 ) {
                        $row = $results->fetch_assoc();
                        $_SESSION['email'] = $femail;
                        $_SESSION['pass'] = $fpassword;
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['type'] = $row['type'];
                        
                        // Also insert publisher or student table
                        $userid = $row['id'];
                        $mysqli->query("INSERT INTO $typ (id) VALUES ('$userid')");
                        
                        // header("Location: http://".$_SERVER['HTTP_HOST'] . $_SESSION['came_from']);       
                    }
                } 
        }
    }

}

?>

    <!-- container for login page -->
      <div class="container" >
         <div class="row justify-content-center">

            <div class="col-5 rounder p-3 mb-5 mt-5 bg-white">
                <h3>Εγγραφή</h3>
                <hr>
                <p>Θα έχετε την δυνατότητα να όρισετε παραπάνω πληροφορίες στην επεξεργασία του
                    προφίλ σας, σε επόμενο στάδιο.
                </p>
                <form action = "" method = "post" class="login-form" >
                    <div class="form-group" id="errorLogin" >
                    </div>
                    <div class="form-group">
                        <label >E-mail</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" required>    
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input type="password" class="form-control"  id="password" name="password"  placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label >Repeat password</label>
                        <input type="password" class="form-control"  id="password2" name="password2"  placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="types">Τύπος χρήστη</label>
                        <select name="types" id="dropwdowntypes" class="form-control">
                            <option value="student">Φοιτητής</option>
                            <option value="publisher">Εκδότης</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Sign up</button>                              
                    </div>
               </form>
                <a href="/login.php" class="text-primary">Έχω ήδη λογαριασμό</a>
            </div>

         </div>
      </div>

<?php echo file_get_contents("html/footer.html"); ?>
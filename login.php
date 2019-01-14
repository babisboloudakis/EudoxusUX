
<?php
    require("config.php");
    require("header.php");
    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

        // Read user credentials
        $femail = $_POST['email'];
        $fpassword = $_POST['password'];
        // Filter username and password for SQL injection
        $femail = mysqli_real_escape_string($mysqli,$femail);
        $fpassword = mysqli_real_escape_string($mysqli,$fpassword);
        // Hash password using md5 Encryption
        $fpassword = md5($fpassword);
        // Perform Database query
        $results = $mysqli->query("SELECT * FROM users WHERE email='$femail' AND password='$fpassword' ");
        if ( $results->num_rows > 0 ) {
            $row = $results->fetch_assoc();

            $_SESSION['email'] = $femail;
            $_SESSION['pass'] = $fpassword;
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = $row['type'];            

            // header("Location: http://".$_SERVER['HTTP_HOST'] . $_SESSION['came_from']);

            
        } else {
            echo "<p class='text-danger text-center'> Please try again. </p>";
        }
    }
?>

    <!-- container for login page -->
      <div class="container" >
         <div class="row justify-content-center">

            <div class="col-3 rounder p-3 mb-5 mt-5 bg-white">
                <h3>Σύνδεση</h3>
                <hr>
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
                        <button type="submit" class="btn btn-primary float-right">Σύνδεση</button>                              
                    </div>
               </form>
               <br>
               <a href="/register.php" class="text-primary">Δημιουργία λογαριασμού</a>
            </div>

         </div>
      </div>

<?php echo file_get_contents("html/footer.html"); ?>
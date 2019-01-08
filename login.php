
<?php
    include("header.php");
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

        // Read user credentials
        $fusername = $_POST['username'];
        $fpassword = $_POST['password'];
        // Filter username and password for SQL injection
        $fusername = mysqli_real_escape_string($mysqli,$fusername);
        $fpassword = mysqli_real_escape_string($mysqli,$fpassword);
        // Hash password using md5 Encryption
        $fpassword = md5($fpassword);
        // Perform Database query
        $results = $mysqli->query("SELECT id FROM users WHERE username='$fusername' AND password='$fpassword' ");
        if ( $results->num_rows > 0 ) {
            $_SESSION['user'] = $fusername;
            $_SESSION['pass'] = $fpassword;
        } else {
            echo "<p class='text-danger text-center'> Please try again. </p>";
        }
    }
?>

    <!-- container for login page -->
      <div class="container" >
         <div class="row justify-content-center">

            <div class="col-3 rounder p-3 mb-5 mt-5 bg-white">
                <form action = "" method = "post" class="login-form" >
                    <div class="form-group" id="errorLogin" >
                    </div>
                    <div class="form-group">
                        <label >Username</label>
                        <input type="text" id="user" name="username" class="form-control" placeholder="Username" required>    
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input type="password" class="form-control"  id="password" name="password"  placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>                              
                    </div>
               </form>
            </div>

         </div>
      </div>

<?php echo file_get_contents("html/footer.html"); ?>
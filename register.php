<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

        $fusername = $_POST['username'];
        $fpassword = $_POST['password'];
        // Confirm password field
        $fpassword2 = $_POST['password2'];

        // Make sure, user doesn't exist
        $results = $mysqli->query("SELECT id FROM users WHERE username='$fusername'");
        if ( $results->num_rows > 0 ) {
            echo "USER EXISTS!";
            // user exists
        } else {
            echo "USER DOESNT EXIST!";
            // user doesn't exist
            // Confirm password
            if ( $fpassword == $fpassword2 ) {
                echo "USER CREATED!";
                
                if ( !$mysqli->query("INSERT INTO users (username,password) VALUES ('$fusername','$fpassword')" ) ) {
                    echo "insert failed";
                }
            } else {
                echo "passwords dont match";
            }
        }
    }
?>

<html>
   
   <head>

    <title>Login Page</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>
        .container {
            /* background: url("./img/login.png"); */
            /* background-color:red; */
            background-image: url("/img/login.jpg");
            height: 100%; 

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>


   </head>
   
   <body>

    <!-- container for login page -->
      <div class="container" >
         <div class="row justify-content-center">

            <div class="col-5 rounder p-3 mb-5 mt-5 bg-white">
                <h3>Sign up</h3>
                <hr>
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
                        <label >Repeat password</label>
                        <input type="password" class="form-control"  id="password2" name="password2"  placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Sign up</button>                              
                    </div>
               </form>
            </div>

         </div>
      </div>

   </body>
</html>
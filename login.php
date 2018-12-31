<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

        $fusername = $_POST['username'];
        $fpassword = $_POST['password'];

        $results = $mysqli->query("SELECT id FROM users WHERE username='$fusername' AND password='$fpassword' ");
        if ( $results->num_rows > 0 ) {
            echo "SUCCESS!";
        } else {
            echo "FAIL!";
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

   </body>
</html>
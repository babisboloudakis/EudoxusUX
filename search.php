<?php
    include("config.php");
    //session_start();

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['SearchButton'])){
        echo "My keywords: ". $_GET['keywords']. "<br />";
        $keyword = $_GET['keywords'];
        //upercase
        //$keyword = strtoupper($keyword);
        echo $keyword;
        echo "<br />";
        $query = "SELECT * FROM users WHERE id='$keyword'";
        $results = $mysqli->query("SELECT * FROM users WHERE username='$keyword'");
        If(!$results){
            echo "fuck";
            echo "<br />";
        }
        if ($results && $results->num_rows > 0){
            while($row = $results->fetch_array()){
                echo $row['username'] . " " . $row['password'];
                echo "<br />";
            }
            
            //echo $results->current_field;
            //$name=mysqli_result($results, 0, "username");
            //echo $name;
        }
        else{
            echo "NO RESULT";
        }
    }
?>

<html>
    <head>
        <title>Search</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            .form-control-borderless {
                border: none;
            }

            .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
                border: none;
                outline: none;
                box-shadow: none;
            }
        </style>
    </head>
    <body>
        
    
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <div class="container">
            <br/>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form action = "" method = "get" class="card card-sm">
                        <div class="card-body row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-search h4 text-body"></i>
                            </div>
                            <div class="col">
                                <input class="form-control form-control-lg form-control-borderless" id="keywords" name="keywords" type="search" placeholder="Search topics or keywords">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-lg btn-success" type="submit" name='SearchButton'>Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
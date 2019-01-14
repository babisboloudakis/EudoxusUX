<?php 
    include("session.php");
    $_SESSION['came_from'] = $_SERVER['REQUEST_URI'];
    if ( !isset( $_SESSION['cart'] ) ) {
        $_SESSION['cart'] = array();
    }
?>

<html>

<head>
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">   
    <!-- Bootstrap and other CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Website settings -->
    <title>Εύδοξος</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-white navbar-light">
        <!-- Navigation content -->
        <a class="navbar-brand" href="/"><img src="/img/logo.png" style="max-width:100px;" alt="Eudoxus"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active px-1">
                    <a class="nav-link" href="/">Αρχική </a>
                </li>

                <li class="nav-item dropdown px-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Φοιτητές
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        
                    </div>
                </li>

                <li class="nav-item dropdown px-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Εκδότες
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

                <li class="nav-item dropdown px-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Γραμματείες
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="404.php">Διαχείριση Συγγραμάτων</a>
                    </div>
                </li>

                <li class="nav-item dropdown px-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Σημεία Διανομής
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="404.php">Διαχείριση Συγγραμάτων</a>
                        <a class="dropdown-item" href="404.php">Παράδοση Συγγραμάτων</a>
                        
                    </div>
                </li>

                <li class="nav-item dropdown px-1">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Βιβλιοθήκες
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="404.php">Διαχείριση</a>
                        <a class="dropdown-item" href="404.php">Πληροφορίες</a>
                    </div>
                </li>


                <form class="form-inline px-1" method="get" action="search.php">
                    <input class="form-control" type="search" name="term" placeholder="Αναζήτηση" aria-label="Αναζήτηση" style="width:150px; height:25px;">
                    <button class="btn btn-outline-success " type="submit"> <i class="fa fa-search" style="color:green; height:10px; max-width:30px;" ></i></button>
                </form>                

                <li class="nav-item">
                    <!-- <a href="#"><i class="fa fa-user"></i></a> -->
                    <?php 
                        if ( isset( $_SESSION['email']) ) {
                            echo '<li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        '.$_SESSION["email"] .';
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="editProfile.php">Επεξεργασία Προφίλ</a>
                        <a class="dropdown-item" href="checkout.php">Τρέχουσα Δήλωση</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Αποσύνδεση</a>
                    </div>
                </li> ' ;
                        } else {
                            echo '<a href="/login.php" class="nav-link"> Σύνδεση / Εγγραφή </a>';
                        }
                    ?>
                </li>

                

            </ul>
        </div>

    </nav>
    <div class="wrapp">
         
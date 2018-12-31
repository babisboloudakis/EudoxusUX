<?php 

    include('config.php');
    session_start();

    $user = $_SESSION['uname'];
    $sesSql = mysqli->query("select username from users where username = '$user' ");

    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
     }

?>
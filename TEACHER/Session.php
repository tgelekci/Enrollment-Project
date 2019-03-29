<?php
    $conn=mysqli_connect("localhost", "root", "", "inspection");
    session_start();

    $user_check=$_SESSION["login_user"];

    $ses_sql=mysqli_query($conn, "SELECT tusername FROM teachers WHERE tusername='$user_check'");
    $row=mysqli_fetch_array($ses_sql);

    $login_session=$row["tusername"];

    if(!isset($_SESSION["login_user"])){
        header("location: Loginpage.php");
    }

?>
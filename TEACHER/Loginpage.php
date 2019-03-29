<?php
    error_reporting(0);
    $conn=mysqli_connect("localhost", "root", "", "inspection");
    session_start();                       
    if($_SERVER["REQUEST_METHOD"]){
        $username=$_POST["tusername"];
        $password=$_POST["tpassword"];
        $result=mysqli_query($conn, "SELECT * FROM teachers WHERE tusername='$username' AND tpassword='$password'");
        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);

        if($count==1){
            $_SESSION["login_user"]=$username;
            header("location: Teachermenu.php");
        }
        else{
            $error = "Your Login Name or Password is invalid";
        
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
<title>Teacher Portal</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

    <div class="w3-container w3-blue">
        <h1 class="w3-jumbo w3-center">TEACHER PORTAL</h1>
        <br>
    </div>
    
    <div class="w3-container w3-blue">
        <div class="w3-container w3-teal">
            <h2>Please Enter Your Username and Password for Login:</h2>
        </div>
  
        <form method="post" action="" class="w3-container w3-blue-grey">
            <p>
                <i class="fa fa-user-circle" style="font-size:48px;color:black"></i>
                <label>Teacher Username</label>
                <input name="tusername" class="w3-input w3-border" type="text">
                
            </p>
            <p>     
                <i class="fa fa-lock" style="font-size:48px;color:black"></i>
                <label>Teacher Password</label>
                <input name="tpassword" class="w3-input w3-border" type="password">
            </p>
            <br>
            <p>
                <input type="submit" name="login_btn" class="w3-btn w3-white w3-right w3-large w3-round-xlarge w3-border" value="LOGIN">
            </p>
            <br>
            <br>
            <br>
        </form>

        <br>
    </div>

    <div class="w3-container w3-blue">
        <div class=" w3-container w3-center">
            <i class="fa fa-university w3-left" style="font-size:240px;color:white"></i>
            <i class="fa fa-university w3-center" style="font-size:240px;color:white"></i>
            <i class="fa fa-university w3-right" style="font-size:240px;color:white"></i>
            <br>
            <br>
            <br>
        </div>
    </div>
  
</body>
</html>

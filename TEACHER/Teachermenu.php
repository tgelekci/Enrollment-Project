<?php
  require "Session.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher Menu</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<div class="w3-container w3-center w3-blue">
  <h1 class="w3-jumbo w3-animate-opacity"><i class="fa fa-gear w3-spin"></i>  Welcome,  <?php echo $login_session."!"; ?>  </h1>
  <h1 class="w3-jumbo w3-animate-opacity"> <?php echo date('Y/m/d');?></h1>
  <h1 class="w3-jumbo w3-animate-opacity"> Please, select what you want to do:</h1>
</div>
<div class="w3-bar w3-card-4 w3-border w3-red w3-xlarge">
  <a href="Chooseqr.php" class="w3-bar-item w3-button"><i class="fa fa-qrcode"></i> Generate QR Code</a>
  <a href="Lessonadd.php" class="w3-bar-item w3-button"><i class="fa fa-plus-square"></i> Add Lesson</a>
  <a href="Studentadd.php" class="w3-bar-item w3-button"><i class="fa fa-plus-square-o"></i> Add Student</a>
  <a href="Teacherchange.php" class="w3-bar-item w3-button"><i class="fa fa-exchange"></i> Change Your Password</a>
  <a href="Studentchange.php" class="w3-bar-item w3-button"><i class="fa fa-exchange"></i> Change Student Password</a>
  <a href="Seeinspection.php" class="w3-bar-item w3-button"><i class="fa fa-eye"></i> See Inspection List</a>
  <a href="Logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>
  <br>
</div>
<div class="w3-container w3-yellow">
  <br>
  <div class=" w3-container w3-center">
    <i class="fa fa-users w3-left" style="font-size:240px;color:purple"></i>
    <i class="fa fa-long-arrow-right" style="font-size:240px"></i>
    <i class="fa fa-hand-paper-o w3-center" style="font-size:240px;color:purple"></i>
    <i class="fa fa-long-arrow-right" style="font-size:240px"></i>
    <i class="fa fa-database w3-right" style="font-size:240px;color:purple"></i>
    <br>
    <br>
  </div>
</div>
<div class="w3-container w3-center w3-dark-grey">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
</body>
</html>

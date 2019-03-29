<!DOCTYPE html>
<html>
<head>
<title>Change Your Password</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<div class="w3-container">
    <br>
    <br>
    <div class="w3-card-4">
      <div class="w3-container w3-purple ">
        <h1 class="w3-left">Change Your Password:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="oldpass" type="password">
          <i class="fa fa-lock" style="font-size:48px;color:purple"></i><label class="w3-text-purple"> Old Password</label></p>
        <p>     
          <input class="w3-input w3-border" name="newpass" type="password">
          <i class="fa fa-unlock" style="font-size:48px;color:purple"></i><label class="w3-text-purple"> New Password</label></p>
        <p>
          <input type="submit" name="tchange_btn" class="w3-btn w3-purple w3-right w3-large w3-border" value="CHANGE">
        </p>
      </form>
    <br>
    <br>
  </div>
  <br>
  <br>
  <div class="w3-container">
    <?php
      error_reporting(0);
      $conn=mysqli_connect("localhost", "root", "", "inspection");
      if(isset($_POST['oldpass'])){
        $told_pass=$_POST['oldpass'];
        if(isset($_POST['tchange_btn'])){
          $tnew_pass=$_POST['newpass'];
          $tchangepass=mysqli_query($conn, "UPDATE teachers SET tpassword='$tnew_pass' WHERE tpassword='$told_pass'");
        
        }
      }
      
  ?>
  
  </div>
  <br>
  <br>
  <br>
</div>
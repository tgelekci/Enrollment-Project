<!DOCTYPE html>
<html>
<head>
<title>Change Student Password</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
  <div class="w3-container">
    <br>
    <br>
    <div class="w3-card-4">
      <div class="w3-container w3-amber ">
        <h1 class="w3-left">Change Student Password:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="studentnum" type="text">
          <i class="fa fa-user" style="font-size:48px;color:orange"></i><label class="w3-text-amber"> Student Number</label></p>
        <p>     
          <input class="w3-input w3-border" name="newpassword" type="password">
          <i class="fa fa-lock" style="font-size:48px;color:orange"></i><label class="w3-text-amber"> New Student Password</label></p>
        <p>
          <input type="submit" name="change_btn" class="w3-btn w3-amber w3-right w3-large w3-border" value="CHANGE">
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
      if(isset($_POST['studentnum'])){
        $stu_num=$_POST['studentnum'];
        if(isset($_POST['change_btn'])){
          $new_pass=$_POST['newpassword'];
          $changepass=mysqli_query($conn, "UPDATE students SET studentpassword='$new_pass' WHERE studentnumber='$stu_num'");
        
        }
      }

      echo "<h1>Current Students:</h1><br>";

      $selectstu=mysqli_query($conn, "SELECT * FROM students");
      echo "<table class=\"w3-table w3-striped w3-bordered\">";
      echo "<tr>";
      echo "<th>STUDENT NUMBER</th>";
      echo "<th>STUDENT PASSWORD</th>";
      echo "</tr>";
      while($r = mysqli_fetch_array($selectstu))
        {   
          echo "<tr>";
          echo "<td>".$r["studentnumber"]."</td>";
          echo "<td>".$r["studentpassword"]."</td>";
          echo "</tr>";
        }
      echo "</table>";
      
  ?>
  
  </div>
  <br>
  <br>
  <div class="w3-container">
    <h3>Total Number of Students: <span class="w3-badge w3-amber"><?php echo mysqli_num_rows($selectstu); ?></span></h3>
    <br>
    <br>
  </div>
</div>
</body>
</html>

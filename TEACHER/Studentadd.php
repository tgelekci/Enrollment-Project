<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>

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
      <div class="w3-container w3-green ">
        <h1 class="w3-left">Add Student Information:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="addstunumber" type="text">
          <i class="fa fa-user-plus" style="font-size:36px;color:green"></i><label class="w3-text-green"> Student Number</label></p>
        <p>     
          <input class="w3-input w3-border" name="addstupassword" type="password">
          <i class="fa fa-lock" style="font-size:48px;color:green"></i><label class="w3-text-green"> Student Password</label></p>
        <p>
          <input type="submit" name="add_btn" class="w3-btn w3-green w3-right w3-large w3-border" value="ADD">
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
        if(isset($_POST['addstunumber'])&&isset($_POST['addstupassword'])){
          $stunum=$_POST['addstunumber'];
          $stupass=$_POST['addstupassword'];
          if(isset($_POST['add_btn'])){
            $addresult=mysqli_query($conn, "INSERT INTO students (studentnumber, studentpassword) VALUES ('".$stunum."', '".$stupass."')");
          }
        }
      
        echo "<h1>Current Students:</h1><br>";

        $selectresult=mysqli_query($conn, "SELECT * FROM students");
        echo "<table class=\"w3-table w3-striped w3-bordered\">";
        echo "<tr>";
        echo "<th>STUDENT NUMBER</th>";
        echo "<th>STUDENT PASSWORD</th>";
        echo "</tr>";
        while($r = mysqli_fetch_array($selectresult))
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
    <h3>Total Number of Students: <span class="w3-badge w3-green"><?php echo mysqli_num_rows($selectresult); ?></span></h3>
    <br>
    <br>
  </div>
</div>

</body>
</html>

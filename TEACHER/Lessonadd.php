<!DOCTYPE html>
<html>
<head>
<title>Add Lesson</title>

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
      <div class="w3-container w3-red ">
        <h1 class="w3-left">Add Lesson:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="addlesname" type="text">
          <i class="fa fa-book" style="font-size:36px;color:red"></i><label class="w3-text-red"> Lesson Name</label></p>
        <p>
          <input type="submit" name="addles_btn" class="w3-btn w3-red w3-right w3-large w3-border" value="ADD"></p>
      </form>
      <br>
      <br>
  </div>
  <br>
  <br>
  <div class="w3-container">
    <?php
      error_reporting(0);
      require "Session.php";
      $insert_teacher=$user_check;
    
      if(isset($_POST['addlesname'])){
        $lesname=$_POST['addlesname'];
        if(isset($_POST['addles_btn'])){
          $addresultles=mysqli_query($conn, "INSERT INTO lessonlist (lesson, teacheruname) VALUES ('".$lesname."', '".$insert_teacher."')");
        
        }
      }

      echo "<h1>Your Current Lessons:</h1><br>";

      $selectresultles=mysqli_query($conn, "SELECT lesson FROM lessonlist WHERE teacheruname='$insert_teacher'");
      echo "<table class=\"w3-table w3-striped w3-bordered\">";
      echo "<tr>";
      echo "<th>LESSONS</th>";
      echo "</tr>";
      while($rl = mysqli_fetch_array($selectresultles))
          {   
            echo "<tr>";
            echo "<td>".$rl["lesson"]."</td>";
            echo "</tr>";
          }
      echo "</table>";
  
  ?>
  
  </div>
  <br>
  <br>
  <div class="w3-container">
    <h3>Total Number of Lessons: <span class="w3-badge w3-red"><?php echo mysqli_num_rows($selectresultles); ?></span></h3>
    <br>
    <br>
  </div>
</div>

</body>
</html>

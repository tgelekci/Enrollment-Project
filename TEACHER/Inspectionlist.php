<!DOCTYPE html>
<html>
<head>
<title>Inspection List</title>

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
    <?php
    error_reporting(0);
    session_start();
    $conn=mysqli_connect("localhost", "root", "", "inspection");
    $ls=$_GET["lesson_name"];
    $_SESSION["lesson"]=$ls;

    $selectins=mysqli_query($conn, "SELECT studentno, date FROM inspectionlist WHERE lesson='$ls' ORDER BY date");
    echo "<table class=\"w3-table w3-striped w3-bordered w3-hoverable\">";
    echo "<tr>";
    echo "<th>STUDENT NUMBER</th>";
    echo "<th>DATE</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($selectins))
      {   
        echo "<tr>";
        echo "<td>".$row["studentno"]."</td>";
        echo "<td>".$row["date"]."</td>";
        echo "</tr>";
      }
      echo "</table>";
      
?>

</div>
<br>
<br>
<div class="w3-container">
    <h3>Total Number of Enrolled Students: <span class="w3-badge w3-light-blue"><?php echo mysqli_num_rows($selectins); ?></span></h3>
    <br>
    <br>
  </div>
</div>

<br>

<div class="w3-container">
    <br>
    <br>
    <div class="w3-card-4">
      <div class="w3-container w3-light-blue">
        <h1 class="w3-left">Select A Specific Date To View The Inspection Records:</h1>
      </div>

      <form class="w3-container" action="Inspectionasdate.php" method="get">
        <p>
        <input class="w3-input w3-border" name="datebar" type="date">
        <i class="fa fa-calendar" style="font-size:36px;color:blue"></i><label class="w3-text-blue"> Date</label></p>
        <p>
          <input type="submit" name="view_btn" class="w3-btn w3-light-blue w3-right w3-large w3-border" value="VIEW">
        </p>
      </form>
      <br>
      <br>
    </div>
    <br>
    <br>
    <br>

</body>
</html>

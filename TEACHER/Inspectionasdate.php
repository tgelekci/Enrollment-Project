
<!DOCTYPE html>
<html>
<head>
<title>Inspection List(Date)</title>

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
                session_start();
                error_reporting(0);
                $taken_lesson=$_SESSION["lesson"];
                $conn=mysqli_connect("localhost", "root", "", "inspection");
                if(isset($_GET['datebar'])&&$_GET['datebar']!=null){
                    $dt=$_GET['datebar'];
                    if(isset($_GET['view_btn'])){
                        $selectinsdt=mysqli_query($conn, "SELECT studentno FROM inspectionlist WHERE date LIKE '$dt%' AND lesson LIKE '$taken_lesson%'");
                    }                 
                }
                echo "<table class=\"w3-table w3-striped w3-bordered w3-hoverable\">";
                echo "<tr>";
                echo "<th>STUDENT NUMBER</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($selectinsdt))
                    {   
                        echo "<tr>";
                        echo "<td>".$row["studentno"]."</td>";
                        echo "</tr>";
                    }
                echo "</table>";

?>

</div>
<br>
<br>
<div class="w3-container">
    <h3>Total Number of Enrolled Students on <?php echo $dt; ?>: <span class="w3-badge w3-light-blue"><?php echo mysqli_num_rows($selectinsdt); ?></span></h3>
    <br>
    <br>
  </div>
</div>

</body>
</html>

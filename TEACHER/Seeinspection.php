<?php
    require "Session.php";

    $sql=mysqli_query($conn, "SELECT teacheruname FROM lessonlist WHERE teacheruname='$user_check'");
    $rw=mysqli_fetch_array($sql);

    $tu=$rw["teacheruname"];

?>

<!DOCTYPE html>
<html>
<head>
<title>See Inspection List</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<div class="w3-container w3-center w3-teal">
    <h1 class="w3-xxlarge w3-left"><?php echo $tu ?>, please choose the lesson you want to see the inspection records:</h1>
</div>

<div class="w3-container w3-center w3-lime ">
    <h1 class="w3-xxxlarge w3-left">
        <?php  
            $r=mysqli_query($conn, "SELECT lesson FROM lessonlist WHERE teacheruname='$tu'");
            echo "<ul class=\"w3-ul w3-card-4 w3-yellow w3-jumbo\">";
            while($ro = mysqli_fetch_array($r)){
                echo "<a href='Inspectionlist.php?lesson_name=".$ro['lesson']."'><li>".$ro["lesson"]."</li></a>";
            }
            echo "</ul>"; ?> </h1>
    <br>

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
    <br>
    <br>
    <br>
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

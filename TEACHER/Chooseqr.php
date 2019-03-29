<?php
require "Session.php";


$sqlqr=mysqli_query($conn, "SELECT teacheruname FROM lessonlist WHERE teacheruname='$user_check'");
$row1=mysqli_fetch_array($sqlqr);

$teacher=$row1["teacheruname"];

?>

<!DOCTYPE html>
<html>
<head>
<title>Choose A Lesson</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <div class="w3-container w3-center w3-red">
        <h1 class="w3-xxlarge w3-left"><?php echo $teacher ?>, please choose the lesson you want to generate the code:</h1>
    </div>

    <div class="w3-container w3-center w3-orange ">
        <h1 class="w3-xxxlarge w3-left">
            <?php  
                $res=mysqli_query($conn, "SELECT lesson FROM lessonlist WHERE teacheruname='$teacher'");
                echo "<ul class=\"w3-ul w3-card-4 w3-yellow w3-jumbo\">";
                while($rowa = mysqli_fetch_array($res)){
                    echo "<a href='Qrgenerator.php?lesson_name=".$rowa['lesson']."'><li>".$rowa["lesson"]."</li></a>";
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

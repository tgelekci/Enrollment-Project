<?php
require "dbconnection.php";
$no=$_POST["s_no"];
$lesson=$_POST["s_les"];
$date=$_POST["s_da"];
$query="INSERT INTO inspectionlist (studentno, lesson, date) VALUES ('$no', '$lesson', '$date')";
$resulti=mysqli_query($connection, $query);

if($resulti){
    echo "Insert Successful";
}

else{
    echo "Insert Error";
}


?>
<?php
require "dbconnection.php";

$stu_no=$_POST["std_no"];

$stu_pass=$_POST["std_pass"];

$result=mysqli_query($connection, "SELECT * FROM students WHERE studentnumber LIKE '$stu_no' AND studentpassword LIKE '$stu_pass'");


if(mysqli_num_rows($result)>0){
    echo "Login Successful";
}

else{
    echo "Check Your Login Information";
}


?>
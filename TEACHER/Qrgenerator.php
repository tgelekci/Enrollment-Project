<?php
    include('C:\xampp\htdocs\TEACHER\phpqrcode-master\phpqrcode.php');
    $lesson_qr=$_GET["lesson_name"];
    $backColor = 0xFFFFFF;
    $foreColor = 0x000000;
    QRcode::png($lesson_qr, false, "H", 10, 3, false, $backColor, $foreColor); 
?>
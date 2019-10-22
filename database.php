<?php
    $conn = mysqli_connect("localhost","root","","mystore");
    mysqli_set_charset($conn,"utf8");
    
    if(!$conn) {
        die("ไม่สามารถติดต่อฐานข้อมูลได้");
    }
?>
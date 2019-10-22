<?php
    session_start();
    include 'database.php';

    $user_form = $_POST['username'];//รับข้อมูล username มาจากฟอร์ม
    $pwd_form = $_POST['password'];
    
    $login = mysqli_query($conn,"SELECT Customer_Name, username, password FROM customer WHERE username='$user_form' AND password='$pwd_form' ")
    or die(mysqli_error($conn));

    list($Name,$user_db,$pass_db) = mysqli_fetch_row($login);
        
    if($user_form == $user_db and $pwd_form == $pass_db){ //ตรวจสอบว่า username จากฟอร์มตรงกับในฐานข้อมูลหรือไม่
        $_SESSION['valid_user'] = $Name; //เก็บ username ของผู้ใช้
        header("Location:Lab8_59543206023-3.php");
    }
    else{
        echo "Username หรือ Password ไม่ถูกต้อง";
    }
?>
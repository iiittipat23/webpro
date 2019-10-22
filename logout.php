<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>เข้าสู่ระบบ</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <style>
            body{
                text-align: center;
                font-family: 'MS Sans Serif';
                color: red;
                font-size: 24px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div align="center" style="margin-top: -15px; margin-bottom: -15px;" >
            <br>ออกจากระบบแล้ว!!<br>
            <input type="button" onclick="window.location.href='Lab8_59543206023-3.php'" value="เข้าสู่ระบบอีกครั้ง">
        </div>
        </div>
    </body>
</html>
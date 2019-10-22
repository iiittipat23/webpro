<?php
session_start();
if (isset($_SESSION['valid_user'])) {
    header("Location: Lab8_59543206023-3.php");
}
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
        body {
            text-align: center;
            font-family: 'MS Sans Serif';
        }

        #lgform {
            border: 7px solid;
            width: 4in;
            margin-top: -30px;
            color: rgb(32, 170, 55);
        }

        #wraper {
            margin-top: -50px;
        }
    </style>
</head>

<body>
    <div id="header">
        กรุณาเข้าสู่ระบบ
    </div>
    <div align="center">
        <form action="checklogin.php" method="POST">
            <fieldset id="lgform">
                <legend>
                    <h2>LOGIN</h2>
                </legend>
                <div id="wraper">
                    Username : <input type="text" name="username" maxlength="10" required><br>
                    Password : <input type="password" name="password" maxlength="10" required>
                </div>
                <div align="center" style="margin-top: -15px; margin-bottom: -15px;">
                    <input class="button" type="submit" value="เข้าสู่ระบบ">
                    <input class="button" type="reset" value="ยกเลิก">
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>